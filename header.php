<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="application-name" content="<?php bloginfo('name'); ?>" />
	<meta name="viewport" content="width=device-width,initial-scale=1">

    <meta property="og:title" content="<?php the_title(); ?>"/>
    <?php if ( has_post_thumbnail() ) {
        $postthumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
        $postthumb_url = $postthumb['0']; ?>
        <meta property="og:image" content="<?php echo $postthumb_url ?>"/>
    <?php } ?>

    <meta property="og:site_name" content="<?php echo bloginfo('name'); ?>"/>
    <meta property="og:description" content="<?php echo get_the_excerpt(); ?>" />

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <!-- doublecheck and activate later <link rel="author" href="https://plus.google.com/107967375248827213440/posts" /> -->
	<?php wp_head(); ?>

    <script>
        document.documentElement.className = document.documentElement.className.replace(/\bno-js\b/,'js wfl');
        (function(d) {
            var config = {
                    kitId: 'nky2ajj',
                    scriptTimeout: 3000,
                    async: true
                },
                h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
        })(document);
    </script>

    <!--[if lt IE 9]>
		<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/vendors_no_concat/html5shiv.min.js"></script>
	<![endif]-->

	<!--[if lte IE 8]>
		<script type="text/javascript" src="<?php echo esc_url(get_template_directory_uri()); ?>/js/vendors_no_concat/respond.min.js"></script>
	<![endif]-->

    <?php if (!current_user_can( 'manage_options' )) { ?>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            // activate later ga('create', 'UA-46517954-1', 'note-to-helf.com');
            ga('send', 'pageview');
        </script>
    <?php }; ?>
		
</head>

<body <?php body_class(); ?>>

    <header id="js-masthead" class="o-global__header">
        <?php echo (is_front_page() ? '<h1 class="a-sitename">' : '<h2 class="a-sitename">');
        echo bloginfo('name');
        echo (is_front_page() ? '</h1>' : '</h2>'); ?>

        <div class="l-gutter l-clearfix">

            <?php get_search_form();
            wp_nav_menu(array('container' => 'nav', 'container_class' => 'l-pull-right m-global__nav', 'items_wrap' => '<ul>%3$s</ul>')); ?>

        </div>
    </header><!-- #masthead -->