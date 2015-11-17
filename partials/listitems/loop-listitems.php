<?php echo '<section id="js-listitems" class="o-listitems">';
    while ( have_posts() ) {
        the_post();
        get_template_part('partials/listitems/listitem', get_post_format());
    }
echo '</section>';

next_posts_link('Visa fler inlägg');