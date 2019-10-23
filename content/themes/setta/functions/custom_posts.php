<?php
/**
 * Custom post types
 *
 * @package Setta
 * @author Thiago Censi
 * @version 1.0
 */


function mg_trilha() {

	$labels = array(
		'name'                => 'Trilhas',
		'singular_name'       => 'Trilha',
		'menu_name'           => 'Trilhas',
		'parent_item_colon'   => 'Trilha pai:',
		'all_items'           => 'Todas trilhas',
		'view_item'           => 'Ver Trilha',
		'add_new_item'        => 'Adicionar trilha',
		'new_item'            => 'Nova trilha',
		'add_new'             => 'Nova trilha',
		'edit_item'           => 'Editar trilha',
		'update_item'         => 'Atualizar trilha',
		'search_items'        => 'Buscar em trilhas',
		'not_found'           => 'Trilha não encontrado',
		'not_found_in_trash'  => 'Não encontrado na lixeira',
	);
	$args = array(
		'label'               => 'trilha',
		'description'         => 'Trilhas',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-rest-api',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite' => array( 'slug' => 'trilha', 'with_front' => true ),
	);
	register_post_type( 'trilha', $args );

	flush_rewrite_rules( false );

}
// Hook into the 'init' action
add_action( 'init', 'mg_trilha', 0 );


function mg_modulo() {

	$labels = array(
		'name'                => 'Módulos',
		'singular_name'       => 'Módulo',
		'menu_name'           => 'Módulos',
		'parent_item_colon'   => 'Módulo pai:',
		'all_items'           => 'Todas módulos',
		'view_item'           => 'Ver Módulo',
		'add_new_item'        => 'Adicionar módulo',
		'new_item'            => 'Nova módulo',
		'add_new'             => 'Nova módulo',
		'edit_item'           => 'Editar módulo',
		'update_item'         => 'Atualizar módulo',
		'search_items'        => 'Buscar em módulos',
		'not_found'           => 'Módulo não encontrado',
		'not_found_in_trash'  => 'Não encontrado na lixeira',
	);
	$args = array(
		'label'               => 'módulo',
		'description'         => 'Módulos',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-excerpt-view',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite' => array( 'slug' => 'modulo', 'with_front' => true ),
	);
	register_post_type( 'modulo', $args );

	flush_rewrite_rules( false );

}
// Hook into the 'init' action
add_action( 'init', 'mg_modulo', 0 );


function mg_atividade() {

	$labels = array(
		'name'                => 'Atividades',
		'singular_name'       => 'Atividade',
		'menu_name'           => 'Atividades',
		'parent_item_colon'   => 'Atividade pai:',
		'all_items'           => 'Todas atividades',
		'view_item'           => 'Ver Atividade',
		'add_new_item'        => 'Adicionar atividade',
		'new_item'            => 'Nova atividade',
		'add_new'             => 'Nova atividade',
		'edit_item'           => 'Editar atividade',
		'update_item'         => 'Atualizar atividade',
		'search_items'        => 'Buscar em atividades',
		'not_found'           => 'Atividade não encontrado',
		'not_found_in_trash'  => 'Não encontrado na lixeira',
	);
	$args = array(
		'label'               => 'atividade',
		'description'         => 'Atividades',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-smiley',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
		'rewrite' => array( 'slug' => 'atividade', 'with_front' => true ),
	);
	register_post_type( 'atividade', $args );

	flush_rewrite_rules( false );

}
// Hook into the 'init' action
add_action( 'init', 'mg_atividade', 0 );
