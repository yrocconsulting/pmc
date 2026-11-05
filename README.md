# Progressive Marketing Concepts website

Custom WordPress theme for [progressivemarketing.pro](https://progressivemarketing.pro): PMC Driveby, Google Maps ranking for medical clinics, auto dealerships, hotels, and veterinary clinics.

```
wp-content/themes/progressive-marketing/   ← the theme (deployed to cPanel)
.github/workflows/deploy.yml               ← auto-deploy on push to main
```

## Pages

Activating the theme creates these pages (it never overwrites existing ones), sets Home as the front page, builds the Primary and Footer menus, and turns on `/%postname%/` permalinks.

| URL | Template |
| --- | --- |
| `/` | `front-page.php` |
| `/driveby/` | `page-driveby.php` |
| `/industries/` | `page-industries.php` |
| `/industries/medical-clinics/`, `/auto-dealerships/`, `/hotels/`, `/veterinary-clinics/` | `template-parts/industry.php` (via `page.php`) |
| `/case-studies/` | `page-case-studies.php` |
| `/about-us/` | `page-about-us.php` |
| `/contact-us/` | `page-contact-us.php` (free trial signup form) |

`/case-studies/`, `/about-us/`, and `/contact-us/` keep the same URLs as the old site. `/home-page/` redirects to `/`.

## Editing content

- **Copy, case studies, industries, FAQs, testimonials:** `inc/content.php`. To add a case study, add an entry there and put its before/after grid images in `assets/img/`.
- **Phone, email, trial button URL, top bar text, where signups go:** WordPress admin → Appearance → Customize → Progressive Marketing.
- **Logo:** Appearance → Customize → Site Identity (falls back to `assets/img/logo.png`).

## Trial signups

The form on `/contact-us/#trial`:

1. Saves every submission under **Dashboard → Trial Signups**, so nothing is lost if email fails.
2. Emails the notification address (Customizer).
3. If a **webhook URL** is set in the Customizer, POSTs the signup as JSON. Use this to send signups into HighLevel, Jumper Media onboarding, or Zapier.

To send the "Start free trial" buttons to an external order form instead (for example the HighLevel trial funnel), set **Free trial button URL** in the Customizer.

Install an SMTP plugin (for example WP Mail SMTP) so WordPress email from cPanel lands in inboxes.

## Deployment (GitHub Actions → cPanel)

Every push to `main` that changes the theme lints the PHP and uploads the theme over FTPS. You can also run it by hand from **Actions → Deploy theme to cPanel → Run workflow**. Only changed files are uploaded.

### Repository secrets

Add these under **Settings → Secrets and variables → Actions → New repository secret**:

| Secret | Value |
| --- | --- |
| `CPANEL_FTP_SERVER` | FTP host, e.g. `ftp.progressivemarketing.pro` (cPanel → FTP Accounts → Configure FTP Client) |
| `CPANEL_FTP_USERNAME` | Full FTP username, e.g. `deploy@progressivemarketing.pro` |
| `CPANEL_FTP_PASSWORD` | That FTP account's password |

Optional **variable** (Variables tab, not Secrets):

| Variable | Default |
| --- | --- |
| `CPANEL_THEME_DIR` | `public_html/wp-content/themes/progressive-marketing/` |

`CPANEL_THEME_DIR` is the path from the FTP account's home folder to the theme folder, ending in `/`. With the default, the FTP account's home must be your cPanel home directory (the main cPanel account works). With a dedicated FTP account whose directory is `public_html`, set it to `wp-content/themes/progressive-marketing/`. If WordPress is installed in a subfolder or an addon domain's folder, adjust the path to match.

### Recommended: a dedicated deploy FTP account

In cPanel → **FTP Accounts**, create `deploy@progressivemarketing.pro` with directory `public_html/wp-content/themes/progressive-marketing`, then set `CPANEL_THEME_DIR` to `./`. That account can only touch the theme folder.

### First deploy

1. Install WordPress on cPanel (Softaculous / WordPress Manager) for progressivemarketing.pro.
2. Add the secrets above and merge to `main` (or run the workflow manually).
3. In WordPress admin → Appearance → Themes, activate **Progressive Marketing Concepts**.
4. Open Appearance → Customize → Progressive Marketing and check the phone, email, and signup settings.

## Local check

```bash
for f in $(find wp-content/themes/progressive-marketing -name '*.php'); do php -l "$f"; done
```
