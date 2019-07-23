<?php

/**
 * Enqueue the Vue single page application
 */
function cygnusops_enqueue_scripts() {
  // Register Vue script
  wp_register_script(
    'vue_script',
    'http://localhost:3000/app.js',
    array(),
    false,
    true
  );

  // Enqueue the Vue script
  wp_enqueue_script('vue_script');
}
add_action( 'wp_enqueue_scripts', 'cygnusops_enqueue_scripts');