<?php
/**
 * @package phpner
 * @subpackage free template
 * @since 1.0
 **/
require_once 'Phpner_Customize_Slider.php';
class class_phpner_start
{
    public static  $checkError = false ;

    public static  function phpner_slider_register($wp_customize)
    {
        $wp_customize->add_section('phpner_select_section')->title = "Слайдер";
        $wp_customize->get_section('phpner_select_section')->priority = 2;
        $wp_customize->get_section('phpner_select_section')->description = "<b>Добавить фото в слайдер</b>>" ;

        $wp_customize->add_setting('phpner_customize_slider', array(
            'default' => '#',
            'transport' => 'refresh',
            'priority' => 2,
        ));


        /* Add our custom background image control. */
        $wp_customize->add_control(new Phpner_Customize_Slider($wp_customize, 'phpner_customize_slider', array(
            'label' => 'Настройка слайдера',
            'description' => 'одлол',
            'section' => 'phpner_select_section'
        )));


    }

    public static function owl_carousel_erorr()
    {
                if(!wp_script_is('owl-carousel','enqueued '))
                {
                    self::$checkError = "<h2 style='color:#FF0000'>owl carousel скрипт не подключен! добавьте его в фвайл function.php</h2>";
                    print_r(self::$checkError);
                    return;
                }
                     self::$checkError = 'fefe' ;
    }
}

add_action( 'customize_register', [ 'class_phpner_start' , 'phpner_slider_register']);


