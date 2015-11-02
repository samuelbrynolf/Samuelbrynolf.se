<?php echo '<div id="js-listitems">';
    while ( have_posts() ) {
        the_post();
        get_template_part('partials/listitems/listitem', get_post_format());
    }
echo '</div>';

next_posts_link('Visa fler inlägg');