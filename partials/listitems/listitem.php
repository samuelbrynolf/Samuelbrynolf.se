<a class="a-listitem__a" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <article id="post-<?php the_ID(); ?>" <?php post_class('l-gutter m-listitem'); ?>>
        <header class="m-listitem__header">
            <h2 class="a-large"><?php the_title(); ?></h2>
        </header><!-- .listitem-header -->

        <?php if ( function_exists('makeitSrcset') && has_post_thumbnail()) {
            makeitSrcset(get_post_thumbnail_id($post->ID), null, null, null, null, null, 'prf ratio-16-9');
        } elseif (has_post_thumbnail()){
            the_post_thumbnail();
        } ?>

        <p class="a-listitem-content">
            <?php the_date('', '<span class="a-listitem-meta-date">', '</span> &#183 ');
            if(function_exists('get_field') && get_field('preamble')){
                the_field('preamble');
            } else {
               echo get_the_excerpt();
            } ?>
        </p><!-- .listitem-content -->
    </article><!-- #post-## -->
</a>