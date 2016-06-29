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
		'default'     => 'monochrome',
		'priority'    => 10,
		'choices'     => array(
			'monochrome'   => esc_attr__( 'Monochrome', 'activist-network-main' ),
			'colored' => esc_attr__( 'Multi-color', 'activist-network-main' ),
		),
	) );

	/**
	 * Monochrome Color Scheme
	 */

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
				'element'  => 'body',
				'property' => 'background-color',
				'exclude'  => array(
	                $defaults['color_background'],
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => 'body',
				'function' => 'css',
				'property' => 'background-color',
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
				'element'  => 'body, p, li',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_foreground'],
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => 'body, p, li,
				.bottom-navigation',
				'function' => 'css',
				'property' => 'color',
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
				'element'  => 'a',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_accent'],
	                $defaults['color_primary'],
	            ),
			),
			array(
				'element'	=> '.social-links a',
				'property' => 'border-color',
				'exclude'  => array(
	                $defaults['color_accent'],
	                $defaults['color_primary'],
	            ),
			),
			array(
				'element'	=> '.social-links a:before',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_accent'],
	                $defaults['color_primary'],
	            ),
			),
			array(
				'element'	=> '.menu-toggle',
				'property' => 'background-color',
				'exclude'  => array(
	                $defaults['color_accent'],
	                $defaults['color_primary'],
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => 'a',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '.social-links a',
				'function' => 'css',
				'property' => 'border-color',
			),
			array(
				'element'  => '.social-links a:before',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '.menu-toggle,
				.copyright',
				'function' => 'css',
				'property' => 'background-color',
			),
		),
	) );

	/**
	 * Multi-color Color Scheme
	 */

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
				'element'  		=> '.main-navigation,
				.main-navigation ul ul',
				'media_query'	=> '@media only screen and (min-width: 768px)',
				'property' 		=> 'background-color',
				'exclude'  => array(
	                $defaults['color_background'],
	            ),
			),
			array(
				'element'  => '.main-navigation-container',
				'property' => 'background-color',
				'exclude'  => array(
	                $defaults['color_background'],
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.main-navigation,
				.main-navigation ul ul',
				'function' => 'css',
				'property' => 'background-color',
			),
			array(
				'element'  => '.main-navigation-container',
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
				'element'  => '.main-navigation ul a',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_foreground'],
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.main-navigation ul a',
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
				'element'  => '.site-branding',
				'property' => 'background-color',
				'exclude'  => array(
	                $defaults['color_background'],
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.site-branding',
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
				'element'  => '.site-branding .site-title a',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_primary'],
	                $defaults['color_foreground'],
	            ),
			),
			array(
				'element'  => '.site-branding .site-description',
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
				'element'  => '.site-branding .site-title a',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '.site-branding .site-description',
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
		'label'       => esc_attr__( 'Widget Background Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Color of widget area background.', 'activist-network-main' ),
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
				'element'  => '.footer-widgets,
				.content-widgets .wrap,
				.home-widgets .wrap',
				'property' => 'background-color',
				'exclude'  => array(
	                $defaults['color_background'],
	            ),
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.footer-widgets,
								.content-widgets .wrap,
								.home-widgets .wrap',
				'function' => 'css',
				'property' => 'background-color',
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
				'element'  => '.footer-widgets,
				.footer-widgets a,
				.footer-widgets a,
				.content-widgets,
				.content-widgets a,
				.home-widgets,
				.home-widgets a',
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
				'element'  => '.footer-widgets,
				.footer-widgets a,
				.content-widgets,
				.content-widgets a,
				.home-widgets,
				.home-widgets a',
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
			'font-family'    => 'Helvetica, Arial, sans-serif',
			'variant'        => '300',
			'subset'		 => 'latin-ext',
		),
		'priority'    => 10,
		'output'      => array(
			array(
				'element'  => '.site-branding .site-title a,
				.site-branding .site-description',
			),
		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => '.site-branding .site-title a',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '.site-branding .site-description',
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
			'font-family'    => 'Helvetica, Arial, sans-serif',
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
	 * Link Color
	 */
	ANP_Kirki::add_field( 'anp_custom_style', array(
		'type'        => 'color-alpha',
		'settings'    => 'color_link_text',
		'label'       => esc_attr__( 'Link Color', 'activist-network-main' ),
		'help'        => esc_attr__( 'Color of the branding area text', 'activist-network-main' ),
		'section'     => 'colors',
		'default'     => $defaults['color_accent'],
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
				'element'  => 'a, a:visited',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_accent'],
	            ),
			),
			array(
				'element'	=> '.social-links a',
				'property' => 'border-color',
				'exclude'  => array(
	                $defaults['color_accent'],
	            ),
			),
			array(
				'element'	=> '.social-links a:before',
				'property' => 'color',
				'exclude'  => array(
	                $defaults['color_accent'],
	            ),
			),
			array(
				'element'	=> '.menu-toggle',
				'property' => 'background-color',
				'exclude'  => array(
	                $defaults['color_accent'],
	            ),
			),		),
		'transport'   => 'postMessage',
		'js_vars'     => array(
			array(
				'element'  => 'a, a:visited',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '.social-links a',
				'function' => 'css',
				'property' => 'border-color',
			),
			array(
				'element'  => '.social-links a:before',
				'function' => 'css',
				'property' => 'color',
			),
			array(
				'element'  => '.menu-toggle',
				'function' => 'css',
				'property' => 'background-color',
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

	/**
     * Add BuddyPress options
     *
     * @link https://kirki.org/docs/controls/image.html
     */
	if( class_exists( 'Buddypress' ) ) :

	    ANP_Kirki::add_section( 'buddypress', array(
	        'title'          => esc_attr__( 'BuddyPress', 'activist-network-main' ),
	        'description'    => __( 'Settings for BuddyPress, if it is active', 'activist-network-main' ),
	        'priority'       => 150,
	        'capability'     => 'edit_theme_options',
	    ) );

	    ANP_Kirki::add_field( 'anp_custom_style', array(
	        'type'        => 'image',
	        'settings'    => 'buddypress_default_cover',
	        'label'       => __( 'Default BuddyPress Cover Image', 'activist-network-main' ),
	        'section'     => 'buddypress',
	        'default'     => '',
	        'output'      => array(
			    array(
			        'element'   => '#cover-image-container #header-cover-image',
			        'property'  => 'background-image',
			   ),
			),
			'transport' 	=> 'postMessage',
			'js_vars'     	=> array(
				array(
					'element'  		=> '#header-cover-image',
					'function' 		=> 'style',
					'property' 		=> 'background-image',
				),
			),
	    ) );
    endif;

    $accent_color = get_theme_mod( 'my_setting', '#000000' );


}