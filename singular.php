<?php get_header(); ?>

<main id="js-main">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php get_template_part('partials/single/single-header');

            if(function_exists('get_field') && get_field('video_embed_code') && has_post_format('video')){
                echo '<section id="js-video-embed">';
                    the_field('video_embed_code');
                echo '</section>';
            } elseif ( function_exists('makeitSrcset') && has_post_thumbnail()) {
                echo '<a class="js-jumper" href="#js-entry-content" rel="nofollow">';
                    makeitSrcset(get_post_thumbnail_id($post->ID), null, null, null, null, null, 'm-prf');
                echo '</a>';
            } elseif (has_post_thumbnail()){
                echo '<a class="js-jumper" href="#js-entry-content" rel="nofollow">';
                    the_post_thumbnail();
                echo '</a>';
            }

            get_template_part('partials/single/single-content');

            if(is_single()){
                get_template_part('partials/single/single-aside'); ?>
            <?php } ?>
        </article><!-- #post-## -->

    <?php endwhile; // end of the loop. ?>

</main><!-- #main -->
<?php get_footer();