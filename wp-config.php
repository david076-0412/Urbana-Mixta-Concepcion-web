<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'u286858900_FhKt8' );

/** Database username */
define( 'DB_USER', 'u286858900_3C6cJ' );

/** Database password */
define( 'DB_PASSWORD', 'tSMC9YhZ3M' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          'ygLEq~0TAMz@=u!o[.aI17*Z:Id[}0yG#40p]!h{I}`9=ARHa mo(0&8NoEB0;4p' );
define( 'SECURE_AUTH_KEY',   'X%(.TZX%q /s<ay)MMygKJ7u:T|SyDq:eGj/8CFlTOhF,fTV+5|HR3am{h7eaqFa' );
define( 'LOGGED_IN_KEY',     'yZqOlh)DIvAu[9ptg=^t5H=}?LW#O>#T<}-Cp{+^9s*&-rve#1:pbYnZR.7H`+E{' );
define( 'NONCE_KEY',         'y,Cw;1|a<;]%HUqTTYVVH[Mu}`~2nJ9<4r)ap_OzsDdD;:4U}+15`tVW1e0kB5u%' );
define( 'AUTH_SALT',         '{*FC/sFF~+Z$Wyljj^%)Su_2,?zg!Fl=[Km^5I7w<rSMq=g+O%ZI}zJ~aLL068#U' );
define( 'SECURE_AUTH_SALT',  '{0_HQ8S5rH4rABEI!e2LNIfF-*P46AhFhu]h#&4)PJ@jKP@hV{H*3tr@P8}9<^8 ' );
define( 'LOGGED_IN_SALT',    'jv}1M;B02QMZe}K}YN{W$X|z*_sV?U:n_T|g|ebdm*CzU_ypUiX z0)5g*?1WbPi' );
define( 'NONCE_SALT',        'r mj(|E-C0@^U2*B`o;k4>+&z_tw58;=ssCLf&wb0uGcah1cE6&C)FEF#FY9LlTO' );
define( 'WP_CACHE_KEY_SALT', '2~AQ-isz4NkFT`b>D}iA-Q}|M9Y`s-J9H^5.&Tn[gJy8.rFL.SEGG5UFJ=^e#?ru' );


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

define( 'FS_METHOD', 'direct' );
define( 'COOKIEHASH', '36f85dd30d3341c508d16381098db378' );
define( 'WP_AUTO_UPDATE_CORE', true );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
