<nav id="site-navigation" class="main-navigation global-nav" role="navigation">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false"><?php esc_html_e( 'Top Menu', 'anp-network-main' ); ?></button>
	<?php
        wp_nav_menu( array(
            'theme_location' => 'header-menu',
            'menu_class'     => 'header-menu',
         ) );
    ?>
</nav><!-- #site-navigation -->