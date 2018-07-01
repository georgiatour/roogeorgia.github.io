<?php

add_action( 'init', 'register_tourpacker_Services' );
function register_tourpacker_Services() {
    
    $labels = array( 
        'name' => __( 'Tour', 'tourpacker' ),
        'singular_name' => __( 'Tour', 'tourpacker' ),
        'add_new' => __( 'Add New Tour', 'tourpacker' ),
        'add_new_item' => __( 'Add New Tour', 'tourpacker' ),
        'edit_item' => __( 'Edit Tour', 'tourpacker' ),
        'new_item' => __( 'New Tour', 'tourpacker' ),
        'view_item' => __( 'View Tour', 'tourpacker' ),
        'search_items' => __( 'Search Tour', 'tourpacker' ),
        'not_found' => __( 'No Tour found', 'tourpacker' ),
        'not_found_in_trash' => __( 'No Tour found in Trash', 'tourpacker' ),
        'parent_item_colon' => __( 'Parent Tour:', 'tourpacker' ),
        'menu_name' => __( 'Tour', 'tourpacker' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'List Tour',
        'supports' => array( 'title', 'editor', 'thumbnail', 'comments', 'post-formats' ),
        'taxonomies' => array( 'Portfolio_category','skills' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => '', 
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'Tour', $args );
}

add_action( 'init', 'create_Skills_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Skills_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

  $labels = array(
    'name' => __( 'Skills', 'tourpacker' ),
    'singular_name' => __( 'Skills', 'tourpacker' ),
    'search_items' =>  __( 'Search Skills','tourpacker' ),
    'all_items' => __( 'All Skills','tourpacker' ),
    'parent_item' => __( 'Parent Skills','tourpacker' ),
    'parent_item_colon' => __( 'Parent Skills:','tourpacker' ),
    'edit_item' => __( 'Edit Skills','tourpacker' ), 
    'update_item' => __( 'Update Skills','tourpacker' ),
    'add_new_item' => __( 'Add New Skills','tourpacker' ),
    'new_item_name' => __( 'New Skills Name','tourpacker' ),
    'menu_name' => __( 'Skills','tourpacker' ),
  );     

// Now register the taxonomy

  register_taxonomy('skills',array('Tour'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'skills' ),
  ));

}
?>