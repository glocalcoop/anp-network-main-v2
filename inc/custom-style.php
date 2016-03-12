<?php
/**
 * Customizer skinning features
 * @link https://developer.wordpress.org/themes/advanced-topics/customizer-api/
 *
 * @package Activist_Network_Theme
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses anp_network_main_header_style()
 */
function anp_network_main_custom_setup() {
	
}
add_action( 'after_setup_theme', 'anp_network_main_custom_setup' );

if ( ! function_exists( 'anp_network_main_custom_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see anp_network_main_custom_header_setup().
 */
function anp_network_main_custom_style() {
	
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	
	</style>
	<?php
}
endif; // anp_network_main_custom_style
