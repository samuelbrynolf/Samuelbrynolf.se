<?php if(is_search()){ ?>
    <h1 class="js-focus-search">S&ouml;kresultat f&ouml;r <?php echo '<strong>'; the_search_query();echo '</strong>'; ?> &mdash; <?php echo $wp_query->found_posts ?> st.</h1>

    <?php if(!have_posts()){
        echo '<p class="a-fineprint">F&ouml;rfina <a class="js-focus-search" href="#" rel="nofollow">din s&ouml;kning</a> eller leta vidare med hj&auml;lp av dessa etiketter:</p>';
    }

} elseif(is_404()) { ?>
    <h1>404</h1>
    <p class="a-fineprint">Sidan existerar inte. Tyvärr har sidan upphört, eller så är länken felaktig. <a href="<?php bloginfo('url'); ?>" title="Till startsidan">Gå till startsidan</a>, <a class="js-focus-search" href="#" rel="nofollow">anv&auml;nd s&ouml;ket</a> eller etiketterna nedan f&ouml;r att hitta ditt inneh&aring;ll.</p>

<?php } elseif(is_home()){

    if(!is_paged()) {
        echo '<h2>Senast publicerat</h2>';
    } else {
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        echo '<h1>Blogg &mdash; sida ' . $paged . '</h1>';
    }

} else {
    the_archive_title( '<h1>', '</h1>' );
    the_archive_description('<p class="a-fineprint">','</p>');
}

echo '<div class="a-archive__divider' . (is_search() || is_404() ? ' js-focus-search' : '') . '"></div>';

// NO POSTS OF EMPTY SEARCH ------------------------------------------

if (!have_posts() || is_404()) {
    echo '<section class="o-no-content">';
        listTags();
    echo '</section>';
}