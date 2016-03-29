<a class="l-clearfix js-tappy m-listitem__a" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <?php if (function_exists('makeitSrcset') && has_post_thumbnail()) {
        makeitSrcset(get_post_thumbnail_id($post->ID), 90, 89, 25, 21, 20, 'm-prf ratio-16-9 listitem__img');
    } elseif (has_post_thumbnail()){
        the_post_thumbnail();
    }

    the_title( '<h3 class="a-medium a-listitem-title">', '</h3>' ); ?>
    <p class="a-fineprint a-listitem-excerpt<?php echo (has_post_thumbnail() ? ' has-thumb' : ''); ?>">
        <span class="a-listitem-meta-date">
            <?php the_time('Y-m-d');
            if (has_tag()) {
                echo strip_tags(get_the_tag_list(' &#183; ',' &#183; ',''));
            } ?>
        </span>
        <br/>
        <?php echo get_the_excerpt(); ?>
    </p>
</a>