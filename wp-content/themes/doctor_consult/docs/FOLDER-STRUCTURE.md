# 📁 Doctor Consult Theme - Folder Structure Guide

This document explains the organized folder structure of the Doctor Consult WordPress theme.

---

## 🗂️ Complete Folder Structure

```
doctor_consult/
├── assets/                    # Theme assets (images, icons, etc.)
├── docs/                      # All documentation
│   ├── README.md
│   ├── QUICK-START.md
│   ├── DATABASE-SETUP-SUMMARY.md
│   ├── DEPLOYMENT-GUIDE.md
│   ├── POPULAR-CONDITIONS-SETUP.md
│   ├── FAQ-SETUP.md
│   └── FOLDER-STRUCTURE.md   # This file
│
├── includes/
│   ├── core/                 # Core functionality
│   │   ├── carousel-function.php       # Main carousel engine
│   │   └── database-setup.php          # Database setup utilities
│   │
│   ├── components/           # All UI components
│   │   ├── carousels/       # Carousel-based components
│   │   │   ├── specialities-carousel.php         (Database-driven)
│   │   │   ├── popular-conditions.php            (Database-driven)
│   │   │   ├── doctor-profile-carousel.php       (Static data)
│   │   │   ├── top-physician-horizontal-scroll.php (Static data)
│   │   │   └── reviews-section.php               (Static data)
│   │   │
│   │   ├── sections/        # Static section components
│   │   │   ├── faq-section.php              (Database-driven)
│   │   │   ├── booking-steps.php
│   │   │   ├── consult-info.php
│   │   │   ├── doctor-consult-banner.php
│   │   │   ├── trust-marker.php
│   │   │   └── why-choose-us.php
│   │   │
│   │   ├── navigation/      # Navigation components
│   │   │   ├── header-navigation.php
│   │   │   ├── breadcrumb.php
│   │   │   └── hindi-lang.php
│   │   │
│   │   ├── footer/          # Footer components
│   │   │   └── brand-footer.php
│   │   │
│   │   └── cards/           # Reusable card components
│   │       ├── speciality-card.php          # Used by: specialities-carousel
│   │       ├── condition-card.php           # Used by: popular-conditions
│   │       ├── condition-card-more.php      # Used by: popular-conditions
│   │       ├── doctor-profile-card.php      # Used by: doctor-profile-carousel
│   │       ├── physician-card.php           # Used by: top-physician-scroll
│   │       ├── top-physician-card.php       # Future use
│   │       ├── review-card.php              # Used by: reviews-section
│   │       ├── assurance-card-mobile.php    # Standalone card
│   │       ├── online-consultation-promo-card.php  # Standalone card
│   │       └── default-card.php             # Fallback card template
│   │
│   └── admin/               # Admin interface
│       └── admin-interface.php
│
├── functions.php             # Theme functions & setup
├── index.php                 # Main template file
└── (other WordPress theme files)
```

---

## 🎯 Folder Purpose & Guidelines

### 📦 `/includes/core/`
**Purpose:** Core functionality that powers the theme

**Contains:**
- **carousel/** - Reusable carousel engine (shared by all carousel components)
- **database-setup.php** - Database utilities and helpers

**When to add here:**
- Core utilities used by multiple components
- System-wide functionality
- Foundation code that others depend on

**Examples:**
```php
// Using the carousel engine
require_once get_template_directory() . '/includes/core/carousel-function.php';
```

---

### 🎨 `/includes/components/carousels/`
**Purpose:** Components that display items in a carousel/slider format

**Database-Driven:**
- `specialities-carousel.php` - 18 medical specialities
- `popular-conditions.php` - 13 popular conditions

**Static Data:**
- `doctor-profile-carousel.php` - Doctor profiles
- `top-physician-horizontal-scroll.php` - Top physicians
- `reviews-section.php` - Patient reviews

**When to add here:**
- Component uses the carousel engine
- Displays multiple items in a horizontal scrollable format
- Has navigation arrows or dots
- Shows items one-at-a-time or multiple-at-once

**Code Pattern:**
```php
// Include carousel engine
require_once get_template_directory() . '/includes/core/carousel-function.php';

// Configure and render
$config = array(
    'card_template' => 'speciality',  // Will use: cards/speciality-card.php
    'items_per_view' => 3,
    // ... more config
);

echo render_carousel($data, $config);
```

---

### 📄 `/includes/components/sections/`
**Purpose:** Static sections and standalone UI blocks

**Database-Driven:**
- `faq-section.php` - Frequently asked questions

**Static:**
- `booking-steps.php` - Booking process steps
- `consult-info.php` - Consultation information
- `doctor-consult-banner.php` - Hero/banner section
- `trust-marker.php` - Trust indicators
- `why-choose-us.php` - Features/benefits section

**When to add here:**
- Component is a complete section
- Doesn't use carousel functionality
- Displays content in a fixed layout
- Typically full-width sections

**Usage:**
```php
// In your page template
include get_template_directory() . '/includes/components/sections/faq-section.php';
```

---

### 🧭 `/includes/components/navigation/`
**Purpose:** Navigation and header-related components

**Contains:**
- `header-navigation.php` - Main site navigation
- `breadcrumb.php` - Breadcrumb navigation
- `hindi-lang.php` - Language switcher

**When to add here:**
- Navigation menus
- Breadcrumbs
- Language switchers
- Header utilities

**Usage:**
```php
include get_template_directory() . '/includes/components/navigation/header-navigation.php';
```

---

### 👣 `/includes/components/footer/`
**Purpose:** Footer-related components

**Contains:**
- `brand-footer.php` - Footer with branding/links

**When to add here:**
- Footer sections
- Footer widgets
- Copyright notices
- Footer navigation

---

### 🃏 `/includes/components/cards/`
**Purpose:** Reusable card templates (used by carousels and other components)

**Card Files:**
- `speciality-card.php` - Displays a single speciality
- `condition-card.php` - Displays a single condition
- `doctor-profile-card.php` - Displays a doctor profile
- `physician-card.php` - Small physician card
- `review-card.php` - Customer review card
- `default-card.php` - Fallback card template

**When to add here:**
- Reusable card design
- Used by carousel components
- Can be used in multiple contexts
- Single item display template

**File Naming Convention:**
- Always end with `-card.php`
- Use descriptive names: `entity-card.php`
- Example: `product-card.php`, `testimonial-card.php`

**How Cards Are Used:**
```php
// In carousel config, use card name WITHOUT '-card.php'
$config = array(
    'card_template' => 'speciality',  // Will load: cards/speciality-card.php
);

// Carousel engine automatically appends '-card.php' and looks in cards/ folder
```

**Card Template Structure:**
```php
<?php
/**
 * Example Card: Speciality Card
 * Variables available: $item, $index
 */
?>
<div class="card speciality-card">
    <h3><?php echo esc_html($item['title']); ?></h3>
    <p><?php echo esc_html($item['description']); ?></p>
</div>
```

---

### 👨‍💼 `/includes/admin/`
**Purpose:** WordPress admin interface customizations

**Contains:**
- `admin-interface.php` - Admin dashboard customizations

**When to add here:**
- Admin menu modifications
- Custom admin pages
- Dashboard widgets
- Admin-only functionality

---

## 🔄 Component Relationships

### Carousel System Flow:
```
User Page
    ↓
Carousel Component (e.g., specialities-carousel.php)
    ↓
Core Carousel Engine (carousel-function.php)
    ↓
Card Template (speciality-card.php)
    ↓
Rendered HTML
```

### Database-Driven Components:
```
specialities-carousel.php  →  Uses: wp_specialities table
popular-conditions.php     →  Uses: wp_popular_conditions table
faq-section.php           →  Uses: wp_faq table
```

---

## 📝 Adding New Components

### Adding a New Carousel Component:

1. **Create the component file:**
   ```
   /includes/components/carousels/your-carousel.php
   ```

2. **Create the card template:**
   ```
   /includes/components/cards/your-card.php
   ```

3. **In your carousel file:**
   ```php
   require_once get_template_directory() . '/includes/core/carousel/carousel-function.php';
   
   $config = array(
       'card_template' => 'your',  // Will use: your-card.php
       'items_per_view' => 3,
   );
   
   echo render_carousel($your_data, $config);
   ```

### Adding a New Static Section:

1. **Create the component file:**
   ```
   /includes/components/sections/your-section.php
   ```

2. **Use in your template:**
   ```php
   include get_template_directory() . '/includes/components/sections/your-section.php';
   ```

### Adding a New Reusable Card:

1. **Create the card file:**
   ```
   /includes/components/cards/your-entity-card.php
   ```

2. **Use in carousel:**
   ```php
   $config = array('card_template' => 'your-entity');
   ```

3. **Or use directly:**
   ```php
   $item = array('title' => 'Example');
   include get_template_directory() . '/includes/components/cards/your-entity-card.php';
   ```

---

## 🎨 Best Practices

### File Organization:
✅ **DO:**
- Keep related files together
- Use descriptive file names
- Follow the established folder structure
- Add documentation comments in files

❌ **DON'T:**
- Mix different types of components in one folder
- Create deeply nested folder structures
- Use generic names like `component1.php`

### Naming Conventions:
- **Carousels:** `entity-carousel.php` or `entity-section.php`
- **Cards:** Always `entity-card.php`
- **Sections:** `descriptive-name.php`
- **Navigation:** `location-navigation.php`

### Code Structure:
```php
<?php
/**
 * Component Name
 * Brief description of what it does
 * 
 * @package Doctor_Consult
 * @subpackage Components/Carousels (or Sections, Cards, etc.)
 */

// Fetch data (from database or static array)
// Configure component
// Include dependencies
// Render component
// Add styles (if component-specific)
// Add scripts (if component-specific)
?>
```

---

## 🔍 Finding Components

### Quick Reference:

**Need a carousel?**  
→ Look in `/includes/components/carousels/`

**Need a section?**  
→ Look in `/includes/components/sections/`

**Need a card template?**  
→ Look in `/includes/components/cards/`

**Need navigation?**  
→ Look in `/includes/components/navigation/`

**Need the carousel engine?**  
→ Look in `/includes/core/` (carousel-function.php)

**Need database helpers?**  
→ Look in `/includes/core/`

---

## 📊 Component Inventory

### Carousels (5 total):
1. ✅ Specialities Carousel (Database)
2. ✅ Popular Conditions (Database)
3. ✅ Doctor Profile Carousel (Static)
4. ✅ Top Physician Scroll (Static)
5. ✅ Reviews Section (Static)

### Sections (6 total):
1. ✅ FAQ Section (Database)
2. ✅ Booking Steps
3. ✅ Consult Info
4. ✅ Doctor Consult Banner
5. ✅ Trust Marker
6. ✅ Why Choose Us

### Cards (10 total):
1. ✅ Speciality Card
2. ✅ Condition Card
3. ✅ Condition Card More
4. ✅ Doctor Profile Card
5. ✅ Physician Card
6. ✅ Top Physician Card
7. ✅ Review Card
8. ✅ Assurance Card Mobile
9. ✅ Online Consultation Promo Card
10. ✅ Default Card

### Navigation (3 total):
1. ✅ Header Navigation
2. ✅ Breadcrumb
3. ✅ Hindi Lang Switcher

---

## 🚀 Benefits of This Structure

✅ **Clear Separation** - Easy to find what you need  
✅ **Reusability** - Cards can be used anywhere  
✅ **Scalability** - Easy to add new components  
✅ **Maintainability** - Organized and documented  
✅ **Team-Friendly** - New developers can navigate easily  
✅ **Future-Proof** - Structure supports growth  

---

**Last Updated:** November 6, 2025  
**Structure Version:** 2.0 (Reorganized)

