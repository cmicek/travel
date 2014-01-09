<?php 

$defaults = array(
	'default-image'          => '',
	'random-default'         => false,
	'width'                  => 0,
	'height'                 => 0,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
);

	add_editor_style('style.css');
	add_theme_support('nav-menus');
	add_theme_support('html5');
	add_theme_support('custom-background');
	add_theme_support( 'custom-header', $defaults);
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	
	// add_post_type_support('page', 'excerpt');
	automatic_feed_links(); 												                          //Sets RSS to be auto-discovered.
	// set_post_thumbnail_size( 200, 200, false );								                //Sets the thumbnail size


	if (!is_admin()) add_action('wp_print_scripts', 'ad_theme_javascript' );  //Adds the JS to the theme
	
	
	function ad_theme_javascript( ) {
		wp_enqueue_script('jquery');
		wp_enqueue_script("toggle",  get_bloginfo('template_directory')."/assets/js/jquery.toggle.js", true);
		wp_enqueue_script("script",  get_bloginfo('template_directory')."/assets/js/script.js", true);
  }
	
?>