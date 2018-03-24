<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <title><?php wp_title(); ?> | <?php bloginfo('name'); ?></title>
  <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <header>
    <?php
             the_custom_header_markup();
    the_custom_logo();
      $args = array('theme_location' => 'top', 'container'=> 'nav', 'menu_class' => 'bottom-menu', 'menu_id' => 'bottom-nav');
      wp_nav_menu($args);
    ?>
  </header>