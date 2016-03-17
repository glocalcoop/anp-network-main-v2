<?php
/**
 * Custom Colors feature
 * http://codex.wordpress.org/Custom_Headers
 *
 *
 * @package Activist_Network_Theme
 */

/**
 * Add the theme's styles.css
 */
function anp_custom_style_scripts() {
	wp_enqueue_style( 'anp-custom-style', get_stylesheet_uri(), array(), time() );
}
add_action( 'wp_enqueue_scripts', 'anp_custom_style_scripts' );


if ( class_exists( 'Kirki' ) ) {

	Kirki::add_section( 'fonts', array(
		'title'          => esc_attr__( 'Text', 'kirki-demo' ),
		'priority'       => 50,
		'capability'     => 'edit_theme_options',
	) );


	/**
	 * Add the configuration.
	 * This way all the fields using the 'anp_custom_style' ID
	 * will inherit these options
	 */
	Kirki::add_config( 'anp_custom_style', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );

	$defaults = array(
		'copyright'			=> date('Y') . ' ' . get_bloginfo( 'name' ),
		'color_primary'		=> '#2C3E50',
		'color_accent'		=> '#008Eb0',
		'color_default'		=> '#54595C',
		'screen_md'			=> '768px'
	);

	Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'textarea',
		'settings'    => 'textarea_footer_copyright',
		'label'       => esc_attr__( 'Copyright', 'activist-network-main' ),
		'help'        => esc_attr__( 'Enter content for the copyright area that appears in the footer', 'activist-network-main' ),
		'default'     => esc_attr__( $defaults['copyright'], 'activist-network-main' ),
		'section'     => 'title_tagline',
		'priority'    => 500,
	) );

	Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'color_body_textcolor',
		'label'       => esc_attr__( 'Body Text Color', 'activist-network-main' ),
		'description' => esc_attr__( 'Body Text Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Color of the main text', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_default'],
		'priority'    => 10,
		'output'      => array(
			array(
				'element'  => 'body, p, li, 
					.header-widgets li a, 
					.header-widgets li a:hover,
					.header-widgets li a:focus',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => 'body, p, li',
				'function' => 'css',
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color',
		'settings'    => 'color_primary',
		'label'       => esc_attr__( 'Primary Color', 'activist-network-main' ),
		'description' => esc_attr__( 'The primary theme color.', 'activist-network-main' ),
		'help'        => esc_attr__( 'The primary theme color used for footer and main sidebar background, and link and header text', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_primary'],
		'priority'    => 40,
		'output'      => array(
			array(
				'element'  => '#secondary .wrap',
				'property' => 'background-color',
			),
			array(
				'element'  => '#colophon .copyright',
				'property' => 'background-color',
			),
			array(
				'element'  => '#buddypress .item-list-tabs ul li.active, 
					#buddypress .item-list-tabs ul li.selected, 
					#buddypress .item-list-tabs ul li:hover, 
					#buddypress .item-list-tabs ul li:focus, 
					#bbpress-forums .item-list-tabs ul li.active, 
					#bbpress-forums .item-list-tabs ul li.selected, 
					#bbpress-forums .item-list-tabs ul li:hover, 
					#bbpress-forums .item-list-tabs ul li:focus',
				'property' => 'background-color',
			),
			array(
				'element'  => '.content-area a,
					.content-area a:hover,
					.content-area a:focus',
				'property' => 'color',
			),
			array(
				'element'	=> '.home-widgets .widget h3.widget-title,
					.home-widgets .widget a,
					.home-widgets .widget a:hover,
					.home-widgets .widget a:focus,
					.home-widgets .widget a:visited',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#secondary .wrap',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '#colophon .copyright',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '#buddypress .item-list-tabs ul li.active, 
					#buddypress .item-list-tabs ul li.selected, 
					#buddypress .item-list-tabs ul li:hover, 
					#buddypress .item-list-tabs ul li:focus, 
					#bbpress-forums .item-list-tabs ul li.active, 
					#bbpress-forums .item-list-tabs ul li.selected, 
					#bbpress-forums .item-list-tabs ul li:hover, 
					#bbpress-forums .item-list-tabs ul li:focus',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '.content-area a,
					.content-area a:hover,
					.content-area a:focus',
				'function' => 'css',
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color',
		'settings'    => 'color_accent',
		'label'       => esc_attr__( 'Accent Color', 'activist-network-main' ),
		'description' => esc_attr__( 'The accent theme color.', 'activist-network-main' ),
		'help'        => esc_attr__( 'The accent theme color used for secondary footer', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_accent'],
		'priority'    => 40,
		'output'      => array(
			array(
				'element'  => '#colophon .bottom-navigation',
				'property' => 'background-color',
			),
			array(
				'element'  => '#buddypress .item-list-tabs ul li',
				'property' => 'background-color',
			),
			array(
				'element'  => '#masthead .menu-toggle',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#colophon .bottom-navigation',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '#buddypress .item-list-tabs ul li',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '#buddypress .item-list-tabs ul li:selected',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '#buddypress .item-list-tabs ul li:current',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '#masthead .menu-toggle',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	) );

	Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'color_content_background',
		'label'       => esc_attr__( 'Content Background', 'activist-network-main' ),
		'description' => esc_attr__( 'Content Area Background Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Color of the main content area, which is useful when there is a dark page background', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => '#ffffff',
		'priority'    => 50,
		'output'      => array(
			array(
				'element'  => '#content .content-area',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#content .content-area',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	) );

	Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'color_content_textcolor',
		'label'       => esc_attr__( 'Content Color', 'activist-network-main' ),
		'description' => esc_attr__( 'Content Text Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Color of text in main content area.', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_default'],
		'priority'    => 55,
		'output'      => array(
			array(
				'element'  => '.content-area, 
					.content-area p, 
					.content-area li',
				'property' => 'color',
			),
			array(
				'element'  => '.content-area h1,
					.content-area h2, 
					.content-area h3, 
					.content-area h4,
					.content-area h5',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.content-area, .content-area p, .content-area li',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '.content-area h1,
					.content-area h2, 
					.content-area h3, 
					.content-area h4,
					.content-area h5',
				'function' => 'css',
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color',
		'settings'    => 'color_nav_background',
		'label'       => esc_attr__( 'Navigation Background', 'activist-network-main' ),
		'description' => esc_attr__( 'Navigation Background Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Background color of the main navigation', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => '#ffffff',
		'priority'    => 60,
		'output'      => array(
			array(
				'element'  		=> '#masthead .main-navigation',
				'media_query'	=> '@media only screen and (min-width: 768px)',
				'property' 		=> 'background-color',
			),
			array(
				'element'  => '#masthead .main-navigation-container',
				'property' => 'background-color',
			),
			array(
				'element'  => '#masthead .main-navigation ul ul',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#masthead .main-navigation',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '#masthead .main-navigation-container',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '#masthead .main-navigation ul ul',
				'property' => 'background-color',
			),
		),
	) );

	Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'color_nav_text',
		'label'       => esc_attr__( 'Navigation Text', 'activist-network-main' ),
		'description' => esc_attr__( 'Navigation Text Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Text color of the main navigation', 'activist-network-main', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_default'],
		'priority'    => 70,
		'output'      => array(
			array(
				'element'  => '#masthead .main-navigation ul a',
				'property' => 'color',
			),
			array(
				'element'  => '#masthead .main-navigation ul .current-menu-item > a',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#masthead .main-navigation ul a',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '#masthead .main-navigation ul .current-menu-item > a',
				'function' => 'css',
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'color_branding_background',
		'label'       => esc_attr__( 'Branding Background', 'activist-network-main' ),
		'description' => esc_attr__( 'Branding Background Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Color of the branding area background', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => '#ffffff',
		'priority'    => 80,
		'output'      => array(
			array(
				'element'  => '#masthead .site-branding',
				'property' => 'background-color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#masthead .site-branding',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	) );

	Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'color_branding_textcolor',
		'label'       => esc_attr__( 'Branding Text Color', 'activist-network-main' ),
		'description' => esc_attr__( 'Branding Text Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Color of the branding area text', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_primary'],
		'priority'    => 90,
		'output'      => array(
			array(
				'element'  => '#masthead .site-branding .site-title a',
				'property' => 'color',
			),
			array(
				'element'  => '#masthead .site-branding .site-description',
				'property' => 'color',
			),
			array(
				'element'  => '#masthead .social-links ul a',
				'property' => 'color',
			),
			array(
				'element'  => '#masthead .social-links a',
				'property' => 'border-color',
			),
			array(
				'element'  => '#masthead .social-links ul a:before',
				'property' => 'color',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#masthead .site-branding .site-title a',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '#masthead .site-branding .site-description',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '#masthead .social-links ul a',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '#masthead .social-links a',
				'function' => 'css',
				'property' => 'border-color',
			),
			array(
				'element'  => '#masthead .social-links ul a:before',
				'function' => 'css',
				'property' => 'color',
			),
		),
	) );

	Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'typography',
		'settings'    => 'fonts_headings',
		'label'       => esc_attr__( 'Headings', 'activist-network-main' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => 'Helvetica,Arial,sans-serif',
			'variant'        => '300',
			'subset'		 => 'latin-ext'
		),
		'priority'    => 10,
		'output'      => array(
			array(
				'element' => 'h1, h2, h3, h4, h5',
			),
		),
	) );

	Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'typography',
		'settings'    => 'fonts_body',
		'label'       => esc_attr__( 'Body Text', 'activist-network-main' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => 'Helvetica,Arial,sans-serif',
			'variant'        => '400',
		),
		'priority'    => 20,
		'output'      => array(
			array(
				'element' => 'body, p, li',
			),
		),
	) );

}