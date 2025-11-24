# Production Deployment Checklist

This checklist will help you deploy WordPress to production and resolve DNS/access issues.

## Prerequisites

✅ **Subdomain is configured in Hostinger:**
- Subdomain: `online-doctor-consultation.pharmeasy.in`
- Directory: `/home/u914396707/domains/pharmeasy.in/public_html/online-doctor-consultation`
- Status: Should be active in Hostinger hPanel

## Step 1: Upload WordPress Files

**Before the subdomain will work, WordPress files must be uploaded to the server.**

### Option A: Using FTP/SFTP

1. **Get FTP credentials from Hostinger:**
   - Log into hPanel: https://hpanel.hostinger.com
   - Go to **Files** → **FTP Accounts**
   - Note your FTP host, username, and password

2. **Connect using FTP client** (FileZilla, Cyberduck, etc.):
   ```
   Host: ftp.pharmeasy.in (or IP address from Hostinger)
   Username: your-ftp-username
   Password: your-ftp-password
   Port: 21 (or 22 for SFTP)
   ```

3. **Upload all WordPress files:**
   - Navigate to: `/public_html/online-doctor-consultation/`
   - Upload ALL files from your local `Doctor-Consult` folder
   - This includes: `wp-config.php`, `wp-admin/`, `wp-content/`, `wp-includes/`, etc.

### Option B: Using Hostinger File Manager

1. **Log into Hostinger hPanel**
2. **Go to Files** → **File Manager**
3. **Navigate to:** `public_html/online-doctor-consultation/`
4. **Upload WordPress files:**
   - Click "Upload" button
   - Select all files from your local project
   - Wait for upload to complete

## Step 2: Verify File Structure

After uploading, the directory structure should look like:

```
/home/u914396707/domains/pharmeasy.in/public_html/online-doctor-consultation/
├── wp-config.php          ← Must be present!
├── index.php
├── wp-admin/
├── wp-content/
├── wp-includes/
├── wp-load.php
└── ... (all other WordPress core files)
```

## Step 3: Check DNS Propagation

The DNS error you're seeing could be due to:

1. **DNS not propagated yet** (can take 5 minutes to 48 hours)
   - Check DNS propagation: https://www.whatsmydns.net/#A/online-doctor-consultation.pharmeasy.in
   - Or use: `nslookup online-doctor-consultation.pharmeasy.in` in terminal

2. **Subdomain not properly configured**
   - Verify in Hostinger hPanel → Domains → Subdomains
   - Ensure `online-doctor-consultation.pharmeasy.in` is active
   - Check it points to correct directory

3. **Try accessing via IP** (if you have the server IP)
   - Sometimes works before DNS propagates
   - Format: `http://[SERVER_IP]/online-doctor-consultation/`

## Step 4: Verify wp-config.php

Ensure `wp-config.php` is uploaded and has correct settings:

1. **Check file exists** in: `/public_html/online-doctor-consultation/wp-config.php`

2. **Verify production settings:**
   ```php
   define( 'WP_ENVIRONMENT', 'production' );
   define( 'DB_NAME', 'u914396707_dcprod' );
   define( 'DB_USER', 'u914396707_instinct_IIPL' );
   define( 'DB_PASSWORD', 'Instinct_2025' );
   define( 'DB_HOST', 'localhost' );
   define( 'WP_HOME', 'https://online-doctor-consultation.pharmeasy.in' );
   define( 'WP_SITEURL', 'https://online-doctor-consultation.pharmeasy.in' );
   ```

## Step 5: Set File Permissions

Set correct file permissions via FTP or File Manager:

- **Folders:** 755
- **Files:** 644
- **wp-config.php:** 600 (more secure)

## Step 6: Test Database Connection

1. **Log into phpMyAdmin** for production database
2. **Verify database exists:** `u914396707_dcprod`
3. **Test connection** by trying to access WordPress install page

## Step 7: Access WordPress Installation

Once files are uploaded and DNS resolves:

1. **Visit:** `https://online-doctor-consultation.pharmeasy.in/wp-admin/install.php`
2. **If you see WordPress installation page:** ✅ Files are uploaded correctly
3. **If you see database error:** Check `wp-config.php` database credentials
4. **If you still see DNS error:** Wait for DNS propagation or check subdomain configuration

## Troubleshooting DNS Errors

### Error: `DNS_PROBE_FINISHED_NXDOMAIN`

**Possible causes:**
1. ❌ WordPress files not uploaded yet
2. ❌ DNS not propagated (wait 5-60 minutes)
3. ❌ Subdomain not configured in Hostinger
4. ❌ Wrong directory path in subdomain settings

**Solutions:**

1. **Check if files are uploaded:**
   - Use FTP/File Manager to verify files exist
   - Check `wp-config.php` is present

2. **Verify subdomain in Hostinger:**
   - Go to hPanel → Domains → Subdomains
   - Confirm `online-doctor-consultation.pharmeasy.in` exists
   - Verify directory path is correct

3. **Wait for DNS propagation:**
   - Can take 5 minutes to 48 hours
   - Check with: https://www.whatsmydns.net/#A/online-doctor-consultation.pharmeasy.in

4. **Try alternative access methods:**
   - Use IP address if available
   - Try `http://` instead of `https://`
   - Check if SSL certificate is needed

5. **Contact Hostinger support** if:
   - Subdomain shows as active but DNS doesn't resolve after 24 hours
   - Files are uploaded but site still doesn't load

## Quick Verification Steps

Run these checks in order:

- [ ] Files uploaded to `/public_html/online-doctor-consultation/`
- [ ] `wp-config.php` exists and has production settings
- [ ] Database `u914396707_dcprod` exists and is accessible
- [ ] Subdomain is active in Hostinger hPanel
- [ ] DNS is propagated (check with whatsmydns.net)
- [ ] Can access via subdomain URL
- [ ] WordPress installation page loads

## Next Steps After Files Are Uploaded

1. **Complete WordPress installation** (if not done)
2. **Create custom tables** using `setup-production-db.sql`
3. **Import data from staging** database
4. **Activate theme** and configure pages
5. **Test all functionality**

## Important Notes

- **DNS Propagation:** Can take time. Be patient if files are uploaded correctly.
- **SSL Certificate:** May need to be set up for HTTPS to work
- **File Permissions:** Ensure WordPress can read/write files
- **Database:** Must be created and accessible before WordPress install

