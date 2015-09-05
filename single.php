<?php get_header();

if ( function_exists('makeitSrcset') && has_post_thumbnail()) {
    makeitSrcset(get_post_thumbnail_id($post->ID), null, null, null, null, null, 'prf ratio-by-ori');
} elseif (has_post_thumbnail()){
    the_post_thumbnail();
} ?>

<main id="main" class="l-gutter o-site-main row" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php get_template_part('partials/single/single-header');
            get_template_part('partials/single/single-content');
            get_template_part('partials/single/single-footer'); ?>
        </article><!-- #post-## -->

        <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || get_comments_number() ) :
            // comments_template();
        endif;

    endwhile; // end of the loop. ?>

</main><!-- #main -->
<?php get_footer(); ?>
