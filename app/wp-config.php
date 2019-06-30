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
define( 'DB_NAME', 'test' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'online@2017' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '!Gw<{:im[$p=:}eU(eYErpNL}B;X(4!vp&.zx,tL.Vu`iR]CP*rnhI&|Bp~[IUSs' );
define( 'SECURE_AUTH_KEY',   'bX><nsI&Yz3t)U?b]kf)zgU!73w>W%xQL,,7]:=*WJZ5iH^0I;i|30nHpsxP;EW)' );
define( 'LOGGED_IN_KEY',     'i(71|cb_U/BA.`hb3s^LXfxhBat;?k&(N<?LY]Z8aL s%_DbEL7`XDsk${/zzV9e' );
define( 'NONCE_KEY',         'x*CP-pq5qCW&<qqz/RmLAQ(DjMU@v9rPJ+zV([NEF<,FE^45wir!#xDO P38z#S8' );
define( 'AUTH_SALT',         'tV[sE)*ZCh0@.P{3B{w;wvWgH*o<_d~UC``xp{],8:nN=C=s;O0YJ*.`Xa2-E(a1' );
define( 'SECURE_AUTH_SALT',  '<FL=[jBU!is#ztTH0gUfV7 (X#wF(%f43@{DHL$vessS&Ow+97b8LiE&tYBebp0%' );
define( 'LOGGED_IN_SALT',    'W$~V0HoV$5*S4$/(|IuH-mcW65OeHsmH$~y{ts+u%>01g.NT~GX9/mrNV`yj/;wc' );
define( 'NONCE_SALT',        'oOBzl[}bB]DiyjSH6=-4I~q9#_62mYMHjf>mp^PpV$6[}1Hr4.0$63drzP%s2LBK' );
define( 'WP_CACHE_KEY_SALT', 'JnBckUUGKnqs68;Np7f4YoP3Pz%~]_GaJLTy$r5Wbw&]Z:hcsc0f.MM%Mu#[cW S' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
