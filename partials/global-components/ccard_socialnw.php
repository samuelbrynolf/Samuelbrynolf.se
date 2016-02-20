<?php if(function_exists('get_field')) { ?>

    <ul class="l-container a-fineprint m-ccard__list">
        <?php if(get_field('options_ccard_snw_twitterLabel', 'option') && get_field('options_ccard_snw_twitterUrl', 'option')) { ?>
            <li class="l-span-A12 l-span-C4"><a class="a-icon twitter" href="<?php echo get_field('options_ccard_snw_twitterUrl', 'option'); ?>" title="Samuel Brynolf p&aring; Twitter" rel="me"><?php echo get_field('options_ccard_snw_twitterLabel', 'option'); ?></a></li>
        <?php } ?>
        <?php if(get_field('options_ccard_snw_linkedInLabel', 'option') && get_field('options_ccard_snw_linkedInUrl', 'option')) { ?>
            <li class="l-span-A12 l-span-C4"><a class="a-icon linkedin" href="<?php echo get_field('options_ccard_snw_linkedInUrl', 'option'); ?>" title="Samuel Brynolf p&aring; LinkedIn" rel="me"><?php echo get_field('options_ccard_snw_linkedInLabel', 'option'); ?></a></li>
        <?php } ?>
        <?php if(get_field('options_ccard_snw_emailLabel', 'option') && get_field('options_ccard_snw_emailUrl', 'option')) { ?>
            <li class="l-span-A12 l-span-C4"><a class="a-icon email" href="mailto:<?php echo get_field('options_ccard_snw_emailUrl', 'option'); ?>" title="Eposta Samuel Brynolf"><?php echo get_field('options_ccard_snw_emailLabel', 'option'); ?></a></li>
        <?php } ?>
    </ul>

<?php } ?>