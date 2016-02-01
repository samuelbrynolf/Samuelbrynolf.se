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

    if(!$previousPost){
        $args = array(
            'post__in' => array($nextPost->ID)
        );
    } elseif(!$nextPost){
        $args = array(
            'post__in' => array($previousPost->ID)
        );
    } else {
        $args = array(
            'post__in' => array($previousPost->ID, $nextPost->ID)
        );
    }

    $queried_posts = get_posts($args);
    if($queried_posts) {
        echo '<div class="l-clearfix m-prevnextposts">';
            echo '<h3 class="a-medium">Mer att l&auml;sa</h3>';
            slider($queried_posts);
        echo '</div>';
    }
    wp_reset_postdata(); ?>

</aside>