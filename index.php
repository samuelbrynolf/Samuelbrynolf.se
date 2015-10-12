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
        get_template_part('partials/listitems/loop-listitems');
    }

    if (!have_posts() && is_search() || is_404()) {
        get_template_part('partials/global-components/no-content');
    } ?>

</main>

<?php get_footer();
