<?php
/**
 * Activist Network Theme Customizer
 *
 * @package Activist_Network_Theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function anp_network_main_customize_register( $wp_customize ) {

    $default_color_settings = array(
        'type'              => 'theme_mod',
        'capabilities'      => 'edit_theme_options',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color'
    );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	// $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    /**
     * Add Settings
     */
    $wp_customize->add_setting( 'primary_color', $default_color_settings );
    $wp_customize->add_setting( 'accent_color', $default_color_settings );
    $wp_customize->add_setting( 'site_branding_backgroundcolor', $default_color_settings );
    $wp_customize->add_setting( 'main_navigation_backgroundcolor', $default_color_settings );
    $wp_customize->add_setting( 'main_navigation_textcolor', $default_color_settings );
    $wp_customize->add_setting( 'content_area_backgroundcolor', $default_color_settings );
    $wp_customize->add_setting( 'content_area_textcolor', $default_color_settings );

    /**
     * Add Controls
     */
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'primary_color', array(
          'label'   => __( 'Primary Color', 'activist-network-main' ),
          'section' => 'colors',
        ))
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'accent_color', array(
          'label'   => __( 'Accent Color', 'activist-network-main' ),
          'section' => 'colors',
        ))
    );
     $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_area_backgroundcolor', array(
          'label'   => __( 'Content Area Background Color', 'activist-network-main' ),
          'section' => 'colors',
        ))
    );
     $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'content_area_textcolor', array(
          'label'   => __( 'Content Area Text Color', 'activist-network-main' ),
          'section' => 'colors',
        ))
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'site_branding_backgroundcolor', array(
          'label'   => __( 'Branding Background Color', 'activist-network-main' ),
          'section' => 'colors',
        ))
    );
    // Uses built-in header_textcolor
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor', array(
          'label'   => __( 'Branding Text Color', 'activist-network-main' ),
          'section' => 'colors',
        ))
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_navigation_backgroundcolor', array(
          'label'   => __( 'Main Navigation Background Color', 'activist-network-main' ),
          'section' => 'colors',
        ))
    );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_navigation_textcolor', array(
          'label'   => __( 'Main Navigation Text Color', 'activist-network-main' ),
          'section' => 'colors',
        ))
    );

}
add_action( 'customize_register', 'anp_network_main_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function anp_network_main_customize_preview_js() {
	wp_enqueue_script( 'anp_network_main_customizer', get_template_directory_uri() . '/dist/scripts/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'anp_network_main_customize_preview_js' );
