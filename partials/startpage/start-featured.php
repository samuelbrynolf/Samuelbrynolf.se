<?php $args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key' => 'options_set-featured',
            'value' => true
        )
    )
);

$featured_posts = get_posts($args);

if($featured_posts) {
    global $post; ?>
    <section class="js-flickity m-flickity" data-flickity-options='{ "cellAlign": "left", "contain": true, "prevNextButtons": false, "wrapAround": true}'>

        <?php foreach ($featured_posts as $post){
            setup_postdata($post);
            echo '<a class="gallery-cell m-prf ratio-4-3 overlay" href="'.get_the_permalink().'" title="'.get_the_title().'">';
                if ( function_exists('makeitSrcset') && has_post_thumbnail()) {
                    makeitSrcset(get_post_thumbnail_id($post->ID));
                }
                echo '<h3 class="a-medium a-prf-text">'.get_the_title().'</h3>';
            echo '</a>';
        } ?>

    </section>
<?php }
wp_reset_postdata();