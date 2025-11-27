<?php
/**
 * Breadcrumb Header Component
 * Combines breadcrumb, searchbox, and language switcher
 */

if (!defined('ABSPATH')) {
    exit;
}

$breadcrumb_items = get_query_var('breadcrumb_items');

if (!is_array($breadcrumb_items) || empty($breadcrumb_items)) {
  $is_hindi = strpos($_SERVER['REQUEST_URI'], '/hi') !== false;
  $home_url = 'https://pharmeasy.in';
  $home_text = $is_hindi ? 'होम' : __('Home', 'pe-theme');
  $current_title = $is_hindi ? 'ऑनलाइन डॉक्टर परामर्श' : __('Online Doctor Consultation', 'pe-theme');

  $breadcrumb_items = [
      [
          'title' => $home_text,
          'link'  => $home_url,
      ],
      [
          'title' => $current_title,
          'link'  => '',
      ],
  ];
}

set_query_var('breadcrumb_items', $breadcrumb_items);
?>

<section class="breadcrumb-header">
  <div class="breadcrumb-header__container">
    <!-- Breadcrumb Component -->
    <div class="breadcrumb-header__item breadcrumb-header__trail">
      <?php get_template_part('common-components/breadcrumb', null, ['items' => $breadcrumb_items]); ?>
    </div>

    <!-- Hindi Language Switch Component -->
    <div class="breadcrumb-header__item breadcrumb-header__language-switch">
      <?php get_template_part('common-components/hindi-lang'); ?>
    </div>
  </div>
</section>

<style>
.breadcrumb-header {
  width: 100%;
  background: #FFFFFF;
  border-bottom: 1px solid #E2E8F0;
  padding: 24px 0 48px 0;
}

.breadcrumb-header__container {
  max-width: 928px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 24px;
}

.breadcrumb-header__item {
  display: flex;
  align-items: center;
}

.breadcrumb-header__trail {
  flex-shrink: 0;
}

.breadcrumb-header__search {
  flex: 1;
  display: flex;
  justify-content: center;
  max-width: 600px;
}

.breadcrumb-header__language-switch {
  flex-shrink: 0;
}

/* Responsive Layout */
@media (max-width: 1024px) {
  .breadcrumb-header__container {
    gap: 16px;
  }

  .breadcrumb-header__search {
    max-width: 400px;
  }
}

@media (max-width: 768px) {
  .breadcrumb-header {
    display: none;
  }
}
</style>

