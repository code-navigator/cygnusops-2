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
add_action( 'wp_enqueue_scripts', 'cygnusops_enqueue_scripts');