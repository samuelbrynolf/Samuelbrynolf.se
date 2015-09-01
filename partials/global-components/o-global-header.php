<body <?php body_class(); ?>>

    <header id="masthead" class="site-header" role="banner">
        <div class="site-branding">
            <?php if(is_front_page()) { echo '<h1>'; } else { echo '<h2>'; } ?>
                <a id="js-sitename" class="a-sitename" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a>
            <?php if(is_front_page()) { echo '</h1>'; } else { echo '</h2>'; } ?>
            <h2 class="site-description"><?php bloginfo('description'); ?></h2>
        </div><!-- .site-branding -->
    </header><!-- #masthead -->

