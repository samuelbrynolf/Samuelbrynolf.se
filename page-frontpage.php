<?php /* Template Name: Startsida */
get_header(); ?>

<main id="main" role="main">

    <article>

        <header>
            <h1 class="a-large">Kontakt</h1>
        </header>

        <?php get_template_part('partials/global-components/ccard_avatar'); ?>

        <aside id="js-socialfeedBox" class="l-clearfix m-article__aside s-is-hidden"></aside>

        <footer class="m-frontpage__footer">
            <?php get_template_part('partials/global-components/ccard_socialnw'); ?>
        </footer>

    </article>

</main>

<?php get_footer(); ?>