<header class="entry-header">
    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    <p class="entry-meta">
        <?php the_date('', 'Publicerad ', '');
        if (has_tag()) {
            echo '<br/>' .strip_tags(get_the_tag_list('', ' + ', ''));
        }?>
    </p><!-- .entry-meta -->
</header><!-- .entry-header -->