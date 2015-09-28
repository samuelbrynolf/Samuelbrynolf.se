<?php $previousPost = get_adjacent_post( false, '', true );
$nextPost = get_adjacent_post( false, '', false );

if ($previousPost || $nextPost) {

    echo '<div class="m-dual-nav">';
        echo '<h3 class="a-medium">Mer att l&auml;sa</h3>';
        echo '<div class="l-container">';

            if($previousPost){
                $prevPostfeatImg = get_the_post_thumbnail($previousPost->ID);

                echo '<div class="l-span l-span-B6">';
                    echo '<div class="m-prf ratio-4-3 overlay">';

                        if (function_exists('makeitSrcset') && $prevPostfeatImg) {
                            makeitSrcset(get_post_thumbnail_id($previousPost->ID), null, null, '25', null, null);
                        }
                        previous_post_link('%link');


                    echo '</div>';
                echo '</div>';
            }

            if ($nextPost){
                $nextPostfeatImg = get_the_post_thumbnail($nextPost->ID);

                echo '<div class="l-span l-span-B6">';
                    echo '<div class="m-prf ratio-4-3 overlay">';

                        if (function_exists('makeitSrcset') && $nextPostfeatImg) {
                            makeitSrcset(get_post_thumbnail_id($nextPost->ID), null, null, '25', null, null);
                        }
                        next_post_link('%link');

                    echo '</div>';
                echo '</div>';
            }
        echo '</div>';
    echo '</div>';
}