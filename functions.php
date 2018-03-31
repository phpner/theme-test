<?php
/**
 * @package phpner
 * @subpackage free template
 * @since 1.0
 **/

/**
 * Add slider
 */

/*Удаляем тупой отступ с верху !!! wp рулит !*/
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
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


require get_parent_theme_file_path( '/inc/add_scripts.php');
require get_parent_theme_file_path( '/inc/custom-header.php');
require get_parent_theme_file_path( '/inc/customizer.php' );

require get_parent_theme_file_path( '/inc/slider/phpner_start.php');

?>