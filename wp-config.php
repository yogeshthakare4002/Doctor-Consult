<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Environment Configuration ** //
// Set your environment: 'local', 'staging', or 'production'
define( 'WP_ENVIRONMENT', 'local' );

// ** Database settings - You can get this info from your web host ** //
if ( WP_ENVIRONMENT === 'local' ) {
    // Local Development Database
    define( 'DB_NAME', 'wordpress_db' );
    define( 'DB_USER', 'root' );
    define( 'DB_PASSWORD', '' );
    define( 'DB_HOST', 'localhost' );
} elseif ( WP_ENVIRONMENT === 'staging' ) {
    // Staging Database (Hostinger)
    define( 'DB_NAME', 'u914396707_doctor_consult' );
    define( 'DB_USER', 'u914396707_instinct_IIPL' );
    define( 'DB_PASSWORD', 'Instinct_2025' );
    define( 'DB_HOST', 'localhost' );
} else {
    // Production Database (Hostinger)
    define( 'DB_NAME', 'u914396707_doctor_consult' );
    define( 'DB_USER', 'u914396707_instinct_IIPL' );
    define( 'DB_PASSWORD', 'Instinct_2025' );
    define( 'DB_HOST', 'localhost' );
}

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * WordPress caching settings.
 *
 * Enable or disable the WordPress object cache.
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/#wp_cache
 */
define('WP_CACHE', false);

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         't~wwu;Z`?.H$Yc&yG0GTMc,U&@48U`DRAoPZU?S= S6H.tXXoE3@j >^DbB7z_r_' );
define( 'SECURE_AUTH_KEY',  '`XUD8W#gwP=Uc,]B3R0lnFh6,Rp,PifxorxijD>^{F8UfzFZ}$2L>s5lL50YmAWZ' );
define( 'LOGGED_IN_KEY',    '+3Ur?,?6Ial:Ps}Sx;avLl7GLoLWRHaZ@$Z-~]l=QJ$.:TPg:Ex@Ce]Pw(Pm43du' );
define( 'NONCE_KEY',        ')4_q!_jpv~$9H u(}]A @v7o3vSBXwMMe~*v/UJ5}0ntf,.Z?xGiD.P~y5<8kf=O' );
define( 'AUTH_SALT',        'y]OT~YZY!QbXj r2tl=:VqMyR2}%Lr#fdsTh8r7*Wjo3U:X0U~CMI%Ixpk<+~`8f' );
define( 'SECURE_AUTH_SALT', 'tB7:GDi,,wa!DY2feVlz;5WRw~2@-Y].O2 ^[%8gj+Ze*c9SV2lZ-m?g&B*xfS0?' );
define( 'LOGGED_IN_SALT',   'P.%9MTo nbY*KNFyAZ~&BdAuajmo&n8q@SIi/>XiV6CKjwT!>s76!bBO`R2[Y~)u' );
define( 'NONCE_SALT',       '$X-n-tS/tT.(qJOvNE:>gI~d^~^LwFAGv#UX9.#nBfNY:zol vj*s$We<[z)86E1' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
