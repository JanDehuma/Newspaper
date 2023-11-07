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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'newspaper' );

/** Database username */
define( 'DB_USER', 'root' );

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
define( 'AUTH_KEY',         '7&ta2b7Fg)#9j{QQIn}$a1Ek2n%v;r,hq@]D;n%:$T;`lwX{!DwX!dC!32lQU=nY' );
define( 'SECURE_AUTH_KEY',  'oR7:nx_$ol9@_5^xK9Y>=rzId6&|:~`0[~c/iG,$xTmsTfYTII+epU)rA7J5efOt' );
define( 'LOGGED_IN_KEY',    '^w+S@?ZKNQWVAHGvlW$Dy*QHgK$ly}JDd^,CPdQY0kP?|y@Ow@-w`u8-*Y-b;hOK' );
define( 'NONCE_KEY',        'zr +V;:d<VHgA-}k.v/g6IpGj%Zrc, tKkj!!B!Tm!r+t|E^&iy*5Ps5`]?$feYK' );
define( 'AUTH_SALT',        '6{4XJ S8&A&>*ib67&;:pc)T/U+ApI{vH7XKH(#f/{sqExd(>?]Eli|R5S8I%f^O' );
define( 'SECURE_AUTH_SALT', 'XAu8/o9rFjmwl0WJy=(a.;yeKj3]9qnIBHaY/fnJ)wYD~2u ,S~>-D892ozXxs?m' );
define( 'LOGGED_IN_SALT',   'xTmV}fH8pM8}u`f?w?G;n}XeJj<^,E0gsgJ1}.MiOA#DcHv2o2RAC]C^CA@aLT`)' );
define( 'NONCE_SALT',       '.wm?hp%1d(mMAEQ!4] c9pf(NNa-L.(U>Z!>m_f*+tl2:=H}en);Uzc`5AOwIsLZ' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
