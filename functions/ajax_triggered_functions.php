<?php // LOAD Instagram -------------------------------------------------------------------

if ( !function_exists( 'loadInstagram' )) {
    function loadInstagram(){
        $content = pull_instagram('1537565402', 'd93b5d133c354946845bece40ea08617', '1', false);
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
            echo '<ul id="js-tags__ul" class="a-ul-large">';
            echo '<li id="js-listhead" class="m-listhead">';
            echo '<h2 class="a-xlarge">Etiketter<br/>A&mdash;&Ouml;</h2>';
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
