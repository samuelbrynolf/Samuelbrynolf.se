<?php get_header(); ?>

<main id="js-main">

    <?php if (is_home() && !is_paged()) {

        echo '<section id="js-blogtag" class="l-gutter m-blogtag">';
            get_template_part('partials/global-components/ccard_avatar');
        echo '</section>';

        get_template_part('partials/startpage/start-featured');

        echo '<div id="js-archive__header" class="l-gutter l-clearfix m-archive__header">';
            get_template_part('partials/global-components/archive-header');
        echo '</div>';

    } else {
        echo '<header class="l-gutter l-clearfix m-archive__header">';
            get_template_part('partials/global-components/archive-header');
        echo '</header>';
    }

    if ( have_posts() ) {
        get_template_part('partials/listitems/loop-listitems');
    } ?>

</main>

<?php get_footer();