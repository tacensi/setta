<?php
/**
 * ACF Functions
 *
 * @package Setta
 * @author Thiago Censi
 * @version 1.0
 */


/**
 * Option pages
 */
if( function_exists('acf_add_options_page') ) {

	$option_page = acf_add_options_page(array(
		'page_title'    => 'Personalizar',
		'menu_title'    => 'Personalizar',
		'menu_slug'     => 'personalizar',
		'capability'    => 'edit_posts',
		'redirect'  => true
	));
}

if( function_exists('acf_add_options_sub_page') ){
	acf_add_options_sub_page(array(
		'title' => 'Header',
		'parent' => 'personalizar'
	));

	acf_add_options_sub_page(array(
		'title' => 'Contato',
		'parent' => 'personalizar'
	));
}

/**
 * Add custom colors to ACF Color Picker
 */
function mg_load_javascript_on_admin_edit_post_page() {
	global $parent_file;

	//If we're on the edit post page.
	if ( $parent_file == 'post-new.php' ||
		$parent_file  == 'edit.php' ||
		$parent_file  == 'edit.php?post_type=page' ) {
		echo "
		  <script>
		  jQuery(document).live('acf/setup_fields', function(e, div){
			jQuery('.color_picker').each(function() {
			  jQuery(this).iris({
				palettes: ['#ec1d48', '#bdd171', '#7ebdc7']
			  });
			});
		  });
		  </script>
		";
	}
}
// add_action('in_admin_footer', 'mg_load_javascript_on_admin_edit_post_page');
