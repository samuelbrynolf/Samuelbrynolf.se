<?php remove_filter('term_description','wpautop');

//-------------------------------------------------------------------

if ( !function_exists( 'remove_more_jump_link' )) {
    function remove_more_jump_link($link){
        $offset = strpos($link, '#more-');
        if ($offset) {
            $end = strpos($link, '"', $offset);
        }
        if ($end) {
            $link = substr_replace($link, '', $offset, $end - $offset);
        }
        return $link;
    }

    add_filter('the_content_more_link', 'remove_more_jump_link');
}

//-------------------------------------------------------------------

if ( !function_exists( 'remove_width_attribute' )) {
    function remove_width_attribute($html){
        $html = preg_replace('/(width|height)="\d*"\s/', "", $html);
        return $html;
    }

    add_filter('post_thumbnail_html', 'remove_width_attribute', 10);
    add_filter('image_send_to_editor', 'remove_width_attribute', 10);
}

//-------------------------------------------------------------------

if ( !function_exists( 'posts_previouslink_attributes' )) {
    function posts_previouslink_attributes($output) {
        $cssclass = 'class="l-pull-left a-postlink a-icon previouspostlink"';
        return str_replace('<a href=', '<a '.$cssclass.' href=', $output);
    }
    add_filter('previous_post_link', 'posts_previouslink_attributes');
}

if ( !function_exists( 'posts_nextlink_attributes' )) {
    function posts_nextlink_attributes($output) {
        $cssclass = 'class="l-pull-right a-postlink a-icon nextpostlink"';
        return str_replace('<a href=', '<a '.$cssclass.' href=', $output);
    }
    add_filter('next_post_link', 'posts_nextlink_attributes');
}

//-------------------------------------------------------------------

function loadSocialContent(){
    $content = get_template_part('partials/frontpage/twitter_instagram');
    die($content);
}

add_action( 'wp_ajax_nopriv_loadSocialContent', 'loadSocialContent' );
add_action( 'wp_ajax_loadSocialContent', 'loadSocialContent' );

//-------------------------------------------------------------------

if ( !function_exists( 'bento_body_classes' )) {
    function bento_body_classes($classes){
        if (is_single() && !has_post_thumbnail()) {
            $classes[] = 'no-thumb';
        }

        return $classes;
    }

    add_filter('body_class', 'bento_body_classes');
}

//-------------------------------------------------------------------

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

//-------------------------------------------------------------------

if ( !function_exists( 'trim_private_titles' )) {
    function trim_private_titles($string){
        $string = str_replace("Privat: ", "&#126; ", $string);
        return $string;
    }
    add_filter('the_title', 'trim_private_titles');
}

//-------------------------------------------------------------------

if ( !function_exists( 'new_excerpt_more' )) {
    function new_excerpt_more($more){
        return '&hellip;';
    }
    add_filter('excerpt_more', 'new_excerpt_more');
}

//-------------------------------------------------------------------

if ( !function_exists( 'add_excerpts_to_pages' )) {
    function add_excerpts_to_pages(){
        add_post_type_support('page', 'excerpt');
    }
    add_action('init', 'add_excerpts_to_pages');
}