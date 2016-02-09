<div id="js-entry-content" class="l-container o-entry-content">

    <div class="l-span-A12 l-span-D7">

        <?php if (function_exists('get_field') && get_field('external_linkText') && get_field('external_linkUrl') && has_post_format('link', get_the_ID())){ ?>
            <p class="a-external__a">
                Direktl&auml;nk: <a class="js-tappy" href="<?php echo get_field('external_linkUrl'); ?>"><?php echo get_field('external_linkText'); ?></a>
            </p>
        <?php }
        if(function_exists('get_field') && get_field('post_preamble')){ ?>
            <p class="a-preamble"><?php echo acf_tag_stripper('post_preamble'); ?></p>
        <?php }
        the_content(); ?>
        <div class="l-clear"></div>
    </div>

    <?php get_template_part('partials/single/single-footer'); ?>

</div><!-- .entry-content -->