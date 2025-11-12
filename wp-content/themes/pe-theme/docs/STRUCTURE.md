# PE Theme Structure Guide

This document gives new contributors a clear map of the `pe-theme` WordPress theme: how files are organized, what each area does, and how to extend the theme safely.

## 1. High-Level Layout

```
pe-theme/
├── assets/                  # Static assets (SVGs, images)
├── common-components/       # Shared reusable components (breadcrumb, Hindi toggle, carousel functions)
├── core/                    # Theme JavaScript (carousel + global behaviour)
├── css/                     # Stylesheets (global + shared)
├── pages/                   # Page-specific layouts, components, and cards
│   ├── doctor-consultation/
│   │   ├── cards/           # Reusable cards for the doctor consult page
│   │   ├── components/      # Carousels, sections, brand footer, etc.
│   │   └── page-doctor-consultation.php   # Page layout partial
│   └── disease-level/
│       └── page-disease-level.php         # Page layout partial
├── footer.php               # Global footer markup
├── header.php               # Global header + primary navigation
├── index.php                # Theme router (selects page layouts)
├── page-doctor-consultation.php  # WordPress wrapper template (loads pages/…)
├── page-disease-level.php        # WordPress wrapper template (loads pages/…)
├── functions.php            # Theme setup, assets, page creation on activation
└── style.css                # Theme metadata + main stylesheet registration
```

### Root Wrapper vs Page Partial
WordPress only detects custom page templates in the theme root (`page-{slug}.php`). To keep things tidy, each root template is a thin wrapper that immediately loads the actual layout from `pages/{slug}/page-{slug}.php`. All styles and component logic live under `pages/`.

## 2. Shared Assets

| Location | Purpose |
|----------|---------|
| `assets/images/` | Icons and illustrations used by components |
| `common-components/carousel-function.php` | `render_carousel()` helper shared by multiple layouts |
| `core/` | `carousel.js` and `theme.js` for interactive behaviour |
| `css/base.css` | Global reset, typography, layout primitives (no page styling) |
| `css/header.css`, `css/footer.css`, `css/carousel.css` | Shared component styles |
| `common-components/` | Shared reusable components (breadcrumb, Hindi language toggle, carousel functions) |

## 3. Page Anatomy (Example: Doctor Consultation)

```
pages/doctor-consultation/
├── page-doctor-consultation.php   # Page layout partial
├── components/
│   ├── breadcrumb-header.php
│   ├── specialities-carousel.php
│   ├── doctor-profile-carousel.php
│   ├── top-physician-horizontal-scroll.php
│   ├── popular-conditions.php
│   ├── reviews-section.php
│   ├── consult-info.php
│   ├── why-choose-us.php
│   ├── faq-section.php
│   └── brand-footer.php
└── cards/
    ├── doctor-profile-card.php
    ├── speciality-card.php
    ├── condition-card.php
    ├── review-card.php
    ├── …
```

Each component ships with the markup and inline `<style>` block it needs. This keeps page styling scoped and avoids leaking rules across layouts.

## 4. Adding a New Page

1. **Create the root wrapper** in the theme root following the slug convention:
   ```php
   // page-about-us.php (root)
   <?php
   /**
    * Template Name: About Us
    */
   if (!defined('ABSPATH')) exit;
   get_header();
   ?>
   <main id="main" class="site-main about-us-page">
       <div class="main-container">
           <?php get_template_part('pages/about-us/page-about-us'); ?>
       </div>
   </main>
   <?php get_footer(); ?>
   ```

2. **Create the page folder** under `pages/`:
   ```
   pages/about-us/
   ├── page-about-us.php     # layout partial
   ├── components/           # optional
   └── cards/                # optional
   ```

3. **Build the layout partial** (`pages/about-us/page-about-us.php`). Include shared pieces like breadcrumbs or navigation with `get_template_part('common-components/breadcrumb');` and write scoped styles inside the partial.

4. **Register or link any new assets** (images → `assets/images`, scripts → `core`, CSS → `css`).

5. **Assign the template** inside the WordPress editor (choose “About Us” from the template dropdown). The theme router (`index.php`) also auto-detects layouts by slug, so either approach works.

## 5. Working with Components

- **Carousels**: call `render_carousel($items, $config)` from `common-components/carousel-function.php`. Card templates live in `pages/doctor-consultation/cards/` and follow the `{name}-card.php` convention.
- **Navigation**: include shared breadcrumb / Hindi switcher with `get_template_part('common-components/breadcrumb');` and `get_template_part('common-components/hindi-lang');`.
- **Brand Footer**: the doctor consultation brand footer is in `pages/doctor-consultation/components/brand-footer.php`. Include it only on pages that need the block.

## 6. Styling Guidelines

- Keep `css/base.css` global-only (resets, typography, layout primitives).
- Add page-specific styles directly inside the component or layout partial using `<style>` blocks.
- Shared styles that multiple pages need belong in `css/{component}.css` and should be enqueued in `functions.php` if not already.

## 7. Gotchas & Tips

- **Slug-sensitive routing:** `index.php` inspects the slug and loads `pages/{slug}/page-{slug}.php`. Ensure folder and file names match the page slug.
- **Scoped styles:** Removing selectors from `css/base.css` means layouts must provide their own CSS (as done for doctor consultation and disease level pages).
- **Navigation header:** The doctor consultation layout uses its own `breadcrumb-header.php`. Other pages can reuse it by calling `get_template_part('pages/doctor-consultation/components/breadcrumb-header');` or create their own variant under `pages/{slug}/components`.
- **Breadcrumb data:** Provide an array of `{ title, link }` pairs via `set_query_var('breadcrumb_items', $items);` before including `common-components/breadcrumb` or the breadcrumb header. The breadcrumb header component automatically passes the array to the breadcrumb component. The last item is rendered as the inactive current page.
- **Legacy database layer:** The old custom tables (`wp_doctors`, `wp_specializations`, `wp_appointments`) were removed. See `docs/DATABASE_GUIDE.md` if you need a dynamic data source in the future.

With this structure, every page keeps its assets close by, and the theme stays easy to navigate as it grows. Happy building! 🚀

