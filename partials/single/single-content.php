<?php if(function_exists('get_field') && get_field('post_preamble')){ ?>
    <div id="js-entry-preamble" class="l-gutter m-entry-preamble">
        <h2 class="a-preamble"><?php echo acf_tag_stripper('post_preamble'); ?></h2>
    </div>
<?php } ?>

<div id="js-entry-content" class="l-gutter o-entry-content<?php echo (function_exists('get_field') && get_field('toc') ? ' has-toc' : ''); ?>">
    <?php if (function_exists('get_field') && get_field('external_linkText') && get_field('external_linkUrl')){ ?>
        <p class="a-external__a">
            Externt: <a href="<?php echo get_field('external_linkUrl'); ?>" target="_blank"><?php echo get_field('external_linkText'); ?></a>
        </p>
    <?php }

    if(function_exists('get_field') && get_field('toc')){
        echo '<section id="js-toclist__section"></section>';
        echo '<p>&mdash;</p>';
    }

    the_content();
    echo '<div class="l-clear"></div>';
    get_template_part('partials/single/single-footer'); ?>
</div>