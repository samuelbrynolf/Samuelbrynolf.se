<header class="l-gutter o-entry__header">

    <?php the_title( '<h1 class="a-xlarge a-entry-title">', '</h1>' );

    if(function_exists('get_field') && get_field('preamble')){ ?>
        <div class="m-preamble a-entry-preamble">
            <h2><?php the_field('preamble'); ?></h2>
        </div>
    <?php } ?>

    <p class="a-fineprint a-entry-meta">
        <?php the_date('', '<span class="a-listitem-meta__span">', '</span>');
        if (has_tag()) {
            the_tags(' &#183; ', ' &#183; ');
        } ?>
    </p><!-- .entry-meta -->

</header><!-- .entry-header -->