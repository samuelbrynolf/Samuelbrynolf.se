<?php  $args = array(
    'post_type' => 'post',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key' => 'set_featured',
            'value' => true
        )
    )
);
$feat_query = new WP_Query( $args );


if ( $feat_query->have_posts() ) { ?>
    <section class="js-flickity m-flickety" data-flickity-options='{ "cellAlign": "left", "contain": true, "prevNextButtons": false, "wrapAround": true}'>

        <?php while ( $feat_query->have_posts() ) {
            $feat_query->the_post();
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