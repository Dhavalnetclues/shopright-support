<?php

//Begin Really Simple SSL session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple SSL

/**

 * The base configuration for WordPress

 *

 * The wp-config.php creation script uses this file during the installation.

 * You don't have to use the web site, you can copy this file to "wp-config.php"

 * and fill in the values.

 *

 * This file contains the following configurations:

 *

 * * MySQL settings

 * * Secret keys

 * * Database table prefix

 * * ABSPATH

 *

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */


// ** MySQL settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', "shopright_support" );


/** MySQL database username */

define( 'DB_USER', "netclues" );


/** MySQL database password */

define( 'DB_PASSWORD', "netclues" );


/** MySQL hostname */

define( 'DB_HOST', "192.168.1.26" );


/** Database charset to use in creating database tables. */

define('DB_CHARSET', 'utf8mb4');


/** The database collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );


/**#@+

 * Authentication unique keys and salts.

 *

 * Change these to different unique phrases! You can generate these using

 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.

 *

 * You can change these at any point in time to invalidate all existing cookies.

 * This will force all users to have to log in again.

 *

 * @since 2.6.0

 */

define( 'AUTH_KEY',         'r4Sr@Y&b t4S83ajm:<jp6!vBp@StDi;-#QG)NPe,Wv=ob_zKW6WGn4}xm0Id@:r' );

define( 'SECURE_AUTH_KEY',  'j7MFRp(m-P6mBdqZ-}QgGRL~!l. Dq.2^YP)zXLV`a;RQ?y6K4pX/jh~F,|n]u2I' );

define( 'LOGGED_IN_KEY',    'BsDq/v$ytr$y~>YtS#Nlo~{((Wy=@~1XVuTDSGDOlf(Ia|?0oCN#x{[+/;a`we*S' );

define( 'NONCE_KEY',        'zNZ&@K4mG{lf#^q:=qA0ABqq38|l7!q7>iOUgg1dX)e8!Kt6WK&!/:0~{;XtLl3y' );

define( 'AUTH_SALT',        'b+.Z:!N36%;[8g~bQ&IW8rP.6.:GCTdQXS^15Cy>W|qy yvg0T4p$Y^P>Td6RkF;' );

define( 'SECURE_AUTH_SALT', '-G*|H~As7,dFuQxr|57]O60uT2zob_7*_,isKs}U/fih*+2_4]$eT]_cXqu%sZ8%' );

define( 'LOGGED_IN_SALT',   'fnTrtNYy*1BE(8|W!xC#uLgn:1NB0mb=`p_/71}FQw_?]jD.D|!{bF@>gtQ)Y;9*' );

define( 'NONCE_SALT',       'J/}@ZdB?&FPxVI/vv/K9&)iWJVl/:(7X(k%oS(;+khhldt_E5[|l2.-UbjquY!Ql' );


/**#@-*/


/**

 * WordPress database table prefix.

 *

 * You can have multiple installations in one database if you give each

 * a unique prefix. Only numbers, letters, and underscores please!

 */

$table_prefix = 'ss_';


/**

 * For developers: WordPress debugging mode.

 *

 * Change this to true to enable the display of notices during development.

 * It is strongly recommended that plugin and theme developers use WP_DEBUG

 * in their development environments.

 *

 * For information on other constants that can be used for debugging,

 * visit the documentation.

 *

 * @link https://wordpress.org/support/article/debugging-in-wordpress/

 */

define( 'WP_DEBUG', false );

// define( 'WP_AUTO_UPDATE_CORE', false );


/* Add any custom values between this line and the "stop editing" line. */




define( 'WP_SITEURL', 'http://localhost/shopright-support/' );
/* That's all, stop editing! Happy publishing. */


/** Absolute path to the WordPress directory. */

if ( ! defined( 'ABSPATH' ) ) {

	define( 'ABSPATH', dirname(__FILE__) . '/' );

}


/** Sets up WordPress vars and included files. */

require_once ABSPATH . 'wp-settings.php';

