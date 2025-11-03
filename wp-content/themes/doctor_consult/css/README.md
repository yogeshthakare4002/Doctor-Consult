# CSS Structure

This directory contains the organized CSS files for the Doctor Consult WordPress theme.

## File Structure

```
css/
├── main.css          # Main CSS file with imports (optional)
├── base.css          # Base styles, reset, typography
├── header.css        # Header and navigation styles
├── footer.css        # Footer styles
├── banner.css        # Doctor Consult banner component
└── README.md         # This documentation
```

## CSS Files Description

### `base.css`
- CSS reset and base styles
- Typography and font settings
- Container and layout utilities
- Custom scrollbar styling
- Main content area styles

### `header.css`
- WordPress header styling
- Site title and branding
- Navigation styles
- Responsive header behavior
- Mobile/desktop header differences

### `footer.css`
- Footer layout and styling
- Footer content organization
- Footer grid system
- Footer responsive design

### `banner.css`
- Complete Doctor Consult banner component
- Banner layout and positioning
- Visual elements (shapes, phone mockup)
- Video call windows styling
- Responsive banner design
- Mobile/tablet/desktop breakpoints

## Benefits of This Structure

1. **Modularity**: Each component has its own CSS file
2. **Maintainability**: Easy to find and edit specific styles
3. **Performance**: Only load what you need
4. **Scalability**: Easy to add new components
5. **Team Collaboration**: Multiple developers can work on different files
6. **Debugging**: Easier to identify and fix styling issues

## Usage

The CSS files are automatically enqueued in `functions.php` with proper dependencies:

- `base.css` loads first (depends on Google Fonts)
- `header.css` depends on `base.css`
- `footer.css` depends on `base.css`
- `banner.css` depends on `base.css`

## Adding New Components

To add a new component CSS file:

1. Create the new CSS file in the `css/` directory
2. Add the `wp_enqueue_style()` call in `functions.php`
3. Set appropriate dependencies
4. Update this README

## Development Tips

- Use CSS custom properties (variables) for consistent theming
- Follow BEM methodology for class naming
- Keep responsive design mobile-first
- Comment complex CSS rules
- Test across different browsers and devices
