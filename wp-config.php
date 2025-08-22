<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wpdb_wordpress' );

/** Database username */
define( 'DB_USER', 'alexwp' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'v&ebq|x$ 0<&f7Te$>mi=YZ>V`d8[DQ /7_EMbN12*jm;c#ku>Z/fW)GNW`rVMo0' );
define( 'SECURE_AUTH_KEY',   '6$`W<HSfy.M%+PFf$^CPRkv t[Ig8dfO!2$4Y2hF iKv6)t4}O/ Ab$-S(nF>w0;' );
define( 'LOGGED_IN_KEY',     'QhUU^!MY]~7p<^<XS6!X>KKYJPc@ ql[UvS?:gQfJ+,%)62,Bd5&n]+IhcJD,U1A' );
define( 'NONCE_KEY',         'CyfX4^LIc/EJz9JWZ hqbV+ZCgdgjKM]$6p*Y;I}-KX[]mKq2@*n9!`!.sVDr8h?' );
define( 'AUTH_SALT',         'Bs.E|;sJhL>4^fX7q.3O.0i#Ut)~O)Yzg}^;i`v[_&fM|M^HRiiy-qf:PSfP@mU4' );
define( 'SECURE_AUTH_SALT',  'p.ve3ZSdPJP+6k*X:%Low@c-}?%]B2k?mOUs;mMRbSg$yk1X1y)5.h%/!FSisW8D' );
define( 'LOGGED_IN_SALT',    '#4l/WHq7DzEE3eS/8&2p }K@bS+8 VS?Z:oe*mM{ biq~Al]9:3;e!a2[adv.t4l' );
define( 'NONCE_SALT',        'VLL%Lw,M|XlQ3^H7u^3Z:u8@vW|S,KcPm@kCYUIKyCwl)cD57TU7}z5w2UL}={wR' );
define( 'WP_CACHE_KEY_SALT', 'Xs$Gp^g9hURztxq^fadzM6anp_2O+M<(?3|_^E|SpndIIZ+G4a7`5Y _U%T;A?vt' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
