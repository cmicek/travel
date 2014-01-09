<?php

 
/* ============================================================================
Registers Sidebars
==============================================================================*/

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
	  'id'            =>  'sidebar',
	  'name'          =>  'sidebar Sidebar',
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h4 class="widgettitle">',
		'after_title' => '</h4>',
	));
	
 }

/* ============================================================================
Builds Custom Taxonomies
==============================================================================*/
 
// $department_labels = array(
//     'name' => __( 'Departments' ),
//    	'singular_name' => __( 'Department' ),
//    	'search_items' => __( 'Search Departments' ),
//    	'popular_items' => __( 'Popular Departments' ),
//    	'all_items' => __( 'All Departments' ),
//    	'parent_item' => __( 'Parent Department' ),
//    	'parent_item_colon' => __( 'Parent Department:' ),
//    	'edit_item' => __( 'Edit Department' ),
//    	'update_item' => __( 'Update Department' ),
//    	'add_new_item' => __( 'Add New Department' ),
//    	'new_item_name' => __( 'New Department Name' )
//  );
// 
//  $department_args = array(
//  		'public' => true,
//  		'labels' => $department_labels,
//    	'hierarchical' => false,
//    	'rewrite' => true
//  );
 
//This is how you register a taxonomy across multiple custom post types
//register_taxonomy('department',array('tool', 'activity', 'event'),$department_args);

/* ============================================================================
Builds Custom Post Types
==============================================================================*/

$products_label = array(
   'name' => _x('Products', 'post type general name'),
   'singular_name' => _x('Product', 'post type singular name'),
   'add_new' => _x('Add New', 'Product'),
   'add_new_item' => __('Add New Product'),
   'edit_item' => __('Edit Product'),
   'new_item' => __('New Product'),
   'view_item' => __('View Product'),
   'search_items' => __('Search Products'),
   'not_found' =>  __('No Products found'),
   'not_found_in_trash' => __('No Products found in Trash'), 
   'parent_item_colon' => ''
 );

$products   = array(
  'description' => 'Products',
  'labels' => $products_label,
  'public' => true,
  'show_ui' => true,
  '_builtin' => false,
  '_edit_link' => 'post.php?post=%d',
  'capability_type' => 'page',
  'hierarchical' => false,
  'rewrite' => true,
  'query_var' => false,
  'supports' => array('title', 'editor', 'thumbnail', 'revisions'),
  'menu_position' => 5,
  'show_in_menu' => true,
  'show_in_nav_menus' => true,
  'has_archive' => 'products',
  'rewrite' => array('slug' => 'products')
); 
 

//register_post_type('products',$products);
  
 
/* ============================================================================
Registers Custom Navigation Menus
==============================================================================*/
  if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(array('header', 'footer'));
  }
?>