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

/**
 * Database connection information is automatically provided.
 * There is no need to set or change the following database configuration
 * values:
 *   DB_HOST
 *   DB_NAME
 *   DB_USER
 *   DB_PASSWORD
 *   DB_CHARSET
 *   DB_COLLATE
 */

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */

define('AUTH_KEY',         '0iQ(Tu0_1}P?C4Vx_Q_{7i~JUsb8webQeqh4*z%_0yPayXNpY?crNj1>Ejw(lviL');
define('SECURE_AUTH_KEY',  'oI]ev-LK,}6]192?5@x*Y$gqQs#z~~APGADk-Tn?~i5b%jo]aiW1-9EgLh(r]sYh');
define('LOGGED_IN_KEY',    'v[|o3_d4IKCrEm4puk~+_MFD;[_~_GX{7VA<SY<}>;p*l*+g5_Yy;~sQ7+b{UU#p');
define('NONCE_KEY',        'u4y+f(>T?h|N1}L<_QY4G?CdCc.qh+Twgc~TXOO!cba,C[*D3N[emYk6=|1!Z|3A');
define('AUTH_SALT',        '3[U7.%z<7-yy5U~OlajkmmvSB190{q$,@W!l+<AUiDD]Z)H}+p]2i_ae9FRr0Lph');
define('SECURE_AUTH_SALT', 'T1>lt]^[GMkmEf(HJd1fPda3VY47jmgg(x%bPbT>cUj#-]7kIN>Pcee)0-j=t1~?');
define('LOGGED_IN_SALT',   '#>%7Xw>QA3)dzq8;+R{FjzPb>iE:TuRX82U<IMEz)Jos5+HqVOqg8O[%G1-zI>4V');
define('NONCE_SALT',       '?H7gWcjK-andM;84#mU_+$;WBr?Z_.Y?4YCfmw_|0DUkEAk,y3oaw?%eSN<[(.;c');

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
