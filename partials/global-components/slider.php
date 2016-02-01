<p>test</p>
<?php echo '<a class="gallery-cell m-prf ratio-4-3 overlay" href="'.get_the_permalink().'" title="'.get_the_title().'">';
    if ( function_exists('makeitSrcset') && has_post_thumbnail()) {
    makeitSrcset(get_post_thumbnail_id($post->ID));
    }
    echo '<h3 class="a-medium a-prf-text">'.get_the_title().'</h3>';
echo '</a>';