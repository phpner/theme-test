﻿<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php wp_title(); ?>  <?php bloginfo('name'); ?></title>
  <link rel="alternate" type="application/rss+xml" title="RSS" href="<?php bloginfo('rss_url'); ?>">
  <?php wp_head();?>
</head>
<body <?php body_class(); ?>>
<div class="container-fluid">
        <header class="header-wrap row">
            <?php  the_custom_header_markup(); ?>
            <div class="col-xs-2" style="<?php echo get_option('logo_position','foat:left'); ?>">
                <?php  the_custom_logo();?>
            </div>

                    <div class="header-text">
                        <?php if ( is_front_page() ) : ?>
                            <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php else : ?>
                            <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php endif; ?>

                        <?php
                        $description = get_bloginfo( 'description', 'display' );

                        if ( $description || is_customize_preview() ) :
                            ?>
                            <p class="site-description"><?php echo $description; ?></p>
                        <?php endif; ?>
                    </div><!-- header-text -->
          </header>
    <div class="row">
        <div class="col-lg-12">
            <?php
            $args = array('theme_location' => 'top', 'container'=> 'nav', 'menu_class' => 'bottom-menu', 'menu_id' => 'bottom-nav');
            wp_nav_menu($args);
            ?>
        </div>
    </div>
</div>
