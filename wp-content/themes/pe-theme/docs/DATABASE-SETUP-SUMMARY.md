# Database Setup Status

## 📌 Current State
- The PE Theme no longer provisions or reads from custom database tables.
- Legacy tables (`wp_doctors`, `wp_specializations`, `wp_appointments`, `wp_specialities`, `popular_conditions`, `faq`) and their import scripts were removed.
- Activation hooks in `functions.php` no longer create tables—the frontend uses static configuration arrays until a new data source is defined.

## 🔄 If You Need the Old Setup
1. Retrieve `common-components/database-setup.php` and `admin/admin-interface.php` from the Git history (commit history prior to November 2025).
2. Restore the `require_once` statements in `functions.php` that included those files and re-enable the activation hook logic (`doctor_consult_create_tables()` / `doctor_consult_insert_sample_data()`).
3. Redeploy the import scripts (`import-specialities.php`, `import-popular-conditions.php`, `import-faq.php`) and run them manually to seed data.
4. Update the front-end components so they call the restored helper functions (`doctor_consult_get_doctors_from_db()`, etc.) instead of static arrays.

## ✅ Recommended Path Forward
- Consider modelling doctors/conditions as WordPress custom post types or using a headless API instead of custom tables. See `docs/DATABASE_GUIDE.md` for implementation options.
- Document any new strategy inside this folder to keep future contributors aligned.

_Last updated: November 2025 (database layer removed)._

