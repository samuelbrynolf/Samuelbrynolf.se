<?php echo '<ul id="js-listitems" class="o-listitems">';
    while ( have_posts() ) {
        echo '<li class="l-gutter m-listitem">';
            the_post();
            get_template_part('partials/listitems/listitem');
        echo '</li>';
    }
echo '</ul>';

next_posts_link('Visa fler inlägg');