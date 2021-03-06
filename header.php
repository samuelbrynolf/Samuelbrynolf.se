<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="application-name" content="<?php bloginfo('name'); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <script>document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/,'js');<?php if (function_exists('get_field') && get_field('typekit_id', 'option')){ ?>(function(d){var config = {kitId: '<?php echo get_field('typekit_id', 'option'); ?>',scriptTimeout: 2000, async: true}, h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)})(document);<?php } ?></script>

	<link rel="author" href="https://plus.google.com/107967375248827213440/posts" />
	<?php wp_head(); ?>

    <!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/vendors_no_concat/html5shiv.min.js"></script>
	<![endif]-->

	<!--[if lte IE 8]>
		<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/vendors_no_concat/respond.min.js"></script>
	<![endif]-->
		
</head>

<body id="js-body" <?php body_class(); ?>>

    <header id="js-masthead" class="o-global__header">

		<?php $startpage = null;

		if(is_front_page() && !is_paged()){
			$startpage = true;
		}

		echo ($startpage ? '<h1 class="a-sitename">' : '<h3 class="a-sitename">');
        	echo bloginfo('name');
        echo ($startpage ? '</h1>' : '</h3>'); ?>

        <div class="l-gutter l-clearfix">
            <?php get_search_form();
            wp_nav_menu(array('container' => 'nav', 'container_class' => 'l-pull-right m-global__nav', 'items_wrap' => '<ul>%3$s</ul>')); ?>
        </div>
    </header>