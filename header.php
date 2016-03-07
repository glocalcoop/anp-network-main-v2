<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Activist_Network_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'anp-network-main' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

        <?php if ( is_active_sidebar( 'sidebar-header' ) ) : ?>
        <?php $widget_class = anp_network_main_count_widgets( 'sidebar-header' ); ?>
        <div class="header-widget-wrap">
            <div class="header-widgets <?php echo $widget_class; ?>">
                <?php dynamic_sidebar( 'sidebar-header' ); ?>
            </div>
        </div>
        <?php endif; ?>

        <?php get_template_part( 'components/custom-header/custom-header' ); ?>
        
		<?php get_template_part( 'components/top-navigation/top-navigation' ); ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
