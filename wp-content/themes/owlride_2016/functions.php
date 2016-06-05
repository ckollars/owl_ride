<?php
//  ================
//  = THEME SET UP =
//  ================


if (!function_exists('owlride_init')):

  function owlride_init() {
    wp_deregister_script('comment-reply');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'feed_links_extra', 3);
    remove_action('wp_head', 'feed_links', 2);
  }
  add_action('init', 'owlride_init');

endif;


if (!function_exists('olwride_setup')):

  function olwride_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('automatic-feed-links');

    add_theme_support( 'post-thumbnails' );

    register_nav_menu('main_menu', __( 'Main Menu' ));

    // Remove heights and widths from thumbnails for responsive
    add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

    // Remove heights and widths from inserted images for responsive
    add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
    add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );
  }
  add_action('after_setup_theme', 'olwride_setup');

endif;

// Remove some of the default Wordpress Dashboard Widgets
function owlride_disable_default_dashboard_widgets() {
  remove_meta_box('dashboard_plugins', 'dashboard', 'core');
  remove_meta_box('dashboard_quick_press', 'dashboard', 'core');
  remove_meta_box('dashboard_primary', 'dashboard', 'core');
  remove_meta_box('dashboard_secondary', 'dashboard', 'core');
}

add_action('admin_menu', 'owlride_disable_default_dashboard_widgets');



// add_image_size('lorem', 2000, 1300, true);
