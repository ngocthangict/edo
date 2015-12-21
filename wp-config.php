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
define('DB_NAME', 'edo');

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
define('AUTH_KEY',         'TwytSZ/nU+I*Q/>Wy00@5q;!mUr(~/uPbow`TqU9|u8U>~|IaN--qT!nz/S]KeX%');
define('SECURE_AUTH_KEY',  '8MDg-_7F6jubgmd^Ro,`+]4:FW@PWs|-*(Of |Exr#Atg`h Bm1&*x%N^*v#K2{`');
define('LOGGED_IN_KEY',    'Ob/++2csPyf~#avaT6tSFkpYyP=CZF+cIRu5QTen,BUZ(EyeqT3b6%-P>fADeUc-');
define('NONCE_KEY',        'kH9r5pBoeQdu&+I `U]Z+&QdkQB.%rJ+7;H?I2_(A -n!QJ!/<RDBrrRq>C7/8[X');
define('AUTH_SALT',        '#cU-*6G97S+UlQhF{+&Q[O;.ytXuGR#Y7Io2n$W8@r<J:Fj,DROBBtcfYBMCYe|+');
define('SECURE_AUTH_SALT', 'vo%H/7~Vc$7yYCs]692yB/T^XP2<0,Pp*g`}+e7qcpdQlT{S(0!,K{uBsdn?F71P');
define('LOGGED_IN_SALT',   'J+5Zfc&gEhkiC9MN,|a![IckN|aVry+MehO=, phI$NvAY^p./(RWNO5A!,!2M t');
define('NONCE_SALT',       'sg-A3ik]d}Y4(5Y3)zhib]gHQ5EfEG 2EX[N`}-|31<jC9i0 U+^zGaZ5>rK`qcj');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'edo_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
