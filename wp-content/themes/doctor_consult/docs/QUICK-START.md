# 🚀 Quick Start Guide - Pharmeasy WordPress

## 📍 Current Setup Status

✅ Multi-environment configuration complete  
✅ Local database SQL ready  
✅ Code configured for Local → Staging → Production workflow  
✅ Specialities carousel (18 items) - Database ready  
✅ Popular Conditions carousel (13 items) - Database ready  

---

## 🎯 What You Need to Do Next

### 1️⃣ Setup Local Environment (Do This Now!)

**Option A: Using Import Scripts (Easiest)**

Visit these URLs in your browser:
```
http://localhost:8000/import-specialities.php
http://localhost:8000/import-popular-conditions.php
```

Each script will:
- Create the table automatically
- Insert all data
- Show you a success message
- **Important:** Delete the script files after success!

**Option B: Using SQL Files (Alternative)**

If you prefer phpMyAdmin:
```bash
# Open phpMyAdmin
http://localhost/phpmyadmin

# Steps:
1. Select 'wordpress_db' database
2. Click 'Import' tab
3. Import file: setup-local-db.sql (for specialities)
4. Import file: setup-popular-conditions-db.sql (for conditions)
5. Done! ✅
```

**Result:**
- ✅ `wp_specialities` table with 18 medical specialities
- ✅ `wp_popular_conditions` table with 13 popular conditions

---

### 2️⃣ Environment Switching Guide

Your `wp-config.php` controls which database to use:

```php
// Line 23 in wp-config.php
define( 'WP_ENVIRONMENT', 'local' );    // ← Change this!
```

#### For Local Development:
```php
define( 'WP_ENVIRONMENT', 'local' );
```
- Uses: `wordpress_db` database
- Table: `wp_specialities`

#### For Staging (Hostinger):
```php
define( 'WP_ENVIRONMENT', 'staging' );
```
- Uses: `u914396707_doctor_consult` database
- Table: `specialities`

#### For Production (Hostinger):
```php
define( 'WP_ENVIRONMENT', 'production' );
```
- Uses: `u914396707_doctor_consult` database  
- Table: `specialities`

---

## 🔄 Development Workflow

### Local Development (Current):
```
1. Keep WP_ENVIRONMENT = 'local'
2. Make code changes
3. Test locally at: http://localhost/your-site
4. Commit changes to Git
```

### Deploy to Staging:
```
1. Upload files to Hostinger
2. On server, set WP_ENVIRONMENT = 'staging' in wp-config.php
3. Test at: your-staging-url.com
4. Verify specialities load from Hostinger database
```

### Deploy to Production:
```
1. Upload tested files from staging
2. On server, set WP_ENVIRONMENT = 'production'
3. Test at: pharmeasy.in
4. Monitor for any issues
```

---

## 📊 Database Information

### Specialities Table
| Environment | Database | Table Name | Prefix |
|------------|----------|------------|--------|
| **Local** | `wordpress_db` | `wp_specialities` | ✅ wp_ |
| **Staging** | `u914396707_doctor_consult` | `specialities` | ❌ None |
| **Production** | `u914396707_doctor_consult` | `specialities` | ❌ None |

### Popular Conditions Table
| Environment | Database | Table Name | Prefix |
|------------|----------|------------|--------|
| **Local** | `wordpress_db` | `wp_popular_conditions` | ✅ wp_ |
| **Staging** | `u914396707_doctor_consult` | `popular_conditions` | ❌ None |
| **Production** | `u914396707_doctor_consult` | `popular_conditions` | ❌ None |

---

## ✅ Verification Checklist

After importing local databases:

**Specialities Carousel:**
- [ ] Visit your local WordPress site
- [ ] Check if specialities carousel appears
- [ ] Verify 18 specialities are showing
- [ ] Check browser console for errors
- [ ] Verify title shows "20+ Specialities"

**Popular Conditions Carousel:**
- [ ] Check if popular conditions carousel appears
- [ ] Verify 13 conditions are showing
- [ ] Both desktop carousel and mobile grid work
- [ ] Check browser console for errors

---

## 🆘 Troubleshooting

### Problem: "No specialities showing"
**Solution:** 
- Visit `http://localhost:8000/import-specialities.php` to import automatically
- Or import `setup-local-db.sql` into local database via phpMyAdmin

### Problem: "No popular conditions showing"
**Solution:** 
- Visit `http://localhost:8000/import-popular-conditions.php` to import automatically
- Or import `setup-popular-conditions-db.sql` into local database via phpMyAdmin

### Problem: "Table not found" error
**Solutions:**
- Local: Make sure tables exist in `wordpress_db`:
  - `wp_specialities` (18 records)
  - `wp_popular_conditions` (13 records)
- Staging/Prod: Make sure tables exist in Hostinger database:
  - `specialities` (18 records)
  - `popular_conditions` (13 records)

### Problem: "Can't connect to database"
**Solutions:**
- Local: Check if MySQL/XAMPP/MAMP is running
- Staging/Prod: Check `WP_ENVIRONMENT` is set correctly

---

## 📁 Important Files

| File | Purpose | Commit to Git? |
|------|---------|----------------|
| `wp-config.php` | Database credentials | ❌ NO |
| `wp-config-sample.php` | Template config | ✅ YES |
| `setup-local-db.sql` | Specialities table setup | ✅ YES |
| `setup-popular-conditions-db.sql` | Popular conditions table setup | ✅ YES |
| `setup-popular-conditions-hostinger.sql` | For Hostinger production | ✅ YES |
| `import-specialities.php` | Auto-import script (delete after use) | ❌ NO |
| `import-popular-conditions.php` | Auto-import script (delete after use) | ❌ NO |
| `DEPLOYMENT-GUIDE.md` | Full documentation | ✅ YES |
| `QUICK-START.md` | Quick reference | ✅ YES |
| `.gitignore` | Protect sensitive files | ✅ YES |

---

## 🎨 What's Working Now

**Specialities Carousel** component:
1. ✅ Automatically detect environment
2. ✅ Connect to correct database
3. ✅ Use correct table name (with or without prefix)
4. ✅ Fetch all 18 specialities
5. ✅ Display them in carousel format
6. ✅ Show "20+ Specialities" title

**Popular Conditions Carousel** component:
1. ✅ Automatically detect environment
2. ✅ Connect to correct database
3. ✅ Use correct table name (with or without prefix)
4. ✅ Fetch all 13 popular conditions
5. ✅ Display desktop carousel and mobile grid
6. ✅ Show "Popular Conditions Treated" title

---

## 📞 Need Help?

- Full documentation: See `DEPLOYMENT-GUIDE.md`
- Database setup: Import `setup-local-db.sql`
- Environment switching: Edit line 23 in `wp-config.php`

---

**Ready to start?** Import the SQL file and test your local site! 🚀

