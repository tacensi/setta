<?php
// ===================================================
// Load database info and local development parameters
// ===================================================
if ( file_exists( dirname( __FILE__ ) . '/local-config.php' ) ) {
	define( 'WP_LOCAL_DEV', true );
	include( dirname( __FILE__ ) . '/local-config.php' );
} else {
	define( 'WP_LOCAL_DEV', false );
	define( 'DB_NAME', '%%DB_NAME%%' );
	define( 'DB_USER', '%%DB_USER%%' );
	define( 'DB_PASSWORD', '%%DB_PASSWORD%%' );
	define( 'DB_HOST', '%%DB_HOST%%' );

	// Custom Content Directory
	// ========================
	define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
	define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/content' );
}

// ========================

// ================================================
// You almost certainly do not want to change these
// ================================================
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

// ==============================================================
// Salts, for security
// Grab these from: https://api.wordpress.org/secret-key/1.1/salt
// ==============================================================
define('AUTH_KEY',         ',j(tf[FI_0};Y+uaQVv3(e20L$/:Ipj(9z-Vhw0byrMV~j&9n0{^-J3y7wMqt T<');
define('SECURE_AUTH_KEY',  'Z=MQ}MFHx-mS$3I@Nmo2&KvYQv>cj|=_Cx--NW~Z4H+r@^b#iq=n$:L^+{C?@qt7');
define('LOGGED_IN_KEY',    ':;O/a2b-Ac(-F-=+;_xwjY#>v.~aFop.Vbe8tcXDp}sQ)-6,f6W-mMe/-iV,nZgJ');
define('NONCE_KEY',        '~!+2v(V)e[,4yzY:o[d5s1ovett~cu-DA)t@H3Kl(h!a>]MB.2GYlvxkEg*<|r**');
define('AUTH_SALT',        'i8t%[+GZOgc%e|JgmMD=`TC!t6g+iycXx6esgOT{xEL:>@6nr*K==R6q!c4]4vY*');
define('SECURE_AUTH_SALT', 'KFy s_#AIdPR18tSkePa+<_-nMrvsm||k>E$,f:gyHw<$|8|r&vL(~+Z4S- i9|4');
define('LOGGED_IN_SALT',   '3H&8sTLVa5!FGFg_&Durwn@-.vKh1U#_;l9v0$8XxC[owSG:As^PeF;A Ezq0MC+');
define('NONCE_SALT',       'fBtoq4RD%ng<*;LD+FV-+f@Racq&vSF#pu.@xVUcJI-Z$uQcKn<,(h,Ra3=nD8?>');

// ==============================================================
// Table prefix
// Change this if you have multiple installs in the same database
// ==============================================================
$table_prefix  = 'Xd5gqPQfZkdr_';

// ================================
// Language
// Leave blank for American English
// ================================
define( 'WPLANG', 'pt_BR' );

// ===========
// Hide errors
// ===========
ini_set( 'display_errors', 0 );
define( 'WP_DEBUG_DISPLAY', false );

// =================================================================
// Debug mode
// Debugging? Enable these. Can also enable them in local-config.php
// =================================================================
// define( 'SAVEQUERIES', true );
// define( 'WP_DEBUG', true );

// ======================================
// Load a Memcached config if we have one
// ======================================
if ( file_exists( dirname( __FILE__ ) . '/memcached.php' ) )
	$memcached_servers = include( dirname( __FILE__ ) . '/memcached.php' );

// ===========================================================================================
// This can be used to programatically set the stage when deploying (e.g. production, staging)
// ===========================================================================================
define( 'WP_STAGE', '%%WP_STAGE%%' );
define( 'STAGING_DOMAIN', '%%WP_STAGING_DOMAIN%%' ); // Does magic in WP Stack to handle staging domain rewriting

// ===================
// Bootstrap WordPress
// ===================
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );
