<?php
/**
 * The base configuration for WordPress
 *
 * IMPORTANT: Copy this file to wp-config.php and fill in your database details
 * This is a template file - do NOT add real credentials here
 *
 * @package WordPress
 */

// ** Environment Configuration ** //
// Set your environment: 'local', 'staging', or 'production'
define( 'WP_ENVIRONMENT', 'local' ); // Change this based on your environment

// ** Database settings - You can get this info from your web host ** //
if ( WP_ENVIRONMENT === 'local' ) {
    // Local Development Database
    define( 'DB_NAME', 'wordpress_db' );
    define( 'DB_USER', 'root' );
    define( 'DB_PASSWORD', '' );
    define( 'DB_HOST', 'localhost:8000' );
} elseif ( WP_ENVIRONMENT === 'staging' ) {
    // Staging Database (Hostinger)
    define( 'DB_NAME', 'u914396707_doctor_consult' );
    define( 'DB_USER', 'u914396707_iipl_2025' );
    define( 'DB_PASSWORD', 'Instinct_2025' );
    define( 'DB_HOST', '193.203.184.146:3306' );
} else {
    // Production Database (Hostinger)
    define( 'DB_NAME', 'your_production_db_name' );
    define( 'DB_USER', 'your_production_db_user' );
    define( 'DB_PASSWORD', 'your_production_db_password' );
    define( 'DB_HOST', 'localhost' );
}


/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * WordPress caching settings.
 */
define('WP_CACHE', false);

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'put your unique phrase here' );
define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
define( 'NONCE_KEY',        'put your unique phrase here' );
define( 'AUTH_SALT',        'put your unique phrase here' );
define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
define( 'NONCE_SALT',       'put your unique phrase here' );

/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );


/* Add any custom values between this line and the "stop editing" line. */

// ** WordPress URLs ** //
if ( WP_ENVIRONMENT === 'local' ) {
    define( 'WP_HOME', 'http://localhost:8000' );
    define( 'WP_SITEURL', 'http://localhost:8000' );
} elseif ( WP_ENVIRONMENT === 'staging' ) {
    define( 'WP_HOME', 'https://stagingdoctorconsult.pharmeasy.in' );
    define( 'WP_SITEURL', 'https://stagingdoctorconsult.pharmeasy.in' );
}

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
