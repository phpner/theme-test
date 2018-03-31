<?php
/**
 * @package phpner
 * @subpackage free template
 * @since 1.0
 **/
function phpner_customizer($wp_customize)
{
    $wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
    $wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

    /*Add custom panel */
    $wp_customize->add_panel('header_sitting',
        [
            'priority' => 1,
            'theme_supports' => '',
            'title' => 'Шапка сайта',
            'description' => "Тру -ля - ля"
        ]);

    $wp_customize->add_panel('site_sitting',
        [
            'priority' => 2,
            'theme_supports' => '',
            'title' => 'Настройка сайта',
            'description' => "Тру -ля - ля"
        ]);


    /**
     * add custom section
     */
    $wp_customize->add_section("color_of_menu")->title = "Цвет меню";
    $wp_customize->get_section("color_of_menu")->panel = 'nav_menus';

    /**
     * move default settings into panels
     */

    $wp_customize->get_section('title_tagline')->title = 'Логотип / Название сайта';
    $wp_customize->get_section('title_tagline')->panel = 'header_sitting';

    $wp_customize->get_control('background_color')->section = 'background_image';

    $wp_customize->get_section('header_image')->title = 'Изображение шапки';
    $wp_customize->get_section('header_image')->panel = 'header_sitting';

    $wp_customize->get_section('static_front_page')->panel = 'site_sitting';

    $wp_customize->get_section('custom_css')->panel = 'site_sitting';

    $wp_customize->get_section('background_image')->panel = 'site_sitting';


    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site-title a',
    ) );

    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description'
    ) );
    /**
     * add position
     */

    $wp_customize->add_setting( 'logo_position_setting', array(
        'default'           => 'left',
        'transport'         => 'refresh',
        'sanitize_callback' => 'makeCss',
        'priority' => 200,
    ) );

    $wp_customize->add_control( 'logo_position_setting', array(
        'type'    => 'radio',
        'label'    =>  'Позиция логотипа',
        'choices'  => array(
            'left'  => 'В лево',
            'center' =>  'Центр',
            'right'   => 'В права',
        ),
        'section'  => 'title_tagline',
        'priority' => 8,
    ) );

    /**
     * add color menu
     */
    $wp_customize->add_setting( 'color_menu', array(
        'default'           => '#fdcdd5',
        'transport'         => 'refresh',
        'priority' => 20,
    ) );

    $wp_customize->add_control(
        new WP_Customize_Color_Control( $wp_customize, 'color_menu', array(
            'label'    =>  'Цвет меню',
            'section'  => 'color_of_menu',
            'priority' => 6,
        ) ) );


    /*remove*/
    $wp_customize->remove_section('colors');
}

add_action( 'customize_register', 'phpner_customizer',10 );

function makeCss($input)
{
    if ($input == "left")
    {
        update_option('logo_position',"float:left;position:relative; top:50px;left:50px;");
        return 'left';
    }elseif($input == "right")
    {
        update_option('logo_position',"float:right;position:relative; top:50px;right:50px;");
        return "right";
    }else{
        update_option('logo_position',"float:none; position:absolute;left:0;right:0;margin:auto !important;height: 50%;bottom: 0;top: 0;");
        return "center";
    }

}

