<a class="m-listitem__a" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <article id="post-<?php the_ID(); ?>" <?php post_class('m-listitem'); ?>>
        <header class="l-gutter m-listitem__header">
            <h2 class="a-large a-listitem-title"><?php the_title(); ?></h2>
        </header><!-- .listitem-header -->

        <p class="a-fineprint a-listitem-meta-date"><?php the_date(); ?></p>

        <?php if ( function_exists('makeitSrcset') && has_post_thumbnail()) {
            makeitSrcset(get_post_thumbnail_id($post->ID), null, null, null, null, null, 'm-prf ratio-16-9');
        } elseif (has_post_thumbnail()){
            the_post_thumbnail();
        } ?>

    </article><!-- #post-## -->
</a>