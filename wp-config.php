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
define( 'DB_NAME', 'skyx' );

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
define( 'AUTH_KEY',         'yCNWl`uxbD&ZjYGgf&4 )%Sd^L=rBsim>Pv>~{m>onP+jk&c4LRRc,I_i1Ob<TNH' );
define( 'SECURE_AUTH_KEY',  ']Kb[K(<Icg[a}0L[-Qct?&nH`3:|0j~`[k]-7/J~>R= uc=n@qzM[~:v),u?PxXm' );
define( 'LOGGED_IN_KEY',    '+GH,P)OMQ#l<Ew4,Y%7FM5df+6L+/HpK;i)0LWk!5;q9h9&6o>G!*Vd>J/+(k T0' );
define( 'NONCE_KEY',        'A}>%SN>~k!B*Z8 zJYY5#GEszd_uG. l9;?F6EbwnXxp|N3i-BDDbPh8NzHDmGX9' );
define( 'AUTH_SALT',        'A2rYl&V~#+ip[3,>4^vAm+M9Ukuu8K4tE*@18W04L &^c?xE{e8iqGM4maPL+Qm/' );
define( 'SECURE_AUTH_SALT', 'Fl&?Curvz?ew2N_J5P;5*xSa3zlO;gRKAj7^*A0ehUU{B`B05,c{>a`:2-rdeOn_' );
define( 'LOGGED_IN_SALT',   '-m*+^=2nNFVZ[mS%v+f}:yLUDvHCUfo? W$$094dc_nk27XEgeAx$#ja]*arjO1m' );
define( 'NONCE_SALT',       '8INSm!ppnt^MO*d I}ED,/J4~w4}p*aqa<%C+Z23;qzkCkcXw5*ljraC7-}sU4^p' );

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
