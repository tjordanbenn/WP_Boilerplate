<?php

/** MySQL hostname */
switch (strtolower($_SERVER['HTTP_HOST'])) {

    // local
    case 'localhost':
        define('DB_HOST',     'localhost');
        define('DB_NAME',     'benlippen');
        define('DB_USER',     'root');
        define('DB_PASSWORD', 'root');
        break;
    
    // test url
    case 'benlippen.beamandhinge.com':
        define('DB_HOST',     'localhost');
        define('DB_NAME',     'jeanceci_benlippen');
        define('DB_USER',     'jeanceci_benlipu');
        define('DB_PASSWORD', 'z8eQIbzIU1=0');

        define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
        define('WP_HOME',    'http://' . $_SERVER['HTTP_HOST']);
        break;

    // live
    default: 
        define('DB_HOST',     'localhost');
        define('DB_NAME',     'live_dbname');
        define('DB_USER',     'live_dbuser');
        define('DB_PASSWORD', 'live_dbpw');

        define('WP_SITEURL', 'http://' . $_SERVER['HTTP_HOST']);
        define('WP_HOME',    'http://' . $_SERVER['HTTP_HOST']);
        break;
}

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
define('AUTH_KEY',         'u$|=Awo*aG^03:u|;pQ9QmI_C2[d~/<Ig=Ed~O{l!Q[^bc+$&n?W|1|zX_|oRYXD');
define('SECURE_AUTH_KEY',  '[%mfgV<V-g ZL+zKLHJ[C^fCl`s4qAjI]:bcO<a?%r`dV+M?@hiiJM5#4f|F7Xz|');
define('LOGGED_IN_KEY',    'rd!Yj QRrvvkizbJegv3&={IW}%Ryd%,J=o.9GBK=lj&)W=OhC~nZm}P*r0(jZkx');
define('NONCE_KEY',        '9tIjt&>T ?s#) /xQ_~T:6,/Po|&7}K|w~d/i$~!M<.>0 pm}ew$z*;L{w_]=m, ');
define('AUTH_SALT',        'N.P%r}A<MxsS*8(pRA?.n_e_T37,U.qT j(*UXhQjX%Y[7j]&{O5Gd/S0A_S:A]s');
define('SECURE_AUTH_SALT', 'JCmTq,8.08z9X;s|(p|zKKj-SmswA2+,<,_io]XtH-c9t3*5(9F2)ZIInu~kdyW>');
define('LOGGED_IN_SALT',   'l*w,5@`VzHxrGYoF|ttBw6|1x:WlW,>/t_(Q7o9T~&dNP*L=XYnA)e685E)Y%Io{');
define('NONCE_SALT',       '7vEA<h h$OX$ScO$tgf32AX$;D#R/.w#IxAMoLAZ!J(+o_dOht(zTK516!brT)7j');

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
