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
        get_template_part('partials/global-components/loop-listitems');
    } ?>

</main>

<?php get_footer();
