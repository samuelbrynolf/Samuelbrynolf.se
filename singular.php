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
                makeitSrcset(get_post_thumbnail_id($post->ID), 100, 100, 100, 100, 100, 'm-prf');
            } elseif (has_post_thumbnail()){
                the_post_thumbnail();
            }

            get_template_part('partials/single/single-content');

            if(is_single()){
                get_template_part('partials/single/single-aside'); ?>
            <?php } ?>
        </article>

    <?php endwhile; ?>

</main>
<?php get_footer();