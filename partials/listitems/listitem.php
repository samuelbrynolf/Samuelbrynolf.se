<article id="post-<?php the_ID(); ?>" <?php post_class('l-gutter row padded'); ?>>
    <header class="m-listitem-header">
        <?php the_title( sprintf( '<h2 class="a-listitem-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    </header><!-- .listitem-header -->

    <p class="m-listitem-content">
        <?php if(function_exists('get_field') && get_field('preamble')){
            the_field('preamble');
        } else {
            echo get_the_excerpt();
        } ?>
    </p><!-- .listitem-content -->

    <footer class="m-listitem-footer row">
        <p class="a-fineprint listitem-meta">
            <?php if (has_tag()) {
                echo strip_tags(get_the_tag_list('', ' &#183 ', ' &#183 '));
            }
            the_date('', '<span class="a-listitem-meta__span">Publicerad: ', '</span>'); ?>
        </p><!-- .listitem-meta -->
    </footer><!-- .entry-footer -->

</article><!-- #post-## -->