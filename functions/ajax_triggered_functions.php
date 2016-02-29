<?php // LOAD Instagram -------------------------------------------------------------------

if ( !function_exists( 'loadInstagram' )) {

    function loadInstagram(){

        if(function_exists('get_field') && get_field('options_instagram_userID', 'option') && get_field('options_instagram_clientID', 'option')) {
            $user_id = get_field('options_instagram_userID', 'option');
            $client_id = get_field('options_instagram_clientID', 'option');
        } else {
            return;
        }

        $content = pull_instagram($user_id, $client_id, '', false);
        die($content);
    }
    add_action('wp_ajax_nopriv_loadInstagram', 'loadInstagram');
    add_action('wp_ajax_loadInstagram', 'loadInstagram');
}



// LOAD TAGS A-Ö -------------------------------------------------------------------

if ( !function_exists('listTags')) {
    function listTags() {
        $tags = get_tags();

        if ($tags) {
            echo '<ul id="js-tags__ul" class="m-ul-large">';
                echo '<li id="js-listhead" class="a-listhead">';
                    echo '<h2 class="a-xlarge">&Auml;mnen<br/>A&mdash;&Ouml;</h2>';
                echo '</li>';

            foreach ($tags as $tag) {
                echo '<li class="l-clearfix">';
                    echo '<a href="'.get_tag_link($tag->term_id).'" title="'.sprintf(__("Se allt inom &auml;mnet %s"), $tag->name).'" rel="nofollow">';
                        echo '<h3 class="a-medium">'.$tag->name.'<span class="a-ul-large__span"> ['.$tag->count.']</span></h3>';
                    echo '</a>';
                echo '</li>';
            }
            echo '</ul>';
        }
    }
}

if ( !function_exists('build_tags')) {
    function build_tags()
    {
        $content = listTags();
        die($content);
    }
    add_action('wp_ajax_nopriv_build_tags', 'build_tags');
    add_action('wp_ajax_build_tags', 'build_tags');
}
