# Reusable Carousel Component Usage Guide

This document explains how to use the reusable carousel component in your WordPress theme.

## Basic Usage

### 1. Include the Carousel Component

```php
<?php
// Define your data
$items = array(
    array(
        'title' => 'Item 1',
        'description' => 'Description for item 1',
        'image' => 'path/to/image1.jpg',
        'link' => '#item1'
    ),
    array(
        'title' => 'Item 2',
        'description' => 'Description for item 2',
        'image' => 'path/to/image2.jpg',
        'link' => '#item2'
    )
);

// Configure the carousel
$config = array(
    'title' => 'My Carousel',
    'view_all_text' => 'View All',
    'view_all_link' => '#all',
    'items_per_view' => 3,
    'show_navigation' => true,
    'show_dots' => false,
    'autoplay' => true,
    'autoplay_delay' => 3000,
    'card_template' => 'default'
);

// Include the carousel
include get_template_directory() . '/includes/components/carousel.php';
?>
```

## Configuration Options

### Carousel Configuration

| Option | Type | Default | Description |
|--------|------|---------|-------------|
| `title` | string | '' | Main title for the carousel |
| `view_all_text` | string | 'View all' | Text for the view all button |
| `view_all_link` | string | '#' | URL for the view all button |
| `items_per_view` | int | 3 | Number of items visible at once |
| `show_navigation` | bool | true | Show prev/next buttons |
| `show_dots` | bool | false | Show dot navigation |
| `autoplay` | bool | false | Enable autoplay |
| `autoplay_delay` | int | 3000 | Autoplay delay in milliseconds |
| `card_template` | string | 'default' | Card template to use |
| `container_class` | string | 'carousel-container' | CSS class for container |
| `wrapper_class` | string | 'carousel-wrapper' | CSS class for wrapper |

### Available Card Templates

1. **default** - Basic card with image, title, description, and link
2. **speciality** - Medical speciality card with header image and navigation button
3. **doctor** - Doctor profile card with circular image

## Examples

### 1. Specialities Carousel

```php
<?php
$specialities = array(
    array(
        'title' => 'General Physician',
        'description' => 'Expert in managing common illnesses...',
        'image' => get_template_directory_uri() . '/assets/images/general-physician.jpg',
        'link' => '#general-physician'
    )
    // ... more items
);

$config = array(
    'title' => '20+ Specialities',
    'view_all_text' => 'View all Specialities',
    'view_all_link' => '#all-specialities',
    'items_per_view' => 3,
    'card_template' => 'speciality',
    'autoplay' => true
);

include get_template_directory() . '/includes/components/carousel.php';
?>
```

### 2. Doctors Carousel

```php
<?php
$doctors = array(
    array(
        'title' => 'Dr. John Smith',
        'subtitle' => 'Cardiologist',
        'description' => '15+ years experience in heart care...',
        'image' => get_template_directory_uri() . '/assets/images/doctor1.jpg',
        'link' => '#doctor1'
    )
    // ... more doctors
);

$config = array(
    'title' => 'Our Doctors',
    'view_all_text' => 'View All Doctors',
    'view_all_link' => '#all-doctors',
    'items_per_view' => 4,
    'card_template' => 'doctor',
    'show_dots' => true
);

include get_template_directory() . '/includes/components/carousel.php';
?>
```

### 3. Testimonials Carousel

```php
<?php
$testimonials = array(
    array(
        'title' => 'Sarah Johnson',
        'description' => 'Great service! The doctor was very helpful...',
        'image' => get_template_directory_uri() . '/assets/images/patient1.jpg',
        'link' => '#testimonial1'
    )
    // ... more testimonials
);

$config = array(
    'title' => 'Patient Testimonials',
    'items_per_view' => 2,
    'card_template' => 'default',
    'autoplay' => true,
    'autoplay_delay' => 5000
);

include get_template_directory() . '/includes/components/carousel.php';
?>
```

## Creating Custom Card Templates

1. Create a new file in `/includes/components/carousel-cards/`
2. Name it `your-template.php`
3. Use the `$item` variable to access item data
4. Use `$config` variable to access configuration

Example: `/includes/components/carousel-cards/testimonial.php`

```php
<?php
/**
 * Testimonial Card Template
 */
?>

<div class="carousel-card testimonial-card">
    <div class="testimonial-content">
        <p class="testimonial-text">"<?php echo esc_html($item['description']); ?>"</p>
    </div>
    
    <div class="testimonial-author">
        <?php if (!empty($item['image'])): ?>
            <img src="<?php echo esc_url($item['image']); ?>" alt="<?php echo esc_attr($item['title']); ?>" class="author-image" />
        <?php endif; ?>
        
        <div class="author-info">
            <h4 class="author-name"><?php echo esc_html($item['title']); ?></h4>
            <?php if (!empty($item['subtitle'])): ?>
                <p class="author-title"><?php echo esc_html($item['subtitle']); ?></p>
            <?php endif; ?>
        </div>
    </div>
</div>
```

## Responsive Behavior

The carousel automatically adjusts based on screen size:

- **Desktop (>1024px)**: Shows configured `items_per_view`
- **Tablet (768px-1024px)**: Shows 3 items
- **Mobile (480px-768px)**: Shows 2 items  
- **Small Mobile (<480px)**: Shows 1 item

## Features

- ✅ Touch/swipe support on mobile
- ✅ Keyboard navigation (arrow keys)
- ✅ Autoplay with pause on hover
- ✅ Responsive design
- ✅ Accessibility support
- ✅ Smooth animations
- ✅ Customizable card templates
- ✅ Navigation buttons and dots
- ✅ Pause when page is not visible

## Styling

The carousel uses CSS classes that you can customize:

- `.carousel-container` - Main container
- `.carousel-header` - Header with title and view all button
- `.carousel-track` - Items container
- `.carousel-item` - Individual item wrapper
- `.carousel-card` - Card styling
- `.carousel-navigation` - Navigation buttons
- `.carousel-dots` - Dot navigation

## JavaScript API

The carousel is initialized automatically, but you can also control it programmatically:

```javascript
// Get carousel instance (if you need to control it)
const carousel = document.querySelector('.carousel-container').carouselInstance;

// Control methods
carousel.next();
carousel.prev();
carousel.goToSlide(2);
carousel.startAutoplay();
carousel.stopAutoplay();
```
