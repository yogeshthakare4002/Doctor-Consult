const browserSync = require('browser-sync').create();

// Replace 'localhost/mysite' with your local WordPress URL
browserSync.init({
  proxy: "http://localhost/mysite",
  files: [
    "**/*.php",
    "**/*.css",
    "**/*.js"
  ],
  open: false,
  notify: false,
  ghostMode: false
});
