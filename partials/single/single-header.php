<header class="l-gutter o-entry__header">

    <?php the_title( '<h1 class="a-xlarge a-entry-title">', '</h1>' );

    if(function_exists('get_field') && get_field('post_preamble')){ ?>
        <h2 class="a-preamble"><?php echo acf_tag_stripper('post_preamble'); ?></h2>
    <?php } ?>

    <p class="a-fineprint a-entry-meta">
        <?php the_date('', '<span class="a-listitem-meta__span">', '</span>');
        if (has_tag()) {
            the_tags(' &#183; ', ' &#183; ');
        }
        edit_post_link('Redigera', ' &mdash; ', ''); ?>
    </p><!-- .entry-meta -->

</header><!-- .entry-header -->