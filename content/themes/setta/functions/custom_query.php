<?php
/**
 * Custom query functions
 *
 * @package Setta
 * @author Thiago Censi
 * @version 1.0
 */



// Query vars
// Disponibilizando as query vars de ano para consulta de publicações
// function iag_register_query_vars( $vars ) {
// 	$vars[] = 'ano';
// 	return $vars;
// }
// add_filter( 'query_vars', 'iag_register_query_vars' );


// Alterando a query padrão
add_action( 'pre_get_posts', 'mg_pre_get_posts' );

function mg_pre_get_posts( $query ) {

	if ( ! $query->is_admin ) :

		if ( $query->is_post_type_archive( 'post' ) ) {
			$query->set( 'posts_per_page', 5 );
		}

	endif;

	return $query;

}
