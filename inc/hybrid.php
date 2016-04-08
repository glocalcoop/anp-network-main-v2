<?php

/**
 * Initialize Hybrid
 *
 */
define( 'HYBRID_DIR', trailingslashit( get_template_directory() ) . 'inc/hybrid-core/' );

define( 'HYBRID_URI', trailingslashit( get_template_directory_uri() ) . 'inc/hybrid-core/' );

require_once( HYBRID_DIR . 'hybrid.php' );

new Hybrid();

/**
 * Sets up the ANP Network Main theme for Hybrid.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
add_action( 'after_setup_theme', 'anp_network_main_hybrid_setup', 5 );

function anp_network_main_hybrid_setup() {

  // http://themehybrid.com/docs/hybrid-media-grabber
  add_theme_support( 'hybrid-core-media-grabber' );

  //http://themehybrid.com/docs/post-templates
  add_theme_support( 'hybrid-core-template-hierarchy' );

  //http://themehybrid.com/docs/theme-layouts
  add_theme_support( 'theme-layouts', array( 
    'default'       => '2c-r',
    'left-sidebar'  => '2c-l',
    'full'          => '1c',
    'grid'          => 'grid'
  ) );

  /**
   * Hybrid Breadcrumb
   * @link http://themehybrid.com/docs/breadcrumb-trail
   */
  add_theme_support( 'breadcrumb-trail' );

  add_filter( 'breadcrumb_trail_args', 'anp_breadcrumb_trail_args' );

  function anp_breadcrumb_trail_args( $args ) {

    $args['before'] = '';

    return $args;
  }

}

/**
 * Register Hybrid theme layouts
 *
 * @link http://themehybrid.com/docs/theme-layouts
 */
add_action( 'hybrid_register_layouts', 'anp_network_main_register_layouts' );

function anp_network_main_register_layouts() {

    hybrid_register_layout( '2c-r', array( 
      'label' => esc_html__( 'Content / Sidebar', 'anp-network-main' ), 
      'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/layouts/2c-r.png' )
    );

    hybrid_register_layout( '2c-l', array( 
      'label' => esc_html__( 'Sidebar / Content', 'anp-network-main' ), 
      'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/layouts/2c-l.png' )
    );

    hybrid_register_layout( 'full', array( 
      'label' => esc_html__( 'Full Width', 'anp-network-main' ), 
      'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/layouts/1c.png' )
    );

    hybrid_register_layout( 'grid', array( 
      'label' => esc_html__( 'Grid', 'anp-network-main' ), 
      'image' => trailingslashit( get_template_directory_uri() ) . 'assets/images/layouts/grid.png' )
    );


}
