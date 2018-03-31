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


    /**
     * add img
     */

    $wp_customize->add_section('add_img',[
        'title' => 'Добавить фото'
    ]);
    $wp_customize->add_setting('template_img_sider',[array('default' => 'item_1')]);
/*
    $wp_customize->add_control('template_img_sider',[
        'type' => 'radio',
        'label' => 'Вот так',
        'section' => 'add_img',
        'choices' => [
            'item_1' => 'item_1',
            'item_2' => 'item_2',
            'item_3' => 'item_3',
        ]
    ]);*/

    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'logo',
            array(
                'label'      => __( 'Upload a logo', 'theme_name' ),
                'section'    => 'add_img',
                'settings'   => 'template_img_sider',
                'context'    => 'your_setting_context',
                'allow_addition' => true,
            )
        )
    );


    /*remove*/
    $wp_customize->remove_section('colors');
}

/*add_action( 'customize_register', 'phpner_customizer',10 );*/

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
add_filter( 'jt_default_backgrounds', 'jt_default_backgrounds' );

function jt_default_backgrounds( $backgrounds ) {

    $backgrounds['example-1'] = array(
        'url'           => '%s/images/backgrounds/example-1.png',
        'thumbnail_url' => '%s/images/backgrounds/example-1-thumb.png',
    );

    $backgrounds['example-2'] = array(
        'url'           => '%s/images/backgrounds/example-2.png',
        'thumbnail_url' => '%s/images/backgrounds/example-2-thumb.png',
    );

    $backgrounds['example-3'] = array(
        'url'           => '%s/images/backgrounds/example-3.png',
        'thumbnail_url' => '%s/images/backgrounds/example-3-thumb.png',
    );

    return $backgrounds;
}
require_once  'slider/Phpner_Customize_Slider.php';
function jt_customize_register( $wp_customize )
{

    /* Remove the WordPress background image control. */
    /*$wp_customize->remove_control( 'background_image' );*/

    /* Load our custom background image control. */
    require_once(trailingslashit(get_template_directory()) . 'inc/class_phpner_Customize_Control_Background_Image.php');

    $wp_customize->add_section('img_select_section')->title = "klkl";
    $wp_customize->get_section('img_select_section')->priority = 2;

    $wp_customize->add_setting('img_select', array(
        'default' => '#',
        'transport' => 'refresh',
        'priority' => 2,
    ));


    /* Add our custom background image control. */
    $wp_customize->add_control(new MultiImageControl($wp_customize, 'img_select', array(
        'label' => __('Background '),
        'section' => 'img_select_section',
    )));


}

add_action( 'customize_register', 'jt_customize_register');
