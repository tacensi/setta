<?php
/**
 * Ajax functions
 *
 * @package Setta
 * @author Thiago Censi
 * @version 1.0
 */


/**
 * Load More
 */

add_action("wp_ajax_mg_infinite_posts", "mg_infinite_posts");
add_action("wp_ajax_nopriv_mg_infinite_posts", "mg_infinite_posts");

function mg_infinite_posts() {
	$paged = $_POST[ 'paged' ] ? $_POST[ 'paged' ] : 1;
	$type = $_POST[ 'type' ] ? $_POST[ 'type' ] : 'noticia';

	$args = array(
		'post_type' => $type,
		'post_status' => 'publish',
		'posts_per_page' => 12,
		'paged' => $paged,
	);

	$query = new WP_Query( $args );

	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post();

			get_template_part( 'layouts/partials/' . $type, 'list_item' );

		endwhile;
	endif;
	die();
}
