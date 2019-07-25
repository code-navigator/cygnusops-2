<?php

/**
 * Enqueue the Vue single page application and various styles
 */
function cygnusops_enqueue_scripts() {
  // Register Vue script
  wp_register_script(
    'vue_script',                   // Handle
    'http://localhost:3000/app.js', // Source
    array(),                        // Dependencies
    false,                          // Version
    true                            // In footer
  );

  // Register Google font
  wp_register_style(
    'fonts',                                                                    // Handle
    'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900',   // Source
    array(),                                                                    // Dependencies
    false,                                                                      // Version
    'all'                                                                       // Media        
  );

  // Register Material Design icons
  wp_register_style(
    'icons',                                                                     
    'https://fonts.googleapis.com/css?family=Material+Icons',
    array(),
    false,
    'all'
  );

  // Enqueue the Vue script
  wp_enqueue_script('vue_script');

  // Enqueue fonts
  wp_enqueue_style('fonts');

  // Enqueue icons
  wp_enqueue_style('icons');
}
add_action( 'wp_enqueue_scripts', 'cygnusops_enqueue_scripts' );

/**
 * Add Wordpress Theme support for navigation menu
 */
function cygnusops_register_menu() {
  register_nav_menu( 'menu', __( 'Header Menu' ) );
}
add_action( 'init', 'cygnusops_register_menu' );

/**
 * Return menu structure
 */
function cygnusops_get_menu() {
  # Change 'menu' to your own navigation slug.
  return wp_get_nav_menu_items('main-menu');
}

/**
 * Register custom endpoints
 */
function cygnusops_register_rest_routes() {
  // Endpoint for returning menus (i.e., "http://{domain_name}/wp-json/routes/menus" )
  register_rest_route(
    'routes',                                 // First URL segment after domain
    '/menus',                                 // Base URL for route
    array(
      'methods' => WP_REST_SERVER::READABLE,  // HTTP method
      'callback' => 'cygnusops_get_menu',
  ));
}
add_action( 'rest_api_init', 'cygnusops_register_rest_routes' );



function create_product_cpt() { 
  $labels = array(   
    'name' => __( 'Products', 'Post Type General Name', 'products' ),   
    'singular_name' => __( 'Product', 'Post Type Singular Name', 'products' ),   
    'menu_name' => __( 'Products', 'products' ),   
    'name_admin_bar' => __( 'Product', 'products' ),   
    'archives' => __( 'Product Archives', 'products' ),   
    'attributes' => __( 'Product Attributes', 'products' ),   
    'parent_item_colon' => __( 'Parent Product:', 'products' ),   
    'all_items' => __( 'All Products', 'products' ),   
    'add_new_item' => __( 'Add New Product', 'products' ),   
    'add_new' => __( 'Add New', 'products' ),   
    'new_item' => __( 'New Product', 'products' ),   
    'edit_item' => __( 'Edit Product', 'products' ),   
    'update_item' => __( 'Update Product', 'products' ),   
    'view_item' => __( 'View Product', 'products' ),   
    'view_items' => __( 'View Products', 'products' ),   
    'search_items' => __( 'Search Product', 'products' ),   
    'not_found' => __( 'Not found', 'products' ),   
    'not_found_in_trash' => __( 'Not found in Trash', 'products' ),   
    'featured_image' => __( 'Featured Image', 'products' ),   
    'set_featured_image' => __( 'Set featured image', 'products' ),   
    'remove_featured_image' => __( 'Remove featured image', 'products' ),   
    'use_featured_image' => __( 'Use as featured image', 'products' ),   
    'insert_into_item' => __( 'Insert into Product', 'products' ),   
    'uploaded_to_this_item' => __( 'Uploaded to this Product', 'products' ),   
    'items_list' => __( 'Products list', 'products' ),   
    'items_list_navigation' => __( 'Products list navigation', 'products' ),   
    'filter_items_list' => __( 'Filter Products list', 'products' ),  
  );

  $args = array(   
    'label' => __( 'Product', 'products' ),   
    'description' => __( '', 'products' ),   
    'labels' => $labels,   
    'menu_icon' => 'dashicons-products',   
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),   
    'taxonomies' => array('products'),   
    'public' => true,   
    'show_ui' => true,   
    'show_in_menu' => true,   
    'menu_position' => 5,   
    'show_in_admin_bar' => true,   
    'show_in_nav_menus' => true,   
    'can_export' => true,   
    'has_archive' => true,   
    'hierarchical' => false,   
    'exclude_from_search' => false,   
    'show_in_rest' => true,   
    'rest_base' => 'products',   
    'publicly_queryable' => true,   
    'capability_type' => 'post'  
  );

  register_post_type( "product", $args );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_product_cpt' );