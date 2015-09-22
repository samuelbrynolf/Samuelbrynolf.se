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

            <aside class="o-single__aside l-gutter" role="complementary">
                <?php if (comments_open() || get_comments_number()) {
                    echo '<div class="o-comments">';
                        echo '<h3 class="a-large">Vad tycker du?</h3>';
                        comments_template();
                    echo '</div>';
                }

                // https://gist.github.com/nickdavis/862f79ca91be6a854243

                $previousPost = get_adjacent_post( false, '', true );
                $nextPost = get_adjacent_post( false, '', false );

                 if ($previousPost || $nextPost) {

                     echo '<div class="l-clearfix m-dual-nav">';
                        echo '<h3 class="a-medium">Fler inlägg:</h3>';

                        if($previousPost){
                            $prevPostfeatImg = get_the_post_thumbnail($previousPost->ID);

                            if (function_exists('makeitSrcset') && $prevPostfeatImg) {
                                makeitSrcset(get_post_thumbnail_id($previousPost->ID));
                            }
                            previous_post_link('%link');
                        }

                     if ($nextPost){
                            $nextPostfeatImg = get_the_post_thumbnail($nextPost->ID);

                         next_post_link('%link');
                            if (function_exists('makeitSrcset') && $nextPostfeatImg) {
                                makeitSrcset(get_post_thumbnail_id($nextPost->ID));
                            }
                        }

                     echo '</div>';
                 } ?>
            </aside>

            <footer class="m-entry__footer">
                <?php get_template_part('partials/global-components/ccard_avatar');
                get_template_part('partials/global-components/ccard_socialnw'); ?>
            </footer>

        </article><!-- #post-## -->

    <?php endwhile; // end of the loop. ?>

</main><!-- #main -->
<?php get_footer(); ?>