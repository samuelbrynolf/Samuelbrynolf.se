<header id="js-masthead" class="l-gutter l-clearfix o-global__header">

    <?php echo (is_front_page() ? '<h1 class="a-sitename a-icon">' : '<h2 class="a-sitename a-icon">');
        echo bloginfo('name');
    echo (is_front_page() ? '</h1>' : '</h2>');

    get_search_form();
    wp_nav_menu(array('container' => 'nav', 'container_class' => 'l-pull-right m-global__nav', 'items_wrap' => '<ul>%3$s</ul>')); ?>

</header><!-- #masthead -->

