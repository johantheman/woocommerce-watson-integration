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
define('DB_NAME', 'wp_topco');

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
define('AUTH_KEY',         '{4Nf,P#HO5X$;ebHcKvg|,5wQ}+]q:yLu@e`SJS4s9n_o3oG0i1q-d#zbS(`^jjS');
define('SECURE_AUTH_KEY',  '.lwlP<P6wN2vnb!0Ps?{j,b{i?U?H2;6ZJ?Wda.GFTR+|.W:P,[u2%[aSL-|>Z,v');
define('LOGGED_IN_KEY',    'p_>@mHs]]M!VQU;H$+cyh yi`2wTzO:y-q|8s:}W`={P*r:m6Xk-tR/u!Zy&Sex!');
define('NONCE_KEY',        '55-*)s@?Yldco1{^j-v }$MU(wJ}E[03oWslrs[@=;j`Ta-4wQ+*,$a_cX:y(&Qk');
define('AUTH_SALT',        'dU6*|`}/B%}a+6GX:Dq~9?FAN=MWl!|l-H7n} 6ymB!2aZAUP]4trk=CSGexj2a$');
define('SECURE_AUTH_SALT', 'GcIO$Qd,I=?gR:=2T.Z3Z7qUlq`gSD}h*]WYq!YH>798&en[W)MD_yN9B!dbs?K$');
define('LOGGED_IN_SALT',   ')nsr96A_l{v8elS8`EJk:,Bt,8pZ!/P9g4E$PS/_~,^c-GI?l<<:-hYGXs38d;Gg');
define('NONCE_SALT',       'F[<kZa8;4K8A_lQ_uY-.JvglwTj(tgjQZ.,Cn_5CJL!BP$TCvJK!_c5R(J&e^.c@');

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
