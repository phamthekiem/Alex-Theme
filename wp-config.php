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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */

define( 'WP_HOME', 'https://alex.dragoon.vn' ); 
define( 'WP_SITEURL', 'https://alex.dragoon.vn' );

define( 'DB_NAME', 'wpdb_wordpress' );

/** Database username */
define( 'DB_USER', 'wpuser' );

/** Database password */
define( 'DB_PASSWORD', 'wp@123' );

/** Database hostname */
define( 'DB_HOST', 'db' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'm71lmbpxlk3wkfqte88z7c8h50wwcqqvh0hee4n28tnybs748kwwdx8v1rs0q16u' );
define( 'SECURE_AUTH_KEY',  'o8wjclvtblett9rnwtolepcqhpna8ds6ff8szvwuu7pijs7znslpnokupjrmdwuw' );
define( 'LOGGED_IN_KEY',    '9yw248witoov3jcjc7btc2hpuohtqhou6qxtwvynnojonh6aqyjhnpizvt5fkhes' );
define( 'NONCE_KEY',        'bs3vblveh430xc6qca4hinhewcwxz34jsxjssr4l0pvpcxq2h6jjwzex0atewvn6' );
define( 'AUTH_SALT',        'cwceanf5ywhymux7zn3uvmvdaqc0jrcehsm3bgqoo19wlu1m2bpv3jd0rrhjtknm' );
define( 'SECURE_AUTH_SALT', 'uxdnsomvnhxfp8fnhsxd1x5l3oi3ertfkbmkycscjvvzxt7lak2iy2gwwxbopi8u' );
define( 'LOGGED_IN_SALT',   'g8xmdiucjdwlmimeus3ogqyjf4wxryy03teyn2oik7zhun1hjdlguipdpbrq3xow' );
define( 'NONCE_SALT',       'goqkt7ucvuwe85xugli5znciwoxauvwj9wodhigx25q0govqgn2lss46xrpfx84e' );

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
$table_prefix = 'wpjw_';

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

define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
