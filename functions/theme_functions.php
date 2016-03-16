<?php // REGISTER MENU -------------------------------------------------------------------

if ( !function_exists( 'register_my_menu' )) {
    function register_my_menu()
    {
        register_nav_menu('navigation', __('Huvudnavigation'));
    }

    add_action('init', 'register_my_menu');
}



// BUILD CUSTOM PREV/PREVIOUS POST-LINKS CLASSES -------------------------------------------------------------------

if ( !function_exists( 'posts_previouslink_attributes' )) {
    function posts_previouslink_attributes($output) {
        $cssclass = 'class="a-prf-text a-icon js-tappy"';
        return str_replace('<a href=', '<a '.$cssclass.' href=', $output);
    }
    add_filter('previous_post_link', 'posts_previouslink_attributes');
}

if ( !function_exists( 'posts_nextlink_attributes' )) {
    function posts_nextlink_attributes($output) {
        $cssclass = 'class="a-prf-text a-icon js-tappy"';
        return str_replace('<a href=', '<a '.$cssclass.' href=', $output);
    }
    add_filter('next_post_link', 'posts_nextlink_attributes');
}



// ADD CUSTOM BODY CLASSES -------------------------------------------------------------------

if ( !function_exists( 'sb_body_classes' )) {
    function sb_body_classes($classes){
        if (is_single() && !has_post_thumbnail() && !has_post_format('video') || is_page() && !has_post_thumbnail() && !is_page_template('page-instafeatured.php')){
            $classes[] = 'no-thumb';
        }

        if (is_single() && has_post_format('video')){
            $classes[] = 'has-video';
        }

        if (is_front_page() && is_home() && !is_paged()) {
            $classes[] = 'startpage';
        }

        return $classes;
    }

    add_filter('body_class', 'sb_body_classes');
}



// BUILD HEAD-TITLES -------------------------------------------------------------------

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */

    if ( !function_exists( 'bento_wp_title' )) {
        function bento_wp_title($title, $sep)
        {
            if (is_feed()) {
                return $title;
            }

            global $page, $paged;

            // Add the blog name
            $title .= get_bloginfo('name', 'display');

            // Add the blog description for the home/front page.
            $site_description = get_bloginfo('description', 'display');
            if ($site_description && (is_home() || is_front_page())) {
                $title .= " $sep $site_description";
            }

            // Add a page number if necessary:
            if (($paged >= 2 || $page >= 2) && !is_404()) {
                $title .= " $sep " . sprintf(__('Page %s', 'bento'), max($paged, $page));
            }

            return $title;
        }

        add_filter('wp_title', 'bento_wp_title', 10, 2);
    }
endif;



// FILTER ARCHIVE TITLES -------------------------------------------------------------------

add_filter('get_the_archive_title', function ($title) {
    $title = single_cat_title('', false);
    return $title;
});



// FILTER ARCHIVE DESCRIPTIONS -------------------------------------------------------------------

if ( !function_exists( 'strip_archive_descriptions_p' )) {
    function strip_archive_descriptions_p($description)
    {
        $remove = array('<p>', '</p>');
        $description = str_replace($remove, "", $description);
        return $description;
    }

    add_filter('get_the_archive_description', 'strip_archive_descriptions_p');
}



// MARK PRIVATE-POST-TITLES -------------------------------------------------------------------

if ( !function_exists( 'trim_private_titles' )) {
    function trim_private_titles($string){
        $string = str_replace("Privat: ", "&#126; ", $string);
        return $string;
    }
    add_filter('the_title', 'trim_private_titles');
}



// ADD ACF TO FEED -------------------------------------------------------------------

if ( !function_exists( 'add_acf_to_feed' )) {
    function add_acf_to_feed($content)
    {
        if (is_feed() && is_main_query()) {
            $preamble = get_post_meta(get_the_ID(), 'post_preamble', true);

            if ($preamble) {
                $preambleBuild = '<p>' . $preamble . '</p>';
                $content = $preambleBuild . $content;
            }
        }
        return $content;
    }

    add_filter('the_content', 'add_acf_to_feed');
}


// MOVE YOAST SEO-MODULE TO POSTS BOTTOM -------------------------------------------------------------------


if ( !function_exists( 'yoasttobottom' )) {
    function yoasttobottom()
    {
        return 'low';
    }

    add_filter('wpseo_metabox_prio', 'yoasttobottom');
}