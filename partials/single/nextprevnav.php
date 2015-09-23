<?php $previousPost = get_adjacent_post( false, '', true );
$nextPost = get_adjacent_post( false, '', false );

if ($previousPost || $nextPost) {

    echo '<div class="l-clearfix m-dual-nav">';
        echo '<h3 class="a-medium">Fler inlägg:</h3>';

        if($previousPost){
            $prevPostfeatImg = get_the_post_thumbnail($previousPost->ID);

            if (function_exists('makeitSrcset') && $prevPostfeatImg) {
                makeitSrcset(get_post_thumbnail_id($previousPost->ID), null, null, null, null, null, 'l-clear m-prf ratio-16-9');
            }
            previous_post_link('%link');
        }

        if ($nextPost){
            $nextPostfeatImg = get_the_post_thumbnail($nextPost->ID);

            next_post_link('%link');
            if (function_exists('makeitSrcset') && $nextPostfeatImg) {
                makeitSrcset(get_post_thumbnail_id($nextPost->ID), null, null, null, null, null, 'l-clear m-prf ratio-16-9');
            }
        }
    echo '</div>';
}