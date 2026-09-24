# Local WordPress

Minimal classic theme development using Docker Compose v2+ (Docker Desktop or Docker Engine with Compose). No local PHP, Composer, Node, or WordPress installation is required.

## Start

```sh
cp .env.example .env
# Choose local database passwords in .env before the first startup.
docker compose up -d --wait
```

Open http://localhost:8080, complete the WordPress installer, then activate **Local Theme** under **Appearance → Themes**. Edit files in `theme/`; changes appear immediately. The theme is mounted read-only inside the container, but remains editable on the host. Change `WP_PORT` in `.env` if port 8080 is occupied.

The first startup may take several minutes while MariaDB initializes its data files, especially on Docker Desktop/WSL. The database health check allows up to roughly ten minutes for this. Follow progress with `docker compose logs -f db`; avoid interrupting initial database creation.

## Layout

- `theme/`: the custom classic PHP theme; no build step.
- `docker-compose.yml`: WordPress with Apache/PHP 8.3 and MariaDB 11.4.
- `.env.example`: local configuration template; `.env` is ignored by Git.

WordPress core, installed plugins, uploads, and logs live in the `wordpress_data` Docker volume. Database data lives in `db_data`. Neither volume is stored in this repository. Only WordPress's HTTP port is published, bound to localhost; MariaDB is accessible only inside the Compose network. This setup is for local development.

## Everyday commands

```sh
docker compose logs -f
docker compose stop
docker compose up -d --wait
docker compose down
```

`down` preserves data. To erase the local installation, database, and uploads and start over (the source theme is preserved):

```sh
docker compose down -v
docker compose up -d --wait
```

Debug logging is enabled; inspect it with `docker compose exec wordpress tail -f /var/www/html/wp-content/debug.log` after a log entry has been written. Errors are hidden from page output. The dashboard file editor is disabled.

Database credentials are applied when the database volume is first initialized; changing `.env` does not change existing database users. Keep the original credentials, change them in MariaDB, or reset disposable local data.

WordPress is pinned to a release and PHP variant; MariaDB follows the 11.4 maintenance series. Use `docker compose pull` and `docker compose up -d --wait` for image updates. Existing WordPress core in the persistent volume is not replaced by an image update: update it through the dashboard, or reset disposable local data after changing the image tag. Back up valuable data before resets or upgrades.

References: [official WordPress image](https://hub.docker.com/_/wordpress) and [MariaDB container health checks](https://mariadb.com/docs/server/server-management/automated-mariadb-deployment-and-administration/docker-and-mariadb/using-healthcheck-sh).


## Fronex homepage

The active Local Theme now uses `theme/front-page.php` for its industrial landing page. It includes a hero, about section, expandable services, project concepts, team profiles, manually controlled testimonials, email contact, latest WordPress posts, and footer. The reference workflow section is intentionally omitted.

- Edit section text and image selections in `theme/front-page.php`, navigation in `theme/header.php`, and footer in `theme/footer.php`.
- Styles are in `theme/style.css`; scroll reveals, mobile navigation, service accordion behavior, and testimonial controls are in `theme/assets/site.js`. No external animation libraries are required. Reduced-motion preferences are respected.
- Selected reference images are copied into `theme/assets/images`. The original saved page stays in the ignored `inspiration/` directory. These are preview images; replace them with your own licensed imagery before publication.
- Team roles, project concepts, and testimonials are illustrative content, not claims about actual people, clients, or completed work. Replace these when final business content is available.
- Contact links use the WordPress administration email configured under Settings → General. The news section displays up to three published posts and is omitted when there are none.

Compose uses the fixed project name `wp-project` and container names `fronex-db` and `fronext-wp`, regardless of the checkout folder name. The legacy project name deliberately preserves the existing `wp-project_db_data` and `wp-project_wordpress_data` volumes. When replacing old containers, keep those volumes (do not use `down -v`), then run `docker compose up -d --wait` from this directory. Explicit `-p` or `COMPOSE_PROJECT_NAME` overrides take precedence over the configured project name.
