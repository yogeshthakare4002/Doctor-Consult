# Data Source Guide

The current iteration of the PE Theme no longer relies on custom database tables. All interactive sections are powered by static PHP arrays, WordPress pages, and component-specific configuration. This guide explains what data powers each section today and how you could hook it back up to a database (or other dynamic source) if required in the future.

## 1. Current Data Flow

| Feature | File | Data Source |
|---------|------|-------------|
| Doctor profiles carousel | `pages/doctor-consultation/components/doctor-profile-carousel.php` | Hard-coded `$doctors_data` array inside the component |
| Specialities carousel | `pages/doctor-consultation/components/specialities-carousel.php` | Reads from `specialities` table if it exists, otherwise hard-coded fallback | 
| Popular conditions carousel + mobile grid | `pages/doctor-consultation/components/popular-conditions.php` | Same pattern as specialities — checks for a `popular_conditions` table first, falls back to static data | 
| Reviews carousel | `pages/doctor-consultation/components/reviews-section.php` | Static array | 
| Disease level tiles | `pages/disease-level/page-disease-level.php` | Static `$conditions` array |

> **Important:** Because the legacy tables (`wp_doctors`, `wp_specializations`, `wp_appointments`) were removed, no database writes or imports are currently executed when the theme activates.

## 2. Why the Database Layer Was Removed

- The admin UI (`admin/admin-interface.php`) and helper (`common-components/database-setup.php`) were unmaintained and unused by the front-end.
- The production environment relied on manually populated tables that no longer exist.
- Maintaining two code paths (database + static) was causing confusion and broken includes.

Simplifying the theme to static configuration keeps the focus on layout and styling. When you are ready to hook up real data, use the options below.

## 3. Reintroducing Dynamic Data (Options)

### Option A: WordPress Custom Post Types (Recommended)
1. Create custom post types such as `doctor`, `speciality`, or `condition` using `register_post_type()` in `functions.php`.
2. Use standard WP fields or Advanced Custom Fields (ACF) to store meta.
3. Replace the hard-coded arrays with `WP_Query` calls.
4. Reuse existing card templates by mapping post data to the `$items` structure expected by `render_carousel()`.

### Option B: Restore the Legacy Tables
If you want to revive the exact `wp_doctors`/`wp_specializations` structure:
1. Re-add `common-components/database-setup.php` and the activation hook that creates tables.
2. Reintroduce the admin UI or build a new data importer.
3. Update the doctor profile carousel to call `doctor_consult_get_doctors_from_db()` instead of using the static array.
4. Make sure you define `WP_ENVIRONMENT` in `wp-config.php` and prefix tables correctly as the old code expected.

### Option C: Remote API
For off-platform data (e.g., REST API or GraphQL):
1. Fetch the data in PHP (`wp_remote_get`) or JavaScript (`fetch`).
2. Cache responses using transients to avoid rate limits.
3. Transform the data into the expected `$items` format passed to components.

## 4. Where to Plug In

| Component | Hook/Function to Modify |
|-----------|-------------------------|
| Doctor profiles | `pages/doctor-consultation/components/doctor-profile-carousel.php` — replace `$doctors_data` definition |
| Specialities | `pages/doctor-consultation/components/specialities-carousel.php` — replace DB fallback logic |
| Popular conditions | `pages/doctor-consultation/components/popular-conditions.php` — same pattern as specialities |
| Reviews | `pages/doctor-consultation/components/reviews-section.php` — replace `$reviews` array |
| Disease level tiles | `pages/disease-level/page-disease-level.php` — replace `$conditions` array |

## 5. Sample Pattern: Loading Doctors from Posts

```php
$doctors_query = new WP_Query(array(
    'post_type' => 'doctor',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC',
));

$doctors_data = array();

if ($doctors_query->have_posts()) {
    while ($doctors_query->have_posts()) {
        $doctors_query->the_post();
        $doctors_data[] = array(
            'name' => get_the_title(),
            'specialty' => get_post_meta(get_the_ID(), 'doctor_specialty', true),
            'experience' => get_post_meta(get_the_ID(), 'doctor_experience', true) . ' years experience',
            'languages' => get_post_meta(get_the_ID(), 'doctor_languages', true),
            'qualifications' => get_post_meta(get_the_ID(), 'doctor_qualifications', true),
            'expertise' => get_post_meta(get_the_ID(), 'doctor_expertise', true),
            'current_price' => get_post_meta(get_the_ID(), 'doctor_price', true),
            'original_price' => get_post_meta(get_the_ID(), 'doctor_original_price', true),
            'image' => get_the_post_thumbnail_url(get_the_ID(), 'medium'),
            'link' => get_permalink(),
        );
    }
    wp_reset_postdata();
}
```

## 6. Summary

- 🚫 No custom tables are created or required today.
- ✅ All data is currently static; components are safe to edit without worrying about database side effects.
- 🔄 Future developers can adopt custom post types, remote APIs, or restore the previous MySQL schema if dynamic data becomes necessary.

Keep this guide handy when planning new data integrations, and document any changes so future contributors know which approach the project uses.

