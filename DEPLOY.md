# Production deploy (Plesk / Cloud86)

One-way flow only:

`feature` → `main` → `production` → Plesk

Never merge `production` into `main` or a feature branch.

## Why `public/build` is tracked here

The Cloud86 SSH environment has no Node/npm. Plesk Git therefore cannot run `npm run build`.
On `main`, `/public/build` stays gitignored. On `production`, the built assets are committed so Plesk can pull a runnable tree.

## Update production

On your machine:

```bash
git checkout main
git pull
git checkout production
git merge main
# If .gitignore conflicts: keep the production version (public/build NOT ignored).

npm ci
npm run build
git add -A public/build
git add .gitignore
git commit -m "Deploy: sync main + refresh public/build"
git push origin production
```

Then in Plesk Git: pull/deploy `production` (or wait for automatic deploy).

## Plesk Git settings

- Repository: `https://github.com/SennaGd/Planning-Project.git`
- Branch: `production`
- Deploy path: `httpdocs/planning` (same folder as now)
- Additional deployment actions (example):

```bash
(/opt/plesk/php/8.5/bin/php /usr/lib/plesk-9.0/composer.phar install --no-dev --optimize-autoloader --working-dir="$PWD" || /opt/plesk/php/8.5/bin/php composer.phar install --no-dev --optimize-autoloader)
/opt/plesk/php/8.5/bin/php artisan migrate --force
/opt/plesk/php/8.5/bin/php artisan config:clear
/opt/plesk/php/8.5/bin/php artisan view:clear
```

Adjust the Composer binary path if Plesk shows a different one. Do **not** run `npm` here.

## Never delete on the server

Keep outside Git (do not wipe when cleaning the folder):

- `.env`
- `database/database.sqlite` (if you use sqlite and care about data)
- uploaded files under `storage/app` if any

Optional hosting shim (already used on madebytiemen.nl):

- `httpdocs/planning/index.php` requiring `public/index.php`
- `httpdocs/planning/.htaccess` rewriting into the app

Those shims are server-only unless you decide to commit them.

## Env reminders for this host

```env
APP_URL=https://madebytiemen.nl/planning
ASSET_URL=https://madebytiemen.nl/planning/public
BROADCAST_CONNECTION=pusher
```

Plus your Pusher keys. Never commit `.env`.
