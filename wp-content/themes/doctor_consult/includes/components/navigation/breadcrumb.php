<?php
/**
 * Breadcrumb Component
 * Displays navigation breadcrumb trail
 */

// Check if we're on Hindi version
$current_url = $_SERVER['REQUEST_URI'];
$is_hindi = strpos($current_url, '/hi') !== false || strpos($current_url, '/hi/') !== false;

// Get current page title (can be customized per page)
if ($is_hindi) {
    $current_page = isset($breadcrumb_current) ? $breadcrumb_current : 'ऑनलाइन डॉक्टर परामर्श';
    $home_text = 'होम';
} else {
    $current_page = isset($breadcrumb_current) ? $breadcrumb_current : 'Online Doctor Consultation';
    $home_text = 'Home';
}

// Build home URL - remove /hi if present
$home_url = home_url('/');
if ($is_hindi) {
    // Remove /hi from the URL for home link
    $home_url = str_replace('/hi', '', $home_url);
    $home_url = str_replace('/hi/', '/', $home_url);
}
?>

<nav class="breadcrumb-component" aria-label="Breadcrumb">
  <ol class="breadcrumb-list">
    <li class="breadcrumb-item">
      <a href="<?php echo esc_url($home_url); ?>" class="breadcrumb-link"><?php echo esc_html($home_text); ?></a>
    </li>
    <li class="breadcrumb-separator" aria-hidden="true">
      <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.800049 0.800003L4.80005 4.8L0.800049 8.8" stroke="#30363C" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </li>
    <li class="breadcrumb-item breadcrumb-current" aria-current="page">
      <span><?php echo esc_html($current_page); ?></span>
    </li>
    <li class="breadcrumb-separator" aria-hidden="true">
      <svg width="6" height="10" viewBox="0 0 6 10" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M0.800049 0.800003L4.80005 4.8L0.800049 8.8" stroke="#10847E" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
      </svg>
    </li>
  </ol>
</nav>

<style>
.breadcrumb-component {
  display: inline-flex;
  align-items: center;
}

.breadcrumb-list {
  display: flex;
  align-items: center;
  list-style: none;
  margin: 0;
  padding: 0;
  gap: 8px;
}

.breadcrumb-item {
  display: flex;
  align-items: center;
}

.breadcrumb-link {
    font-family: Inter;
    font-weight: 700;
    font-style: Bold;
    font-size: 18px;
    line-height: 26px;
    letter-spacing: 0px;
    color: #30363C;
    text-decoration: none;
    transition: color 0.2s ease;
}

.breadcrumb-link:hover {
  color: #10847E;
}

.breadcrumb-separator {
  font-family: Inter, sans-serif;
  font-size: 14px;
  font-weight: 400;
  color: #30363C;
}

.breadcrumb-current span {
    font-family: Inter;
    font-weight: 700;
    font-style: Bold;
    font-size: 18px;
    line-height: 26px;
    letter-spacing: 0px;
    color: #10847E;
}

@media (max-width: 768px) {
  .breadcrumb-link,
  .breadcrumb-separator,
  .breadcrumb-current span {
    font-size: 12px;
  }
}
</style>

