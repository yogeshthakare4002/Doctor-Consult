# React Integration with WordPress Theme

This document explains how the React doctor consultation app is integrated with the WordPress theme.

## 🏗️ Architecture

The React app is built as a standalone application and integrated into WordPress through:

1. **React App Structure**: Located in `react-app/` directory
2. **Build Process**: Webpack bundles the React app into `js/react-bundle.js`
3. **WordPress Integration**: React assets are enqueued in `functions.php`
4. **Template Integration**: React mounts to specific DOM elements in PHP templates

## 📁 File Structure

```
doctor_consult/
├── react-app/
│   ├── src/
│   │   ├── App.js          # Main React component
│   │   ├── App.css         # React component styles
│   │   └── index.js        # React entry point
│   ├── package.json        # React dependencies
│   ├── webpack.config.js   # Build configuration
│   └── node_modules/       # Dependencies
├── js/
│   └── react-bundle.js     # Built React app (generated)
├── functions.php           # WordPress functions with React enqueuing
├── index.php              # Main template with React mount point
├── page-doctors.php       # Dedicated doctors page template
└── build.sh               # Build script
```

## ⚛️ React Components

### Main App Component (`App.js`)
- **DoctorCard**: Displays individual doctor information
- **SearchBar**: Handles doctor search functionality
- **FilterPanel**: Provides filtering by specialization
- **Main App**: Manages state and coordinates components

### Features
- ✅ Doctor search functionality
- ✅ Filter by specialization
- ✅ Responsive design
- ✅ Interactive booking system
- ✅ Loading states
- ✅ Error handling

## 🔧 Build Process

### Development
```bash
# Install dependencies
cd react-app
npm install

# Development mode with watch
npm run dev
```

### Production
```bash
# Build for production
npm run build

# Or use the build script
./build.sh
```

## 🚀 WordPress Integration

### 1. Asset Enqueuing (`functions.php`)
```php
// Enqueue React from CDN
wp_enqueue_script('react', 'https://unpkg.com/react@18/umd/react.production.min.js');
wp_enqueue_script('react-dom', 'https://unpkg.com/react-dom@18/umd/react-dom.production.min.js');

// Enqueue React bundle
wp_enqueue_script('doctor-consult-react', get_template_directory_uri() . '/js/react-bundle.js');
```

### 2. Template Integration
```php
<!-- React mount point -->
<div id="doctor-consult-react-app"></div>
```

### 3. Auto-initialization
The React app automatically initializes when the DOM element is found:
```javascript
document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('doctor-consult-react-app');
    if (container) {
        window.initDoctorConsultApp('doctor-consult-react-app');
    }
});
```

## 📱 Usage

### On Homepage
The React component appears in the main content area below the services section.

### On Doctors Page
Create a new page in WordPress admin and assign the "Doctors Page" template to display the full React app experience.

## 🎨 Styling

### React Component Styles
- Located in `react-app/src/App.css`
- Scoped to `.react-doctor-consult` class
- Responsive design with mobile-first approach
- Consistent with theme color scheme (#00a8a8)

### WordPress Integration Styles
- Added to main `style.css`
- Styles the React app container
- Ensures seamless integration with theme

## 🔄 Development Workflow

1. **Make Changes**: Edit React components in `react-app/src/`
2. **Build**: Run `npm run build` or `./build.sh`
3. **Test**: Refresh WordPress page to see changes
4. **Deploy**: Upload updated `react-bundle.js` to server

## 📦 Dependencies

### React Dependencies
- React 18.2.0
- React DOM 18.2.0

### Build Dependencies
- Webpack 5.88.0
- Babel (ES6+ and React JSX support)
- CSS Loader and Style Loader

### WordPress Dependencies
- jQuery (for existing theme functionality)
- Font Awesome (for icons)
- Google Fonts (Inter font family)

## 🐛 Troubleshooting

### React Not Loading
1. Check browser console for JavaScript errors
2. Verify React CDN links are accessible
3. Ensure `react-bundle.js` exists in `js/` directory
4. Check WordPress theme is properly activated

### Styles Not Applied
1. Verify CSS is included in the bundle
2. Check for CSS conflicts with WordPress theme
3. Clear browser cache

### Build Errors
1. Ensure Node.js and npm are installed
2. Run `npm install` in `react-app/` directory
3. Check webpack configuration

## 🔮 Future Enhancements

- [ ] Add more doctor specializations
- [ ] Implement real-time availability
- [ ] Add appointment scheduling system
- [ ] Integrate with WordPress user system
- [ ] Add payment gateway integration
- [ ] Implement doctor reviews and ratings
- [ ] Add video call integration
- [ ] Create admin panel for managing doctors

## 📞 Support

For issues related to:
- **React Components**: Check React documentation and console errors
- **WordPress Integration**: Verify theme files and WordPress setup
- **Build Process**: Ensure Node.js environment is properly configured
