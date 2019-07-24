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
  // Endpoint for returning menus
  register_rest_route(
    'routes',                                 // First URL segment after domain
    '/menus',                                 // Base URL for route
    array(
      'methods' => WP_REST_SERVER::READABLE,  // HTTP method
      'callback' => 'cygnusops_get_menu',
  ));
}
add_action( 'rest_api_init', 'cygnusops_register_rest_routes' );