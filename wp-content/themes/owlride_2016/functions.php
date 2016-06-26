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


function owlride_scripts_init() {
  wp_enqueue_style('olwride_main', get_template_directory_uri() . '/styles.min.css', false, filemtime(get_stylesheet_directory() . '/styles.min.css'));

  if (!is_admin() && current_theme_supports('jquery-cdn')) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js', array(), null, true);
    add_filter('script_loader_src', 'owlride_jquery_local_fallback', 10, 2);
  }

  if (is_single() && comments_open() && get_option('thread_comments')) {wp_enqueue_script('comment-reply'); }

  wp_register_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr.min.js', array(), false, false);
  wp_enqueue_script('modernizr');

  wp_register_script('picturefill', get_template_directory_uri() . '/js/vendor/picturefill.min.js', array(), false, false);
  wp_enqueue_script('picturefill');

  wp_enqueue_script('jquery');

  wp_register_script('owlride_scripts', get_template_directory_uri() . '/js/scripts.min.js', array(), filemtime(get_stylesheet_directory() . '/js/scripts.min.js'), true);
  wp_enqueue_script('owlride_scripts');
}
add_action('wp_enqueue_scripts', 'owlride_scripts_init');

// http://wordpress.stackexchange.com/a/12450
function owlride_jquery_local_fallback($src, $handle = null) {
  static $add_jquery_fallback = false;
  if ($add_jquery_fallback) {
    echo '<script>window.jQuery || document.write(\'<script src="' . get_template_directory_uri() . '/-/js/vendor/jquery.min.js"><\/script>\')</script>' . "\n";
    $add_jquery_fallback = false;
  }
  if ($handle === 'jquery') {
    $add_jquery_fallback = true;
  }
  return $src;
}
add_action('wp_head', 'owlride_jquery_local_fallback');

// Adding ACF Options tab
if( function_exists('acf_add_options_page') ) {

  // add parent
  $parent = acf_add_options_page(array(
    'page_title'  => 'Theme Options and Settings',
    'menu_title'  => 'Theme Options',
    'redirect'    => false
  ));

}


add_image_size('hero', 1440, 709, array('center', 'center'));
add_image_size('hero_2x', 2880, 1418, array('center', 'center'));
