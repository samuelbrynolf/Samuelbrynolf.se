<?php /* Template Name: Library-bento */ 

get_header();

echo '<div class="t-components">';
	get_template_part('_components/_bento-components/mediablock');
	get_template_part('_components/_bento-components/alerts');
	get_template_part('_components/_bento-components/modal');
	get_template_part('_components/_bento-components/toggler'); 
	get_template_part('_components/_bento-components/expandsection'); 
	get_template_part('_components/_bento-components/checkboxes_radiobuttons'); 
	get_template_part('_components/_bento-components/dropdown');
	get_template_part('_components/_bento-components/gridview'); 
echo '</div>';

get_footer(); ?> 