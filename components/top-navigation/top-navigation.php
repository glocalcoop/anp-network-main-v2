<nav id="site-navigation" class="main-navigation global-nav" role="navigation">
    <div class="menu-toggle-button-container">
        <button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'anp-network-main' ); ?></button>
    </div>
	<?php
        wp_nav_menu( array(
            'theme_location'    => 'header-menu',
            'menu_class'        => 'header-menu',
            'container_class'   => 'main-navigation-container',
         ) );
    ?>
</nav><!-- #site-navigation -->