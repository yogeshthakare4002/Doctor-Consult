# Meta Tags Setup Guide

This guide explains how to add and manage meta titles, descriptions, and canonical URLs in the WordPress database.

## Overview

The theme supports three types of meta tags:
1. **Meta Title** - Page title displayed in browser tabs and search results
2. **Meta Description** - Description shown in search engine results
3. **Canonical URL** - Preferred URL for the page (prevents duplicate content issues)

## Data Storage

Meta tags are stored in the `wp_options` table (or `options` table in production) with the following naming convention:

### Global Defaults (Site-wide)
- `default_meta_title` - Default meta title for all pages
- `default_meta_description` - Default meta description for all pages

### Page/Post Specific
- `meta_title_{post_id}` - Meta title for specific page/post
- `meta_description_{post_id}` - Meta description for specific page/post
- `canonical_url_{post_id}` - Canonical URL for specific page/post

**Note:** The system also checks `wp_postmeta` table for post meta fields with the same names (without the post_id suffix).

## Priority Order

The system uses the following priority when fetching meta tags:

1. **Page/Post specific** from `wp_options` (`meta_title_{post_id}`)
2. **Page/Post specific** from `wp_postmeta` (`meta_title`)
3. **Global default** from `wp_options` (`default_meta_title`)
4. **WordPress default** (page title or blog description)

## How to Add Meta Tags via phpMyAdmin

### Method 1: Using SQL Queries

#### Add Global Default Meta Title
```sql
INSERT INTO wp_options (option_name, option_value, autoload) 
VALUES ('default_meta_title', 'Your Default Site Title', 'yes')
ON DUPLICATE KEY UPDATE option_value = 'Your Default Site Title';
```

#### Add Global Default Meta Description
```sql
INSERT INTO wp_options (option_name, option_value, autoload) 
VALUES ('default_meta_description', 'Your default site description for SEO', 'yes')
ON DUPLICATE KEY UPDATE option_value = 'Your default site description for SEO';
```

#### Add Page-Specific Meta Title
First, find the page ID. You can check the `wp_posts` table or look at the page URL in WordPress admin.

```sql
-- Replace {POST_ID} with the actual page/post ID (e.g., 5, 10, etc.)
INSERT INTO wp_options (option_name, option_value, autoload) 
VALUES ('meta_title_5', 'Custom Page Title', 'yes')
ON DUPLICATE KEY UPDATE option_value = 'Custom Page Title';
```

#### Add Page-Specific Meta Description
```sql
-- Replace {POST_ID} with the actual page/post ID
INSERT INTO wp_options (option_name, option_value, autoload) 
VALUES ('meta_description_5', 'Custom page description for SEO purposes', 'yes')
ON DUPLICATE KEY UPDATE option_value = 'Custom page description for SEO purposes';
```

#### Add Page-Specific Canonical URL
```sql
-- Replace {POST_ID} with the actual page/post ID
INSERT INTO wp_options (option_name, option_value, autoload) 
VALUES ('canonical_url_5', 'https://example.com/canonical-page-url', 'yes')
ON DUPLICATE KEY UPDATE option_value = 'https://example.com/canonical-page-url';
```

### Method 2: Using phpMyAdmin Interface

1. **Open phpMyAdmin** and select your database
2. **Click on the `wp_options` table** (or `options` in production)
3. **Click "Insert"** tab
4. Fill in the form:
   - `option_name`: Enter the option name (e.g., `default_meta_title`)
   - `option_value`: Enter the value (e.g., `Your Site Title`)
   - `autoload`: Select `yes`
5. **Click "Go"** to save

### Method 3: Update Existing Values

To update an existing meta tag:

1. **Browse the `wp_options` table**
2. **Find the row** with the `option_name` you want to update
3. **Click "Edit"**
4. **Update the `option_value`** field
5. **Click "Go"** to save

Or use SQL:
```sql
UPDATE wp_options 
SET option_value = 'New Meta Title Value' 
WHERE option_name = 'default_meta_title';
```

## Finding Page/Post IDs

### Method 1: From WordPress Admin
1. Go to **Pages** or **Posts** in WordPress admin
2. Hover over a page/post title
3. Look at the URL in the browser status bar - it will show something like `post.php?post=5&action=edit`
4. The number after `post=` is the post ID (in this case, `5`)

### Method 2: From Database
```sql
SELECT ID, post_title, post_name 
FROM wp_posts 
WHERE post_type = 'page' 
AND post_status = 'publish'
ORDER BY ID;
```

## Example: Complete Setup for a Page

Let's say you have a page with ID `10` and you want to add all three meta tags:

```sql
-- Meta Title
INSERT INTO wp_options (option_name, option_value, autoload) 
VALUES ('meta_title_10', 'Doctor Consultation Online - Book Appointment', 'yes')
ON DUPLICATE KEY UPDATE option_value = 'Doctor Consultation Online - Book Appointment';

-- Meta Description
INSERT INTO wp_options (option_name, option_value, autoload) 
VALUES ('meta_description_10', 'Book online doctor consultation appointments. Consult with qualified doctors from the comfort of your home.', 'yes')
ON DUPLICATE KEY UPDATE option_value = 'Book online doctor consultation appointments. Consult with qualified doctors from the comfort of your home.';

-- Canonical URL
INSERT INTO wp_options (option_name, option_value, autoload) 
VALUES ('canonical_url_10', 'https://yoursite.com/doctor-consultation', 'yes')
ON DUPLICATE KEY UPDATE option_value = 'https://yoursite.com/doctor-consultation';
```

## Using WordPress Functions (Alternative Method)

If you prefer to add meta tags programmatically, you can use WordPress functions in your theme's `functions.php` or a custom plugin:

```php
// Add global default meta title
update_option('default_meta_title', 'Your Default Site Title');

// Add page-specific meta title (for page ID 10)
update_option('meta_title_10', 'Custom Page Title');

// Add page-specific meta description
update_option('meta_description_10', 'Custom page description');

// Add canonical URL
update_option('canonical_url_10', 'https://example.com/canonical-url');
```

## Verification

After adding meta tags, you can verify they're working by:

1. **View Page Source**: Right-click on your page and select "View Page Source"
2. **Look for meta tags** in the `<head>` section:
   ```html
   <title>Your Meta Title</title>
   <meta name="description" content="Your meta description">
   <link rel="canonical" href="https://example.com/canonical-url">
   ```

3. **Check Browser Tab**: The meta title should appear in the browser tab

## Notes

- **Table Prefix**: If your WordPress installation uses a different table prefix (not `wp_`), replace `wp_options` with your prefix (e.g., `myprefix_options`)
- **Production Environment**: Based on your `WP_ENVIRONMENT` setting, the table might be `options` instead of `wp_options` in production
- **Autoload**: Setting `autoload` to `yes` ensures the options are loaded efficiently by WordPress
- **Character Limits**: 
  - Meta Title: Recommended 50-60 characters
  - Meta Description: Recommended 150-160 characters
  - Canonical URL: Should be a full absolute URL

## Troubleshooting

### Meta tags not showing up?
1. Clear your browser cache
2. Check that the option names are correct (case-sensitive)
3. Verify the post ID is correct
4. Check for typos in the SQL queries

### Duplicate title tags?
The theme uses WordPress's `document_title_parts` filter, so it should work seamlessly with WordPress's title-tag support. If you see duplicates, check if another plugin is also adding title tags.

