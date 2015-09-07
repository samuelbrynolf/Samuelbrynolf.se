<header class="m-entry-header row">

    <?php the_title( '<h1 class="a-xlarge entry-title">', '</h1>' );
    if(function_exists('get_field') && get_field('preamble')){ ?>
        <div class="m-preamble entry-preamble">
            <h2><?php the_field('preamble'); ?></h2>
        </div>
    <?php }

    if (has_tag()) { ?>
        <p class="a-fineprint entry-meta">
            <?php the_tags('',' &#183 '); ?>
        </p><!-- .entry-meta -->
    <?php } ?>

</header><!-- .entry-header -->



