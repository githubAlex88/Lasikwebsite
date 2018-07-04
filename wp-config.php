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

if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ips = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
  $_SERVER['REMOTE_ADDR'] = $ips[0];
}



// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
$env = getenv('ENV_VAR');
if( $env == 'staging' ) {
	define('WP_HOME','https://lasikwebsite.herokuapp.com/');
	define('WP_SITEURL','https://lasikwebsite.herokuapp.com/');
	define('DB_NAME', 'pizlbv23uy6u9zjb');

	/** MySQL database username */
	define('DB_USER', 'eay0mnsf0eji1lz0');

	/** MySQL database password */
	define('DB_PASSWORD', 'np405wnpe5hjpnhg');

	/** MySQL hostname */
	define('DB_HOST', 'thzz882efnak0xod.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');

}
else {
	define('WP_HOME','http://192.168.99.100');
	define('WP_SITEURL','http://192.168.99.100');

	define('DB_NAME', 'wordpress');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_HOST', 'mysql');

}
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
define('AUTH_KEY',         'f4294daebfd026fd4cc1961fe1d6a5be4574c6ab');
define('SECURE_AUTH_KEY',  '0b190a51035e178af6d4c8df19b07c92020cb821');
define('LOGGED_IN_KEY',    '6680e50826ee0befc51d224f0119829e0399511f');
define('NONCE_KEY',        'a912e68938c7a2ccac2a1ec1075df6188082ff35');
define('AUTH_SALT',        'da8c4a034a924a8f5f98c8d9c1433d8f5da458e4');
define('SECURE_AUTH_SALT', '8068cb5b56627329cabbfb850c8d2dfcf007e25b');
define('LOGGED_IN_SALT',   '221bbd5576a0b4613465e035045ae34074222bfd');
define('NONCE_SALT',       '5c6d1ef775e61b850f24157ca26c4f7c6c3ea22f');

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

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
