<?php get_header(); ?>

<main id="js-main" role="main">

    <?php if(is_home()){
        if(is_paged()){
            // echo 'Yey! Paged!';
        } else {
            // echo 'Not paged!';
        }
        // echo 'bloggg!';
    } else {
        get_template_part('partials/global-components/archive-header');
    }

    if ( have_posts() ) {
        while ( have_posts() ) {
            the_post();
            get_template_part('partials/listitems/listitem', get_post_format());
        }

        //the_posts_navigation();
    } ?>

</main>

<?php get_footer(); ?>
