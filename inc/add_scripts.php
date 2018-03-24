<?php
/**
 * @package phpner
 * @subpackage free template
 * @since 1.0
 **//*-/*-
 *  */

var_dump(get_theme_file_uri());
function twentyseventeen_scripts() {

    //***---CSS---***//
    wp_enqueue_style( 'bootstrap', get_theme_file_uri( '/assets/css/bootstrap.min.css' ) );
    wp_enqueue_style( 'my-style', get_theme_file_uri( '/assets/css/style.css' ),['bootstrap'] );

    //***---JS---***//

    /*wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );*/
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );