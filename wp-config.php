<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'maticangrp_kesvat');
/** MySQL database username */
define('DB_USER', 'maticangrp_ksvt');
/** MySQL database password */
define('DB_PASSWORD', 'v0qrlSgpJ');
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
define('AUTH_KEY',         'Rf=c4+@kf4X2GNn:i4{Xxo.0`.K&3;_x%B$VdNaUIIEk ` r[YuXBRY^./hO^P[2');
define('SECURE_AUTH_KEY',  'NqwgrfK[<[G;CY/leMkkZCki)Q/Wi5+#J+qTXm{krN([lL<6pK.KohcN+ o}mlj_');
define('LOGGED_IN_KEY',    '%G]E|WrmS1~:w@K,u8H?hk%$V/XcX:iiPBSMM2hA1{u(Vq3d:+4t-j^POl@MjL<n');
define('NONCE_KEY',        '#h)h,F}iN>6EQh|um|i|*~tOV9h6kw o(N,M2<zA:[9WsN#+-;Z0sMy@EwEIZDj}');
define('AUTH_SALT',        '>qK[[_I<+a2t/{21+:Aev`W/-R)WCp`zrh,EKvv=a|/Vz@N)d[.=+e|FK$5/9I&y');
define('SECURE_AUTH_SALT', 'KBVLXNT|e-iQ7;;f|j3Ghrve|2ksO<MoWW5Q&f81iEZCrr~v0bfzJ O&>TdBr<;:');
define('LOGGED_IN_SALT',   '9c~1G4*Z2im|^IjBlV)x*;9ipaH*vQiFLT:ccZD_K:##$N!clvM/@[B@~ qpQ)*2');
define('NONCE_SALT',       's*rl}O<(<LgT{F#H[b>!I^?,Rp-Zn>DD},e_ya)]KuWJ[<fMfe%chxIHD=3E%GVJ');
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mtc_';
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