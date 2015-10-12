<header class="l-gutter l-clearfix m-archive__header">
    <?php if(is_search()){ ?>
        <h1>S&ouml;kresultat f&ouml;r <?php echo '<strong>'; the_search_query();echo '</strong>'; ?> &mdash; <?php echo $wp_query->found_posts ?> st.</h1>
    <?php } elseif(is_404()) { ?>
        <h1>404</h1>
        <p class="a-fineprint">Sidan existerar inte. Tyvärr har sidan upphört, eller så är länken felaktig. <a href="<?php bloginfo('url'); ?>" title="Till startsidan">Gå till startsidan</a>, anv&auml;nd s&ouml;ket ovan eller etiketterna nedan f&ouml;r att hitta ditt inneh&aring;ll.</p>
    <?php } else {
        the_archive_title( '<h1>', '</h1>' );
        the_archive_description('<div class="a-fineprint">','</div>');
    } ?>
</header>