<aside class="o-single__aside">

    <div class="l-gutter m-sharepost">
        <ul class="l-clearfix m-sharepost__ul">
            <li class="a-fineprint a-shortlink a-icon link"><?php echo wp_get_shortlink(); ?></li>
            <li class="a-tweetthis"><?php get_template_part('partials/singular/tweet-script'); ?></li>
        </ul>

    </div>

    <?php if (is_singular('post') && (comments_open() || get_comments_number())) {
        echo '<div class="l-gutter o-comments">';
            echo '<h3 class="a-large">Vad tycker du?</h3>';
            comments_template();
        echo '</div>';
    }

    // SLIDER VARS & CONDITIONALS

    $queried_posts = null;
    $queried_posts_title = 'Mer att läsa';

    if(is_singular('post')){
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
            'post_type' => 'post',
            'posts_per_page' => -1,
            'meta_query' => array(
                array(
                    'key' => 'options_set-featured',
                    'value' => true
                )
            ),
            'fields' => 'ids',
            'post__not_in' => array($current_post_ID)
        ));

        $merged_id_arr = array_merge($nextprev_posts_id_arr, $featured_id_arr);
        $args = array(
            'post__in'  => $merged_id_arr,
            'posts_per_page' => -1
        );
        $queried_posts = get_posts($args);
    }

    if(is_page()){
        $pop_slider_by_tag = get_post_meta($post->ID, 'pop-slider-by-tag', true);
        if($pop_slider_by_tag){
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'tag' => $pop_slider_by_tag
            );
            $queried_posts = get_posts($args);
            if(get_post_meta($post->ID, 'slider-title', true)){
                $queried_posts_title = get_post_meta($post->ID, 'slider-title', true);
            }
        }
    }

    // END SLIDER VARS & CONDITIONALS
    // SLIDER

    if($queried_posts) {
        echo '<div class="l-clearfix m-prevnextposts">';
            echo '<h3 class="a-medium">'.$queried_posts_title.'</h3>';
            slider($queried_posts);
        echo '</div>';
    }
    wp_reset_postdata(); ?>

</aside>