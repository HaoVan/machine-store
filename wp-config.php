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
define('DB_NAME', 'machine_store');

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
define('AUTH_KEY',         'zD&+XS~|Yl $EsabzynQ>Ujr|@ -C}2s<-Dn$Eg*vR$c/P=;u}uzlMnei;+Gb=84');
define('SECURE_AUTH_KEY',  'Rh!%!EcA+C2(&-q.dA&|(k7ogo{ f7/cXg3/I~crqz(zxC-N+cz@Gt3}e~)}#DOq');
define('LOGGED_IN_KEY',    't7py(Nc(.=r3;WmIPy(w(-6El[s!`9<kyRf/OF__A !{1B5<sE6FD-M>M=./4|]j');
define('NONCE_KEY',        'ssQ`atXAxVj|B:.hJU6 pn<zY ^g58Z;H36nvM[$lc]4|#*EP>B7(_k-<%PZ.?!X');
define('AUTH_SALT',        '<)?A#~Ie)~x76G^Z39C#`|KJ~YJ%-. -M6[IBj=iHqM)/$GdFrtS{AT[3`;)f#I8');
define('SECURE_AUTH_SALT', 'Ll=j1ZOWR+#z|^!<N|^d/LljG&~yINpNGk^)Z*emN#hE&r-uZlV&]L|ZL=+e^QG;');
define('LOGGED_IN_SALT',   'L71%@{:sn0-0J,5O@+C|Trsfr:FUXriM1OR?Va5h@qV7 fz4O,/H& b8I/:Rp.PB');
define('NONCE_SALT',       'jV~6EddOQ#ZWm+=BC?!JqX81~UgJ+1}I*]yA/kx6de|CpbPl=pE8i8.H!&/a&];J');





/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
define( 'WP_ALLOW_MULTISITE', true );
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', false);
define('DOMAIN_CURRENT_SITE', 'machine-store.dev');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

$table_prefix  = 'wp_';

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
