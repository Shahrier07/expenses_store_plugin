<?php

function wealcoder_dashboard_pages()
{
  add_menu_page(
    __( 'WealCoder Purchase Plugin', 'wpplugin' ),
    __( 'WealCoder Purchase Plugin', 'wpplugin' ),
    'manage_options',
    'wpplugin', //slug
    'wealcoder_settings_page_markup',
    'dashicons-wordpress-alt',
    3
  );
  add_submenu_page(
    'wpplugin',
    __( 'Expense', 'wpplugin' ),
    __( 'Expense', 'wpplugin' ),
    'manage_options',
    'add_expense', //slug
    'add_expense_markup'
  );

  add_submenu_page(
    'wpplugin',
    __( 'Total Expense and filter', 'wpplugin' ),
    __( 'Total Expense and filter', 'wpplugin' ),
    'manage_options',
    'tot_expense_filter',
    'tot_expense_filter_markup'
  );
  add_submenu_page(
    'wpplugin',
    __( 'Search Expense', 'wpplugin' ),
    __( 'Search Expense', 'wpplugin' ),
    'manage_options',
    'search_expense',
    'search_expense_markup'
  );
    add_submenu_page(
    'wpplugin',
    __( 'Add Category', 'wpplugin' ),
    __( 'Add Category', 'wpplugin' ),
    'manage_options',
    'add_category',
    'add_category_markup'
  );
 
     

}
add_action( 'admin_menu', 'wealcoder_dashboard_pages' ); //add dashboard 

// Add a link to your settings page in your plugin
function wealcoder_add_settings_link( $links ) {
    $settings_link = '<a href="admin.php?page=wpplugin">' . __( 'Settings' ) . '</a>';
    array_push( $links, $settings_link );
    return $links;
}
$filter_name = "plugin_action_links_" . plugin_basename( __FILE__ );
add_filter( $filter_name, 'wealcoder_add_settings_link' );



///==========Functions========

function wealcoder_settings_page_markup()
{
  // Double check user capabilities
  if ( !current_user_can('manage_options') ) {
      return;
  }else{
    include( plugin_dir_path( __FILE__ ) . 'contents/dashboard.php'); 
  }
}


function add_expense_markup()
{
    include( plugin_dir_path( __FILE__ ) . 'contents/add_expense.php');
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'bp_new_expense';
    $sql = "CREATE TABLE `$table_name` (
    `exp_id` int(11) NOT NULL AUTO_INCREMENT,
    `exp_date` date DEFAULT NULL,
    `paid_to` varchar(220) DEFAULT NULL,
    `amount` varchar(220) DEFAULT NULL,
    `purpose` varchar(220) DEFAULT NULL,

    PRIMARY KEY(exp_id)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
    ";
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);
    }
}

function tot_expense_filter_markup()
{
     include( plugin_dir_path( __FILE__ ) . 'contents/tot_expense_filter.php');
}
function search_expense_markup()
{
    include( plugin_dir_path( __FILE__ ) . 'contents/search_expense.php');
    
}
function add_category_markup()
{
    include( plugin_dir_path( __FILE__ ) . 'contents/add_category.php');
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();
    $table_name = $wpdb->prefix . 'bp_new_category';
    $sql = "CREATE TABLE `$table_name` (
    `cat_id` int(11) NOT NULL AUTO_INCREMENT,
    `cat_name` varchar(220) DEFAULT NULL,
    
    PRIMARY KEY(cat_id)
    ) ENGINE=MyISAM DEFAULT CHARSET=latin1;
    ";
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
      require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
      dbDelta($sql);
    }
    
}
///=================================///

?>