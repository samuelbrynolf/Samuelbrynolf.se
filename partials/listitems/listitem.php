<a class="js-tappy m-listitem__a" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
    <?php the_title( '<h2 class="a-medium a-listitem-title">', '</h2>' ); ?>
    <p class="a-fineprint a-listitem-excerpt">
        <span class="a-listitem-meta-date">
            <?php the_time('Y-m-d');
            if (has_tag()) {
                echo strip_tags(get_the_tag_list(' &#183; ',' &#183; ',' '));
            } ?>
        </span>
        &#183; <?php echo get_the_excerpt(); ?></p>
</a>

<?php if (function_exists('get_field') && get_field('external_linkText') && get_field('external_linkUrl')){ ?>
    <p class="l-clear a-fineprint a-external__a">
        Direktl&auml;nk: <a href="<?php echo get_field('external_linkUrl'); ?>" target="_blank"><?php echo get_field('external_linkText'); ?></a>
    </p>
<?php } ?>