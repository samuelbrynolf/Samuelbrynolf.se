<?php if(function_exists('get_field') && get_field('postfooter_resources')) {
    echo '<footer class="m-resources'.(get_field('postfooter_resources_sidebar') ? ' is-sidebar' : '').'">';
        echo get_field('postfooter_resources');
    echo '</footer>';
}