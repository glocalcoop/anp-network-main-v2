<?php do_action ( 'anp_network_main_site_title' );?>

<?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>

    <?php the_custom_logo(); ?>

<?php elseif ( function_exists( 'jetpack_has_site_logo' ) &&jetpack_has_site_logo() ) : ?>

    <?php anp_network_main_the_site_logo(); ?>

<?php else : ?>

    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

<?php endif; ?>