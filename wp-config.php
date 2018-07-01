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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'id6350504_wp_0de15b6ca3ac64bc5db8e6ea2229d2c9' );

/** MySQL database username */
define( 'DB_USER', 'id6350504_wp_0de15b6ca3ac64bc5db8e6ea2229d2c9' );

/** MySQL database password */
define( 'DB_PASSWORD', '33d1f22d694a3f947a814782ac5111975f319331' );

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
define( 'AUTH_KEY',         '%e~ (1&$3-TytJ:,8!DUX}}LA8#+~d8-G^,C%Z`m[S[##5i#kc!BA32Tf.@0|*) ' );
define( 'SECURE_AUTH_KEY',  'I<b$ZD8hiOTqw!S_N11Y<&3hBD%4>g#^tA!(&Yuq<~#Hhn(65O7KpX~ua.%|ne:7' );
define( 'LOGGED_IN_KEY',    'RA0K`I{6ei6YBx-U=uUs|Wfp.q|RC:HWK)k 1KffZ5*d)(q0N<TD}HFji?UXuP]U' );
define( 'NONCE_KEY',        'T(IZ@CN21_|N}39hBJQ)Kj~iM_2}5!F|uM%nV^bHikU@M}9Jy%NqyW}cPi8PcUSr' );
define( 'AUTH_SALT',        'v-Fr%{H*xR3nabgkbgcm}H24NY(cFfp@XsY^*9w^IuwIlgT$|*&|.y(u8+T}1N89' );
define( 'SECURE_AUTH_SALT', '~=C`_*OgX+0z6nvczD:Q-fI9<>La^hf&}Yx|7^9OdtQbVoj`E#@@d!Nci^z+.|`R' );
define( 'LOGGED_IN_SALT',   '[*5G,$=P:JkQQs&rq(R#iG8-s$TM2<*tN%Sc-S!&8}.%(z.<.Z@|%hS:KxSs^!4+' );
define( 'NONCE_SALT',       'JO=`CVe;sw@9C]|Ox6!/|TIeG**h&Kjv#N<~`se)u[kmKqD#Wb>VncnI^bPyuN~*' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
