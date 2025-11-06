<?php
/**
 * Specialities Component
 * Displays medical specialities in a carousel format
 */

// Fetch specialities data from database
global $wpdb;

// Use wp_ prefix for local, no prefix for staging/production
if (defined('WP_ENVIRONMENT') && WP_ENVIRONMENT === 'local') {
    $table_name = $wpdb->prefix . 'specialities'; // Local: wp_specialities
} else {
    $table_name = 'specialities'; // Staging/Production: specialities
}

// Check if table exists
$table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") === $table_name;

// Fetch all specialities from database
$specialities_results = null;
if ($table_exists) {
    $specialities_results = $wpdb->get_results("SELECT id, title, description, link FROM $table_name ORDER BY id ASC");
    
    // Check for query errors
    if ($wpdb->last_error) {
        error_log('Specialities query error: ' . $wpdb->last_error);
    }
}

// Transform database results into the format expected by carousel
$specialities_data = array();
if ($specialities_results) {
    foreach ($specialities_results as $speciality) {
        $specialities_data[] = array(
            'title' => $speciality->title,
            'description' => $speciality->description,
            'image' => get_template_directory_uri() . '/assets/images/doctor.svg',
            'link' => $speciality->link
        );
    }
} else {
    // Log error if table exists but has no data
    if ($table_exists) {
        error_log('No specialities found in table ' . $table_name);
    } else {
        error_log('Table ' . $table_name . ' does not exist in database');
    }
}

// Carousel configuration
$config = array(
    'title' => '20+ Specialities',
    'view_all_text' => 'View all Specialities',
    'view_all_link' => '#all-specialities',
    'items_per_view' => 2.5,
    'card_width' => 400, // Speciality cards need 400px width
    'show_navigation' => true,
    'show_dots' => false,
    'autoplay' => false,
    'autoplay_delay' => 4000,
    'card_template' => 'speciality',
    'container_class' => 'specialities-carousel',
    'wrapper_class' => 'specialities-wrapper'
);

// Include the carousel function
require_once get_template_directory() . '/includes/core/carousel-function.php';

// Render the carousel for desktop
echo render_carousel($specialities_data, $config);

// Render mobile list
?>
<div class="specialities-mobile-list">
    <div class="specialities-mobile-header">
        <h2 class="specialities-mobile-title"><?php echo esc_html($config['title']); ?></h2>
    </div>
    
    <div class="specialities-mobile-cards">
        <?php foreach ($specialities_data as $index => $item): ?>
                <?php 
                // Use the same card template as the carousel
                $template_file = get_template_directory() . '/includes/components/cards/speciality-card.php';
                if (file_exists($template_file)) {
                    include $template_file;
                }
                ?>
        <?php endforeach; ?>
    </div>
    
    <div class="specialities-mobile-footer">
        <a href="<?php echo esc_url($config['view_all_link']); ?>" class="specialities-mobile-view-all">
            View all
        </a>
    </div>
</div>

<style>
/* Specialities specific styles */
.specialities-carousel {
    padding: 0 20px;
    max-width: 980px;
    margin-bottom: 64px;
}

.specialities-carousel .carousel-title {
    font-family: Inter;
    font-weight: 600;
    font-style: Semi Bold;
    font-size: 22px;
    line-height: 28px;
    letter-spacing: 0;
}

.specialities-carousel .carousel-view-all {
    background-color: transparent;
    border: 1px solid #20B2AA;
    color: #20B2AA;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
}

.specialities-carousel .carousel-view-all:hover {
    background-color: #20B2AA;
    color: white;
    text-decoration: none;
}

/* Mobile List Styles */
.specialities-mobile-list {
    display: none;
    margin: 0;
    padding: 0 16px;
    margin-bottom: 24px;
}

.specialities-mobile-header {
    margin-bottom: 24px;
}

.specialities-mobile-title {
    font-family: Inter;
    font-weight: 600;
    font-size: 18px;
    line-height: 24px;
    margin: 0;
    color: #333;
}

.specialities-mobile-cards {
    display: flex;
    flex-direction: column;
    gap: 16px;
    margin-bottom: 24px;
}


.specialities-mobile-footer {
    text-align: center;
}

.specialities-mobile-view-all {
    width: 100%;
    display: inline-block;
    background-color: transparent;
    border: 1px solid #20B2AA;
    color: #20B2AA;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
    transition: all 0.3s ease;
}

.specialities-mobile-view-all:hover {
    background-color: #20B2AA;
    color: white;
    text-decoration: none;
}

/* Responsive Behavior */
@media (max-width: 768px) {
    /* Hide carousel on mobile */
    .specialities-carousel {
        display: none;
        margin-bottom: 0px;
    }
    
    /* Show mobile list on mobile */
    .specialities-mobile-list {
        display: block;
    }
}
</style>
