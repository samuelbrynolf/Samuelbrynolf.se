<?php if ( ! function_exists( 'bento_setup' ) ) :



    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */



    // THEME SETUP -------------------------------------------------------------------

    function bento_setup() {

        function complete_version_removal() {
            return '';
        }
        add_filter('the_generator', 'complete_version_removal');

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

        add_theme_support( 'post-formats', array( 'link' ));
    }
endif;
add_action( 'after_setup_theme', 'bento_setup' );



// SCRIPTS & STYLES -------------------------------------------------------------------

function bento_scripts() {
	wp_enqueue_style( 'bento-style', get_stylesheet_uri());
	//wp_dequeue_style('contact-form-7');
    if(!is_single()){
	    wp_dequeue_style('wp-prism-syntax-highlighter');
    }
	wp_enqueue_script( 'bento-scripts', get_template_directory_uri() . '/js/bundled.js', array(), '20150901', true );
}
add_action( 'wp_enqueue_scripts', 'bento_scripts' );



// IMPORT THEME, TEMPLATE & AJAX-FUNCTIONS -------------------------------------------------------------------

require get_template_directory() . '/functions/theme_functions.php';
require get_template_directory() . '/functions/template-tags.php';
require get_template_directory() . '/functions/ajax_triggered_functions.php';
