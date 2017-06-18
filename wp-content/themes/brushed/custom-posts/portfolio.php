<?php
add_action( 'init', 'portfolio_init' );

function portfolio_init() {
$labels = array(
'name'               => _x( 'Portfolio', 'post type general name', 'brushed' ),
'singular_name'      => _x( 'Portfolio', 'post type singular name', 'brushed' ),
'menu_name'          => _x( 'Portfolio', 'admin menu', 'brushed' ),
'name_admin_bar'     => _x( 'Portfolio', 'add new on admin bar', 'brushed' ),
'add_new'            => _x( 'Add Item', 'portfolio', 'brushed' ),
'add_new_item'       => __( 'Add New Item', 'brushed' ),
'new_item'           => __( 'New Item', 'brushed' ),
'edit_item'          => __( 'Edit  Item', 'brushed' ),
'view_item'          => __( 'View  Item', 'brushed' ),
'all_items'          => __( 'All Items', 'brushed' ),
'search_items'       => __( 'Search Items', 'brushed' ),
'parent_item_colon'  => __( 'Parent Item:', 'brushed' ),
'not_found'          => __( 'No Item found.', 'brushed' ),
'not_found_in_trash' => __( 'No Items found in Trash.', 'brushed' ),
);

$args = array(
'labels'             => $labels,
'public'             => true,
'publicly_queryable' => true,
'show_ui'            => true,
'show_in_menu'       => true,
'query_var'          => true,
'rewrite'            => array( 'slug' => 'portfolio' ),
'capability_type'    => 'post',
'has_archive'        => true,
'hierarchical'       => false,
'menu_position'      => null,
'supports'           => array( 'title')
);

register_post_type( 'portfolio', $args );
}


// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_portfolio_taxonomies');

// create two taxonomies, genres and writers for the post type "book"
function create_portfolio_taxonomies() {


    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
        'name'                       => _x( 'Categories', 'taxonomy general name','brushed' ),
        'singular_name'              => _x( 'Category', 'taxonomy singular name','brushed' ),
        'search_items'               => __( 'Search Categories','brushed' ),
        'popular_items'              => __( 'Popular Categories','brushed' ),
        'all_items'                  => __( 'All Categories','brushed' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Category','brushed' ),
        'update_item'                => __( 'Update Category','brushed' ),
        'add_new_item'               => __( 'Add New Category','brushed' ),
        'new_item_name'              => __( 'New Category Name','brushed' ),
        'separate_items_with_commas' => __( 'Separate categories with commas','brushed' ),
        'add_or_remove_items'        => __( 'Add or remove categories' ,'brushed'),
        'choose_from_most_used'      => __( 'Choose from the most used categories','brushed' ),
        'not_found'                  => __( 'No categories found.','brushed' ),
        'menu_name'                  => __( 'Categories' ,'brushed'),
    );

    $args = array(
        'hierarchical'          => false,
        'labels'                => $labels,
        'show_ui'               => true,
        'show_admin_column'     => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'category' ),
    );

    register_taxonomy( 'categories', 'portfolio', $args );
}