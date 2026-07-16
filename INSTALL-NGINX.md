# Running OSSN on nginx

OSSN runs on **nginx + PHP-FPM**. nginx has no per-directory configuration, so
all routing and access rules live in a server block, provided as
[`installation/configs/nginx.dist`](installation/configs/nginx.dist).

## 1. Requirements

- nginx
- PHP-FPM (with the PHP version/extensions OSSN requires)
- MySQL/MariaDB

## 2. Install the server config

```bash
sudo cp /var/www/ossn/installation/configs/nginx.dist \
        /etc/nginx/sites-available/ossn.conf
sudo ln -s /etc/nginx/sites-available/ossn.conf /etc/nginx/sites-enabled/ossn.conf
```

Edit `/etc/nginx/sites-available/ossn.conf` and set the three marked values:

- `server_name` – your domain
- `root` – the OSSN directory (where `index.php` lives)
- `fastcgi_pass` – your PHP-FPM socket, e.g. `unix:/run/php/php8.2-fpm.sock`

Then test and reload:

```bash
sudo nginx -t
sudo systemctl reload nginx
```

## 3. PHP settings

Upload sizes, memory limit, etc. are applied by **PHP-FPM** through the
`.user.ini` file OSSN generates from `installation/configs/user.ini.dist`. Make
sure your PHP-FPM pool allows `.user.ini` (`user_ini.filename = .user.ini`, the
default).

## 4. Run the installer

Browse to your domain and complete the web installer. The installer verifies it
is running under nginx and that URL rewriting works (its self-test requests
`/rewrite.php`, which the config above rewrites to
`installation/tests/rewrite_check.php`).

## What the server block does

| Rule                                              | Directive                                       |
|---------------------------------------------------|-------------------------------------------------|
| Action handler `/action/<name>`                   | `location ~ ^/action/(...)` → `rewrite ... last`|
| Clean-URL front controller (`index.php?h=&p=`)    | `try_files ... @ossn` + `rewrite` rules         |
| 404 for cli/cron/upgrade/internal source dirs     | `location ... { return 404; }`                  |
| Deny dotfiles, `error_log`, `*.dist`              | dotfile / `error_log` / `.dist` deny locations  |
| Long cache + image CORS                           | `expires 1y` + `add_header Access-Control-*`    |
| No directory listing                              | `autoindex off`                                 |

> **HTTPS:** add `listen 443 ssl;` with your certificate directives (e.g. via
> Certbot's nginx plugin), or run this `server` block behind your existing
> TLS-terminating proxy.
