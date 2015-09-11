<?php get_header(); ?>

<main id="main" class="o-site-main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php get_template_part('partials/single/single-header');

            if ( function_exists('makeitSrcset') && has_post_thumbnail()) {
                makeitSrcset(get_post_thumbnail_id($post->ID), null, null, null, null, null, 'm-prf ratio-by-ori');
            } elseif (has_post_thumbnail()){
                the_post_thumbnail();
            }

            get_template_part('partials/single/single-content');
            // get_template_part('partials/single/single-footer'); ?>

            <aside class="l-gutter o-ccard" role="complementary">
                <?php get_template_part('partials/global-components/ccard'); ?>
            </aside>
        </article><!-- #post-## -->

        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || get_comments_number() ) :
            // comments_template();
        endif;

    endwhile; // end of the loop. ?>

</main><!-- #main -->
<?php get_footer(); ?>
