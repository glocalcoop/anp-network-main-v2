<?php

/**
 * Initialize Hybrid
 *
 */

require_once( trailingslashit( get_template_directory() ) . '/lib/hybrid-core/hybrid.php' );

define( 'HYBRID_DIR', trailingslashit( get_template_directory() ) . 'lib/hybrid-core/' );

new Hybrid();



# Theme setup
add_action( 'after_setup_theme', 'anp_network_main_hybrid_setup', 5 );

/**
 * Sets up the ANP Network Main theme for Hybrid.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */

function anp_network_main_hybrid_setup() {

    // http://themehybrid.com/docs/hybrid-media-grabber
    add_theme_support( 'hybrid-core-media-grabber' );

    //http://themehybrid.com/docs/post-templates
    add_theme_support( 'hybrid-core-template-hierarchy' );

    //http://themehybrid.com/docs/theme-layouts
    add_theme_support( 'theme-layouts', array( 
      'full'          => '1c',
      'left-sidebar'  => '2c-l',
      'right-sidebar' => '2c-r',
      'grid'          => 'grid'
    ) );

}
