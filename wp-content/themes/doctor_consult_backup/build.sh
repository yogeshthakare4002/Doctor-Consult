#!/bin/bash

# Build script for Doctor Consult WordPress Theme with React

echo "🏗️  Building Doctor Consult Theme..."

# Navigate to react-app directory
cd react-app

# Install dependencies if node_modules doesn't exist
if [ ! -d "node_modules" ]; then
    echo "📦 Installing npm dependencies..."
    npm install
fi

# Build React app
echo "⚛️  Building React app..."
npm run build

# Check if build was successful
if [ $? -eq 0 ]; then
    echo "✅ React app built successfully!"
    echo "📁 Bundle created at: ../js/react-bundle.js"
else
    echo "❌ Build failed!"
    exit 1
fi

# Go back to theme directory
cd ..

echo "🎉 Theme build complete!"
echo ""
echo "📋 Next steps:"
echo "1. Activate the theme in WordPress admin"
echo "2. Create a new page and assign 'Doctors Page' template"
echo "3. Visit the page to see the React component in action"
echo ""
echo "🔧 For development:"
echo "- Run 'cd react-app && npm run dev' for watch mode"
echo "- Make changes to React components in react-app/src/"
echo "- Rebuild with './build.sh' when done"
