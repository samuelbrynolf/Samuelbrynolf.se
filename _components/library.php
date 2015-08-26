<?php /* Template Name: Library */ 

get_header();

echo '<div class="t-components">';
	//get_template_part('_components/_atoms/logos');
	get_template_part('_components/_atoms/colors');
	//get_template_part('_components/_atoms/gradients');
	get_template_part('_components/_atoms/text'); 
	get_template_part('_components/_atoms/lists'); 
	get_template_part('_components/_atoms/form-all'); 
	get_template_part('_components/_atoms/buttons');
echo '</div>';

get_footer(); ?> 