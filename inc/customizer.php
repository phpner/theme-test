<?php
/**
 * @package phpner
 * @subpackage free template
 * @since 1.0
 **/


function phpner_customizer($wp_customize)
{
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