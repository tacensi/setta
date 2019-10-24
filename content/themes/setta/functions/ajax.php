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

	$title = $modulo->post_title;

	$body = $modulo->post_content;

	$body .= '<p>' . get_field( 'atividades', $modulo->ID ) . '<p>';

	die (
		json_encode(
			array(
				'title' => $title,
				'body'  => $body,
			)
		)
	);
}

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
	$mod_id = intval( trim( $_POST[ 'mod_id' ] ) );

	$modulo = get_post( $mod_id );


	if ( ! $modulo ) {

		die(
			json_encode(
				array(
					'body' => 'Não foi encontrada nenhuma atividade.',
				)
			)
		);

	}

	$page = $_POST['page'] ? $_POST['page'] : 1;

	$atividade_query = new WP_Query(
		array(
			'post_type' => 'atividade',
			'posts_per_page' => 2,
			'post_status' => 'publish',
			'paged' => $page,
			'page' => $page,
		)
	);

	// Content usa ob para carregar de um template part.
	ob_start();
	get_template_part( 'partials/atividade', 'list' );
	$body = ob_get_contents();
	ob_end_clean();

	die (
		json_enconde(
			array(
				'title' => $title,
				'body'  => $body,
			)
		)
	);
}

