<?php /* Template Name: Library-BentoJs */ 

get_header();

echo '<div class="t-components">';
	get_template_part('_components/_bentoJs-demo/demo-webfonter');
	get_template_part('_components/_bentoJs-demo/demo-getActiveMq');
	get_template_part('_components/_bentoJs-demo/demo-lazyload');
	get_template_part('_components/_bentoJs-demo/demo-fitvids');
	get_template_part('_components/_bentoJs-demo/demo-viewportchecker');
	get_template_part('_components/_bentoJs-demo/demo-smoothscroll');
	get_template_part('_components/_bentoJs-demo/demo-contentslider');
echo '</div>';

get_footer(); ?> 