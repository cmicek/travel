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

add_filter( 'use_default_gallery_style', '__return_false' );
add_filter( 'post_gallery', 'my_post_gallery', 10, 2 );
function my_post_gallery( $output, $attr) {
    global $post, $wp_locale;

    static $instance = 0;
    $instance++;

    // We're trusting author input, so let's at least make sure it looks like a valid orderby statement
    if ( isset( $attr['orderby'] ) ) {
        $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
        if ( !$attr['orderby'] )
            unset( $attr['orderby'] );
    }

    extract(shortcode_atts(array(
        'order'      => 'ASC',
        'orderby'    => 'menu_order ID',
        'id'         => $post->ID,
        'itemtag'    => 'dl',
        'icontag'    => 'dt',
        'captiontag' => 'dd',
        'columns'    => 3,
        'size'       => 'thumbnail',
        'include'    => '',
        'exclude'    => ''
    ), $attr));

    $id = intval($id);
    if ( 'RAND' == $order )
        $orderby = 'none';

    if ( !empty($include) ) {
        $include = preg_replace( '/[^0-9,]+/', '', $include );
        $_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

        $attachments = array();
        foreach ( $_attachments as $key => $val ) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    } elseif ( !empty($exclude) ) {
        $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
        $attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    } else {
        $attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
    }

    if ( empty($attachments) )
        return '';

    if ( is_feed() ) {
        $output = "\n";
        foreach ( $attachments as $att_id => $attachment )
            $output .= wp_get_attachment_link($att_id, $size, true) . "\n";
        return $output;
    }

    $itemtag = tag_escape($itemtag);
    $captiontag = tag_escape($captiontag);
    $columns = intval($columns);
    $itemwidth = $columns > 0 ? floor(100/$columns) : 100;
    $float = is_rtl() ? 'right' : 'left';

    $selector = "gallery-{$instance}";

    $output = apply_filters('gallery_style', "<div id='$selector' class='gallery galleryid-{$id}'>");

    $i = 0;
    $output .= '<div class="gallery--nav">';
    foreach ( $attachments as $id => $attachment ) {
        $link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);
        $output .= "<{$itemtag} class='gallery-item'>";
        $output .= "
            <{$icontag} class='gallery-icon' data-full='".$attachment->guid."'>
                $link
            </{$icontag}>";
        if ( $captiontag && trim($attachment->post_excerpt) ) {
            $output .= "
                <{$captiontag} class='wp-caption-text'>
                " . wptexturize($attachment->post_excerpt) . "
                </{$captiontag}>";
        }
        $output .= "</{$itemtag}>";
        if ( $columns > 0 && ++$i % $columns == 0 )
            $output .= '<br style="clear: both" />';
    }

    $output .= "
            <br style='clear: both;' />
        </div></div>\n";

    return $output;
}



// function my_fields($fields) {
//   $fields['author'] = '<p class="control-group full-width"><label for="author">' . __( 'Your name', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '"' . $aria_req . ' /></p>';
//   $fields['title'] = '<p class="control-group full-width"><label for="title">' . __( 'Title', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="title" name="title" type="text" value="' . esc_attr(  $commenter['comment_author_title'] ) . '"' . $aria_req . ' /></p>';
//   $fields['email'] = '<p class="control-group full-width"><label for="email">' . __( 'Email', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '"' . $aria_req . ' /></p>';
//   $fields['organization'] = '<p class="control-group full-width"><label for="organization">' . __( 'Your Organization', 'domainreference' ) . ( $req ? '<span class="required">*</span>' : '' ) . '</label><input id="organization" name="organization" type="text" value="' . esc_attr(  $commenter['comment_author_organization'] ) . '"' . $aria_req . ' /></p></div>';

// return $fields;
// }
// add_filter('comment_form_default_fields','my_fields');

?>