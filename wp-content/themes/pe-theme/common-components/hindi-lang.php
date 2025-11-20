<?php
/**
 * Hindi Language Switch Component
 * Button to switch site language between Hindi and English
 */

// Check if we're on Hindi version
$current_url_path = $_SERVER['REQUEST_URI'];
$is_hindi = preg_match('#^/hi(/|$)#', $current_url_path);

// Set button text and aria label based on current language
if ($is_hindi) {
    $button_text = 'Read in English';
    $aria_label = 'Switch to English';
} else {
    $button_text = 'हिंदी में पढ़ें';
    $aria_label = 'Switch to Hindi';
}
?>

<div class="hindi-lang-component">
  <button type="button" class="hindi-lang-button" aria-label="<?php echo esc_attr($aria_label); ?>">
    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" class="lang-icon">
      <text x="2" y="14" font-family="Arial" font-size="12" font-weight="700" fill="#10847E">A</text>
      <text x="10" y="14" font-family="Arial" font-size="12" font-weight="700" fill="#10847E">अ</text>
    </svg>
    <span class="hindi-lang-text"><?php echo esc_html($button_text); ?></span>
  </button>
</div>

<style>
.hindi-lang-component {
  display: inline-flex;
}

.hindi-lang-button {
  display: flex;
  align-items: center;
  gap: 8px;
  padding: 8px 16px;
  background: #FFFFFF;
  border: 1.5px solid #10847E;
  border-radius: 8px;
  cursor: pointer;
  transition: all 0.2s ease;
}

.hindi-lang-button:hover {
  background: #F5F8FC;
  border-color: #0D6B63;
}

.hindi-lang-button:active {
  transform: scale(0.98);
}

.lang-icon {
  flex-shrink: 0;
}

.hindi-lang-text {
  font-family: Inter, sans-serif;
  font-size: 14px;
  font-weight: 600;
  line-height: 20px;
  color: #10847E;
  white-space: nowrap;
}

@media (max-width: 768px) {
  .hindi-lang-button {
    padding: 6px 12px;
  }
  
  .hindi-lang-text {
    font-size: 12px;
  }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const hindiButton = document.querySelector('.hindi-lang-button');

  hindiButton.addEventListener('click', function() {
    const url = new URL(window.location.href);
    let path = url.pathname;

    const isHindi = path.startsWith('/hi/');

    if (isHindi) {
      url.pathname = path.replace(/^\/hi/, '') || '/';
    } else {
      url.pathname = '/hi' + (path === '/' ? '' : path);
    }

    window.location.href = url.href;
  });
});
</script>


<!-- <script>
document.addEventListener('DOMContentLoaded', function() {
  const hindiButton = document.querySelector('.hindi-lang-button');
  
  hindiButton.addEventListener('click', function() {
    // Get current URL
    let currentUrl = window.location.href;
    
    // Check if we're already on Hindi version
    const isHindi = currentUrl.includes('/hi/') || currentUrl.includes('/hi');
    
    if (isHindi) {
      // Switch back to English - remove /hi from URL
      let newUrl = currentUrl.replace('/hi/', '/').replace('/hi', '');
      window.location.href = newUrl;
    } else {
      // Switch to Hindi - add /hi to URL
      const isLocalhost = currentUrl.includes('localhost');
      
      if (isLocalhost) {
        // For localhost, use localhost:8000/hi
        const baseUrl = currentUrl.split('localhost')[0] + 'localhost';
        const pathAfterPort = currentUrl.split(/localhost:\d+/)[1] || '';
        
        // Redirect to localhost:8000/hi + current path
        window.location.href = baseUrl + ':8000/hi' + pathAfterPort;
      } else {
        // For production, add /hi to the path
        const url = new URL(currentUrl);
        url.pathname = '/hi' + url.pathname;
        window.location.href = url.href;
      }
    }
  });
});
</script> -->

