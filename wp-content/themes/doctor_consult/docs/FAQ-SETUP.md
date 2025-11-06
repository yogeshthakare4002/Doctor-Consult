# ❓ FAQ Section - Database Setup Complete

## ✅ What's Been Created

I've set up the **FAQ Section** component to work with database integration for Local → Staging → Production environments, just like your Specialities and Popular Conditions components.

---

## 📊 Table Structure

**Table Name:**
- Local: `wp_faq`
- Staging/Production: `faq`

**Columns:**
- `id` (int) - Auto-increment primary key
- `question` (text) - FAQ question
- `answer` (text) - FAQ answer (nullable)

**Records:** 6 frequently asked questions

---

## 🚀 Quick Setup

### **For Local Development:**

Visit this URL in your browser:
```
http://localhost:8000/import-faq.php
```

This will:
1. ✅ Create `wp_faq` table
2. ✅ Insert all 6 FAQ items
3. ✅ Show success message
4. ✅ **Delete the script file after success!**

---

### **For Hostinger (Staging/Production):**

Since you've already created the `faq` table on Hostinger, you just need to insert the data.

**Go to Hostinger phpMyAdmin:**
1. Select database: `u914396707_doctor_consult`
2. Click the **SQL** tab
3. Copy and paste this query:

```sql
INSERT INTO `faq` (`question`, `answer`) VALUES
('Is my consultation private?', 'Yes, all consultations are completely private and confidential. Your medical information is protected and only accessible to you and your assigned doctor.'),
('Can I talk to a doctor late at night?', 'Yes, doctors are available 24/7, even on weekends and holidays. You can consult a doctor anytime you need medical advice.'),
('How do I get a prescription?', 'After your consultation, if the doctor determines you need medication, they will provide a digital prescription that you can use at any pharmacy.'),
('Can I cancel or reschedule my appointment?', 'Yes, you can cancel or reschedule your appointment up to 2 hours before the scheduled time through your account dashboard.'),
('Will I get a refund if I cancel?', 'Yes, full refunds are provided for cancellations made at least 2 hours before your appointment. Cancellations within 2 hours may be subject to a cancellation fee.'),
('Can I consult without downloading an app?', 'Yes, you can consult with a doctor directly through our website without downloading any app. Simply visit our consultation page and book an appointment.');
```

4. Click **Go** to execute
5. You should see: "6 rows inserted"

---

## 📁 Files Created

### For Local Development:
- ✅ `setup-faq-db.sql` - SQL file for local database
- ✅ `import-faq.php` - One-click import script

### For Hostinger (Staging/Production):
- ✅ `setup-faq-hostinger.sql` - SQL file with INSERT queries only

### Code Updated:
- ✅ `faq-section.php` - Now fetches from database instead of hardcoded array

---

## 🗂️ FAQ Data Included (6 Questions)

1. **Is my consultation private?**
   - Answer: Yes, all consultations are completely private and confidential...

2. **Can I talk to a doctor late at night?**
   - Answer: Yes, doctors are available 24/7, even on weekends and holidays...

3. **How do I get a prescription?**
   - Answer: After your consultation, if the doctor determines you need medication...

4. **Can I cancel or reschedule my appointment?**
   - Answer: Yes, you can cancel or reschedule your appointment up to 2 hours before...

5. **Will I get a refund if I cancel?**
   - Answer: Yes, full refunds are provided for cancellations made at least 2 hours before...

6. **Can I consult without downloading an app?**
   - Answer: Yes, you can consult with a doctor directly through our website...

---

## 🔄 How It Works

### **Local Environment:**
```php
// In faq-section.php
if (WP_ENVIRONMENT === 'local') {
    // Uses: wp_faq table
    // From: wordpress_db database
}
```

### **Staging/Production:**
```php
else {
    // Uses: faq table
    // From: u914396707_doctor_consult database (Hostinger)
}
```

---

## 🎨 What Changed in Code

**Before (Hardcoded):**
```php
$faqs = [
  [
    'question' => 'Is my consultation private?',
    'answer' => 'Yes, doctors are available 24/7...',
    'is_list' => false
  ],
  // ... 5 more
];
```

**After (Database-Driven):**
```php
global $wpdb;
$table_name = (WP_ENVIRONMENT === 'local') 
    ? $wpdb->prefix . 'faq' 
    : 'faq';

$faq_results = $wpdb->get_results("SELECT id, question, answer FROM $table_name ORDER BY id ASC");

foreach ($faq_results as $faq) {
    $faqs[] = array(
        'question' => $faq->question,
        'answer' => $faq->answer,
        'is_list' => false
    );
}
```

---

## ✅ Verification

After importing, check your WordPress site:

**Desktop View:**
- Should see 2-column grid layout
- All 6 questions displayed
- "Need more help?" button on the right
- Title: "Frequently Asked Questions"

**Mobile View:**
- Should see accordion-style layout
- Questions collapse/expand on click
- Second question open by default
- "Need more help?" button at bottom

---

## 📊 Complete Database Summary

You now have **4 database tables** set up:

| Component | Local Table | Hostinger Table | Records |
|-----------|-------------|-----------------|---------|
| **Specialities** | `wp_specialities` | `specialities` | 18 |
| **Popular Conditions** | `wp_popular_conditions` | `popular_conditions` | 13 |
| **FAQ** | `wp_faq` | `faq` | 6 |
| **WordPress Core** | `wp_*` | `wp_*` or `stg_*` | Many |

---

## 🎯 Deployment Workflow

**Local Development:**
```
1. Visit http://localhost:8000/import-faq.php
2. Table created with 6 FAQs
3. Delete import-faq.php
4. Test FAQ section
```

**Hostinger Production:**
```
1. Open Hostinger phpMyAdmin
2. Run INSERT query (provided above)
3. 6 FAQs inserted
4. Deploy your WordPress files
5. Set WP_ENVIRONMENT to 'production'
6. FAQ section loads from Hostinger database
```

---

## 🔍 Environment Detection

The code automatically:
- ✅ Detects current environment (local/staging/production)
- ✅ Uses correct database and table name
- ✅ Handles table prefix (wp_ for local, none for production)
- ✅ Maintains `is_list` field for backward compatibility
- ✅ Logs errors if table doesn't exist

---

## 🚨 Important Notes

1. **Delete Import Script:** After successful import, delete `import-faq.php`

2. **is_list Field:** Currently all FAQs use `is_list => false` (plain text). If you need HTML in answers later, you can:
   - Add an `is_html` column to database
   - Or use a convention (e.g., if answer contains `<ul>`, treat as HTML)

3. **Environment Variable:** Make sure `WP_ENVIRONMENT` is set correctly in `wp-config.php`

---

## 📝 Adding More FAQs

### Via phpMyAdmin:
```sql
INSERT INTO `wp_faq` (`question`, `answer`) VALUES
('Your new question?', 'Your answer here.');
```

### Via WordPress Admin (Future Enhancement):
You could create an admin page to manage FAQs through WordPress dashboard.

---

## 🎁 Next Steps

1. ✅ **Import locally:** Visit `http://localhost:8000/import-faq.php`
2. ✅ **Verify:** Refresh your WordPress site and check FAQ section
3. ✅ **Delete script:** Remove `import-faq.php` file
4. ✅ **Test layouts:** Check both desktop and mobile views
5. ✅ **Deploy to Hostinger:** Run the INSERT query in Hostinger phpMyAdmin
6. ✅ **Go live:** Set `WP_ENVIRONMENT` to production when deploying

---

**All set! Your FAQ section is now fully database-driven!** 🎉

