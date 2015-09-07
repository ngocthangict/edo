<?php

if ( ! defined('ABSPATH')) exit;

function register_post_type_init() {
    
    $labels = array(
        'name'          => __( 'Mega Menu', 'edo' ),
        'singular_name' => __( 'Mega Menu Item', 'edo' ),
        'add_new'       => __( 'Add New', 'edo' ),
        'add_new_item'  => __( 'Add New Menu Item', 'edo' ),
        'edit_item'     => __( 'Edit Menu Item', 'edo' ),
        'new_item'      => __( 'New Menu Item', 'edo' ),
        'view_item'     => __( 'View Menu Item', 'edo' ),
        'search_items'  => __( 'Search Menu Items', 'edo' ),
        'not_found'     => __( 'No Menu Items found', 'edo' ),
        'not_found_in_trash' => __( 'No Menu Items found in Trash', 'edo' ),
        'parent_item_colon'  => __( 'Parent Menu Item:', 'edo' ),
        'menu_name'     => __( 'Mega Menu', 'edo' ),
    );

    $args = array(
        'labels' => $labels,
        'hierarchical'        => false,
        'description'         => __('Mega Menus.', 'edo'),
        'supports'            => array( 'title', 'editor' ),
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'menu_position'       => 40,
        'show_in_nav_menus'   => true,
        'publicly_queryable'  => false,
        'exclude_from_search' => true,
        'has_archive'         => false,
        'query_var'           => true,
        'can_export'          => true,
        'rewrite'             => false,
        'capability_type'     => 'page',
        'menu_icon' => 'dashicons-welcome-widgets-menus',
    );

    register_post_type( 'megamenu', $args );
    
    /* Partners */
    $labels = array(
        'name'               => __( 'Partner', 'edo' ),
        'singular_name'      => __( 'Partner', 'edo'),
        'add_new'            => __( 'Add New', 'edo' ),
        'all_items'          => __( 'Partners', 'edo' ),
        'add_new_item'       => __( 'Add New Partner', 'edo' ),
        'edit_item'          => __( 'Edit Partner', 'edo' ),
        'new_item'           => __( 'New Partner', 'edo' ),
        'view_item'          => __( 'View Partner', 'edo' ),
        'search_items'       => __( 'Search Partner', 'edo' ),
        'not_found'          => __( 'No Partner found', 'edo' ),
        'not_found_in_trash' => __( 'No Partner found in Trash', 'edo' ),
        'parent_item_colon'  => __( 'Parent Partner', 'edo' ),
        'menu_name'          => __( 'Partner', 'edo' )
    );
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'rewrite'            => false,
        'query_var'          => false,
        'publicly_queryable' => false,
        'public'             => true,
        'menu_icon' => 'dashicons-editor-quote',
        

    );
    register_post_type( 'partner', $args );

    /* Services */
    $labels = array(
        'name'               => __( 'Services', 'edo' ),
        'singular_name'      => __( 'Services', 'edo'),
        'add_new'            => __( 'Add New', 'edo' ),
        'all_items'          => __( 'Services', 'edo' ),
        'add_new_item'       => __( 'Add New Service', 'edo' ),
        'edit_item'          => __( 'Edit Service', 'edo' ),
        'new_item'           => __( 'New Service', 'edo' ),
        'view_item'          => __( 'View Service', 'edo' ),
        'search_items'       => __( 'Search Service', 'edo' ),
        'not_found'          => __( 'No Service found', 'edo' ),
        'not_found_in_trash' => __( 'No Service found in Trash', 'edo' ),
        'parent_item_colon'  => __( 'Parent Service', 'edo' ),
        'menu_name'          => __( 'Services', 'edo' )
    );
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => false,
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
        'rewrite'            => true,
        'query_var'          => true,
        'publicly_queryable' => true,
        'public'             => true,
        'menu_icon' => 'dashicons-update'
    );
    register_post_type( 'service', $args );
    flush_rewrite_rules();
}
add_action( 'init', 'register_post_type_init' );