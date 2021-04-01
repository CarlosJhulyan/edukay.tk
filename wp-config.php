<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'edukayDB' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '{CJdeveloper%989%}' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('FS_METHOD', 'direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'sa?.PC0kSUuADCAI!B!OJ$9}?IT^J4F1;UQ*n-a9M2i!Un=L=0O)G.EacdE%<gjS' );
define( 'SECURE_AUTH_KEY',  'a6H!e.~?kP*.w}:LR%n5^+xdAZP6Un_!a%jV=dgQYk5%r^2!YgzMt^Q(b59nBK5X' );
define( 'LOGGED_IN_KEY',    'B;C@?;rA.Ueg)WZ;)qRE#A<hXAn1~Me?>#1RtWbYC=UO81GeFz.<VBuAR4CqG7)U' );
define( 'NONCE_KEY',        'q%5(M|<E6F_AG1AEbP!sO:~FW{N^.INq+}J2DvRVU,Z* 9I1qZl~G@+,:<3B-$xE' );
define( 'AUTH_SALT',        'lNk tb]&HtvS:|<`TV)yiy9I6x0h04cqDc.jqEZ)i!f#v,aO%#W65b$$Mc9ZeDQC' );
define( 'SECURE_AUTH_SALT', 'L:?M(y`1x@Z|L> ^Xs:}Q@Ba8qA#42XV.upRoNtAmzbyqnd(iARdW@@vQYVx&R n' );
define( 'LOGGED_IN_SALT',   'UWI5|:x+kn=sL7)Q3Xv~+Aw?9.W7!p7hi5-I3^=o0f,wU v)o;gSxEri6![w9lWP' );
define( 'NONCE_SALT',       'ziRnB,^Lj1Q7ZAuFe5N=0C-3__ePG5}`89)zz{BH9;}@E8)jtT1r<8;84!a6@3,y' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

