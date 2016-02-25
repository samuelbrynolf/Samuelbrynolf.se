<?php echo '<ul id="js-listitems" class="l-gutter o-listitems">';
    while ( have_posts() ) {
        echo '<li class="l-clearfix m-listitem">';
            the_post();
            get_template_part('partials/listitems/listitem');
        echo '</li>';
    }
echo '</ul>';

echo '<div class="m-listitems-pagin l-gutter">';
    next_posts_link('Visa fler inlägg');
echo '</div>';