    <footer id="js-colophon">
        <section class="l-gutter o-global__footer">
            <?php if ((is_home() && !is_paged()) || is_archive() || is_search()) {
                get_template_part('partials/global-components/ccard_socialnw');
            } else {
                get_template_part('partials/global-components/ccard_avatar');
                get_template_part('partials/global-components/ccard_socialnw');
            } ?>
            <a class="a-topjump a-icon arrowtop" id="js-topjump" href="#" rel="nofollow"></a>
        </section>
    </footer><!-- #colophon -->

    <?php wp_footer(); ?>

    </body>
</html>