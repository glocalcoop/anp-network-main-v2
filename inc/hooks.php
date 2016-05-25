<?php
/**
 * Hooks that can be used in the theme
 *
 * anp_before
 * anp_after
 * anp_header_before
 * anp_header_top
 * anp_header_widgets_top
 * anp_header_widgets_bottom
 * anp_site_title
 * anp_site_description
 * anp_header_bottom
 * anp_header_after
 * anp_home_site_main_top
 * anp_home_site_main_bottom
 * anp_home_widgets_before
 * anp_home_widgets_after
 * anp_site_main_top
 * anp_site_content_top
 * anp_site_content_bottom
 * anp_site_main_bottom
 * anp_page_header_top
 * anp_page_header_bottom
 * anp_footer_before
 * anp_footer_top
 * anp_footer_bottom
 *
 * @package Activist_Network_Theme
 */

add_action( 'anp_site_content_top', 'anp_network_main_hook' );

function anp_network_main_hook() {
  // Add an action here
}