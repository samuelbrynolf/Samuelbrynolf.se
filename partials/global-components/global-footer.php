<footer id="js-colophon" class="l-gutter o-global__footer" role="contentinfo">

    <?php if (is_front_page() && is_home() && !is_paged()) {
        get_template_part('partials/global-components/ccard_socialnw');
    } else {
        get_template_part('partials/global-components/ccard_avatar');
        get_template_part('partials/global-components/ccard_socialnw');
    } ?>
    <a class="a-topjump a-icon arrowtop" id="js-topjump" href="#" rel="nofollow">Till toppen</a>

</footer><!-- #colophon -->
