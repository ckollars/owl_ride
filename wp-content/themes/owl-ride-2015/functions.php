<?php
//  ================
//  = THEME SET UP =
//  ================

add_action( 'init', 'theme_setup' );
function theme_setup() {
  add_theme_support( 'post-thumbnails' );

  register_nav_menu('main_menu', __( 'Main Menu' ));

  add_multipost_thumbnails();
}

// Remove some of the default Wordpress Dashboard Widgets
function disable_default_dashboard_widgets() {
  remove_meta_box('dashboard_plugins', 'dashboard', 'core');
  remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
  remove_meta_box('dashboard_primary', 'dashboard', 'core');
  remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}

add_action('admin_menu', 'disable_default_dashboard_widgets');

