<?php
/**
 * @package phpner
 * @subpackage free template
 * @since 1.0
 **/

class settingsTemplame
{
	public static $sidebar =  [
								  [
									  'name' => 'Левый сайдбар',
									  'id' => "left-sidebar",
									  'description' => 'Да, это левый сайдбар',
									  'before_widget' => '<div id="%1$s" class="widget-left %2$s">',
									  'after_widget' => "</div>\n",
									  'before_title' => '<span class="widget-title">',
									  'after_title' => "</span>\n",
								  ],
								  [
									  'name' => 'Правый сайдбар',
									  'id' => "right-sidebar",
									  'description' => 'Да, это левый сайдбар',
									  'before_widget' => '<div id="%1$s" class="widget-left %2$s">',
									  'after_widget' => "</div>\n",
									  'before_title' => '<span class="widget-title">',
									  'after_title' => "</span>\n",
								  ],
								  
								];

	public static $menus = [
							'top' => 'Верхнее меню',
							'bottom' => 'Нижнее меню',	
							'sider' => 'Нижнеxxs5655е меню'	
						   ];


	public static function sidebar()
	{
		if (count(self::$sidebar) === 1)
			{
					register_sidebar(self::$sidebar[0]);
					return;
			}

		for ($i=0; $i < count(self::$sidebar) ; $i++) 
			{ 
				register_sidebar(self::$sidebar[$i]); 
			}

	}


	public static function nav_menus()
	{
		register_nav_menus(self::$menus);
	}

    /**
     *  add size fore imges
     */
    public static function imagesSupport()
    {
        add_theme_support( 'custom-logo' ).
        add_theme_support( 'post-thumbnails' );

        add_image_size( 'phpner-featured-image', 2000, 1200, true );

        add_image_size( 'phpner-thumbnail-avatar', 100, 100, true );
    }

    /**
     *Settings template
     */
    function phpner_setup(){

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         * and add size
         */

        settingsTemplame::imagesSupport();

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support( 'html5', array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ) );

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support( 'post-formats', array(
            'aside',
            'image',
            'video',
            'quote',
            'link',
            'gallery',
            'audio',
        ) );

        // Add theme support for Custom Logo.
        add_theme_support( 'custom-logo', array(
            'width'       => 250,
            'height'      => 250,
            'flex-width'  => true,
        ) );

        //nav_menus
        self::nav_menus();
    }

    /**
     * Pagination
     */
    public static function pagination()
    {
        function showpagination()
        {
            global $wp_query;
            $big = 999999999;
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'type' => 'list',
                'prev_text' => 'Назад',
                'next_text' => 'Вперед',
                'total' => $wp_query->max_num_pages,
                'show_all' => false,
                'end_size' => 15,
                'mid_size' => 15,
                'add_args' => false,
                'add_fragment' => '',
                'before_page_number' => '',
                'after_page_number' => ''
            ));
        }
    }

    /**
     *Disable REST API
     */
    public static function disableRestApi()
    {
        add_filter('rest_enabled', '__return_false');
        remove_action( 'xmlrpc_rsd_apis',            'rest_output_rsd' );
        remove_action( 'wp_head',                    'rest_output_link_wp_head', 10, 0 );
        remove_action( 'template_redirect',          'rest_output_link_header', 11, 0 );
        remove_action( 'auth_cookie_malformed',      'rest_cookie_collect_status' );
        remove_action( 'auth_cookie_expired',        'rest_cookie_collect_status' );
        remove_action( 'auth_cookie_bad_username',   'rest_cookie_collect_status' );
        remove_action( 'auth_cookie_bad_hash',       'rest_cookie_collect_status' );
        remove_action( 'auth_cookie_valid',          'rest_cookie_collect_status' );
        remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100 );
        remove_action( 'init',          'rest_api_init' );
        remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1 );
        remove_action( 'parse_request', 'rest_api_loaded' );
        remove_action( 'rest_api_init',          'wp_oembed_register_route'              );
        remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4 );
        remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
        remove_action( 'wp_head', 'wp_oembed_add_host_js' );
    }


}