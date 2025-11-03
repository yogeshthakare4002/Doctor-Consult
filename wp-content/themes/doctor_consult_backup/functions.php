<?php
/**
 * Doctor Consult Theme Functions
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

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
}
add_action('after_setup_theme', 'doctor_consult_setup');

/**
 * Enqueue scripts and styles
 */
function doctor_consult_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('doctor-consult-style', get_stylesheet_uri(), array(), '1.0.0');
    
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
    
    // Enqueue Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
    
    // Enqueue React from CDN
    wp_enqueue_script('react', 'https://unpkg.com/react@18/umd/react.production.min.js', array(), '18.2.0', true);
    wp_enqueue_script('react-dom', 'https://unpkg.com/react-dom@18/umd/react-dom.production.min.js', array('react'), '18.2.0', true);
    
    // Enqueue React bundle
    wp_enqueue_script('doctor-consult-react', get_template_directory_uri() . '/js/react-bundle.js', array('react', 'react-dom'), '1.0.0', true);
    
    // Enqueue custom JavaScript
    wp_enqueue_script('doctor-consult-script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0.0', true);
    
    // Localize script for AJAX
    wp_localize_script('doctor-consult-react', 'doctorConsultAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('doctor_consult_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'doctor_consult_scripts');

/**
 * Add custom body classes
 */
function doctor_consult_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'home-page';
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
 * Customizer additions
 */
function doctor_consult_customize_register($wp_customize) {
    // Add logo section
    $wp_customize->add_section('doctor_consult_logo', array(
        'title'    => __('Logo', 'doctor-consult'),
        'priority' => 30,
    ));
    
    // Add logo setting
    $wp_customize->add_setting('doctor_consult_logo', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    // Add logo control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'doctor_consult_logo', array(
        'label'    => __('Upload Logo', 'doctor-consult'),
        'section'  => 'doctor_consult_logo',
        'settings' => 'doctor_consult_logo',
    )));
}
add_action('customize_register', 'doctor_consult_customize_register');

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
?>
