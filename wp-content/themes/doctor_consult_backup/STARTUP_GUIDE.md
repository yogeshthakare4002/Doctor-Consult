# 🚀 Doctor Consult WordPress Theme - Startup Guide

This guide will help you get the Doctor Consult WordPress theme with React integration up and running.

## 📋 Prerequisites

Before starting, ensure you have:

- ✅ **WordPress Installation** (local or server)
- ✅ **Node.js** (v14 or higher)
- ✅ **npm** (comes with Node.js)
- ✅ **PHP** (v7.4 or higher)
- ✅ **Web Server** (Apache/Nginx)

## 🏗️ Project Structure

```
doctor_consult/
├── 📁 react-app/           # React application
│   ├── 📁 src/
│   │   ├── 📄 App.js       # Main React component
│   │   ├── 📄 App.css      # React styles
│   │   └── 📄 index.js     # React entry point
│   ├── 📄 package.json     # React dependencies
│   └── 📄 webpack.config.js # Build configuration
├── 📁 js/
│   ├── 📄 react-bundle.js  # Built React app
│   └── 📄 script.js        # WordPress JavaScript
├── 📄 functions.php        # WordPress functions
├── 📄 header.php          # Header template
├── 📄 index.php           # Main template
├── 📄 page-doctors.php    # Doctors page template
├── 📄 style.css           # Main stylesheet
└── 📄 build.sh            # Build script
```

## 🚀 Step-by-Step Setup

### Step 1: WordPress Setup

1. **Navigate to WordPress Admin**
   ```
   http://your-site.com/wp-admin
   ```

2. **Activate the Theme**
   - Go to `Appearance` → `Themes`
   - Find "Doctor consult" theme
   - Click `Activate`

### Step 2: React Dependencies Setup

1. **Navigate to React App Directory**
   ```bash
   cd /path/to/your/theme/react-app
   ```

2. **Install Dependencies**
   ```bash
   npm install
   ```

3. **Build React App**
   ```bash
   npm run build
   ```
   
   Or use the build script:
   ```bash
   ./build.sh
   ```

### Step 3: Verify Installation

1. **Check Files Exist**
   - ✅ `js/react-bundle.js` should exist
   - ✅ `js/script.js` should exist
   - ✅ All PHP template files should exist

2. **Test WordPress Theme**
   - Visit your WordPress site
   - Check if the PharmEasy-style header appears
   - Verify the React component loads on the homepage

### Step 4: Create Doctors Page (Optional)

1. **Create New Page**
   - Go to WordPress Admin → `Pages` → `Add New`
   - Title: "Find Doctors"
   - Page Template: Select "Doctors Page"
   - Publish the page

2. **Visit the Page**
   - Go to the published page
   - You should see the full React doctor consultation app

## 🔧 Development Workflow

### For Theme Development

1. **Edit PHP Templates**
   - Modify `header.php`, `index.php`, `footer.php`
   - Changes appear immediately

2. **Edit CSS**
   - Modify `style.css`
   - Changes appear immediately

### For React Development

1. **Start Development Mode**
   ```bash
   cd react-app
   npm run dev
   ```
   This runs webpack in watch mode - changes auto-rebuild

2. **Make Changes**
   - Edit files in `react-app/src/`
   - Webpack automatically rebuilds

3. **Build for Production**
   ```bash
   npm run build
   ```

## 🌐 Accessing Your Site

### Homepage
```
http://your-site.com/
```
- Shows the complete theme with PharmEasy header
- React component appears in the services section

### Doctors Page (if created)
```
http://your-site.com/your-doctors-page/
```
- Shows dedicated React doctor consultation app
- Full interactive experience

## 🎨 What You'll See

### Header Features
- ✅ PharmEasy logo with "Take it easy" tagline
- ✅ Express delivery information
- ✅ Search bar for medicines
- ✅ User login, offers, and cart
- ✅ Navigation menu

### React Component Features
- ✅ Doctor search functionality
- ✅ Filter by medical specialization
- ✅ Interactive doctor cards
- ✅ Responsive design
- ✅ Booking system

## 🐛 Troubleshooting

### Theme Not Loading
1. **Check WordPress Installation**
   - Ensure WordPress is properly installed
   - Check file permissions

2. **Check Theme Activation**
   - Go to Appearance → Themes
   - Ensure "Doctor consult" is activated

### React Component Not Showing
1. **Check JavaScript Console**
   - Open browser developer tools (F12)
   - Look for JavaScript errors

2. **Verify React Bundle**
   ```bash
   ls -la js/react-bundle.js
   ```
   File should exist and have content

3. **Check Network Tab**
   - Ensure React CDN files load
   - Ensure react-bundle.js loads

### Build Errors
1. **Node.js Issues**
   ```bash
   node --version
   npm --version
   ```

2. **Permission Issues**
   ```bash
   chmod +x build.sh
   ```

3. **Dependency Issues**
   ```bash
   cd react-app
   rm -rf node_modules package-lock.json
   npm install
   ```

## 📱 Testing

### Desktop Testing
- Test in Chrome, Firefox, Safari, Edge
- Verify responsive design at different screen sizes

### Mobile Testing
- Test on actual mobile devices
- Use browser developer tools mobile view

### Functionality Testing
- ✅ Header search works
- ✅ React doctor search works
- ✅ React filters work
- ✅ Booking buttons respond
- ✅ Navigation works

## 🚀 Going Live

### For Production Deployment

1. **Build React App**
   ```bash
   npm run build
   ```

2. **Upload to Server**
   - Upload entire theme folder to `/wp-content/themes/`
   - Ensure file permissions are correct

3. **Activate Theme**
   - Activate in WordPress admin

4. **Clear Caches**
   - Clear any WordPress caches
   - Clear CDN caches if using

## 📞 Support

### Common Issues
- **React not loading**: Check browser console, verify CDN links
- **Styles not applied**: Check CSS file permissions, clear cache
- **Build failing**: Check Node.js version, reinstall dependencies

### Getting Help
1. Check browser console for errors
2. Verify all files exist and have correct permissions
3. Test with a fresh WordPress installation if needed

## 🎉 Success!

Once everything is working, you'll have:
- ✅ A beautiful PharmEasy-style WordPress theme
- ✅ Interactive React doctor consultation app
- ✅ Responsive design for all devices
- ✅ Professional healthcare website

Happy coding! 🚀
