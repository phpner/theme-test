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
    $wp_customize->selective_refresh->add_partial( 'blogname', array(
        'selector' => '.site-title a',
    ) );
    $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
        'selector' => '.site-description'
    ) );
    /*logo setting*/
    $wp_customize->add_section( 'title_tagline', array(
        'title' => __( 'Логотип' ),
        'description' => __( 'Настройка логотипа' ),
        'panel' => '', // Not typically needed.
        'priority' => 20,
        'capability' => 'edit_theme_options',
    ) );

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


    /*add img*/

    $wp_customize->add_section('add_img',[
        'title' => 'Добавить фото'
    ]);
    $wp_customize->add_setting('template_img_sider',[array('default' => 'item_1')]);

    $wp_customize->add_control('template_img_sider',[
        'type' => 'radio',
        'label' => 'Вот так',
        'section' => 'add_img',
        'choices' => [
            'item_1' => 'item_1',
            'item_2' => 'item_2',
            'item_3' => 'item_3',
        ]
    ]);
}

add_action( 'customize_register', 'phpner_customizer' );

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