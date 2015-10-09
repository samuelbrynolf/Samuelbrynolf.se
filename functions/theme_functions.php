<?php // REGISTER MENU -------------------------------------------------------------------

if ( !function_exists( 'register_my_menu' )) {
    function register_my_menu()
    {
        register_nav_menu('navigation', __('Huvudnavigation'));
    }

    add_action('init', 'register_my_menu');
}



// REMOVE WIDTH-ATTRIBUTES FROM <img> -------------------------------------------------------------------

if ( !function_exists( 'remove_width_attribute' )) {
    function remove_width_attribute($html){
        $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
        return $html;
    }

    add_filter('post_thumbnail_html', 'remove_width_attribute', 10);
    add_filter('image_send_to_editor', 'remove_width_attribute', 10);
}



// BUILD CUSTOM PREV/PREVIOUS POST-LINKS -------------------------------------------------------------------

if ( !function_exists( 'posts_previouslink_attributes' )) {
    function posts_previouslink_attributes($output) {
        $cssclass = 'class="a-prf-text a-icon arrowleft"';
        return str_replace('<a href=', '<a '.$cssclass.' href=', $output);
    }
    add_filter('previous_post_link', 'posts_previouslink_attributes');
}

if ( !function_exists( 'posts_nextlink_attributes' )) {
    function posts_nextlink_attributes($output) {
        $cssclass = 'class="a-prf-text a-icon arrowright"';
        return str_replace('<a href=', '<a '.$cssclass.' href=', $output);
    }
    add_filter('next_post_link', 'posts_nextlink_attributes');
}



// ADD CUSTOM BODY CLASSES -------------------------------------------------------------------

if ( !function_exists( 'bento_body_classes' )) {
    function bento_body_classes($classes){
        if (is_single() && !has_post_thumbnail()) {
            $classes[] = 'no-thumb';
        }

        return $classes;
    }

    add_filter('body_class', 'bento_body_classes');
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
	function bento_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= get_bloginfo( 'name', 'display' );

		// Add the blog description for the home/front page.
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'bento' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'bento_wp_title', 10, 2 );
endif;



// FILTER ARCHIVE TITLES -------------------------------------------------------------------

add_filter('get_the_archive_title', function ($title) {
    //if (is_category() || is_tag()) {
        $title = single_cat_title('', false);
    //}
    return $title;
});



// MARK PRIVATE-POST-TITLES -------------------------------------------------------------------

if ( !function_exists( 'trim_private_titles' )) {
    function trim_private_titles($string){
        $string = str_replace("Privat: ", "&#126; ", $string);
        return $string;
    }
    add_filter('the_title', 'trim_private_titles');
}



// MARK PRIVATE-POST-TITLES -------------------------------------------------------------------

function no_nopaging($query) {
    if (is_search()) {
        $query->set('nopaging', 1);
    }
}

add_action('parse_query', 'no_nopaging');