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

    if (!have_posts() && is_search()) {
        get_template_part('partials/no-content/bad-search');
    }

    if (is_404()){
        echo 'duh 404';
    }?>

</main>

<?php get_footer();
