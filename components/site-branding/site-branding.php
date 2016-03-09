<div class="site-branding">
    <?php get_template_part( 'components/site-logo/site-logo' ); ?>

    <?php do_action ( 'anp_network_main_site_description' );?>

    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
    
    <?php get_template_part( 'components/social-menu/social-menu' ); ?>
</div><!-- .site-branding -->
