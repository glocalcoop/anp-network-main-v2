<?php 
/**
 * Custom shortcodes for this theme.
 *
 *
 * @package Activist_Network_Theme
 */

/**
 * Allow Shortcodes in Widgets
 */
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Dynamic Year Shortcode
 * Usage: Use [year] in your posts
 */
function anp_network_main_year_shortcode() {
  $year = date( 'Y' );
  return $year;
}
add_shortcode( 'year', 'anp_network_main_year_shortcode' );

/**
 * Dynamic Site Name Shortcode
 * Usage: Use [site_name] in your posts
 */
function anp_network_main_site_name_shortcode() {
  $name = get_bloginfo( 'name' );
  return $name;
}
add_shortcode( 'site_name', 'anp_network_main_site_name_shortcode' );

/**
 * Dynamic Site Description Shortcode
 * Usage: Use [site_description] in your posts
 */
function anp_network_main_site_description_shortcode() {
  $description = get_bloginfo( 'description' );
  return $description;
}
add_shortcode( 'site_description', 'anp_network_main_site_description_shortcode' );


?>