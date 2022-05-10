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
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'woo_commerce' );

/** Database username */
define( 'DB_USER', 'root' );
define("FS_method", "direct");


/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'F)p6iM!{|^BNB?bOSKX+!(`#v,>nX x}4OBL6Mw$ykR}ty_ ]:UfW_G:fw?^RnO5' );
define( 'SECURE_AUTH_KEY',  ']+I9#SIwwYg%Nz=Z(1F/Of!}nX.fq`:%3Ww9~zh)wQ?`IP%[kH}jVq#9u9}|R7Ta' );
define( 'LOGGED_IN_KEY',    'nI8uT-p.X-2m]>vDtd4Sn3?K/B}zl=ei}_fe}xJQ$}9,BJD]E;M^x0 Gl[ecCfSQ' );
define( 'NONCE_KEY',        'U]*gb/h@9M(ovvBd}7]-zErlgm5&3WOZGKGPpgkG>EacR()XXDtxBK8I^qAhg}0h' );
define( 'AUTH_SALT',        '-}SBa)-!3JEWu@2A* fN=yR!q9z|;U/6?tMcQDo$mY}DKpA@?-nVz5AGp6}P!^[T' );
define( 'SECURE_AUTH_SALT', 'z)Zg!@ck?0nF~N?{q|~d ]!M=XpIstXTe(CX@o[YKyeGU,))s<}NZlVqVuM@,c^4' );
define( 'LOGGED_IN_SALT',   'xA]JR pWZz=(;[f&er%X*aS`OtCxk|2*6s1mOs;T<<4@;[>{j:3V5}ZE|2%QB-kb' );
define( 'NONCE_SALT',       '3`yi08M8mu^Oa8,7a>O=vYK0nBHzU7RGC1f4i6zTD=zJ|v~L^L@KSJ(~6wdL,! c' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
