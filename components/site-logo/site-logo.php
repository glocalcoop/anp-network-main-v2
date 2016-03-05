<?php if( function_exists( 'jetpack_has_site_logo' ) ) : ?>

    <?php if( jetpack_has_site_logo() ) : ?>

        <?php anp_network_main_the_site_logo(); ?>

    <?php else : ?>

        <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

    <?php endif; ?>

<?php endif; ?>