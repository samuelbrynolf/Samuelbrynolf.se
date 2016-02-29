<?php if(function_exists('get_field')) {

    if (get_field('options_ccard_profilepic', 'option') && function_exists('makeitSrcset')) {
        makeitSrcset(get_field('options_ccard_profilepic', 'option'), 50, 30, 20, 13, 22, 'm-prf avatar m-ccard-avatar');
    } else {
        echo '<script>console.log("Lägg till en bild via wp-admin / options (minst 620px bred). Se till att plugin Make it Srcset är aktiverad / konfigurerad.")</script>';
    }

    if (get_field('options_ccard_profilebio', 'option')) {
        echo '<div class="a-ccard__bio">';
            echo get_field('options_ccard_profilebio', 'option');
        echo '</div>';
    }
}