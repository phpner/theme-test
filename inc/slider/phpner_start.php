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

    public  function phpner_slider_register($wp_customize)
    {
        self::owl_carousel_erorr();
        $wp_customize->add_section('phpner_select_section')->title = "Слайдер";
        $wp_customize->get_section('phpner_select_section')->priority = 2;
        $wp_customize->get_section('phpner_select_section')->description = (self::$checkError) ? self::$checkError : self::$checkError ;

        $wp_customize->add_setting('phpner_slider', array(
            'default' => '#',
            'transport' => 'refresh',
            'priority' => 2,
        ));


        /* Add our custom background image control. */
        $wp_customize->add_control(new Phpner_Customize_Slider($wp_customize, 'phpner_slider', array(
            'label' => __('Настройка слайдера'),
            'description' => 'одлол',
            'section' => 'phpner_select_section'
        )));


    }

    public function owl_carousel_erorr()
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


