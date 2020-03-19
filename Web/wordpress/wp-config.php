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
define( 'DB_NAME', 'belajar_wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '7C=c4}PpE828CQc9QoNiqmAdB{)#-(bdi.LL:prI(Nw[-@1V.IukpGbR>p eAHkh' );
define( 'SECURE_AUTH_KEY',  ' |9>vdud.r`^yij}cTZ^)6Y!x!7{,OC>924QsCnW(bQCp5R9^rVHQgc1zAcw<n)b' );
define( 'LOGGED_IN_KEY',    '0BZXZ:</Y MZ5HH&3q2%P9zHNPvuD*V9Z..@{lLwI{o=V0XhXm=LC%I(Y.9|X`8E' );
define( 'NONCE_KEY',        '#6KS7iuqh5)133bjB9&7#a~CKOml{?!~GEV+TF{snF@+ir9RCocsYI:{k>QbeF{{' );
define( 'AUTH_SALT',        '%*.P?Qw<!QRci- s[kPHV*W(4U?s2;Vo0Kd)-&h?a-n2Sh6P$jTCjn{BCHZa5A6+' );
define( 'SECURE_AUTH_SALT', '~mz/a(xkLslmH0@_UA6*M*Q8F}:M9^ s*a_jbIb]! uiE>4.44{KP6:uYj(Pb0BU' );
define( 'LOGGED_IN_SALT',   '94]S`jM%e6<k:xm,2!w0M?va0fBfwh-E.kQlf+?Gi`n.+8vL+7yz-,MM)qbs:?Z*' );
define( 'NONCE_SALT',       'r8_M>q<{b$.Vc:py8s/g3t(+=Ejz;&E=2Go&`i|f}UL4 r0r/g@OivfF$Kiyu9<n' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
