<?php echo '<div id="js-listitems">';
    while ( have_posts() ) {
        the_post();
        get_template_part('partials/listitems/listitem', get_post_format());
    }
echo '</div>';

if(function_exists('bap_next_posts_link')){
    bap_next_posts_link();
} else{
    next_posts_link();
}