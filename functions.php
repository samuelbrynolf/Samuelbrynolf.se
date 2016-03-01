<?php if ( ! function_exists( 'sb_setup' ) ) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */

    // THEME SETUP -------------------------------------------------------------------

    function sb_setup() {

        function complete_version_removal() {
            return '';
        }
        add_filter('the_generator', 'complete_version_removal');
        remove_action('wp_head', 'rest_output_link_wp_head', 10);
        remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
        remove_action('template_redirect', 'rest_output_link_header', 11, 0);

        remove_action('wp_head', 'rsd_link');
        remove_action('wp_head', 'wlwmanifest_link');
        remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
        remove_action( 'wp_print_styles', 'print_emoji_styles' );

        add_theme_support( 'automatic-feed-links' );
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
        ) );

        add_theme_support( 'post-formats', array( 'video' ));
    }
endif;
add_action( 'after_setup_theme', 'sb_setup' );



// SCRIPTS & STYLES -------------------------------------------------------------------

function sb_scripts() {
    wp_deregister_script( 'jquery' );
    if(!function_exists('ccss_enqueue_full_css')) {
        wp_enqueue_style( 'sb-style', get_stylesheet_uri() );
    }
    wp_deregister_script('wp-embed');
	wp_enqueue_script( 'sb-scripts', get_template_directory_uri() . '/js/bundled.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'sb_scripts' );



// IMPORT THEME, TEMPLATE & AJAX-FUNCTIONS -------------------------------------------------------------------

require get_template_directory() . '/functions/theme_functions.php';
require get_template_directory() . '/functions/advanced_custom_fields.php';
require get_template_directory() . '/functions/template-tags.php';
require get_template_directory() . '/functions/ajax_triggered_functions.php';