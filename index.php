<?php get_header(); ?>

<main id="main" class="site-main" role="main">

    <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            get_template_part( 'content', get_post_format() );
        endwhile;
        the_posts_navigation();
    else :
        get_template_part( 'content', 'none' );
    endif; ?>

</main><!-- #main -->

<?php get_footer(); ?>
