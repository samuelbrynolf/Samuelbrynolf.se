<div class="m-flickity-container">
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

    $queried_posts = get_posts($args);
    if($queried_posts) {
        slider($queried_posts);
    }
    wp_reset_postdata(); ?>
</div>

