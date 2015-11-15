<aside class="o-single__aside" role="complementary">

    <div class="l-gutter m-sharepost">
        <h4 class="a-fineprint a-sharepost-title"><span>Dela inl&auml;gg</span></h4>
        <ul class="m-sharepost__ul">
            <li class="a-fineprint"><?php echo wp_get_shortlink(); ?></li>
        </ul>
        <?php get_template_part('partials/single/tweet-script'); ?>
    </div>

    <?php if (comments_open() || get_comments_number()) {
        echo '<div class="l-gutter o-comments">';
        echo '<h3 class="a-large">Vad tycker du?</h3>';
        comments_template();
        echo '</div>';
    }

    get_template_part('partials/single/nextprevnav'); ?>
</aside>