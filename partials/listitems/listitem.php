<a class="l-gutter m-listitem__a js-tappy" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <article id="post-<?php the_ID(); ?>" <?php post_class('m-listitem'); ?>>

        <h2 class="a-medium a-listitem-title"><?php the_title(); ?></h2>
        <p class="a-fineprint a-listitem-excerpt"><span class="a-listitem-meta-date"><?php the_time('Y-m-d'); ?></span> &#183; <?php echo get_the_excerpt(); ?></p>




    </article><!-- #post-## -->
</a>