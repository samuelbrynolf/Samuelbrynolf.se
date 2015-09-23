<?php /* Template Name: Startsida */
get_header(); ?>

<main id="main" class="o-site-main" role="main">

    <article class="t-frontpage__article">
        <h2 class="a-large">Le plateu dú Social</h2>

        <aside id="js-frontpage__aside" class="l-clearfix t-frontpage__aside s-is-hidden"></aside>

        <footer class="t-frontpage__footer">
            <?php get_template_part('partials/global-components/ccard_socialnw'); ?>
        </footer>

    </article>

</main>

<?php get_footer(); ?>