<?php get_header(); ?>

<main id="js-main" role="main">

    <?php if(is_home()){

        if(is_paged()){
            // Is Blog + Not first page

        } else {
            // Is Blog + First page
           get_template_part('partials/startpage/start-featured');
        }

    } else {
        // Archive-templates
        get_template_part('partials/global-components/archive-header');
    }


     // -----



    if ( have_posts() ) {
        get_template_part('partials/listitems/loop-listitems');
    }

    if (!have_posts() && is_search() || is_404()) {
        get_template_part('partials/global-components/no-content');
    } ?>

</main>

<?php get_footer();
