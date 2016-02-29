    <footer id="js-colophon">
        <section class="l-gutter o-global__footer">
            <?php if ((is_home() && !is_paged()) || is_archive() || is_search()) {
                get_template_part('partials/global-components/ccard_socialnw');
            } else {
                get_template_part('partials/global-components/ccard_avatar');
                get_template_part('partials/global-components/ccard_socialnw');
            } ?>
            <a class="js-jumper a-topjump a-icon arrowtop" href="#js-body" rel="nofollow"></a>
        </section>
    </footer>

    <?php wp_footer(); ?>

    </body>
</html>