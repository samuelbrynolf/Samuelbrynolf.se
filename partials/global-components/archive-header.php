<header class="l-gutter m-archive__header a-icon arrowdown">
    <?php if(is_search()){ ?>
        <h1 class="a-xlarge">S&ouml;kresultat f&ouml;r <?php echo '&#145;'; the_search_query();echo '&#146;'; ?> <span>&mdash; <?php echo $wp_query->found_posts ?> tr&auml;ffar</span></h1>
    <?php } elseif(is_404()) { ?>
        <h1 class="a-xlarge"><span>404</span> Sidan existerar inte.</h1>
        <p class="a-fineprint">Tyvärr har sidan upphört, eller så är länken felaktig. <a href="<?php bloginfo('url'); ?>" title="Till startsidan">Gå till startsidan.</a></p>
    <?php } else {
        the_archive_title( '<h1 class="a-xlarge">', '</h1>' );
        the_archive_description( '<div class="a-fineprint">', '</div>' );
    } ?>
</header>