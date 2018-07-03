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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */


define('DB_NAME', 'thepcauduong_local');
/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         '^U=`asG@?0x5/-^u1olQ8b6aE]Ki*^MfY<69@LfU9Os{*Sq:YOuJK}JGB^E|cUDe');
define('SECURE_AUTH_KEY',  'F>nic[HIhIa[iueNAzZ&g<-hRc!&D4vnLG+;k)nY5=DVIqU?_H!03c1`KNMNvB<|');
define('LOGGED_IN_KEY',    '5kS41V^&lGA,H6#V$zpk!/03M,vCEXRl^l#*kSKgS[,;+41~U82Cg|ae6QNB&|rn');
define('NONCE_KEY',        'AK:!aItT2ms4I0pjqIv}<^q+ba;pwv~~sdZ5PUZvdd+Ld,wRI45X)S0#A{O$-rsu');
define('AUTH_SALT',        's`;`&8V .$D2/>*>1`];wnw[cbcN=agf6=M>Wd.z]{+<)<5WU cI!)I>Wkb4$Y5L');
define('SECURE_AUTH_SALT', '|mB,;2Br>/S)]{[{qJZ*xm8YHJ=rln8=Hm~6sj1$!qD/v9<EAHJi@oKR5%z.A#u;');
define('LOGGED_IN_SALT',   'HLbKSBTur{`r5ZR2*BKU7#2ChdqifZS:IA@hv+_<Diof[V!CuJy%Yp[f($VpM/nh');
define('NONCE_SALT',       '^da-@&D/HXQAddIu}/u#[J-XHV]ES#TJt#9h%>oR%gr1}Ho1d4zBtgj)3GHQ51&%');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');