<?php /* Template Name: Instagram top image */
get_header(); ?>

    <main id="js-main">

        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php get_template_part('partials/single/single-header');

                echo '<div id="js-instagram" class="m-instagram s-is-hidden"></div>';

                get_template_part('partials/single/single-content'); ?>
            </article><!-- #post-## -->

        <?php endwhile; // end of the loop. ?>

    </main><!-- #main -->
<?php get_footer();