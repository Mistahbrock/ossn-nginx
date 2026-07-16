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

## Installing under a sub-path (e.g. `example.com/ossn/`)

The `nginx.dist` above assumes OSSN is served at the root of a host. To run it
in a subdirectory of an existing site instead, put the OSSN rules in their own
file and `include` them into that site's `server { }` block. Assuming the site's
`root` is `/var/www/site` and OSSN lives at `/var/www/site/ossn/`:

Create `/etc/nginx/snippets/ossn.conf`:

```nginx
# OSSN served at /ossn/  — include inside the host's server { } block
client_max_body_size 105M;

location = /ossn/rewrite.php {
    rewrite ^ /ossn/installation/tests/rewrite_check.php last;
}
location ~ ^/ossn/action/([A-Za-z0-9_\-/]+)$ {
    rewrite ^/ossn/action/(.+)$ /ossn/system/handlers/actions.php?action=$1 last;
}
location ~ ^/ossn/system/handlers/(cli|cron)$ { return 404; }
location ~ ^/ossn/(upgrade/upgrades|actions|libraries|classes)/ { return 404; }
location ~ ^/ossn/.+/plugins/default/ { return 404; }
location ~ ^/ossn/.+\.dist$ { return 404; }
location /ossn/ {
    try_files $uri $uri/ @ossn;
}
location @ossn {
    rewrite ^/ossn/([A-Za-z0-9_\-.]+)/(.*)$ /ossn/index.php?h=$1&p=$2 last;
    rewrite ^/ossn/([A-Za-z0-9_\-.]+)$      /ossn/index.php?h=$1 last;
}
```

Then, **inside the existing `server { }` block and above its `location ~ \.php$`
block** (so the deny rules take precedence over the PHP handler), add:

```nginx
    include snippets/ossn.conf;
```

The site's existing `location ~ \.php$` (with its `fastcgi_pass`) executes the
PHP after these rewrites, so no extra PHP block is needed. Reload with
`nginx -t && systemctl reload nginx`.

Notes for a sub-path install:
- Do **not** symlink `snippets/ossn.conf` into `sites-enabled` — it holds bare
  `location` blocks and must only be `include`d.
- The OSSN directory must be owned/writable by the PHP-FPM user (it writes
  `configurations/`, `cache/`, and `.user.ini`), e.g.
  `chown -R www-data:www-data /var/www/site/ossn`.
- Install into an **empty** database — OSSN's schema import uses plain
  `CREATE TABLE`, so re-running it against existing `ossn_*` tables fails.
