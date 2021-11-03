<?php

// Load CSS on all admin pages
function bus_procure_admin_styles() {

   
  wp_enqueue_style(
    'wpplugin-admin',
    BPPLUGIN_URL . 'includes/material-dashboard-master/assets/css/material-dashboard.css',
    [],
    time()
  );
  wp_enqueue_style(
    'wpplugin-admin',
    BPPLUGIN_URL . 'includes/material-dashboard-master/assets/css/material-dashboard.min.css',
    [],
    time()
  );
  

}
add_action( 'admin_enqueue_scripts', 'bus_procure_admin_styles' );


// Load CSS on the frontend
function bus_procure_frontend_styles() {

  wp_enqueue_style(
    'wpplugin-frontend',
    BPPLUGIN_URL . 'frontend/css/wpplugin-frontend-style.css',
    [],
    time()
  );
}
add_action( 'wp_enqueue_scripts', 'bus_procure_frontend_styles', 100 );
