# One-Time Utility Scripts Reference

This document lists all one-time utility scripts in the project that should **NOT** be committed to git and should be deleted after use.

## ⚠️ Important Security Note

**All these scripts contain sensitive information (database credentials) and should:**
- ❌ **NOT be committed to git** (already in `.gitignore`)
- ✅ **Be run locally only**
- ✅ **Be deleted after successful use**
- ✅ **Never be uploaded to production server**

---

## 1. `export-staging-data.php` ⚠️

**Purpose:** Exports custom table data from staging database for import into production

**Contains:**
- Staging database credentials
- Production database credentials (for reference)

**Usage:**
```bash
php export-staging-data.php > staging-data-export.sql
```

**When to use:**
- Before setting up production database
- When you need to copy data from staging to production

**After use:**
1. Import the generated `staging-data-export.sql` into production
2. Delete `export-staging-data.php`
3. Delete `staging-data-export.sql` (after import)

**Status:** ✅ Already in `.gitignore`

---

## 2. `update-popular-conditions.php` ⚠️

**Purpose:** Updates popular conditions data in the database to match original values

**Contains:**
- Hardcoded data for popular conditions
- Requires WordPress to be loaded (uses `wp-load.php`)

**Usage:**
1. Upload to WordPress root directory
2. Visit: `http://your-site.com/update-popular-conditions.php`
3. Must be logged in as administrator

**When to use:**
- When popular conditions data needs to be reset/updated
- After database migration
- To fix incorrect popular conditions data

**After use:**
1. Verify data was updated correctly
2. **DELETE the file immediately** (security risk if left on server)

**Status:** ✅ Already in `.gitignore` (via `update-*.php` pattern)

---

## 3. `setup-local-db.sql` ✅

**Purpose:** SQL script to create custom tables for local development

**Contains:**
- Table structure for `wp_specialities` (with `wp_` prefix for local)
- Sample data for specialities

**Usage:**
1. Import into local database via phpMyAdmin or MySQL command line
2. Database: `wordpress_db` (or your local database name)

**When to use:**
- Setting up local development environment
- Creating tables for the first time locally

**After use:**
- Can be kept for reference
- Safe to commit (no credentials, just structure)

**Status:** ✅ Safe to commit (no credentials)

---

## 4. `setup-production-db.sql` ⚠️

**Purpose:** SQL script to create custom tables for production database

**Contains:**
- Table structures for `faq`, `popular_conditions`, `specialities` (no `wp_` prefix)
- Sample data (optional - should be replaced with staging data)

**Usage:**
1. Log into phpMyAdmin for production database
2. Select database: `u914396707_dcprod`
3. Click "SQL" tab
4. Copy and paste entire script
5. Click "Go" to execute

**When to use:**
- After WordPress installation in production
- Before importing data from staging

**After use:**
- Can be kept for reference
- Should NOT be committed (contains production database name in comments)

**Status:** ✅ Already in `.gitignore`

---

## Summary Table

| Script | Type | Contains Credentials | Safe to Commit? | Delete After Use? |
|--------|------|---------------------|-----------------|-------------------|
| `export-staging-data.php` | PHP | ✅ Yes | ❌ No | ✅ Yes |
| `update-popular-conditions.php` | PHP | ❌ No | ❌ No | ✅ Yes |
| `setup-local-db.sql` | SQL | ❌ No | ✅ Yes | ❌ No |
| `setup-production-db.sql` | SQL | ❌ No* | ❌ No | ❌ No |

*Contains production database name in comments (not actual credentials, but sensitive info)

---

## Workflow Recommendations

### For Local Development Setup:
1. ✅ Use `setup-local-db.sql` to create tables
2. ✅ Can commit this file (no credentials)

### For Production Setup:
1. ⚠️ Use `setup-production-db.sql` to create tables
2. ⚠️ Use `export-staging-data.php` to export staging data
3. ⚠️ Import exported data into production
4. ✅ Delete both scripts after use

### For Data Updates:
1. ⚠️ Use `update-popular-conditions.php` if needed
2. ✅ Delete immediately after use

---

## Files Already Protected in `.gitignore`

The following patterns are already in `.gitignore`:

```gitignore
# One-time utility scripts (contain sensitive credentials)
export-*.php
*-staging-data.php
update-*.php
setup-production-db.sql
```

This means:
- ✅ `export-staging-data.php` - Protected
- ✅ `update-popular-conditions.php` - Protected
- ✅ `setup-production-db.sql` - Protected
- ✅ `setup-local-db.sql` - **NOT** protected (safe to commit)

---

## Security Checklist

Before committing to git, verify:

- [ ] No database credentials in any files
- [ ] `export-staging-data.php` is not staged
- [ ] `update-popular-conditions.php` is not staged
- [ ] `setup-production-db.sql` is not staged
- [ ] Generated SQL files (`*.sql`) are not staged
- [ ] `wp-config.php` is not staged (already in `.gitignore`)

---

## Quick Reference: What to Do With Each File

### ✅ Safe to Commit:
- `setup-local-db.sql` - No credentials, just structure

### ❌ Never Commit (Already Protected):
- `export-staging-data.php` - Has credentials
- `update-popular-conditions.php` - Security risk if on server
- `setup-production-db.sql` - Contains production info

### 🗑️ Delete After Use:
- `export-staging-data.php` - After exporting data
- `update-popular-conditions.php` - Immediately after running
- Generated `*.sql` files - After importing data

---

## Notes

- All one-time scripts are already protected by `.gitignore`
- The scripts are designed for one-time use during setup/migration
- Keep `setup-local-db.sql` for reference (it's safe)
- Delete all other scripts after successful use
- Never upload these scripts to production server

