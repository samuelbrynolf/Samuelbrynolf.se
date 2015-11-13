<div class="l-gutter o-entry-content">
    <?php the_content();
    if(is_single()) {
        get_template_part('partials/single/tweet-script');
    } ?>
    <div class="l-clear"></div>
</div><!-- .entry-content -->