<?php

error_reporting(0);
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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'database4' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '12345' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );
//define( 'DB_HOST', localhost );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('DISABLE_WP_CRON', 'true');

define('WPLOGIN_KEYWORD', 'hcssc1129');

/* Recatpcha Access Key */
/* Update it using a working google Site key */
define('RECAPTCHA_SITEKEY',  ''); 
 /* Update it using a working google Private key */
define('RECAPTCHA_PRIVATEKEY', '');


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
define('AUTH_KEY',         'E@av]i6z|x+Nu:jM&47#-is?Wa<8+sFa`$H&45* n,ARNx LxE_GQDFI~!u[TqyI');
define('SECURE_AUTH_KEY',  ':X%nUS:-.ml} -`djC+x}OGcfEF7OY@K+qamTRM[|gfVD+WjekcYV#hTPhVtv~C+');
define('LOGGED_IN_KEY',    ',8@FX?mP{`zH`I?le~_InNkchif.xFZ6h:>$YDBj,3PyXtH51R)^r^^h/UX|maal');
define('NONCE_KEY',        'Svy1&A##<|vb:4b0Z@^_c_G)rdxNyiayD+w):q.<Nne%:s/p|~|$]Ab,i[OVpAxf');
define('AUTH_SALT',        '!-YMKML^:@-y.v<Vzo6J&3:|n#sv+=_r-vYm)jhYkv2*9US(<1bqRa{f,!-;thwf');
define('SECURE_AUTH_SALT', 'y}fM]GZ)>;0l9,Y4H3M(-2D{28qZsN(mg;~+Y4 1)._`YvDT[T0(T<TTeG9`Q&/w');
define('LOGGED_IN_SALT',   '6!3DG{]rI<:nryq7Z%j};3;p%; {=)Z:vQ4SV>,Lc-8Nma]l]f(+Z| t^}z][qM:');
define('NONCE_SALT',       'k5CR0Aa-! ?T-2qiM!04za$+<@+*Lh5K=HRC2`VJUEh6^E!qGmXi-k*[;|VWC&ia');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'okustaffingte_';

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
define('DISALLOW_FILE_EDIT', true);

define( 'WP_CACHE', true ); // Added by WP Rocket

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */



/** Sets up WordPress vars and included files. */

require_once SYSCONF_PATH . 'wp-settings.php';