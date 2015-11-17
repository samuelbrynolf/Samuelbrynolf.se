<?php get_header(); ?>

<main id="js-main">

    <?php if(is_home()){

        if(is_paged()){ // Is Blog + NOT first page -------------------------------------------------------------------------------------------------------------------

            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            echo '<header class="l-gutter l-clearfix m-archive__header">';
                echo '<h1>Blogg &mdash; sida ' . $paged . '</h1>';
            echo '</header>';


        } else { // Is Blog + First page Is Blog + NOT first page -------------------------------------------------------------------------------------------------------------------

            get_template_part('partials/startpage/start-about-aventyret');
            get_template_part('partials/startpage/start-featured');
        }

    } else { // NOT home. Probably looking for an archive-template -------------------------------------------------------------------------------------------------------------------

        get_template_part('partials/global-components/archive-header');

    }

    // End home / start conditionals -------------------------------------------------------------------------------------------------------------------


    if ( have_posts() ) {
        get_template_part('partials/listitems/loop-listitems');
    }

    if (!have_posts() && is_search() || is_404()) {
        get_template_part('partials/global-components/no-content');
    } ?>

</main>

<?php get_footer();
