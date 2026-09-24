.DEFAULT_GOAL := help
PROJECT_DIR := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))

.PHONY: help deploy upload-theme deploy-check zip
help:
	@printf '%s\n' 'make deploy-check  Validate credentials and list files without connecting.' 'make deploy        Upload theme/ to the FTP themes directory.'
	@printf '%s\n' 'make zip           Package theme/ as build/fronex-theme.zip.'

zip:
	@mkdir -p "$(PROJECT_DIR)build"
	@cd "$(PROJECT_DIR)" && zip -q -r -FS build/fronex-theme.zip theme
	@printf '%s\n' 'Created build/fronex-theme.zip'

deploy: upload-theme

upload-theme:
	@bash "$(PROJECT_DIR)scripts/upload-theme.sh"

deploy-check:
	@bash "$(PROJECT_DIR)scripts/upload-theme.sh" --check
