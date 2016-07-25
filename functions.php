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
 * Recommend the Kirki plugin
 */
require get_template_directory() . '/inc/include-kirki.php';

/**
 * Load the Kirki Fallback class
 */
require get_template_directory() . '/inc/kirki-fallback.php';

/**
 * Customizer additions.
 *
 * Uses Kirki library to implement customizer functions.
 *
 * @since 2.0.29
 *
 * @link https://kirki.org/
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load custom BuddyPress functions.
 */
require get_template_directory() . '/inc/buddypress.php';


