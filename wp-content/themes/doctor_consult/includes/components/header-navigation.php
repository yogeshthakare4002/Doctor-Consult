<?php
/**
 * Header Navigation Component
 * Combines breadcrumb, searchbox, and language switcher
 */
?>

<section class="header-navigation">
  <div class="header-navigation-container">
    
    <!-- Breadcrumb Component -->
    <div class="header-nav-item breadcrumb-wrapper">
      <?php include get_template_directory() . '/includes/components/breadcrumb.php'; ?>
    </div>
    
    <!-- Hindi Language Switch Component -->
    <div class="header-nav-item hindi-lang-wrapper">
      <?php include get_template_directory() . '/includes/components/hindi-lang.php'; ?>
    </div>
    
  </div>
</section>

<style>
.header-navigation {
  width: 100%;
  background: #FFFFFF;
  border-bottom: 1px solid #E2E8F0;
  padding: 16px 0;
}

.header-navigation-container {
  max-width: 928px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 24px;
}

.header-nav-item {
  display: flex;
  align-items: center;
}

.breadcrumb-wrapper {
  flex-shrink: 0;
}

.searchbox-wrapper {
  flex: 1;
  display: flex;
  justify-content: center;
  max-width: 600px;
}

.hindi-lang-wrapper {
  flex-shrink: 0;
}

/* Responsive Layout */
@media (max-width: 1024px) {
  .header-navigation-container {
    gap: 16px;
  }
  
  .searchbox-wrapper {
    max-width: 400px;
  }
}

@media (max-width: 768px) {
  .header-navigation {
    padding: 12px 0;
  }
  
  .header-navigation-container {
    flex-wrap: wrap;
    gap: 12px;
  }
  
  .breadcrumb-wrapper {
    order: 1;
    width: 100%;
  }
  
  .searchbox-wrapper {
    order: 2;
    flex: 1;
    max-width: none;
  }
  
  .hindi-lang-wrapper {
    order: 3;
  }
}

@media (max-width: 480px) {
  .header-navigation-container {
    padding: 0 12px;
  }
  
  .searchbox-wrapper {
    width: 100%;
  }
  
  .hindi-lang-wrapper {
    width: 100%;
  }
}
</style>

