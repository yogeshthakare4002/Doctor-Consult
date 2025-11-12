<?php
/**
 * Doctor Consult Theme Functions
 * Simple PHP-based WordPress theme with database integration
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Database setup removed - frontend uses hardcoded data and different tables (specialities, popular_conditions)

/**
 * Theme setup
 */
function doctor_consult_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('custom-header');
    add_theme_support('custom-background');
}
add_action('after_setup_theme', 'doctor_consult_setup');

/**
 * Enqueue theme styles and scripts
 */
function doctor_consult_enqueue_scripts() {
    // Get theme directory URL
    $theme_url = get_template_directory_uri();
    
    // Enqueue Google Fonts
    wp_enqueue_style(
        'google-fonts', 
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=DM+Serif+Display:ital@0;1&display=swap',
        array(),
        null
    );
    
    // Enqueue component CSS files
    wp_enqueue_style(
        'doctor-consult-base',
        $theme_url . '/css/base.css',
        array('google-fonts'),
        '3.0.0'
    );
    
    wp_enqueue_style(
        'doctor-consult-header',
        $theme_url . '/css/header.css',
        array('doctor-consult-base'),
        '3.0.0'
    );
    
    wp_enqueue_style(
        'doctor-consult-footer',
        $theme_url . '/css/footer.css',
        array('doctor-consult-base'),
        '3.0.0'
    );
    
    wp_enqueue_style(
        'carousel-component',
        $theme_url . '/css/carousel.css',
        array('doctor-consult-base'),
        '3.0.0'
    );
    
    // Enqueue theme JavaScript (if needed for interactive features)
    wp_enqueue_script(
        'doctor-consult-script',
        $theme_url . '/core/theme.js',
        array('jquery'),
        '3.0.0',
        true
    );
    
    // Enqueue carousel JavaScript
    wp_enqueue_script(
        'carousel-component',
        $theme_url . '/core/carousel.js',
        array('jquery'),
        '4.0.0',
        true
    );
    
    
    // Localize script for WordPress data
    wp_localize_script('doctor-consult-script', 'doctorConsultData', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('doctor_consult_nonce'),
        'siteUrl' => home_url(),
        'apiUrl' => rest_url('wp/v2/'),
        'themeUrl' => $theme_url,
    ));
    
    // Localize carousel script with configurations
    wp_localize_script('carousel-component', 'carouselConfigs', array());
}
add_action('wp_enqueue_scripts', 'doctor_consult_enqueue_scripts');



/**
 * Get custom page template path based on page slug
 * 
 * @param string $page_slug The page slug
 * @return string|false Template path if found, false otherwise
 */
function doctor_consult_get_page_template($page_slug) {
    if (empty($page_slug)) {
        return false;
    }
    
    // Direct slug match
    $template_file = 'pages/' . $page_slug . '/page-' . $page_slug . '.php';
    $template_path = get_template_directory() . '/' . $template_file;
    
    if (file_exists($template_path)) {
        return $template_path;
    }
    
    // Try slug with underscores instead of hyphens
    $slug_underscore = str_replace('-', '_', $page_slug);
    if ($slug_underscore !== $page_slug) {
        $template_file = 'pages/' . $slug_underscore . '/page-' . $slug_underscore . '.php';
        $template_path = get_template_directory() . '/' . $template_file;
        if (file_exists($template_path)) {
            return $template_path;
        }
    }
    
    // Special mappings for common variations
    $template_mappings = array(
        'online-doctor-consultation' => 'pages/doctor-consultation/page-doctor-consultation.php',
        'doctor_consultation' => 'pages/doctor-consultation/page-doctor-consultation.php',
    );
    
    if (isset($template_mappings[$page_slug])) {
        $template_path = get_template_directory() . '/' . $template_mappings[$page_slug];
        if (file_exists($template_path)) {
            return $template_path;
        }
    }
    
    // Check if slug contains "doctor" and "consultation" - use doctor-consultation template
    if (stripos($page_slug, 'doctor') !== false && stripos($page_slug, 'consultation') !== false) {
        $template_file = 'pages/doctor-consultation/page-doctor-consultation.php';
        $template_path = get_template_directory() . '/' . $template_file;
        if (file_exists($template_path)) {
            return $template_path;
        }
    }
    
    return false;
}

/**
 * Add custom body classes
 */
function doctor_consult_body_classes($classes) {
    $classes[] = 'doctor-consult-theme';
    $classes[] = 'php-theme';
    
    if (is_front_page()) {
        $classes[] = 'home-page';
    }
    
    if (is_page('doctors')) {
        $classes[] = 'doctors-page';
    }
    
    return $classes;
}
add_filter('body_class', 'doctor_consult_body_classes');

/**
 * Register navigation menus
 */
function doctor_consult_menus() {
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'doctor-consult'),
        'footer'  => __('Footer Menu', 'doctor-consult'),
    ));
}
add_action('init', 'doctor_consult_menus');

/**
 * Remove WordPress version from head
 */
remove_action('wp_head', 'wp_generator');

/**
 * Add security headers
 */
function doctor_consult_security_headers() {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
    }
}
add_action('send_headers', 'doctor_consult_security_headers');


/**
 * Add theme activation hook
 */
function doctor_consult_theme_activation() {
    // Create custom post types, pages, etc.
    doctor_consult_create_default_pages();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'doctor_consult_theme_activation');

/**
 * Create default pages
 */
function doctor_consult_create_default_pages() {
    $pages = array(
        'Home' => array(
            'content' => 'Welcome to PharmEasy Doctor Consult. Find and book appointments with qualified doctors online.',
            'template' => 'page-home.php'
        ),
        'Doctors' => array(
            'content' => 'Find and book appointments with qualified doctors.',
            'template' => 'page-doctors.php'
        )
    );
    
    foreach ($pages as $title => $data) {
        $page = get_page_by_title($title);
        if (!$page) {
            wp_insert_post(array(
                'post_title' => $title,
                'post_content' => $data['content'],
                'post_status' => 'publish',
                'post_type' => 'page',
                'page_template' => $data['template']
            ));
        }
    }
}
?>