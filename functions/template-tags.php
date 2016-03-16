<?php // SLIDER -------------------------------------------------------------------

if ( !function_exists( 'slider' )) {
    function slider($queried_posts){

        global $post; ?>
        <section class="l-clear js-flickity m-flickity" data-flickity-options='{ "cellAlign": "left", "contain": true, "prevNextButtons": false, "wrapAround": true}'>

            <?php foreach ($queried_posts as $post) {

                setup_postdata($post);

                echo '<a class="gallery-cell m-prf ratio-4-3 overlay" href="' . get_the_permalink() . '" title="' . get_the_title() . '">';
                    if (function_exists('makeitSrcset') && has_post_thumbnail()) {
                        makeitSrcset(get_post_thumbnail_id($post->ID), 83, 62, 39, 34, 28);
                    }
                    echo '<h3 class="a-medium a-prf-text">'.get_the_title();
                    if (has_tag()) {
                        echo '<br/>';
                        echo '<span class="a-prf-text__span">';
                            echo strip_tags(get_the_tag_list('',' &#183; ','</p>'));
                        echo '</span>';
                    }
                    echo '</h3>';
                echo '</a>';
            } ?>

        </section>
        <?php
        wp_reset_postdata();
    }
}


// PULL IMAGES FROM INSTAGRAM -------------------------------------------------------------------

if ( !function_exists( 'process_instagram_URL' )) {
    function process_instagram_URL($url){
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => 2
        ));

        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
}

if ( !function_exists( 'pull_instagram' )) {
    function pull_instagram($user_id = '', $client_id = '', $count = null, $container = true){

        if (!is_numeric($user_id) && !is_numeric($client_id)) {
            return;
        }

        if (empty($count)) {
            $count = '1';
        }

        $url = 'https://api.instagram.com/v1/users/' . $user_id . '/media/recent/?client_id=' . $client_id . '&count=' . $count;
        $all_result = process_instagram_URL($url);
        $decoded_results = json_decode($all_result, true);

        if (isset($decoded_results['data']) && is_array($decoded_results['data'])) {
            foreach ($decoded_results['data'] as $item) {
                $thumbsize_url = $item['images']['thumbnail']['url'];
                $loressize_url = $item['images']['low_resolution']['url'];
                $standardsize_url = $item['images']['standard_resolution']['url'];
                $media_page = $item['link'];

                if ($container) {
                    echo '<div class="m-prf ratio-1-1">';
                }

                echo '<img class="js-instagram__img a-forcewidth a-prf__img" src="' . $loressize_url . '" srcset="' . $standardsize_url . ' 612w,
                ' . $loressize_url . ' 306w,
                ' . $thumbsize_url . ' 150w"

                sizes="100vw"/><p class="a-fineprint a-instagram__medialink">Bild: <a href="'.$media_page.'" title="Aventyrets Instagram-konto">Äventyret@Instagram</a></p>';

                if ($container) {
                    echo '</div>';
                }
            }
        }
    }
}


// REMOVE TAGS FROM ACF-FIELDS (APPLIED FOR PREAMBLES) -------------------------------------------------------------------

if(!function_exists('acf_tag_stripper') && function_exists('get_field') && !(function_exists('acf_tag_stripper'))) {
    function acf_tag_stripper($acf_field=null, $alltags=true, $option=false) {

        if(is_null($acf_field)) {
            return;
        } elseif($option){
            if(!get_field($acf_field, 'option')){
                return;
            }
        } else {
            if(!get_field($acf_field)){
                return;
            }
        }

        $field = get_field($acf_field);

        if($option){
            $field = get_field($acf_field, 'option');
        }

        if($alltags){
            $field_stripped = wp_strip_all_tags( $field );
        } else {
            $field_stripped = $field;
        }
        $field_stripped = preg_replace("/&nbsp;/", " ", $field_stripped);
        return $field_stripped;
    }
}