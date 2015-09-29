<header id="js-masthead" class="l-gutter l-clearfix o-global__header" role="banner">
<!--    <div class="site-branding">-->
<!--        --><?php //if(is_front_page()) { echo '<h1>'; } else { echo '<h2>'; } ?>
<!--            <a id="js-sitename" class="a-sitename" href="--><?php //echo esc_url( home_url( '/' ) ); ?><!--" rel="home">--><?php //bloginfo('name'); ?><!--</a>-->
<!--        --><?php //if(is_front_page()) { echo '</h1>'; } else { echo '</h2>'; } ?>
<!--    </div>-->

    <?php get_search_form();
    wp_nav_menu(array('container' => 'nav', 'container_class' => 'l-pull-right m-global__nav', 'items_wrap' => '<ul>%3$s</ul>'));?>


</header><!-- #masthead -->

