<?php get_header(); ?>

<main id="js-main">

    <?php if (is_home() && !is_paged()) { ?>

        <section class="l-gutter">
            <?php get_template_part('partials/global-components/ccard_avatar'); ?>
        </section>
<!--        <h3 class="a-large">Populära poster</h3>-->
        <?php get_template_part('partials/startpage/start-featured');
    }

    get_template_part('partials/global-components/archive-header');

    if ( have_posts() ) {
        get_template_part('partials/listitems/loop-listitems');
    } ?>

</main>

<?php get_footer();
