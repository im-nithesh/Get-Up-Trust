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

$host=isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : "";
if(!empty($host)){

        $https = isset($_SERVER['HTTPS']) ? $_SERVER['HTTPS'] : "";

        define('SP_REQUEST_URL', ($https ? 'https://' : 'http://') . $host);

        define('WP_SITEURL', SP_REQUEST_URL);

        define('WP_HOME', SP_REQUEST_URL);
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'getup87_1255' );

/** MySQL database username */
define( 'DB_USER', 'getup87_1255' );

/** MySQL database password */
define( 'DB_PASSWORD', '1OVO6Woay2' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',         'k64dswzfof4wvtoyx4dywikewbkvi4hijcfsovdk1hab1cfhlfhfrp3utxtps8ov' );
define( 'SECURE_AUTH_KEY',  'iaes9ebnqzepy3d78eenvojnxxexb1v7rttu4ocxzlettmtbpvtpr5hl2gwbiulw' );
define( 'LOGGED_IN_KEY',    'erahnnpegcsagnbfwerxgm7bdede6isosuy0cl8xgyrhx58dfehnhxbkkruxb6t7' );
define( 'NONCE_KEY',        'z6nglwh7a7ezl1qrdnvcrfiw3apo3dgz3blj6hdcpmidvczfnfxxosgnhx0ehfq7' );
define( 'AUTH_SALT',        'b3akn34nn35c2sfmqsnloyiqzajiho1tzleyclxkmq1xeqxdbxx6cf7clgeznkp9' );
define( 'SECURE_AUTH_SALT', '2pztwe2amkdli49l2wlhwi7a0tub4hjoa9achncupdzcoblmdplua4lusv3iq9vp' );
define( 'LOGGED_IN_SALT',   'oc29lc1qz6fakuqhf6ahxoxfcisvgre1t5phuprw0uqwqutsyhb7qtbwjzlpmnww' );
define( 'NONCE_SALT',       'o0ajdoauxtw3ae889zdxma37vacy4muqgmzxzbks1rkqyxv4ve4nusrmnmunntlr' );

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
define( 'WP_AUTO_UPDATE_CORE', 'true' );
define( 'WP_POST_REVISIONS', 3 );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
#Added by HostingRaja Security Team, Please do not remove
define('DISALLOW_FILE_EDIT', true);
