<?php
add_action( 'init', 'team_init' );

function team_init() {
	$labels = array(
		'name'               => _x( 'Team', 'post type general name', 'brushed' ),
		'singular_name'      => _x( 'Team', 'post type singular name', 'brushed' ),
		'menu_name'          => _x( 'Team', 'admin menu', 'brushed' ),
		'name_admin_bar'     => _x( 'Team', 'add new on admin bar', 'brushed' ),
		'add_new'            => _x( 'Add Member', 'portfolio', 'brushed' ),
		'add_new_item'       => __( 'Add New Member', 'brushed' ),
		'new_item'           => __( 'New Member', 'brushed' ),
		'edit_item'          => __( 'Edit  Member', 'brushed' ),
		'view_item'          => __( 'View  Member', 'brushed' ),
		'all_items'          => __( 'All Members', 'brushed' ),
		'search_items'       => __( 'Search Members', 'brushed' ),
		'parent_item_colon'  => __( 'Parent Member:', 'brushed' ),
		'not_found'          => __( 'No Member found.', 'brushed' ),
		'not_found_in_trash' => __( 'No Members found in Trash.', 'brushed' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'team' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title')
	);

	register_post_type( 'team', $args );
}


// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_team_taxonomies');

// create two taxonomies, genres and writers for the post type "book"
function create_team_taxonomies() {


	$labels = array(
		'name'              => _x( 'Function', 'taxonomy general name' , 'brushed'),
		'singular_name'     => _x( 'Function', 'taxonomy singular name' , 'brushed'),
		'search_items'      => __( 'Search Functions', 'brushed' ),
		'all_items'         => __( 'All Functions', 'brushed' ),
		'parent_item'       => __( 'Parent Function' , 'brushed'),
		'parent_item_colon' => __( 'Parent Function:' , 'brushed'),
		'edit_item'         => __( 'Edit Function', 'brushed' ),
		'update_item'       => __( 'Update Function', 'brushed' ),
		'add_new_item'      => __( 'Add New Function' , 'brushed'),
		'new_item_name'     => __( 'New Function Name' , 'brushed'),
		'menu_name'         => __( 'Function' , 'brushed'),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'function' ),
	);

	register_taxonomy( 'functions', 'team', $args );
}