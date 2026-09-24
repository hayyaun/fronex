#!/usr/bin/env bash
# Credentials are passed to lftp through stdin, never command-line arguments.
set -euo pipefail
set +x

project_dir="$(cd -- "$(dirname -- "${BASH_SOURCE[0]}")/.." && pwd)"
if [[ ! -f "$project_dir/.env" ]]; then
    printf '%s\n' 'Missing .env with FTP credentials.' >&2
    exit 1
fi
source "$project_dir/.env"
: "${FTP_HOST:?Set FTP_HOST in .env}"
: "${FTP_USERNAME:?Set FTP_USERNAME in .env}"
: "${FTP_PASSWORD:?Set FTP_PASSWORD in .env}"
: "${FTP_REMOTE_DIR:?Set FTP_REMOTE_DIR in .env}"
[[ "$FTP_REMOTE_DIR" == /* && -f "$project_dir/theme/style.css" ]] || {
    printf '%s\n' 'Expected an absolute FTP_REMOTE_DIR and theme/style.css.' >&2
    exit 1
}

case "${1:-}" in
    --check)
        printf 'Source: %s/theme/\nDestination: %s:%s/theme/\n' "$project_dir" "$FTP_HOST" "${FTP_REMOTE_DIR%/}"
        if ! command -v lftp >/dev/null; then
            printf '%s\n' 'Install lftp: sudo apt install lftp' >&2
            exit 1
        fi
        printf '%s\n' 'Validation passed. No FTP connection made.'
        exit 0
        ;;
    '') ;;
    *) printf '%s\n' 'Usage: upload-theme.sh [--check]' >&2; exit 1 ;;
esac

command -v lftp >/dev/null || {
    printf '%s\n' 'Install lftp: sudo apt install lftp' >&2
    exit 1
}

# Quote values for the lftp command parser independently of shell quoting.
lftp_quote() {
    local value="$1"
    [[ "$value" != *$'\n'* && "$value" != *$'\r'* ]] || return 1
    value="${value//\\/\\\\}"
    value="${value//\"/\\\"}"
    printf '"%s"' "$value"
}

{
    # Script input is not a terminal; explicitly enable the foreground status line.
    # Use -f below so interactive mode never echoes commands containing credentials.
    printf '%s\n' 'set cmd:save-rl-history no' 'set cmd:interactive yes' 'set cmd:show-status yes' 'set cmd:status-interval 0.5s'
    printf '%s\n' 'set cmd:fail-exit yes' 'set net:max-retries 3' 'set net:timeout 30' 'set ftp:passive-mode yes'
    printf 'open %s\n' "$(lftp_quote "ftp://$FTP_HOST")"
    printf 'user %s %s\n' "$(lftp_quote "$FTP_USERNAME")" "$(lftp_quote "$FTP_PASSWORD")"
    printf 'cd %s\n' "$(lftp_quote "$FTP_REMOTE_DIR")"
    printf 'mirror --reverse --scan-all-first --verbose=1 --parallel=3 --no-perms %s %s\n' "$(lftp_quote "$project_dir/theme/")" "$(lftp_quote "${FTP_REMOTE_DIR%/}/theme/")"
    printf '%s\n' 'bye'
} | lftp -f /dev/stdin
printf '%s\n' 'Theme upload complete. No remote files deleted.'
