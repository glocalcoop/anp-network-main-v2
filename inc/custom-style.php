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


if ( class_exists( 'ANP_Kirki' ) ) {

	/**
	 * Add Section
	 */
	ANP_Kirki::add_section( 'fonts', array(
		'title'          => esc_attr__( 'Typography', 'activist-network-main' ),
		'priority'       => 40,
		'capability'     => 'edit_theme_options',
	) );


	/**
	 * Add the configuration.
	 * This way all the fields using the 'anp_custom_style' ID
	 * will inherit these options
	 */
	ANP_Kirki::add_config( 'anp_custom_style', array(
		'capability'    => 'edit_theme_options',
		'option_type'   => 'theme_mod',
	) );

	$defaults = array(
		'copyright'			=> date('Y') . ' ' . get_bloginfo( 'name' ),
		'color_primary'		=> '#16506B',
		'color_accent'		=> '#008Eb0',
		'color_background'	=> 'rgba(255,255,255,0)',
		'color_foreground'	=> '#54595C',
		'color_default'		=> '#54595C',
		'color_transparent'	=> 'rgba(255,255,255,0)',
		'screen_md'			=> '768px'
	);
	/**
	 * Palette
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'radio-buttonset',
		'settings'    => 'theme_palette',
		'label'       => __( 'Palette', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => 'light',
		'priority'    => 10,
		'choices'     => array(
			'monochrome'   => esc_attr__( 'Monochrome', 'activist-network-main' ),
			'colored' => esc_attr__( 'Multi-color', 'activist-network-main' ),
		),
	) );

	/**
	 * Background Color
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'custom-background',
		'label'       => esc_attr__( 'Background Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Site background color', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_background'],
		'priority'    => 15,
		'output'      => array(
			array(
				'element'  => 'body,
				#colophon .bottom-navigation',
				'property' => 'background-color',
				'exclude'  => array(
	                $defaults['color_background'],
	            ),
			),
			array(
				'element'  => '#colophon .bottom-navigation',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_foreground'],
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => 'body,
				#colophon .bottom-navigation',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '#colophon .bottom-navigation',
				'function' => 'css',
				'property' => 'color',
			),
		),
	) );

	/**
	 * Text Color
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'color_textcolor',
		'label'       => esc_attr__( 'Text Color', 'activist-network-main' ),
		'description' => esc_attr__( 'Text Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Color of text.', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_foreground'],
		'priority'    => 20,
		'output'      => array(
			array(
				'element'  => 'body, body li,
				#colophon .bottom-navigation',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_foreground'],
	            ),
			),
			array(
				'element'  => '#colophon .copyright',
				'property' => 'background-color',
				'exclude'  => array(
	                $defaults['color_background'],
	                $defaults['color_foreground']
	            ),
			),
			array(
				'element'  => '.home .entry.intro-content,
				#secondary .wrap',
				'property' => 'border-top-color',
				'exclude'  => array(
	                $defaults['color_accent'],
	                $defaults['color_primary'],
	            ),
			),
			array(
				'element'  => '.home .entry.intro-content,
				#secondary .wrap',
				'property' => 'border-bottom-color',
				'exclude'  => array(
	                $defaults['color_accent'],
	                $defaults['color_primary'],
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => 'body, 
				body li,
				#colophon .bottom-navigation',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '#colophon .copyright',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '.home .entry.intro-content,
				#secondary .wrap',
				'function' => 'css',
				'property' => 'border-top-color',
			),
			array(
				'element'  => '.home .entry.intro-content,
				#secondary .wrap',
				'function' => 'css',
				'property' => 'border-bottom-color',
			),
		),
	) );

	/**
	 * Accent
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'color_accent',
		'label'       => esc_attr__( 'Accent Color', 'activist-network-main' ),
		'description' => esc_attr__( 'The accent theme color.', 'activist-network-main' ),
		'help'        => esc_attr__( 'The accent theme color used for links and accent elements', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_accent'],
		'priority'    => 30,
		'output'      => array(
			array(
				'element'  => 'a,
				a:hover,
				a:focus,
				a:visited,
				#masthead .social-links a,
				#masthead .social-links a:before,
				#masthead .site-branding .site-description,
				.widget h3',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_accent'],
	                $defaults['color_primary'],
	            ),
			),
			array(
				'element'	=> '#masthead .social-links a',
				'property' => 'border-color',
				'exclude'  => array(
	                $defaults['color_accent'],
	                $defaults['color_primary'],
	            ),
			),
			array(
				'element'  => '#masthead .menu-toggle,
				#colophon .copyright',
				'property' => 'background-color',
				'exclude'  => array(
	                $defaults['color_accent'],
	                $defaults['color_primary']
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => 'a,
				a:hover,
				a:focus,
				a:visited,
				#masthead .social-links a,
				#masthead .social-links a:before,
				#masthead .site-branding .site-description,
				.widget h3',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '.home .entry.intro-content',
				'function' => 'css',
				'property' => 'border-top-color',
			),
			array(
				'element'  => '.home .entry.intro-content',
				'function' => 'css',
				'property' => 'border-bottom-color',
			),
			array(
				'element'  => '#masthead .menu-toggle,
				#colophon .copyright',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	) );

	/**
	 * Nav Background Color
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color',
		'settings'    => 'color_nav_background',
		'label'       => esc_attr__( 'Navigation Background', 'activist-network-main' ),
		'description' => esc_attr__( 'Navigation Background Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Background color of the main navigation and footer navigation', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_background'],
		'priority'    => 60,
		'required'  =>  array(
            array(
                'setting'   =>  'theme_palette',
                'operator'  =>  '==',
                'value' =>  'colored'
            )
        ),
		'output'      => array(
			array(
				'element'  		=> '#masthead .main-navigation,
				#masthead .main-navigation ul ul,
				#colophon .bottom-navigation',
				'media_query'	=> '@media only screen and (min-width: 768px)',
				'property' 		=> 'background-color',
				'exclude'  => array(
	                $defaults['color_background'],
	            ),
			),
			array(
				'element'  => '#masthead .main-navigation-container',
				'property' => 'background-color',
				'exclude'  => array(
	                $defaults['color_background'],
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#masthead .main-navigation,
				#masthead .main-navigation ul ul,
				#colophon .bottom-navigation',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '#masthead .main-navigation-container',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	) );

	/**
	 * Nav Text Color
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'color_nav_text',
		'label'       => esc_attr__( 'Navigation Text', 'activist-network-main' ),
		'description' => esc_attr__( 'Navigation Text Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Text color of the main navigation and footer navigation', 'activist-network-main', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_foreground'],
		'priority'    => 70,
		'required'  =>  array(
            array(
                'setting'   =>  'theme_palette',
                'operator'  =>  '==',
                'value' =>  'colored'
            )
        ),
		'output'      => array(
			array(
				'element'  => '#masthead .main-navigation ul a,
				#colophon .bottom-navigation a',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_foreground'],
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#masthead .main-navigation ul a,
				#colophon .bottom-navigation a',
				'function' => 'css',
				'property' => 'color',
			),
		),
	) );

	/**
	 * Branding Background Color
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'color_branding_background',
		'label'       => esc_attr__( 'Branding Background', 'activist-network-main' ),
		'description' => esc_attr__( 'Branding Background Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Color of the branding area background', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_background'],
		'priority'    => 75,
		'required'  =>  array(
            array(
                'setting'   =>  'theme_palette',
                'operator'  =>  '==',
                'value' =>  'colored'
            )
        ),
		'output'      => array(
			array(
				'element'  => '#masthead .site-branding,
				#colophon .bottom-navigation',
				'property' => 'background-color',
				'exclude'  => array(
	                $defaults['color_background'],
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#masthead .site-branding,
				#colophon .bottom-navigation',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	) );

	/**
	 * Branding Text Color
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'color_branding_text',
		'label'       => esc_attr__( 'Branding Text Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Color of the branding area text', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_foreground'],
		'priority'    => 80,
		'required'  =>  array(
            array(
                'setting'   =>  'theme_palette',
                'operator'  =>  '==',
                'value' =>  'colored'
            )
        ),
		'output'      => array(
			array(
				'element'  => '#masthead .site-branding .site-title a,
				#colophon .bottom-navigation a',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_primary'],
	                $defaults['color_foreground'],
	            ),
			),
			array(
				'element'  => '#masthead .site-branding .site-description',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_primary'],
	                $defaults['color_foreground'],
	            ),
			),
			array(
				'element'  => '#masthead .social-links ul a',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_primary'],
	                $defaults['color_foreground'],
	            ),
			),
			array(
				'element'  => '#masthead .social-links a',
				'property' => 'border-color',
				'exclude'  => array(
	                $defaults['color_primary'],
	                $defaults['color_foreground'],
	            ),
			),
			array(
				'element'  => '#masthead .social-links ul a:before',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_primary'],
	                $defaults['color_foreground'],
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#masthead .site-branding .site-title a,
				#colophon .bottom-navigation a',
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

	/**
	 * Widget Background Color
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'color_widget_background',
		'label'       => esc_attr__( 'Widget Background', 'activist-network-main' ),
		'description' => esc_attr__( 'Widget Background Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Color of the widget area background', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_background'],
		'priority'    => 90,
		'required'  =>  array(
            array(
                'setting'   =>  'theme_palette',
                'operator'  =>  '==',
                'value' =>  'colored'
            )
        ),
		'output'      => array(
			array(
				'element'  => '#colophon .footer-widgets,
				.content-widgets .wrap,
				.home-widgets .wrap',
				'property' => 'background-color',
				'exclude'  => array(
	                $defaults['color_background'],
	            ),
			),
			array(
				'element'  => '.home .entry.intro-content',
				'property' => 'border-top-color',
				'exclude'  => array(
	                $defaults['color_accent'],
	                $defaults['color_foreground'],
	            ),
			),
			array(
				'element'  => '.home .entry.intro-content',
				'property' => 'border-bottom-color',
				'exclude'  => array(
	                $defaults['color_accent'],
	                $defaults['color_foreground'],
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '#colophon .footer-widgets,
				.content-widgets .wrap,
				.home-widgets .wrap',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '.home .entry.intro-content',
				'function' => 'css',
				'property' => 'border-top-color',
			),
			array(
				'element'  => '.home .entry.intro-content',
				'function' => 'css',
				'property' => 'border-bottom-color',
			),
		),
	) );

	/**
	 * Widget Text Color
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'color_widget_text',
		'label'       => esc_attr__( 'Widget Text Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Color of the widget area text', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_foreground'],
		'priority'    => 100,
		'required'  =>  array(
            array(
                'setting'   =>  'theme_palette',
                'operator'  =>  '==',
                'value' =>  'colored'
            )
        ),
		'output'      => array(
			array(
				'element'  => '.content-widgets .wrap,
				.content-widgets .wrap a,
				.home-widgets .wrap,
				.home-widgets .wrap a,
				.home-widgets .widget h3,
				.home-widgets .widget-title,
				.content-widgets h3,
				.content-widgets .widget-title,
				.footer-widgets .wrap,
				.footer-widgets .wrap a,
				.footer-widgets .widget h3,
				.footer-widgets .widget-title',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_primary'],
	                $defaults['color_foreground']
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.content-widgets .wrap,
				.content-widgets .wrap a,
				.home-widgets .wrap,
				.home-widgets .wrap a,
				.home-widgets .widget h3,
				.home-widgets .widget-title,
				.content-widgets h3,
				.content-widgets .widget-title,
				.footer-widgets .wrap,
				.footer-widgets .wrap a,
				.footer-widgets .widget h3,
				.footer-widgets .widget-title',
				'function' => 'css',
				'property' => 'color',
			),
		),
	) );

	/**
	 * Typography - Branding Fonts
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'typography',
		'settings'    => 'fonts_branding',
		'label'       => esc_attr__( 'Branding Fonts', 'activist-network-main' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => 'Helvetica,Arial,sans-serif',
			'variant'        => '300',
			'subset'		 => 'latin-ext',
		),
		'priority'    => 10,
		'output'      => array(
			array(
				'element'  => '#masthead .site-branding .site-title a,
				#masthead .site-branding .site-description',
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
		),
	) );

	/**
	 * Headings
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'typography',
		'settings'    => 'fonts_headings',
		'label'       => esc_attr__( 'Headings', 'activist-network-main' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => 'Helvetica,Arial,sans-serif',
			'variant'        => '300',
			'subset'		 => 'latin-ext',
		),
		'priority'    => 20,
		'output'      => array(
			array(
				'element' => 'h1, h2, h3, h4, h5',
			),
		),
	) );

	/**
	 * Body Text
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'typography',
		'settings'    => 'fonts_body',
		'label'       => esc_attr__( 'Body Text', 'activist-network-main' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => 'Helvetica,Arial,sans-serif',
			'variant'        => '400',
		),
		'priority'    => 30,
		'output'      => array(
			array(
				'element' => 'body, p, li',
			),
		),
	) );

	/**
	 * Footer - Copyright Text
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'textarea',
		'settings'    => 'textarea_footer_copyright',
		'label'       => esc_attr__( 'Copyright', 'activist-network-main' ),
		'help'        => esc_attr__( 'Enter content for the copyright area that appears in the footer', 'activist-network-main' ),
		'default'     => esc_attr__( $defaults['copyright'], 'activist-network-main' ),
		'section'     => 'title_tagline',
		'priority'    => 500,
	) );

}