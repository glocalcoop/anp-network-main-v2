<?php
/**
 * Theme functions and definitions
 *
 * @package Activist_Network_Theme
 */

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/setup.php';

/**
 * Include Hybrid Core framework
 */
include_once( get_template_directory() . '/inc/hybrid.php' );

/**
 * Include Kirki Customizer framework
 */
include_once( dirname( __FILE__ ) . '/inc/kirki/kirki.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Implement the Custom Colors.
 */
require get_template_directory() . '/inc/custom-style.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom shortcodes.
 */
require get_template_directory() . '/inc/shortcodes.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
//require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load hooked functions.
 */
require get_template_directory() . '/inc/hooks.php';

/**
 * Load custom theme functions.
 */
require get_template_directory() . '/inc/theme.php';


