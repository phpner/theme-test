<?php
/**
 * Extends the WordPress background image customize control class, which allows a theme to register
 * multiple default backgrounds for the user to choose from.  To use this, the theme author
 * should remove the 'background_image' control and add this control in its place.
 *
 * @since     0.1.0
 * @author    Justin Tadlock <justin@justintadlock.com>
 * @copyright Copyright (c) 2013, Justin Tadlock
 * @link      http://justintadlock.com/archives/2013/10/13/registering-multiple-default-backgrounds
 * @license   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

class MultiImageControl extends WP_Customize_Image_Control
{

    public $type = 'multi-image';
    public $mime_type = 'image';

    public function render_content(){
        ?>
        <label>
            <span class='customize-control-title'>Image</span>
        </label>
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

        $custom_background = get_theme_support( 'custom-background' );

        wp_enqueue_script('me_custom',get_template_directory_uri().'/assets/js/my_custom.js',array('jquery','wp-api'));
        



        wp_localize_script( 'customize-controls', '_wpCustomizeBackground', array(
            'defaults' => ! empty( $custom_background[0] ) ? $custom_background[0] : array(),
            'nonces' => array(
                'add' => wp_create_nonce( 'background-add' ),
            ),
        ) );

    }


    public function content_template() {
        $add_items = __( 'Add Items' );
        ?>
        <p class="new-menu-item-invitation">
            <?php
            printf(
            /* translators: %s: "Add Items" button text */
                __( 'Time to add some links! Click &#8220;%s&#8221; to start putting pages, categories, and custom links in your menu. Add as many things as you&#8217;d like.' ),
                $add_items
            );
            ?>
        </p>
        <div class="customize-control-nav_menu-buttons">
            <button type="button" class="button add-new-menu-item" aria-label="<?php esc_attr_e( 'Add or remove menu items' ); ?>" aria-expanded="false" aria-controls="available-menu-items">
                <?php echo $add_items; ?>
            </button>
            <button type="button" class="button-link reorder-toggle" aria-label="<?php esc_attr_e( 'Reorder menu items' ); ?>" aria-describedby="reorder-items-desc-{{ data.menu_id }}">
                <span class="reorder"><?php _e( 'Reorder' ); ?></span>
                <span class="reorder-done"><?php _e( 'Done' ); ?></span>
            </button>
        </div>
        <p class="screen-reader-text" id="reorder-items-desc-{{ data.menu_id }}"><?php _e( 'When in reorder mode, additional controls to reorder menu items will be available in the items list above.' ); ?></p>
        <?php
    }
}

?>