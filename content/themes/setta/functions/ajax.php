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

add_action("wp_ajax_setta_get_modulo", "setta_get_modulo");
add_action("wp_ajax_nopriv_setta_get_modulo", "setta_get_modulo");

function setta_get_modulo() {

	// Erro genérico na falta de post
	if ( ! $_POST['mod_id'] ) {
		die(
			json_encode(
				array(
					'title' => 'Módulo não encontrado',
					'body' => 'Não foi possível encontrar o módulo desejado.',
				)
			)
		);
	}
	$mod_id = intval( trim( $_POST[ 'mod_id' ] ) );

	$modulo = get_post( $mod_id );


	if ( ! $modulo ) {

		die(
			json_encode(
				array(
					'title' => 'Módulo não encontrado',
					'body' => 'Não foi possível encontrar o módulo desejado.',
				)
			)
		);

	}

	// título do post para o modal.
	$title = $modulo->post_title;

	// body do post com as atividades.
	$body = $modulo->post_content;

	$atividades_ids = get_field( 'atividades', $modulo->ID );

	// podemos usar get_posts porque será sempre a primeira página
	// nas seguintes deve ser wp_query para paginar
	$atividades_posts = get_posts(
		array(
			'posts_per_page' => 3,
			'post_type' => 'atividade',
			'post_status' => 'publish',
			'post__in' => $atividades_ids,
		)
	);

	$body .= '<ul id="atividades-list">';
	foreach ( $atividades_posts as $atividade ) {
		$body .= '<li>' . $atividade->post_title ; '</li>';
	}
	$body .= '</ul>';
	$body .= '<div class="btn-group" role="group" aria-label="Navigation">';
	$body .= '<button type="button" class="btn btn-sm btn-primary atividade-navigation previous" data-modulo="' . $mod_id . '" disabled>Anterior</button>';
	$body .= '<button type="button" class="btn btn-sm btn-primary atividade-navigation next" data-modulo="' . $mod_id . '" data-page="2">Próximo</button>';

	// salva o post global original
	global $post;
	$old_post = $post;
	$post = $modulo;

	// titulos e ids dos links de próximo e anterior.
	$previous = get_previous_post();
	$next = get_next_post();

	// redefine global
	$post = $old_post;


	$next_id = $next->ID;
	$next_title = $next->post_title;
	$previous_id = $previous->ID;
	$previous_title = $previous->post_title;

	die (
		json_encode(
			array(
				'title' => $title,
				'body'  => $body,
				'next' => array(
					'id' => $next_id,
					'title' => $next_title,
				),
				'previous' => array(
					'id' => $previous_id,
					'title' => $previous_title,
				)
			)
		)
	);
}



add_action("wp_ajax_setta_get_atividades", "setta_get_atividades");
add_action("wp_ajax_nopriv_setta_get_atividades", "setta_get_atividades");

function setta_get_atividades() {

	// Erro genérico na falta de post
	if ( ! $_POST['mod_id'] ) {
		die(
			json_encode(
				array(
					'body' => 'Não foi encontrada nenhuma atividade.',
				)
			)
		);
	}

	$atividades_ids = get_field( 'atividades', $modulo->ID );

	$page = $_POST['page'] ? $_POST['page'] : 1;

	$atividades_query = new WP_Query(
		array(
			'posts_per_page' => 3,
			'post_type' => 'atividade',
			'post_status' => 'publish',
			'post__in' => $atividades_ids,
			'paged' => $page,
		)
	);
	if ( $atividades_query->have_posts() ) {

		$body = '';
		$total_pages = $atividades_query->max_num_pages;

		while ( $atividades_query->have_posts() ) {
			$atividades_query->the_post();
			$body .= '<li>' . get_the_title(); '</li>';
		}

	}

	die (
		json_encode(
			array(
				'body'  => $body,
				'total_pages'  => $total_pages,
				'page'  => $page,
			)
		)
	);
}

