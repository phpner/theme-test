<?php
/**
 * @package phpner
 * @subpackage free template
 * @since 1.0
 **/

require_once get_parent_theme_file_path( '/inc/settins-template.php' );


/*Настройка*/

add_action( 'after_setup_theme', 'settingsTemplame::phpner_setup' );

// Sidebar
add_action( 'widgets_init', 'settingsTemplame::sidebar' );

// Pagination
settingsTemplame::pagination();

// Breadcrumbs
function showbreadcrumb() {
  if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<p id="breadcrumbs">','</p>');}
}

// Disable REST API
settingsTemplame::disableRestApi();

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

?>