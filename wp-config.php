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
define( 'DB_NAME', 'occams1' );

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
define( 'AUTH_KEY',         '=4mEOA^jneohun`n5KMey&7Zl&;/uZ3KBZV$|ls}{1({jPHrdi5skF>m)@<oDNqb' );
define( 'SECURE_AUTH_KEY',  '&o9gNTx+f@bt!{,bMPsK~FOpj)x@@/qycy$chGh:Y:E6S$kd)(iaMQe}UVhR@YBL' );
define( 'LOGGED_IN_KEY',    '4e2XN(OsO?B_+6jF=dS^R19/fLZPt:Y4w;Rj21$wsm/|K,&x643[Qr@RTR_x1/ _' );
define( 'NONCE_KEY',        'PSf]uTu>jD@ DKQ[`MEd<BS5#aI_xB=Q8@9|4#?r5I}K%LoNrSjC+tuqFvr*&6d4' );
define( 'AUTH_SALT',        'C#+:4JC,Zyz:I_wcC_W`_O.i:;Cl*vvzvY7Ruv8>9m5JDj?L,q$1xS4}?^)zJSED' );
define( 'SECURE_AUTH_SALT', '_fa7&c|oGDcWMzs8+D&+Vv;A]Ln_0TWVbZ50i}ksMMx:?S6#4&y0h01UFUQ$9lCN' );
define( 'LOGGED_IN_SALT',   'Kw(_n6PvYWa.9D?w+p ^#zpRnFjK+K.O!P030|GC6XSfk3e[o8bg-~-ys}jZ9, z' );
define( 'NONCE_SALT',       'AK7GWk`,ubp5[hNh,ku~zf,AmXGuN|dTE#{70xkKu;!jH?1.3_C=W92x^s6%8rVe' );

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
