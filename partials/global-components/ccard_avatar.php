<?php if(get_field('options_ccard_profilepic', 'option') &&function_exists('makeitSrcset')) {
    makeitSrcset(get_field('options_ccard_profilepic', 'option'), 50, 50, 50, 50, 50, 'm-prf avatar m-ccard-avatar'); // Configure vw later
}

if(get_field('options_ccard_profilebio', 'option')){
    echo '<div class="a-ccard__bio">';
        echo get_field('options_ccard_profilebio', 'option');
    echo '</div>';
} ?>
<!--<p class="a-ccard__p">Jag heter <strong>Samuel Brynolf</strong>. Jag tar fram form, koncept och gränssnittskod tillsammans med en rad överjordiskt intelligenta människor på <a href="#">Äventyret</a>. Det här är min blogg.</p>-->