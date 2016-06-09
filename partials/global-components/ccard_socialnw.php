<?php if(function_exists('get_field')) {

    echo '<ul class="l-clearfix a-fineprint m-ccard__list">';
        if(get_field('options_ccard_snw_twitterLabel', 'option') && get_field('options_ccard_snw_twitterUrl', 'option')) { ?>
            <li><a class="a-icon twitter" href="<?php echo get_field('options_ccard_snw_twitterUrl', 'option'); ?>" title="Samuel Brynolf p&aring; Twitter" rel="me"><?php echo get_field('options_ccard_snw_twitterLabel', 'option'); ?></a></li>
        <?php } ?>

        <?php if(get_field('options_ccard_snw_linkedInLabel', 'option') && get_field('options_ccard_snw_linkedInUrl', 'option')) { ?>
            <li><a class="a-icon linkedin" href="<?php echo get_field('options_ccard_snw_linkedInUrl', 'option'); ?>" title="Samuel Brynolf p&aring; LinkedIn" rel="me"><?php echo get_field('options_ccard_snw_linkedInLabel', 'option'); ?></a></li>
        <?php } ?>

        <?php if(get_field('options_ccard_snw_emailLabel', 'option') && get_field('options_ccard_snw_emailUrl', 'option')) { ?>
            <li><a class="a-icon email" href="mailto:<?php echo get_field('options_ccard_snw_emailUrl', 'option'); ?>" title="Eposta Samuel Brynolf"><?php echo get_field('options_ccard_snw_emailLabel', 'option'); ?></a></li>
        <?php }
    echo '</ul>';
}