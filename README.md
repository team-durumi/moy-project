# moy-project

프로젝트 이슈 관리 도구 - 모이(자)

- 사용자 user
- 프로젝트 project
- 이슈 issue

## development

```bash
# Check dependencies.
$ php -v && sqlite3 -version && composer -V && psql -V
# Clone and setup.
$ git clone git@github.com:team-durumi/moy-project.git
$ cd moy-project
$ composer install && composer workspace && composer env
# Load env vars and check install options. (default DB_URL: gh-codespace)
$ . scripts/env.sh && env | grep DRUSH_COMMAND_SITE_INSTALL_OPTIONS_DB_URL
# Install site.
$ composer site-install
# Run web server.
$ composer start
# Uninstall site.
$ composer site-uninstall
```
