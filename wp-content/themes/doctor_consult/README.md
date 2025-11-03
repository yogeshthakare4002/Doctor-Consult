# Doctor Consult Theme

A simple PHP-based WordPress theme for doctor consultation applications.

## Features

- Pure PHP implementation (no React/Next.js dependencies)
- Modern, responsive design
- Doctor search and filtering
- Appointment booking system
- WordPress integration
- Clean, maintainable code

## Setup

1. Upload the theme folder to `/wp-content/themes/`
2. Activate the theme in WordPress admin
3. Configure theme settings in Appearance > Customize

## Structure

- `/template-parts/` - Reusable PHP template components
- `/js/` - JavaScript for interactive features
- `/style.css` - Theme styles
- `index.php` - Home page template
- `page-doctors.php` - Doctors listing page
- `header.php` - Site header
- `footer.php` - Site footer
- `functions.php` - Theme functions and WordPress integration

## Pages

- **Home** - Landing page with features and specializations
- **Doctors** - Searchable and filterable doctors listing
- **Book Appointment** - Appointment booking (can be extended)

## Customization

- Edit `/style.css` for styling changes
- Modify template files in `/template-parts/` for component changes
- Update `functions.php` for WordPress integration changes

## Template Parts

- `header.php` - Main site header with logo, search, and navigation
- `doctor-card.php` - Individual doctor card component
- `search-bar.php` - Search functionality
- `filter-panel.php` - Doctor filtering options

## JavaScript Features

- Search form validation
- Filter functionality
- Booking system interactions
- Responsive navigation
- Smooth scrolling

## Styling

The theme uses a clean, modern design with:
- PharmEasy branding colors (#00a8a8)
- Responsive grid layouts
- Interactive hover effects
- Mobile-first design approach
- Professional typography

## WordPress Integration

- Custom post types for doctors (can be extended)
- REST API endpoints for data
- Customizer options for theme settings
- Security headers and optimizations
- SEO-friendly structure