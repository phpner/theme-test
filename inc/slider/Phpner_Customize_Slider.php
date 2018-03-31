<?php
/**
 * Created by PhpStorm.
 * User: phpner
 * Date: 31.03.2018
 * Time: 16:39
 */
if (!class_exists('WP_Customize_Image_Control')) return ;

class Phpner_Customize_Slider extends WP_Customize_Image_Control
{
    public $type = 'phpner-slider';

    public function __construct(WP_Customize_Manager $manager, $id, array $args = array())
    {
        parent::__construct($manager, $id, $args);

    }

    public function render_content()
    {
        ?>

        <div>
            <ul class='images'></ul>
        </div>
        <div class='actions'>
            <a class="button-secondary upload">Добавить</a>
        </div>

        <input class="wp-editor-area" id="images-input" type="hidden" <?php $this->link(); ?>>

        <?php
    }

    public function enqueue() {

        parent::enqueue();

        wp_enqueue_script('me_custom',get_template_directory_uri().'/inc/slider/js/phpner-customize-script.js',array('jquery','wp-api'));
        wp_enqueue_style('me_custom',get_template_directory_uri().'/inc/slider/css/phpner-customize-style.css');

        wp_localize_script( 'customize-controls', '_wpCustomizeBackground', array(
            'defaults' => '',
            'nonces' =>  wp_create_nonce( 'background-add' )

        ) );

    }


}