<aside class="o-single__aside">

    <div class="l-gutter m-sharepost">
        <h4 class="a-fineprint a-sharepost-title">Dela inl&auml;gg</h4>
        <ul class="m-sharepost__ul">
            <li class="a-fineprint"><?php echo wp_get_shortlink(); ?></li>
        </ul>
        <?php get_template_part('partials/single/tweet-script'); ?>
    </div>

    <?php if (comments_open() || get_comments_number()) {
        echo '<div class="l-gutter o-comments">';
        echo '<h3 class="a-large">Vad tycker du?</h3>';
        comments_template();
        echo '</div>';
    }

    $previousPost = get_adjacent_post( false, '', true );
    $nextPost = get_adjacent_post( false, '', false );
    $current_post_ID = $post->ID;

    if(!$previousPost){
        $nextprev_posts_id_arr = array($nextPost->ID);
    } elseif(!$nextPost){
        $nextprev_posts_id_arr = array($previousPost->ID);
    } else {
        $nextprev_posts_id_arr = array($previousPost->ID, $nextPost->ID);
    }

    $featured_id_arr = get_posts(array(
        'fields' => 'ids',
        'post_type' => 'post',
        'posts_per_page' => -1,
        'post__not_in' => array($current_post_ID),
        'meta_query' => array(
            array(
                'key' => 'options_set-featured',
                'value' => true
            )
        )
    ));

    $merged_id_arr = array_merge($nextprev_posts_id_arr, $featured_id_arr);

    $args = array(
        'post__in'  => $merged_id_arr
    );

    $queried_posts = get_posts($args);
    if($queried_posts) {
        echo '<div class="l-clearfix m-prevnextposts">';
            echo '<h3 class="a-medium">Mer att l&auml;sa</h3>';
            slider($queried_posts);
        echo '</div>';
    }
    wp_reset_postdata(); ?>

</aside>
