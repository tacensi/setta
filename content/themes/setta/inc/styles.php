<?php
/**
 * Scripts & Styles
 *
 * @package Setta
 * @author Thiago Censi
 * @version 1.0
 */


/**
 * Registering scripts and styles
 */
function mg_register_css_js(){

	// JQuery from Google
	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js', null, 'v=1.11.0', true );
	wp_enqueue_script( 'popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', null, 'v=1.14.7', true );
	wp_enqueue_script( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', null, 'v=4.3.1', true );
	wp_register_script( 'mainjs', get_stylesheet_directory_uri() . '/js/main.js', null, 'v=1.0.0', true );

	wp_localize_script(
		'mainjs',
		'setta',
		array(
			'ajaxUrl' => admin_url( 'admin-ajax.php', 'option' ),
		)
	);
	wp_enqueue_script( 'mainjs' );


	// Stylesheet principal
	wp_enqueue_style( 'bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css', false, 'v1.0' );
	wp_enqueue_style( 'fonts', get_stylesheet_directory_uri() . '/css/all.css', false, 'v1.0' );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/css/style.css', false, 'v1.0' );
}
add_action( 'wp_enqueue_scripts', 'mg_register_css_js' );


/**
 * Login Customization
 */
function mg_login_logo() { ?>
<style type="text/css">
body.login { }
body.login div#login h1 a {
	background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/large.png) no-repeat 0 0;
	height: 100px;
	margin-left: auto;
	margin-right: auto;
	width: 295px;
}
.login #nav a,
.login #backtoblog a {
	/*color: #fff !important;
	text-shadow: none;*/
}
.login #nav a:hover,
.login #backtoblog a:hover { color: #fff !important }

</style>
<?php }

function no_errors_please() {
	return '<strong>ERRO:</strong> A senha ou usuário fornecidos estão incorretos. <a href="' . home_url( '/wp-login.php?action=lostpassword' ) . '">Esqueceu sua senha</a>?';
}
function mg_login_logo_url() {
	return get_bloginfo( 'url' );
}
function mg_login_logo_url_title() {
	return 'Ir para o início';
}
add_action( 'login_enqueue_scripts', 'mg_login_logo' );
add_filter( 'login_errors', 'no_errors_please' );
add_filter( 'login_headerurl', 'mg_login_logo_url' );
add_filter( 'login_headertitle', 'mg_login_logo_url_title' );


// Editor styles
// function mg_theme_add_editor_styles() {
// 	add_editor_style( 'editor-style.css' );
// }
// add_action( 'init', 'mg_theme_add_editor_styles' );
