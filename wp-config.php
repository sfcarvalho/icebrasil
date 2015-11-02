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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'wordpressuser');

/** MySQL database password */
define('DB_PASSWORD', 'Ice123');

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
define('AUTH_KEY',         'BK!6<dlGUYw1h(zKJqxqe-ynQ>WZNEHSv.(9%szqMStz1Qs>{W:^+RWv3ZT^o6uO');
define('SECURE_AUTH_KEY',  'G_2k ?}I.o:ACX|Sy@5(g>`.Rf/W_J/?m:M5-;B;HRQdyYU=)8B&v|Q|&Kl[]]H5');
define('LOGGED_IN_KEY',    'sYY+~YR&IgvJ1]fC2=@|[oh$+0q+L^#0|c$,+HftAPG1k|;V@`|&b4phk<I[H*}F');
define('NONCE_KEY',        'IY 7a~i]whybZv:66Af}JxW(xq6cl0:B]QRZ!EJn>Nr<4+ay>V^~xH@X!L;NaG[o');
define('AUTH_SALT',        '1^rLx]@H;[9?MfkcaSE+*k3FUX(C1OeVrI.Tj]X!7Qlo3M^KqUs>Fgl_bB>{%g>J');
define('SECURE_AUTH_SALT', '1BK{sB/NjF%$(-crV!$pu-c}]&Iq 3YA2wkZC-68,$1d-;{&+Eg?b0m+=h,>3mY-');
define('LOGGED_IN_SALT',   'c+i okOt=43/.{|_W9vbL|b_3DJC`p;/SsA(Wf@tGY)s~lLz{)8P6GmX3OzHV-=7');
define('NONCE_SALT',       ')6B@iSvn%[@:yC1@cdo&[g0|>4o3*Fxn#;]a@:Lu!k3/B(W5W &n+p0nw=CDpXE[');

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

