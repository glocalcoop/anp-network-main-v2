<?php
/**
 * Sample implementation of the Custom Header feature
 * http://codex.wordpress.org/Custom_Headers
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php if ( get_header_image() ) : ?>
	<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
		<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
	</a>
	<?php endif; // End header image check. ?>
 *
 * @package Activist_Network_Theme
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses anp_header_style()
 */
function anp_network_main_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'anp_network_main_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '444444',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'anp_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'anp_network_main_custom_header_setup' );

if ( ! function_exists( 'anp_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see anp_network_main_custom_header_setup().
 */
function anp_header_style() {
	$header_text_color = get_header_textcolor();

	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value.
	if ( HEADER_TEXTCOLOR == $header_text_color ) {
		return;
	}

	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == $header_text_color ) :
	?>
		#masthead .site-branding .site-title,
		#masthead .site-branding .site-description {
			position: absolute;
			clip: rect(1px, 1px, 1px, 1px);
		}

	<?php endif; ?>


	</style>
	<?php
}
endif; // anp_header_style
