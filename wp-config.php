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
define( 'WP_ENVIRONMENT', 'staging' ); // Change this based on your environment


// Staging Database (Hostinger)
define( 'DB_NAME', 'u914396707_DC_Stagging' );
define( 'DB_USER', 'u914396707_DC_Stagging' );
define( 'DB_PASSWORD', 'Instinct_2025' );
define( 'DB_HOST', '193.203.184.146:3306' );

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
define( 'AUTH_KEY',         '41wi$+zK+}FEb |bEH#iO:n83lsGmqTkH-8J.kT_4JUE;nu<RjeRl_khNtID-KNl' );
define( 'SECURE_AUTH_KEY',  'v,MLICHr4z66=[@*tgA4+*$ANod-nw>asLq7|S$XY,/#yQ!|JpnJg?8SB&I<LQ^f' );
define( 'LOGGED_IN_KEY',    '-|J=&Pg[;+XSM<KBLWOM)Xa`E?;Q8-~UR5IXF1%KdQSBAlW5u3!>qWp7YHz|<S2I' );
define( 'NONCE_KEY',        'Q3$+e3uX+dQ!t$6H0$#vdcF9,bsBWZyYQoO-B[,rSDiuS%pmI2;p-[Ek@nm|NKB}' );
define( 'AUTH_SALT',        '~T.o>%14de:_bTgX7f)4)4FfO;gw1Sf`RBW_[A,@3.!Zh^y !w#{Widp%|P{n?X/' );
define( 'SECURE_AUTH_SALT', ')!nZ&pmv}tX9X{9`ga7yCgnnYeL=bf~8w6Y@@Sev-;kdcqOLlNI3?UnPPTRZ>Ia:' );
define( 'LOGGED_IN_SALT',   'd?* /O7$o+BD]!,Xq&6e&Q)y:u/7^P516NELCu+|[8%1F`gP@e_uZ|{-#;yY7u$v' );
define( 'NONCE_SALT',       '}`6`>|93z:1H8_ZGf)MzbE9-v[1j+-Gpr=)fl|S0wAEqZ`2VZaNg?|%D--aa-`|8' );

/**#@-*/

/**
 * WordPress database table prefix.
 */
$table_prefix = 'pe_';

/**
 * For developers: WordPress debugging mode.
 */
define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'WP_DEBUG_DISPLAY', false );
/* Add any custom values between this line and the "stop editing" line. */
/* That's all, stop editing! Happy publishing. */
define('WP_MEMORY_LIMIT', '512M');


/* Add any custom values between this line and the "stop editing" line. */

// ** WordPress URLs ** //
// Allow localhost URLs when running locally with staging DB
// Change to staging URL when deploying to staging server
if (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'localhost') !== false) {
    define( 'WP_HOME', 'http://localhost:8000' );
    define( 'WP_SITEURL', 'http://localhost:8000' );
} else {
    define( 'WP_HOME', 'https://wpstaging.pharmeasy.in' );
    define( 'WP_SITEURL', 'https://wpstaging.pharmeasy.in' );
}

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
