<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'travel');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'q>]%V#$5N*:uDBgZSIM]B!}d_-3W*m4E@QZDn}Op|F5.mS[UU)QGBPtyGP-nv|!z');
define('SECURE_AUTH_KEY',  'Fhr46b2|5qlhq4K=U|Zfz~a/tb/K>=OzZ-OvO|$a?+Q@{%i]tf27C&HNf.*mw$HF');
define('LOGGED_IN_KEY',    '+V+`f$o}^|-cI]@u|Ex@UO)qCk4+#2Za=|9kZD&VjC[xb@J)I?~Bw[?^Nw@g9*Jt');
define('NONCE_KEY',        '+JE-/We&gwKD[by f|hX7lAc}V%.!R.%$;*K|PI]{J g(/ba]YY`SG`s|K-NNyKp');
define('AUTH_SALT',        'De*}(~#W4^h4v-?MdwhRL.EmRXVAB_YlbAAd]nT&)~bg%9G3L47IPB*1i2ybss-:');
define('SECURE_AUTH_SALT', 'bZs{I+g$nc^Fbp?.yLvITkCa;Q^!>}[?{%D36y4B0d{qh-aH}p%n:v1R-c*E^<TQ');
define('LOGGED_IN_SALT',   '}FD]u]nG0+r<SHFEkmEvf)ux`}H!Y_H6KZ#XceN`W-g|%;=|4Yv-ftN$S@-_n@UE');
define('NONCE_SALT',       'nSQ37|cz7n$clXv>=]2htuTBGx v+MBZ759j(SIo2 7JE%@)IWB)EC890=^!dGCi');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
