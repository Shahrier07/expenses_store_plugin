<?php
/*
Plugin Name: WealCoder Expense Plugin
Plugin URI: localhost
Description: Use this plugin to create new projects and then select the project name in Add New Product Page..
Version: 1.0.0
Contributors: Shahrier Sarder
Author: Shahrier Sarder
Author URI: 
License: GPLv2 or later
License URI: 
Text Domain: 
Domain Path: 
*/


// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}

define( 'BPPLUGIN_URL', plugin_dir_url( __FILE__ ) );

// Enqueue Plugin CSS
include( plugin_dir_path( __FILE__ ) . 'includes/dashboard-styles.php');

// Enqueue Plugin JavaScript
include( plugin_dir_path( __FILE__ ) . 'includes/dashboard-scripts.php');

// Create Plugin Admin Menus and Setting Pages
include( plugin_dir_path( __FILE__ ) . 'includes/dashboard-menus.php');

?>
