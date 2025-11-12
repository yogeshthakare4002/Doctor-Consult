# Deployment Guide

This guide explains how to take changes in the `pe-theme` WordPress theme from local development to staging/production. The current theme is self-contained—there are no custom database tables or import scripts to run.

## 1. Local Development

1. Use a standard WordPress stack (Local WP, Docker, or wp-env).
2. Clone this repository into `wp-content/themes/pe-theme` (replace any existing theme folder).
3. Activate **PE Theme** from the WordPress admin (`Appearance → Themes`).
4. Create or update the WordPress pages that map to the provided templates:
   - `Doctor Consultation` → Template: **Doctor Consultation**
   - `Disease Level` → Template: **Disease Level**
5. Develop features using the existing file structure (see `docs/STRUCTURE.md`).

### Asset workflow
- CSS lives in `css/`. Keep global rules in `base.css`; component-specific styles should stay with the component.
- JavaScript lives in `core/` and is enqueued via `functions.php`.
- Images go under `assets/images/`.

## 2. Preparing a Release

1. **Lint / sanity check**
   - Ensure there are no PHP warnings/notices in your local log.
   - Check the WordPress debug log if `WP_DEBUG` is enabled.
   - Run through the `/doctor-consultation/` and `/doctor-consultation/` pages in desktop and mobile viewports.

2. **Update documentation**
   - Reflect any structural or data changes in the `docs/` folder.
   - Record new components or cards in `docs/STRUCTURE.md` if relevant.

3. **Commit**
   - Use meaningful commit messages (e.g., `feat: add cardiology CTA block to doctor consultation page`).
   - Confirm no build artefacts or local-config files are staged.

## 3. Packaging the Theme

If you deliver the theme without Git history (e.g., to a client site):

```bash
cd wp-content/themes
zip -r pe-theme.zip pe-theme \
  -x "*.git*" \
  -x "*/node_modules/*" \
  -x "*.DS_Store"
```

Upload `pe-theme.zip` through `Appearance → Themes → Add New → Upload` and activate.

## 4. Deploying to Staging / Production

1. **Ensure the target WordPress site is up to date** (core, plugins, PHP version).
2. **Upload the theme**
   - Option A: use the ZIP built above via the WordPress admin.
   - Option B: deploy via SFTP/SSH (copy the `pe-theme` folder into `wp-content/themes/`).
3. **Activate the theme** or switch to it via `wp-cli`:
   ```bash
   wp theme activate pe-theme
   ```
4. **Assign templates** to the appropriate pages (WordPress editor → Page → Template dropdown).
5. **Flush permalinks** (`Settings → Permalinks → Save`) to ensure clean URLs.
6. **Verify pages**
   - `/doctor-consultation/`
   - `/disease-level/`
   - Header/footer navigation, breadcrumb, and language toggle.

## 5. Rollback Strategy

- Keep the previous theme ZIP (or Git tag) handy.
- If an issue is discovered post-deploy, upload the previous version and reactivate it.
- Consider maintaining a staging site to smoke test before production.

## 6. Environment Variables / Config

- No special environment variables are required.
- `WP_ENVIRONMENT` may remain defined in `wp-config.php`, but the theme does not rely on it.
- For debugging, enable `WP_DEBUG` and tail the PHP error log.

## 7. Recommended Workflow Summary

1. Develop locally → commit → push (if using Git).
2. Package theme or sync via Git/SFTP to staging.
3. QA on staging (mobile + desktop).
4. Deploy to production once approved.
5. Document any structural changes for the team.

That’s it—deployments are now just theme file updates. No database migrations, no import scripts, just copy the theme folder and activate. Happy shipping! 🚀

