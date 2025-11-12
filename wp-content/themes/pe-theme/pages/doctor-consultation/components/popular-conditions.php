<?php
/**
 * Popular Conditions Treated Component
 * Displays medical conditions in desktop carousel and mobile flexbox wrap
 */

// Fetch popular conditions data from database
global $wpdb;

// Use wp_ prefix for local, no prefix for staging/production
if (defined('WP_ENVIRONMENT') && WP_ENVIRONMENT === 'local') {
    $table_name = $wpdb->prefix . 'popular_conditions'; // Local: wp_popular_conditions
} else {
    $table_name = 'popular_conditions'; // Staging/Production: popular_conditions
}

// Check if table exists
$table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;

// Fetch all popular conditions from database
$conditions_results = null;
if ($table_exists) {
    $conditions_results = $wpdb->get_results("SELECT id, title, image, link FROM $table_name ORDER BY id ASC");
    
    // Check for query errors
    if ($wpdb->last_error) {
        error_log('Popular conditions query error: ' . $wpdb->last_error);
    }
}

// Transform database results into the format expected by carousel
$conditions_data = array();
if ($conditions_results) {
    foreach ($conditions_results as $condition) {
        $conditions_data[] = array(
            'name' => $condition->title,
            'icon' => get_template_directory_uri() . '/assets/images/' . $condition->image,
            'link' => $condition->link
        );
    }
} else {
    // Log error if table exists but has no data
    if ($table_exists) {
        error_log('No popular conditions found in table ' . $table_name);
    } else {
        error_log('Table ' . $table_name . ' does not exist in database');
        
        // Show admin notice
        if (current_user_can('administrator')) {
            echo '<div style="background:#fff3cd;border:1px solid #ffc107;padding:15px;margin:20px;border-radius:5px;">';
            echo '<strong>⚠️ Popular Conditions Setup Required:</strong><br>';
            echo "Table '<code>$table_name</code>' not found.<br>";
            echo '<br><strong>To fix:</strong> Visit <a href="' . home_url('/import-popular-conditions.php') . '">import-popular-conditions.php</a>';
            echo '</div>';
        }
    }
}

// Debug: Show count
if (current_user_can('administrator') && defined('WP_DEBUG') && WP_DEBUG) {
    echo '<!-- Popular Conditions Debug: ' . count($conditions_data) . ' items loaded from ' . $table_name . ' -->';
}

// Carousel configuration for desktop
$carousel_config = array(
    'title' => 'Popular Conditions Treated',
    'view_all_text' => 'View all Doctors',
    'view_all_link' => '#all-doctors',
    'items_per_view' => 5,
    'card_width' => 100,
    'show_navigation' => true,
    'show_dots' => false,
    'autoplay' => false,
    'autoplay_delay' => 4000,
    'card_template' => 'condition',
    'container_class' => 'conditions-carousel-container',
    'wrapper_class' => 'conditions-carousel-wrapper'
);

// Include the carousel function
require_once get_template_directory() . '/common-components/carousel-function.php';

// Render the carousel for desktop
echo render_carousel($conditions_data, $carousel_config);
?>

<!-- Mobile Flexbox View -->
<div class="conditions-mobile">
    <div class="conditions-mobile-header">
        <h2 class="conditions-mobile-title">Popular Conditions Treated</h2>
    </div>
    
    <div class="conditions-grid">
        <?php 
        // Show first 7 conditions on mobile
        for ($i = 0; $i < min(7, count($conditions_data)); $i++): 
            $condition = $conditions_data[$i];
            $item = $condition;
            $index = $i;
            include get_template_directory() . '/pages/doctor-consultation/cards/condition-card.php';
        endfor; 
        ?>
        <!-- 20+ more card -->
        <?php 
        $show_more_data = array(
            'name' => '20+ more',
            'icon' => get_template_directory_uri() . '/assets/images/20-more.svg',
            'link' => '#show-more'
        );
        $item = $show_more_data;
        $index = 'more';
        include get_template_directory() . '/pages/doctor-consultation/cards/condition-card-more.php';
        ?>
    </div>
</div>

<style>
/* Desktop Carousel View */
.conditions-carousel-container {
    padding: 0 20px;
    max-width: 980px;
    margin-left: auto;
    margin-right: auto;
}

.conditions-carousel-container .carousel-title {
    font-family: Inter;
    font-weight: 600;
    font-size: 22px;
    line-height: 28px;
    color: #30363C;
}

.conditions-carousel-container .carousel-view-all {
    background: transparent;
    border: 1px solid #20B2AA;
    color: #20B2AA;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-family: Inter;
    font-weight: 500;
    font-size: 14px;
    line-height: 20px;
    transition: all 0.3s ease;
}

.conditions-carousel-container .carousel-view-all:hover {
    background: #20B2AA;
    color: white;
    text-decoration: none;
}

/* Mobile Flexbox View */
.conditions-mobile {
    display: none;
    margin: 40px 0;
    padding: 0 16px;
}

.conditions-mobile-header {
    margin-bottom: 16px;
}

.conditions-mobile-title {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 18px;
    line-height: 24px;
    letter-spacing: 0;
    color: #30363C;
}

.conditions-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
}

.conditions-grid .condition-card {
    flex: 0 0 76.5px;
    width: 76.5px;
    min-width: 76.5px;
    max-width: 76.5px;
    padding: 0px;
}

.conditions-grid .condition-icon {
    width: 70px;
    height: 48px;
}

.conditions-grid .condition-name {
    font-family: Inter;
    font-weight: 400;
    font-style: Regular;
    font-size: 12px;
    line-height: 16px;
    letter-spacing: 0;
    text-align: center;
    color: #30363C;
}


/* Mobile Responsive */
@media (max-width: 768px) {
    /* Hide desktop carousel on mobile */
    .conditions-carousel-container {
        display: none;
    }
    
    /* Show mobile grid on mobile */
    .conditions-mobile {
        display: block;
    }
    
    .conditions-grid {
        gap: 12px;
    }
}

@media (max-width: 480px) {
    .conditions-mobile {
        padding: 0 12px;
    }
    
    .conditions-grid {
        gap: 10px;
    }
}
</style>
