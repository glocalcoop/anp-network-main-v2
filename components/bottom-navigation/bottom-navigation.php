<nav class="bottom-navigation" role="navigation">
    <?php
        wp_nav_menu( array(
            'theme_location'    => 'footer-menu',
            'menu_class'        => 'footer-menu',
            'depth'             => 1,
            'container_class'   => 'footer-menu-container'
         ) );
    ?>
</nav><!-- .bottom-navigation -->