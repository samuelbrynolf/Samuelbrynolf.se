<header class="l-gutter o-entry__header">

    <?php the_title( '<h1 class="a-xlarge a-entry-title">', '</h1>' ); ?>

    <p class="a-fineprint a-entry-meta">
        <?php the_date('', '', '');
        if (has_tag()) {
            the_tags(' &#183; ', ' &#183; ');
        }
        edit_post_link('Redigera', ' &mdash; ', ''); ?>
    </p><!-- .entry-meta -->

</header><!-- .entry-header -->