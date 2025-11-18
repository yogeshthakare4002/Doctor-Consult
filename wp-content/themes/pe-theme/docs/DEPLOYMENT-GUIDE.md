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

## 4. Hostinger Deployment Setup

### 4.1 Setting Up Staging and Production URLs on Hostinger

#### Option A: Using Subdomains (Recommended)

1. **Log into Hostinger hPanel**
   - Go to https://hpanel.hostinger.com
   - Navigate to your domain management

2. **Create Staging Subdomain**
   - Go to **Domains** → **Subdomains**
   - Create a new subdomain: `staging.yourdomain.com`
   - Point it to a subdirectory: `public_html/staging` (or `staging` folder)
   - Wait for DNS propagation (usually 5-15 minutes)

3. **Set Up Production Domain**
   - Your main domain (e.g., `yourdomain.com`) should already be configured
   - Ensure it points to `public_html` directory

#### Option B: Using Separate Domains

1. **Staging Domain**: `staging-yourdomain.com` or `yourdomain-staging.com`
2. **Production Domain**: `yourdomain.com`
3. Add both domains in Hostinger and point them to separate directories

### 4.2 Database Setup for Each Environment

#### Staging Database Setup

1. **Create Staging Database** (if using separate databases):
   - Go to **Databases** → **MySQL Databases** in hPanel
   - Create a new database: `u914396707_doctor_consult_staging`
   - Create a new user or use existing user
   - Grant all privileges to the user

2. **Import Database**:
   - Use phpMyAdmin to import your local database
   - Or use the existing database: `u914396707_doctor_consult`

#### Production Database Setup

1. **Use Production Database**: `u914396707_doctor_consult`
2. **Import Data** (if needed):
   - Import `setup-faq-hostinger.sql` for FAQ data
   - Import `setup-popular-conditions-hostinger.sql` for popular conditions

### 4.3 Configuring wp-config.php for Each Environment

Your `wp-config.php` already has environment configuration. Update it as follows:

#### For Staging Environment

1. **Access staging site via FTP/File Manager**
2. **Edit `wp-config.php`** and set:
   ```php
   define( 'WP_ENVIRONMENT', 'staging' );
   ```
3. **Update WordPress URLs** (if needed):
   - In WordPress Admin: `Settings → General`
   - Set `WordPress Address (URL)`: `https://staging.yourdomain.com`
   - Set `Site Address (URL)`: `https://staging.yourdomain.com`

#### For Production Environment

1. **Access production site via FTP/File Manager**
2. **Edit `wp-config.php`** and set:
   ```php
   define( 'WP_ENVIRONMENT', 'production' );
   ```
3. **Update WordPress URLs**:
   - In WordPress Admin: `Settings → General`
   - Set `WordPress Address (URL)`: `https://yourdomain.com`
   - Set `Site Address (URL)`: `https://yourdomain.com`

### 4.4 Deploying Files to Hostinger

#### Method 1: Using File Manager (hPanel)

1. **Log into Hostinger hPanel**
2. **Open File Manager**
3. **Navigate to your site directory**:
   - Staging: `public_html/staging/` (or your staging folder)
   - Production: `public_html/`
4. **Upload theme files**:
   - Navigate to `wp-content/themes/`
   - Upload the `pe-theme` folder (or extract the ZIP)

#### Method 2: Using FTP/SFTP

1. **Get FTP credentials** from Hostinger hPanel:
   - Go to **Files** → **FTP Accounts**
   - Note your FTP host, username, and password

2. **Connect using FTP client** (FileZilla, Cyberduck, etc.):
   ```
   Host: ftp.yourdomain.com (or IP address)
   Username: your-ftp-username
   Password: your-ftp-password
   Port: 21 (or 22 for SFTP)
   ```

3. **Upload files**:
   - Staging: Upload to `/public_html/staging/wp-content/themes/pe-theme/`
   - Production: Upload to `/public_html/wp-content/themes/pe-theme/`

#### Method 3: Using Git (if SSH access is available)

1. **SSH into your Hostinger server**
2. **Navigate to theme directory**:
   ```bash
   cd public_html/wp-content/themes/
   # or for staging:
   cd public_html/staging/wp-content/themes/
   ```
3. **Clone or pull from repository**:
   ```bash
   git clone your-repo-url pe-theme
   # or if already exists:
   cd pe-theme && git pull
   ```

### 4.5 Post-Deployment Steps

#### For Staging:

1. **Activate the theme**:
   - Go to `https://staging.yourdomain.com/wp-admin`
   - Navigate to `Appearance → Themes`
   - Activate **PE Theme**

2. **Configure WordPress**:
   - Update permalinks: `Settings → Permalinks → Save`
   - Assign page templates to appropriate pages
   - Import/verify database data

3. **Test the site**:
   - Visit `https://staging.yourdomain.com/doctor-consultation/`
   - Test all functionality before deploying to production

#### For Production:

1. **Activate the theme**:
   - Go to `https://yourdomain.com/wp-admin`
   - Navigate to `Appearance → Themes`
   - Activate **PE Theme**

2. **Configure WordPress**:
   - Update permalinks: `Settings → Permalinks → Save`
   - Assign page templates
   - Verify database data is correct

3. **Final verification**:
   - Test all pages and functionality
   - Check mobile responsiveness
   - Verify all links and navigation

### 4.6 Environment-Specific Settings

#### Staging Environment Recommendations:

```php
// In wp-config.php for staging
define( 'WP_ENVIRONMENT', 'staging' );
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', false );
define( 'SCRIPT_DEBUG', true );
```

#### Production Environment Recommendations:

```php
// In wp-config.php for production
define( 'WP_ENVIRONMENT', 'production' );
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );
define( 'SCRIPT_DEBUG', false );
```

## 5. Rollback Strategy

- Keep the previous theme ZIP (or Git tag) handy.
- If an issue is discovered post-deploy, upload the previous version and reactivate it.
- Consider maintaining a staging site to smoke test before production.

## 7. Environment Variables / Config

- `WP_ENVIRONMENT` is defined in `wp-config.php` and should be set to:
  - `'local'` for local development
  - `'staging'` for staging environment
  - `'production'` for production environment
- Database credentials are automatically selected based on `WP_ENVIRONMENT`
- For debugging, enable `WP_DEBUG` and tail the PHP error log
- Staging should have debugging enabled; production should have it disabled

## 8. Recommended Workflow Summary

1. **Develop locally** → commit → push (if using Git).
2. **Deploy to staging**:
   - Update `wp-config.php` to set `WP_ENVIRONMENT` to `'staging'`
   - Package theme or sync via Git/SFTP to staging subdomain
   - Activate theme and verify functionality
3. **QA on staging** (mobile + desktop):
   - Test all pages and features
   - Verify database data is correct
   - Check for any errors or warnings
4. **Deploy to production** once approved:
   - Update `wp-config.php` to set `WP_ENVIRONMENT` to `'production'`
   - Deploy theme files to production
   - Activate theme and verify
5. **Document any structural changes** for the team.

## 9. Quick Reference: Hostinger URLs Setup

### Staging URL Setup Checklist:
- [ ] Create subdomain `staging.yourdomain.com` in Hostinger
- [ ] Point subdomain to `public_html/staging/` directory
- [ ] Install WordPress in staging directory (or copy from production)
- [ ] Update `wp-config.php` with `WP_ENVIRONMENT = 'staging'`
- [ ] Update WordPress URLs in admin to match staging subdomain
- [ ] Import database data if needed
- [ ] Deploy theme files
- [ ] Activate theme and configure pages

### Production URL Setup Checklist:
- [ ] Ensure main domain points to `public_html/` directory
- [ ] Update `wp-config.php` with `WP_ENVIRONMENT = 'production'`
- [ ] Update WordPress URLs in admin to match production domain
- [ ] Verify database connection and data
- [ ] Deploy theme files
- [ ] Activate theme and configure pages
- [ ] Test all functionality
- [ ] Enable caching (if applicable)
- [ ] Set up SSL certificate (HTTPS)

## 10. Troubleshooting

### Common Issues:

1. **"Error establishing database connection"**
   - Verify database credentials in `wp-config.php`
   - Check that database exists in Hostinger
   - Ensure database user has proper permissions

2. **Mixed content warnings (HTTP/HTTPS)**
   - Ensure SSL certificate is active
   - Update WordPress URLs to use HTTPS
   - Check for hardcoded HTTP URLs in theme files

3. **Theme not appearing in admin**
   - Verify theme files are in correct directory: `wp-content/themes/pe-theme/`
   - Check file permissions (should be 755 for directories, 644 for files)
   - Ensure `style.css` exists in theme root

4. **Pages showing 404 errors**
   - Flush permalinks: `Settings → Permalinks → Save`
   - Verify `.htaccess` file exists and is writable
   - Check that mod_rewrite is enabled on server

That's it—deployments are now just theme file updates. No database migrations, no import scripts, just copy the theme folder and activate. Happy shipping! 🚀

