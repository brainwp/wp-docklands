<?php
// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Services', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Service', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Services', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Item:', 'text_domain' ),
		'all_items'           => __( 'All Services', 'text_domain' ),
		'view_item'           => __( 'View Service', 'text_domain' ),
		'add_new_item'        => __( 'Add New Service', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Service', 'text_domain' ),
		'update_item'         => __( 'Update Service', 'text_domain' ),
		'search_items'        => __( 'Search Service', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'services', 'text_domain' ),
		'description'         => __( 'Services', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'comments'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-hammer',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'services', $args );

	/* CPT Conselho */

	$labels = array(
			'name'                => _x( 'Conselho', 'Post Type General Name', 'odin' ),
			'singular_name'       => _x( 'Conselho', 'Post Type Singular Name', 'odin' ),
			'menu_name'           => __( 'Conselho', 'odin' ),
			'name_admin_bar'      => __( 'Conselho', 'odin' ),
			'parent_item_colon'   => __( 'Conselho Parente', 'odin' ),
			'all_items'           => __( 'Arquivos do Conselho', 'odin' ),
			'add_new_item'        => __( 'Adicionar Novo Arquivo', 'odin' ),
			'add_new'             => __( 'Novo Arquivo', 'odin' ),
			'new_item'            => __( 'Novo Arquivo', 'odin' ),
			'edit_item'           => __( 'Editar Arquivo', 'odin' ),
			'update_item'         => __( 'Atualizar Arquivo', 'odin' ),
			'view_item'           => __( 'Ver Arquivo', 'odin' ),
			'search_items'        => __( 'Buscar Arquivo', 'odin' ),
			'not_found'           => __( 'Não Encontrado', 'odin' ),
			'not_found_in_trash'  => __( 'Não Encontrado na Lixeira', 'odin' ),
		);
	$args = array(
		'label'               => __( 'conselho', 'odin' ),
		'description'         => __( 'Arquivos do Conselho', 'odin' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail'),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu' 		  => 'home-page.php',
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-media-archive',
		'show_in_admin_bar'   => false,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'map_meta_cap' => false,
		/*'capability_type' => array('conselho', 'conselhos'),*/
		'capabilities' => array(
			'edit_post' => 'edit_conselho',
			'read_post' => 'read_conselho',
			'delete_post' => 'delete_conselho',
			'edit_posts' => 'edit_conselhos',
			'edit_others_posts' => 'edit_others_conselhos',
			'publish_posts' => 'publish_conselhos',
			'read_private_posts' => 'read_private_conselhos',
		),
	);
	register_post_type( 'conselho', $args );

		$role = get_role( 'administrator' );
		$role->add_cap( 'edit_conselho' );
		$role->add_cap( 'read_conselho' );
		$role->add_cap( 'delete_conselho' );
		$role->add_cap( 'edit_conselhos' );
		$role->add_cap( 'edit_others_conselhos' );
		$role->add_cap( 'publish_conselhos' );
		$role->add_cap( 'read_private_conselhos' );

		$result = add_role( 'conselheiro', __( 'Conselheiro' ),

			array(

			 	'read' => true,
				'edit_post' => true,
				'edit_posts' => true,
				'edit_conselho' => true,
				'read_conselho' => true,
				'delete_conselho' => true,
				'edit_conselhos' => true,
				'edit_others_conselhos' => true,
				'publish_conselhos' => true,
				'read_private_conselhos' => true

			)

		);
}

// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );
