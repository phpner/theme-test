<?php
/**
 * @package phpner
 * @subpackage free template
 * @since 1.0
 **//*-/*-
 *  */

function phpner_scripts(){
    //***---CSS---***//
    wp_enqueue_style( 'my-style', get_theme_file_uri( '/assets/css/style.css' ));

    //***---JS---***//
    wp_enqueue_script( 'main-js', get_theme_file_uri( '/assets/js/bundle.js' ), array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'phpner_scripts' );