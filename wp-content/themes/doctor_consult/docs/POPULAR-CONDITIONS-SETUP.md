# 🏥 Popular Conditions - Database Setup Complete

## ✅ What's Been Created

I've set up the **Popular Conditions** component to work exactly like Specialities, with database integration for Local → Staging → Production environments.

---

## 📊 Table Structure

**Table Name:**
- Local: `wp_popular_conditions`
- Staging/Production: `popular_conditions`

**Columns:**
- `id` (int) - Auto-increment primary key
- `title` (varchar 255) - Condition name (e.g., "Backpain", "Fever")
- `image` (varchar 500) - Image filename (e.g., "doctor.svg")
- `link` (varchar 500) - Link URL (e.g., "#back-pain")

**Records:** 13 popular medical conditions

---

## 🚀 Quick Setup (Do This Now!)

### **Visit This URL:**
```
http://localhost:8000/import-popular-conditions.php
```

### **What Happens:**
1. ✅ Creates `wp_popular_conditions` table
2. ✅ Inserts all 13 conditions
3. ✅ Shows success message
4. ✅ **Delete the script file after success!**

---

## 📁 Files Created

### For Local Development:
- ✅ `setup-popular-conditions-db.sql` - SQL file for local database
- ✅ `import-popular-conditions.php` - One-click import script

### For Hostinger (Staging/Production):
- ✅ `setup-popular-conditions-hostinger.sql` - SQL file for Hostinger database

### Code Updated:
- ✅ `popular-conditions.php` - Now fetches from database instead of hardcoded array

---

## 🗂️ Data Included (13 Conditions)

1. Backpain
2. Indigestion
3. Fever
4. Cough Cold Symptoms
5. Skin Symptoms
6. Stomach Symptoms
7. Breathlessness
8. Blood Pressure
9. Diabetes
10. PCOD
11. Typhoid
12. Arthritis
13. Hairfall

---

## 🔄 How It Works

### **Local Environment:**
```php
// In popular-conditions.php
if (WP_ENVIRONMENT === 'local') {
    // Uses: wp_popular_conditions table
    // From: wordpress_db database
}
```

### **Staging/Production:**
```php
else {
    // Uses: popular_conditions table
    // From: u914396707_doctor_consult database (Hostinger)
}
```

---

## 🎯 Deployment to Hostinger

When you're ready to deploy to staging/production:

1. **Login to Hostinger phpMyAdmin**
2. **Select database:** `u914396707_doctor_consult`
3. **Import:** `setup-popular-conditions-hostinger.sql`
4. **Done!** Your staging/production site will now show popular conditions from database

---

## ✅ Verification

After importing, check your WordPress site:

**Desktop View:**
- Should see carousel with all 13 conditions
- Navigation arrows should work
- Title: "Popular Conditions Treated"

**Mobile View:**
- Should see grid layout with first 7 conditions
- "20+ more" card at the end
- Responsive flexbox layout

---

## 🔍 Environment Detection

The code automatically:
- ✅ Detects current environment (local/staging/production)
- ✅ Uses correct database and table name
- ✅ Handles table prefix (wp_ for local, none for production)
- ✅ Builds image paths correctly
- ✅ Logs errors if table doesn't exist

---

## 📝 Database Field Mapping

| Database Field | Code Variable | Example Value |
|---------------|---------------|---------------|
| `id` | Not used | 1, 2, 3... |
| `title` | `$condition->title` → `$item['name']` | "Backpain" |
| `image` | `$condition->image` → `$item['icon']` | "doctor.svg" |
| `link` | `$condition->link` → `$item['link']` | "#back-pain" |

---

## 🎨 What Changed in Code

**Before (Hardcoded):**
```php
$conditions_data = array(
    array(
        'name' => 'Backpain',
        'icon' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#back-pain'
    ),
    // ... 12 more
);
```

**After (Database-Driven):**
```php
global $wpdb;
$table_name = (WP_ENVIRONMENT === 'local') 
    ? $wpdb->prefix . 'popular_conditions' 
    : 'popular_conditions';

$conditions_results = $wpdb->get_results("SELECT id, title, image, link FROM $table_name ORDER BY id ASC");

foreach ($conditions_results as $condition) {
    $conditions_data[] = array(
        'name' => $condition->title,
        'icon' => get_template_directory_uri() . '/assets/images/' . $condition->image,
        'link' => $condition->link
    );
}
```

---

## 🚨 Important Notes

1. **Delete Import Scripts:** After successful import, delete:
   - `import-popular-conditions.php`
   
2. **Image Path:** Images are stored as filenames only (e.g., "doctor.svg"), the full path is built in code

3. **Environment Variable:** Make sure `WP_ENVIRONMENT` is set in `wp-config.php`:
   - `'local'` for local development
   - `'staging'` for staging server
   - `'production'` for live site

---

## 📞 Next Steps

1. ✅ **Import locally:** Visit `http://localhost:8000/import-popular-conditions.php`
2. ✅ **Verify:** Refresh your WordPress site
3. ✅ **Delete script:** Remove `import-popular-conditions.php`
4. ✅ **Test:** Check both desktop and mobile views
5. ✅ **Deploy to Hostinger:** Import SQL when ready to go live

---

**Ready to go!** 🚀

