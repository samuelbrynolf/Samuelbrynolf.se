<?php if(function_exists('get_field') && get_field('post_preamble')){ ?>
    <div class="l-gutter m-entry-preamble">
        <h2 class="a-preamble"><?php echo acf_tag_stripper('post_preamble'); ?></h2>
    </div>
<?php } ?>

<div id="js-entry-content" class="l-gutter l-clearfix o-entry-content">

    <?php if (function_exists('get_field') && get_field('external_linkText') && get_field('external_linkUrl') && has_post_format('link', get_the_ID())){ ?>
        <p class="a-external__a">
            Direktl&auml;nk: <a class="js-tappy" href="<?php echo get_field('external_linkUrl'); ?>"><?php echo get_field('external_linkText'); ?></a>
        </p>
    <?php }
    the_content(); ?>
    <div class="l-clear"></div>

    <?php get_template_part('partials/single/single-footer'); ?>

</div><!-- .entry-content -->