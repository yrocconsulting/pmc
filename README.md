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
| `/contact-us/` | `page-contact-us.php` (HighLevel form) |
| `/growth360/` | `page-growth360.php` (moved from vet.progressivemarketing.pro) |

`/case-studies/`, `/about-us/`, and `/contact-us/` keep the same URLs as the old site. `/home-page/` redirects to `/`.

## Editing content

- **Copy, case studies, industries, FAQs, testimonials:** `inc/content.php`. To add a case study, add an entry there and put its before/after grid images in `assets/img/`.
- **Phone, email, trial button URL, top bar text, where signups go:** WordPress admin → Appearance → Customize → Progressive Marketing.
- **Logo:** Appearance → Customize → Site Identity (falls back to `assets/img/logo.png`).

## HighLevel: forms and payments

WordPress runs the website. HighLevel handles forms, the trial checkout and the CRM. Set these in **Appearance → Customize → Progressive Marketing**:

| Setting | What it does | Default |
| --- | --- | --- |
| Free trial button URL | Every "Start free trial" button (header, top bar, CTAs) | `https://vet.progressivemarketing.pro/trial-form` (the existing HighLevel order form) |
| HighLevel form ID or link | Form shown on `/contact-us/` | blank |
| Growth360 evaluation URL | "Start my Executive Evaluation" buttons on `/growth360/` | the same HighLevel order form |
| Growth360 video URL | Overview video on `/growth360/` | the existing HighLevel-hosted MP4 |

For the form ID: in HighLevel go to **Sites → Forms → Builder**, open the form, click **Integrate**, and copy either the form ID or the link that contains `/widget/form/…`. Either works.

You can also drop HighLevel forms or booking calendars into any WordPress page or post with shortcodes:

```
[ghl_form id="FORM_ID"]
[ghl_calendar id="CALENDAR_ID"]
```

### Backup form

If the trial URL and the HighLevel form are both blank, the Contact page falls back to a built-in form. It saves signups under **Dashboard → Trial Signups**, emails them, and can POST them to a HighLevel inbound webhook. You normally won't need it.

### Domains

HighLevel's order form needs a domain connected to HighLevel. Recommended setup:

1. In HighLevel, connect a subdomain such as `go.progressivemarketing.pro` and move the trial order form funnel onto it. Update the two trial URLs in the Customizer to the new address.
2. Point `progressivemarketing.pro` and `www` (A record) to the cPanel server.
3. Once nothing uses `vet.progressivemarketing.pro`, point it to cPanel as well and redirect it to `https://progressivemarketing.pro/growth360/` (cPanel → Domains → Redirects), so old links keep working.

Until step 1 is done, leave `vet.progressivemarketing.pro` on HighLevel: the trial buttons point to its `/trial-form` page.

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
