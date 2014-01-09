<?php

/* ============================================================================
Theme Functions
==============================================================================*/

$assets_path = TEMPLATEPATH . '/assets/';
$functions_path = TEMPLATEPATH . '/assets/functions/';

//Admin Framework
// require_once ($functions_path."admin-init.php"); 				//Admin specific settings and loads
// require_once ($functions_path."admin-menu.php"); 				//Sets Up Options Menu
// require_once ($functions_path."admin-interface.php");			//Customizes the Menus & Dashboard
// require_once ($functions_path."admin-custom.php");				//Adds custom meta boxes to the post/page areas

// //Theme Requirements
require_once ($functions_path."theme-init.php"); 				//Theme Specific Settings and loads
require_once ($functions_path."theme-register.php"); 			//Sets up sides bars, nav menus, and custom post types
require_once ($functions_path."theme-utilities.php"); 		//Houses some basic utility functions
  
/* ============================================================================
Add Custom, Theme Specific Functions Below Here
==============================================================================*/




// function my_fields($fields) {
//   $fields['author'] = '<p class="control-group full-width"><label for="author">' . __( 'Your name', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></p>';
//   $fields['title'] = '<p class="control-group full-width"><label for="title">' . __( 'Title', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="title" name="title" type="text" value="' . esc_attr(  $commenter['comment_author_title'] ) . '"' . $aria_req . ' /></p>';
//   $fields['email'] = '<p class="control-group full-width"><label for="email">' . __( 'Email', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></p>';
//   $fields['organization'] = '<p class="control-group full-width"><label for="organization">' . __( 'Your Organization', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="organization" name="organization" type="text" value="' . esc_attr(  $commenter['comment_author_organization'] ) . '"' . $aria_req . ' /></p></div>';

// return $fields;
// }
// add_filter('comment_form_default_fields','my_fields');

?>