<?php /* Template Name: Instagram top image */
get_header(); ?>
    <main id="js-main">

        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php get_template_part('partials/singular/singular-header');
                echo '<div id="js-instagram" class="m-instagram"></div>';
                get_template_part('partials/singular/singular-content');
                get_template_part('partials/singular/singular-aside');?>
            </article>
        <?php endwhile; ?>

    </main>
<?php get_footer();