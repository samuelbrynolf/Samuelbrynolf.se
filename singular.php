<?php get_header(); ?>

<main id="js-main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php get_template_part('partials/single/single-header');

            if ( function_exists('makeitSrcset') && has_post_thumbnail()) {
                makeitSrcset(get_post_thumbnail_id($post->ID), null, null, null, null, null, 'm-prf');
            } elseif (has_post_thumbnail()){
                the_post_thumbnail();
            }

            get_template_part('partials/single/single-content'); ?>



            <!-- USE FOR PAGES AS WELL? TEMPLATE HIARERCHY SINGLE/PAGES ETC??? -->


            <aside class="o-single__aside" role="complementary">
                <?php if (comments_open() || get_comments_number()) {
                    echo '<div class="l-gutter o-comments">';
                        echo '<h3 class="a-large">Vad tycker du?</h3>';
                        comments_template();
                    echo '</div>';
                }

                get_template_part('partials/single/nextprevnav'); ?>
            </aside>

        </article><!-- #post-## -->

    <?php endwhile; // end of the loop. ?>

</main><!-- #main -->
<?php get_footer();