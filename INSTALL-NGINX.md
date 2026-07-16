# Running OSSN on nginx

OSSN historically ships an Apache `.htaccess` (generated from
`installation/configs/htaccess.dist`). nginx does not read `.htaccess` files, so
the same rules are provided as a server block in
[`installation/configs/nginx.dist`](installation/configs/nginx.dist).

## 1. Requirements

- nginx
- PHP-FPM (same PHP version/extensions OSSN needs under Apache)
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
`.user.ini` file OSSN generates (`installation/configs/user.ini.dist`), the same
way as under Apache — no nginx changes needed. Make sure your PHP-FPM pool allows
`.user.ini` (`user_ini.filename = .user.ini`, the default).

## 4. Run the installer

Browse to your domain and complete the web installer. The installer now accepts
nginx as a supported web server, and its URL-rewrite self-test passes once the
config above is active.

## What the config translates

| `.htaccess` (Apache)                              | `nginx.dist`                                   |
|---------------------------------------------------|------------------------------------------------|
| `RewriteRule ^action/(...)` → actions handler     | `location ~ ^/action/(...)` → `rewrite ... last` |
| Clean-URL front controller (`index.php?h=&p=`)    | `try_files ... @ossn` + `rewrite` rules        |
| `RedirectMatch 404` for cli/cron/internal dirs    | `location ... { return 404; }`                 |
| Deny `error_log`, `.user.ini`, `*.dist`           | dotfile / `error_log` / `.dist` deny locations |
| `mod_expires` / `mod_headers` (cache + image CORS)| `expires 1y` + `add_header Access-Control-*`   |
| `Options -Indexes`                                | `autoindex off`                                |

> HTTPS: add `listen 443 ssl;` with your certificate directives (e.g. via
> Certbot's nginx plugin), or run the `nginx.dist` block behind your existing
> TLS-terminating config.
