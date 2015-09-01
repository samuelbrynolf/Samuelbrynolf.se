<footer id="colophon" class="site-footer" role="contentinfo">
    <nav id="site-navigation" class="main-navigation" role="navigation">
        <ul id="menu-global-nav" class="menu">
            <?php if (current_user_can('delete_users')) {
                echo '<li class="menu-item"><a href="'.get_bloginfo('url').'/wp-admin">Admin</a></li>';
            }

            wp_nav_menu(array('container' => '', 'items_wrap' => '%3$s'));
            if (is_search() && !have_posts()) {

            } else { ?>
                <li class="m-global-search"><?php get_search_form(); ?></li>
            <?php } ?>
        </ul>
    </nav>
</footer><!-- #colophon -->
