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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '.0Q$?qP2`h^4JW{2hkN-(#!<4V0wdO^61>T4# _d+V<Mha^b]MvT4LiTjRY`%Q2P' );
define( 'SECURE_AUTH_KEY',  '&lSNp4ea`ffA;;834QBGM5N1D:V`c,TJnT<.<O0`n^a+~Q|c?G%j)NR`K&WK)21U' );
define( 'LOGGED_IN_KEY',    'GSH(E?Jiv5o[+X-y]~eo|Cw&ML((rwX7Oy{Z:Q&Q~T -xEPPk|!%:hg*lgTuQ+p`' );
define( 'NONCE_KEY',        '*{8{Bhu( W}zL,d~,5jRt=.J*h+G3bWK+h6<^`J0Xm~kgjdXrL[2ZjPnN7ctPhz6' );
define( 'AUTH_SALT',        'SG5ZR]~4@o@o*1z+R?mvEm!yDpdG{aE2H`_}%hD]RyF +E {*0Wdfa93QgY<$gi6' );
define( 'SECURE_AUTH_SALT', 'n|tX?0,zvo7Z;ewJ29Tcb%y.vmxOIY)MfQO&SRKO(-1m%1#^4R`1?A[K`5Bwu/H@' );
define( 'LOGGED_IN_SALT',   ':PyOo%$k:(G0@u(^dLAcMM~>}L2Kzo@+u[kr;mKAwlgDK:L.`-l=1HgZI:y5..,P' );
define( 'NONCE_SALT',       '[b#j%BG&L>h[c teE$q/rq$F2N,%I<hG8fo0H7MKKwow;8?W/hil|By18_&zGqTc' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
