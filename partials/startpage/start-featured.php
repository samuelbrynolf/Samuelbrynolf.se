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
    <ul class="main-gallery js-flickity" data-flickity-options='{ "cellAlign": "left", "contain": true, "prevNextButtons": false, "wrapAround": true}'>

        <?php while ( $feat_query->have_posts() ) {
            $feat_query->the_post();
            echo '<li class="gallery-cell">' . get_the_title() . '</li>';
        } ?>

    </ul>
<?php }
wp_reset_postdata();