<?php

// Load JS on all admin pages
function bus_procure_admin_scripts() {

   wp_enqueue_script(
    'wpplugin-admin',
    BPPLUGIN_URL . 'includes/material-dashboard-master/assets/js/custom.js',
    [''],
    1.1, 
    true
  );

  wp_enqueue_script(
    'wpplugin-admin',
    BPPLUGIN_URL . 'includes/material-dashboard-master/assets/js/material-dashboard.js',
    array ( 'jquery' ),
    1.1, 
    true
  );
  wp_enqueue_script(
    'wpplugin-admin',
    BPPLUGIN_URL . 'includes/material-dashboard-master/assets/js/jquery.min.js',
    ['jquery'],
    time()
  );
  wp_enqueue_script(
    'wpplugin-admin',
    BPPLUGIN_URL . 'includes/material-dashboard-master/assets/js/popper.min.js',
    ['jquery'],
    time()
  );

}
add_action( 'admin_enqueue_scripts', 'bus_procure_admin_scripts', 100 );


// Load JS on the frontend
function bus_procure_frontend_scripts() {

  wp_enqueue_script(
    'wpplugin-frontend',
    BPPLUGIN_URL . 'frontend/js/wpplugin-frontend.js',
    [],
    time()
  );
}
add_action( 'wp_enqueue_scripts', 'bus_procure_frontend_scripts', 100 );
