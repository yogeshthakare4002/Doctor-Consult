# Production Database Setup Guide

This guide will help you set up the production database with all required tables, including WordPress default tables and custom tables.

## Overview

Your production database needs:
1. **WordPress Default Tables** - Created automatically during WordPress installation
2. **Custom Tables** - `faq`, `popular_conditions`, `specialities` (without `wp_` prefix)

## Step 1: WordPress Installation (Creates Default Tables)

WordPress default tables are created automatically when you first install WordPress. If you haven't installed WordPress yet:

1. Visit: `https://online-doctor-consultation.pharmeasy.in/wp-admin/install.php`
2. Follow the WordPress installation wizard
3. This will automatically create all WordPress default tables:
   - `wp_users`
   - `wp_posts`
   - `wp_comments`
   - `wp_options`
   - `wp_terms`
   - `wp_term_taxonomy`
   - `wp_term_relationships`
   - `wp_postmeta`
   - `wp_commentmeta`
   - `wp_usermeta`
   - `wp_links`
   - `wp_termmeta`
   - And more...

## Step 2: Create Custom Tables

### Option A: Using the SQL Script (Recommended for Fresh Setup)

1. **Log into phpMyAdmin** for your production database
   - Database: `u914396707_dcprod`
   - Username: `u914396707_instinct_IIPL`
   - Password: `Instinct_2025`

2. **Select the database** `u914396707_dcprod` from the left sidebar

3. **Click on the "SQL" tab** at the top

4. **Open the file** `setup-production-db.sql` from this project

5. **Copy the entire contents** and paste into the SQL query box

6. **Click "Go"** to execute

This will create:
- `faq` table
- `popular_conditions` table
- `specialities` table
- Sample data (optional - you can replace with staging data)

### Option B: Copy Tables from Staging Database

If you want to copy the exact structure and data from staging:

#### Method 1: Export/Import via phpMyAdmin

1. **Export from Staging:**
   - Log into phpMyAdmin
   - Select staging database: `u914396707_doctor_consult`
   - For each table (`faq`, `popular_conditions`, `specialities`):
     - Click on the table name
     - Click "Export" tab
     - Choose "SQL" format
     - Select "Structure and data"
     - Click "Go" to download

2. **Import to Production:**
   - Log into phpMyAdmin for production
   - Select production database: `u914396707_dcprod`
   - Click "Import" tab
   - Choose the exported file
   - Click "Go" to import

#### Method 2: Copy via SQL (Faster)

1. **In phpMyAdmin, go to staging database** (`u914396707_doctor_consult`)

2. **Click "SQL" tab** and run this to export structure and data:

```sql
-- Export FAQ table
SHOW CREATE TABLE `faq`;

-- Export Popular Conditions table
SHOW CREATE TABLE `popular_conditions`;

-- Export Specialities table
SHOW CREATE TABLE `specialities`;
```

3. **Copy the CREATE TABLE statements** and run them in production database

4. **Export data** from staging:

```sql
-- Export FAQ data
SELECT * FROM `faq`;

-- Export Popular Conditions data
SELECT * FROM `popular_conditions`;

-- Export Specialities data
SELECT * FROM `specialities`;
```

5. **Import data** into production using INSERT statements or phpMyAdmin Import feature

## Step 3: Verify Tables Are Created

After setup, verify all tables exist:

1. In phpMyAdmin, select production database `u914396707_dcprod`
2. You should see:
   - WordPress tables (wp_*)
   - `faq`
   - `popular_conditions`
   - `specialities`

## Step 4: Import Staging Data (Recommended)

To get the actual data from staging:

1. **Export data from staging tables:**
   ```sql
   -- In staging database (u914396707_doctor_consult)
   SELECT * FROM `faq`;
   SELECT * FROM `popular_conditions`;
   SELECT * FROM `specialities`;
   ```

2. **Import into production:**
   - Use phpMyAdmin Export/Import feature
   - Or use INSERT statements

## Important Notes

### Table Naming Convention

- **Local Development:** Uses `wp_` prefix (e.g., `wp_faq`, `wp_specialities`)
- **Staging/Production:** No prefix (e.g., `faq`, `specialities`)

This is handled automatically by the code based on `WP_ENVIRONMENT` in `wp-config.php`.

### WordPress Default Tables

WordPress default tables are created during installation. If you need to recreate them:

1. Delete the database (or just WordPress tables)
2. Run WordPress installation again: `https://online-doctor-consultation.pharmeasy.in/wp-admin/install.php`

### Database Credentials

**Production:**
- Database: `u914396707_dcprod`
- Username: `u914396707_instinct_IIPL`
- Password: `Instinct_2025`
- Host: `localhost`

**Staging (for reference):**
- Database: `u914396707_doctor_consult`
- Username: `u914396707_iipl_2025`
- Password: `Instinct_2025`
- Host: `193.203.184.146:3306`

## Troubleshooting

### "Table doesn't exist" Error

If you see errors about missing tables:
1. Check that you ran the SQL script
2. Verify table names don't have `wp_` prefix in production
3. Check database name is correct: `u914396707_dcprod`

### "Access denied" Error

1. Verify database credentials in `wp-config.php`
2. Check user has proper permissions in Hostinger
3. Ensure database user has access to the database

### Empty Tables

If tables exist but are empty:
1. Import data from staging database
2. Or use the sample data in `setup-production-db.sql`
3. Or manually add data via phpMyAdmin

## Quick Reference

**Files:**
- `setup-production-db.sql` - SQL script to create custom tables
- `wp-config.php` - Database configuration (already set for production)

**URLs:**
- Production: `https://online-doctor-consultation.pharmeasy.in`
- Staging: `https://stagingdoctorconsult.pharmeasy.in`

**Tables Needed:**
- WordPress default tables (created automatically)
- `faq` (custom)
- `popular_conditions` (custom)
- `specialities` (custom)

