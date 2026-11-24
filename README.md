# Progressive Marketing Concepts website

High-end custom WordPress theme for Progressive Marketing Concepts.

- **Staging:** https://pmc.yroc.host (SiteGround), auto-deployed from GitHub
- **Production:** progressivemarketing.pro (cPanel), manual deploy once hosting is sorted

```
wp-content/themes/progressive-marketing/    the theme
.github/workflows/deploy-staging.yml        auto-deploy to SiteGround staging
.github/workflows/deploy-cpanel.yml         manual deploy to cPanel production
```

## Messaging rule

About **85% the client's future, 15% our services.** Lead with what the business owner's life looks like after working with us (found first, trusted on sight, chosen again and again). Services appear as "how we get you there." Every number on the site comes from a real client report; illustrations are labeled as illustrations.

## Pages

Activating the theme creates every page, the menus, a static front page, and `/%postname%/` permalinks. It never overwrites existing pages.

| URL | What it is |
| --- | --- |
| `/` | Home: the future, proof, industries, services, FAQ |
| `/services/` | Services hub |
| `/services/driveby-review-guard/`, `/services/ripple/`, `/services/website-builds/` | The three services |
| `/industries/` + `/industries/{medical-clinics, auto-dealerships, hotels, veterinary-clinics}/` | Industry futures |
| `/growth360/` + `/growth360/{veterinary, automotive}/` | Growth360 editions (from vet. and danm. landing pages) |
| `/case-studies/` | Results with drag-to-compare before/after map grids |
| `/about-us/`, `/contact-us/` | About, contact |
| `/llms.txt` | Plain-language summary of the business for AI assistants |

## Editing content

All copy lives in `wp-content/themes/progressive-marketing/inc/content.php`: services, industries, Growth360 editions, case studies, FAQs, testimonials.

**Draft copy:** set `'draft' => true` on any service to show logged-in editors a yellow "Draft copy" badge while copy is unfinished. Visitors never see it.

Phone, email, trial button link, HighLevel form ID, and Growth360 evaluation links: **Appearance → Customize → Progressive Marketing**.

## AI search optimization

- JSON-LD structured data on every page: ProfessionalService (with offer catalog), WebSite, Service, BreadcrumbList, FAQPage.
- `/llms.txt` generated from the same content, so it never drifts from the site.
- `robots.txt` explicitly allows AI crawlers (GPTBot, ClaudeBot, PerplexityBot, Google-Extended and others) on production.
- Staging (`*.yroc.host`) is automatically `noindex` and blocked in robots.txt. Production becomes indexable on its own once the site moves to progressivemarketing.pro.
- If Yoast, Rank Math, or AIOSEO is installed, the theme stops printing its own meta tags and defers to the plugin.

## HighLevel

WordPress runs the site. HighLevel handles forms, the trial checkout, and the CRM.

- "Start free trial" / "See your future" buttons go to the HighLevel trial order form (Customizer).
- Contact page embeds a HighLevel form when you paste its form ID in the Customizer.
- Shortcodes for any page: `[ghl_form id="FORM_ID"]` and `[ghl_calendar id="CALENDAR_ID"]`.

## Deploying to SiteGround staging

Every push to `main` or `claude/modest-sagan-6ge40q` that touches the theme lints the PHP and syncs the theme to staging over SSH with rsync. You can also run it from **Actions → Deploy theme to SiteGround staging → Run workflow**.

### One-time setup

1. **Create an SSH key** on your computer (no passphrase, so GitHub can use it):

   ```bash
   ssh-keygen -t ed25519 -N "" -C "github-deploy-pmc" -f pmc_deploy
   ```

2. **Add the public key to SiteGround:** Site Tools for pmc.yroc.host → **Devs → SSH Keys Manager → Import**. Paste the contents of `pmc_deploy.pub`.
3. **Find the SSH details** on the same page under **Manage → SSH Credentials**: hostname, username, and port (usually 18765).
4. **Add GitHub secrets** in yrocconsulting/pmc → Settings → Secrets and variables → Actions:

   | Secret | Value |
   | --- | --- |
   | `SITEGROUND_SSH_HOST` | SSH hostname from step 3, e.g. `ssh.yroc.host` or `gvam1234.siteground.biz` |
   | `SITEGROUND_SSH_USER` | SSH username from step 3, e.g. `u123-abcdefgh` |
   | `SITEGROUND_SSH_KEY` | Full contents of the private key file `pmc_deploy` (including the BEGIN/END lines) |

   Optional **variables** (Variables tab), only if yours differ:

   | Variable | Default |
   | --- | --- |
   | `SITEGROUND_SSH_PORT` | `18765` |
   | `SITEGROUND_THEME_DIR` | `www/pmc.yroc.host/public_html/wp-content/themes/progressive-marketing/` |

5. **Install WordPress** on pmc.yroc.host (Site Tools → WordPress → Install & Manage), run the workflow once, then activate **Progressive Marketing Concepts** under Appearance → Themes.

Delete the local `pmc_deploy` files once the secret is saved, or keep them somewhere safe.

## Moving to production later

Copy the site with SiteGround's migrator or a plugin like Duplicator/All-in-One WP Migration, or install WordPress on cPanel, activate the theme, and run **Deploy theme to cPanel (production)** with the `CPANEL_FTP_*` secrets (see the workflow file). Then update the Customizer settings and point DNS.

## Image credits

- Home hero photo (`assets/img/hero-vet.jpg`): Alexander Mass on Unsplash, https://unsplash.com/photos/e4f87NzUJsU, free under the Unsplash License. Replace it any time in Appearance → Customize → Progressive Marketing → Home hero image.
- Case-study map grids: PMC client reports.

## Local check

```bash
for f in $(find wp-content/themes/progressive-marketing -name '*.php'); do php -l "$f"; done
```
