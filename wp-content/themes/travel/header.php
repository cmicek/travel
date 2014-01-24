<!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js oldie ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js oldie ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js oldie ie8"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->

  <head>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic|IM+Fell+Great+Primer:400,400italic|IM+Fell+Great+Primer+SC' rel='stylesheet' type='text/css'>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php wp_title( '|', true, 'right' ); ?> <?php get_bloginfo('site_title'); ?> </title>
    <meta name="author" content="Chris Micek">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="all" />
    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/vendor/modernizr.js"></script>

    <!--[if lte IE 8 ]>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/non-responsive.css" type="text/css" media="all" />
    <!--<![endif]-->

    <meta name="google-site-verification" content="4bGNd7RtjOQCyV10UWdxRPQc6qxybmg89VeaiSZSFmA" /> 
    <meta name="msvalidate.01" content="784D20CF09572503BBEEA8F88FB45428" /> 


    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/assets/images/favicon.png">
  
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <nav class="site-nav">
      <div class="site-nav--menu">
      <a href="<?php  bloginfo('url'); ?>" class="site-nav--title"><?php  bloginfo('name'); ?></a>
        
        <?php
          wp_nav_menu(array(
            'menu_class'      => 'site-nav--list',
            'container_class'       => '',
          ));
        ?> 
      </div>
    </nav> 