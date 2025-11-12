# Carousel Usage Guide

The theme ships with a lightweight PHP carousel helper (`common-components/carousel-function.php`) that powers all doctor consultation carousels. This guide shows how to reuse it and how card templates are resolved.

## 1. Rendering a Carousel

```php
<?php
require_once get_template_directory() . '/common-components/carousel-function.php';

$items = array(
    array(
        'title' => 'General Physician',
        'description' => 'Treats common illnesses and provides primary care.',
        'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
        'link' => '#general-physician'
    ),
    // ...more items
);

$config = array(
    'title' => '20+ Specialities',
    'view_all_text' => 'View all',
    'view_all_link' => '#all-specialities',
    'items_per_view' => 3,
    'card_template' => 'speciality',    // Resolves to pages/doctor-consultation/cards/speciality-card.php
    'container_class' => 'specialities-carousel',
    'wrapper_class' => 'specialities-wrapper',
    'show_navigation' => true,
    'autoplay' => false,
);

echo render_carousel($items, $config);
?>
```

### Configuration Options

| Key | Type | Default | Notes |
|-----|------|---------|-------|
| `title` | string | `''` | Heading shown above the carousel | 
| `view_all_text` | string | `'View all'` | CTA label | 
| `view_all_link` | string | `'#'` | CTA URL | 
| `show_view_all` | bool | `true` | Toggle CTA visibility | 
| `items_per_view` | int/float | `3` | Number of cards per slide (supports `2.5` etc.) | 
| `card_template` | string | `'default'` | Template slug (see below) | 
| `container_class` | string | `'carousel-container'` | Wrapper class for scoped styles | 
| `wrapper_class` | string | `'carousel-wrapper'` | Inner track wrapper class | 
| `show_navigation` | bool | `true` | Prev/next buttons | 
| `show_dots` | bool | `false` | Dot navigation | 
| `autoplay` | bool | `false` | Auto-advance slides | 
| `autoplay_delay` | int | `3000` | Delay in ms when autoplay is enabled | 
| `card_width` | int | `280` | Width applied to each card (px) |

## 2. Card Template Resolution

`render_carousel()` automatically looks for a card template using the `card_template` option and this naming convention:

1. `pages/doctor-consultation/cards/{slug}-card.php`
2. `pages/disease-level/cards/{slug}-card.php`
3. Fallback: `pages/doctor-consultation/cards/default-card.php`

Each template receives two variables:

- `$item` — the current data item from the `$items` array
- `$config` — the carousel configuration array

**Example: `pages/doctor-consultation/cards/speciality-card.php`**
```php
<div class="speciality-card">
    <div class="speciality-card__content">
        <h3><?php echo esc_html($item['title']); ?></h3>
        <p><?php echo esc_html($item['description']); ?></p>
        <a class="speciality-card__cta" href="<?php echo esc_url($item['link']); ?>">
            <?php esc_html_e('Find specialists', 'doctor-consult'); ?>
        </a>
    </div>
</div>
```

Add styles for the card inside the template (using an inline `<style>` block) or extract them to a shared stylesheet if multiple components reuse them.

## 3. Existing Carousels

| Component | Location | Card Template |
|-----------|----------|---------------|
| Doctor profiles | `pages/doctor-consultation/components/doctor-profile-carousel.php` | `doctor-profile-card.php`
| Specialities | `pages/doctor-consultation/components/specialities-carousel.php` | `speciality-card.php`
| Popular conditions | `pages/doctor-consultation/components/popular-conditions.php` | `condition-card.php` / `condition-card-more.php`
| Reviews | `pages/doctor-consultation/components/reviews-section.php` | `review-card.php`

Each component includes its own `<style>` block for layout tweaks (margins, responsive behaviour, etc.). When building a new carousel, follow the same pattern: render it via `render_carousel()` and scope styles inside the component file.

## 4. JavaScript Behaviour

- `core/carousel.js` is enqueued automatically and reads configuration written by `render_carousel()`.
- Every carousel receives a unique ID and registers itself to the global `window.carouselConfigs` map.
- Autoplay, navigation buttons, and dots are driven by this script—no extra wiring needed.

## 5. Creating a New Carousel

1. Prepare your `$items` array with whatever fields your card template needs.
2. Pick or create a card template under `pages/{slug}/cards/` following the `{name}-card.php` naming convention.
3. Call `render_carousel($items, $config)` from your component.
4. Add scoped CSS inside the component to handle spacing, backgrounds, etc.
5. Test on desktop and mobile. The helper automatically injects `card_width` styles, but page-specific tweaks belong in the component file.

That’s it! The carousel helper keeps the rendering logic consistent, while components stay free to define their own layouts and styling._BUILD SMART 🚀
