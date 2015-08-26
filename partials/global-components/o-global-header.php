<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package _s
 */
?>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', '_s' ); ?></a>
	
        <header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php if(is_front_page()) { echo '<h1>'; } else { echo '<h2>'; } ?>
					<a id="js-sitename" class="a-sitename" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
				<?php if(is_front_page()) { echo '</h1>'; } else { echo '</h2>'; } ?>	
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div><!-- .site-branding -->
	
            <nav id="site-navigation" class="main-navigation" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
		</header><!-- #masthead -->
	
		<div id="content" class="site-content">