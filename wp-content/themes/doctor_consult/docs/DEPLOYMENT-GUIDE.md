# WordPress Multi-Environment Deployment Guide

This guide explains how to work with your WordPress site across Local, Staging, and Production environments.

## 📋 Table of Contents
1. [Environment Setup](#environment-setup)
2. [Local Development](#local-development)
3. [Deploying to Staging](#deploying-to-staging)
4. [Deploying to Production](#deploying-to-production)
5. [Database Management](#database-management)

---

## 🌍 Environment Setup

Your project is configured to work in three environments:

| Environment | Database | Host | Table Prefix |
|------------|----------|------|--------------|
| **Local** | `wordpress_db` | `localhost` | `wp_` |
| **Staging** | `u914396707_doctor_consult` | Hostinger | No prefix |
| **Production** | `u914396707_doctor_consult` | Hostinger | No prefix |

---

## 💻 Local Development

### Step 1: Setup Local Database

1. Open phpMyAdmin: `http://localhost/phpmyadmin`
2. Select your `wordpress_db` database
3. Click the **Import** tab
4. Import the file: `setup-local-db.sql`
5. Verify `wp_specialities` table is created

### Step 2: Configure Environment

The `wp-config.php` file is already set to `'local'`:

```php
define( 'WP_ENVIRONMENT', 'local' );
```

### Step 3: Develop Locally

- Your WordPress site connects to local MySQL database
- All changes are saved locally
- Test features before deploying

### What Gets Fetched:
- ✅ Specialities from `wp_specialities` table in `wordpress_db`

---

## 🧪 Deploying to Staging

### Step 1: Update wp-config.php

Change the environment variable:

```php
define( 'WP_ENVIRONMENT', 'staging' );
```

### Step 2: Upload Files to Hostinger

**Option A: Using Hostinger File Manager**
1. Login to Hostinger control panel
2. Go to **File Manager**
3. Navigate to `public_html` (or your WordPress directory)
4. Upload all WordPress files EXCEPT:
   - `wp-config.php` (will be created on server)
   - `.git` folder (if using Git)

**Option B: Using FTP**
1. Use FileZilla or any FTP client
2. Connect using Hostinger FTP credentials
3. Upload files to the root directory

### Step 3: Create/Update wp-config.php on Server

On the Hostinger server, create `wp-config.php` with:

```php
define( 'WP_ENVIRONMENT', 'staging' );
```

This will connect to your Hostinger database automatically.

### Step 4: Test Staging

1. Visit your staging URL
2. Verify specialities carousel loads data from Hostinger database
3. Test all functionality

### What Gets Fetched:
- ✅ Specialities from `specialities` table in Hostinger database

---

## 🚀 Deploying to Production

### Step 1: Update wp-config.php

On your production server, set:

```php
define( 'WP_ENVIRONMENT', 'production' );
```

### Step 2: Same as Staging

Follow the same upload process as staging, but ensure `WP_ENVIRONMENT` is set to `'production'`.

### Step 3: (Optional) Separate Production Database

If you want a separate production database:

1. Create a new database in Hostinger (e.g., `u914396707_prod`)
2. Update the production section in `wp-config.php`:

```php
} else {
    // Production Database
    define( 'DB_NAME', 'u914396707_prod' );
    define( 'DB_USER', 'u914396707_prod_user' );
    define( 'DB_PASSWORD', 'your_prod_password' );
    define( 'DB_HOST', 'localhost' );
}
```

---

## 🗄️ Database Management

### Export Data from Local to Staging/Production

**Method 1: Using phpMyAdmin**

1. **Export from Local:**
   - Open local phpMyAdmin
   - Select `wordpress_db`
   - Click on `wp_specialities` table
   - Click **Export** → Choose **SQL** → Click **Export**
   - Save the SQL file

2. **Import to Hostinger:**
   - Login to Hostinger phpMyAdmin
   - Select `u914396707_doctor_consult` database
   - Create table named `specialities` (without `wp_` prefix)
   - Click **Import** → Upload the SQL file
   - **Important:** Edit the SQL file and remove `wp_` prefix from table names before importing

**Method 2: Using SQL Commands**

Export specific table:
```bash
mysqldump -u root wordpress_db wp_specialities > specialities_export.sql
```

Import to remote:
```bash
mysql -u u914396707_instinct_IIPL -p u914396707_doctor_consult < specialities_export.sql
```

### Sync Data Between Environments

**From Local → Staging:**
1. Export `wp_specialities` from local
2. Remove `wp_` prefix from table name in SQL file
3. Import into Hostinger `specialities` table

**From Staging → Local:**
1. Export `specialities` from Hostinger
2. Add `wp_` prefix to table name in SQL file
3. Import into local `wp_specialities` table

---

## 🔄 Quick Environment Switching

### For Local Development:
```php
define( 'WP_ENVIRONMENT', 'local' );
```

### For Staging Testing:
```php
define( 'WP_ENVIRONMENT', 'staging' );
```

### For Production:
```php
define( 'WP_ENVIRONMENT', 'production' );
```

---

## 📝 Workflow Checklist

### Development Phase:
- [ ] Set `WP_ENVIRONMENT` to `'local'`
- [ ] Import `setup-local-db.sql` into local database
- [ ] Develop and test features locally
- [ ] Commit changes to Git (if using version control)

### Staging Phase:
- [ ] Export any database changes from local
- [ ] Upload WordPress files to Hostinger staging area
- [ ] Set `WP_ENVIRONMENT` to `'staging'` on server
- [ ] Import database changes (if any)
- [ ] Test thoroughly on staging

### Production Phase:
- [ ] Backup existing production database
- [ ] Upload tested files from staging
- [ ] Set `WP_ENVIRONMENT` to `'production'`
- [ ] Verify all functionality
- [ ] Monitor for errors

---

## 🛠️ Troubleshooting

### Issue: "No specialities found"
- Check `WP_ENVIRONMENT` is set correctly
- Verify database credentials in `wp-config.php`
- Check if table exists in the database (with correct prefix)

### Issue: "Can't connect to database"
- Verify database credentials
- Check if MySQL service is running (local)
- Check Hostinger database status (staging/production)

### Issue: "Table not found"
- Local: Table should be `wp_specialities`
- Staging/Production: Table should be `specialities` (no prefix)
- Import the correct SQL file for your environment

---

## 📞 Database Credentials Reference

### Local Database
```
Database: wordpress_db
User: root
Password: (empty)
Host: localhost
Table: wp_specialities
```

### Hostinger Database
```
Database: u914396707_doctor_consult
User: u914396707_instinct_IIPL
Password: Instinct_2025
Host: localhost
Table: specialities
```

---

## 🎯 Best Practices

1. **Always develop locally first**
2. **Test on staging before production**
3. **Backup databases before major changes**
4. **Use version control (Git) for code**
5. **Never commit `wp-config.php` with credentials**
6. **Keep staging and production databases separate**
7. **Document any custom database changes**

---

## 📚 Additional Resources

- [WordPress Database Management](https://wordpress.org/support/article/wordpress-backups/)
- [Hostinger Database Documentation](https://support.hostinger.com/en/articles/1583245-how-to-manage-mysql-databases)
- [phpMyAdmin Documentation](https://docs.phpmyadmin.net/)

---

**Last Updated:** November 6, 2025

