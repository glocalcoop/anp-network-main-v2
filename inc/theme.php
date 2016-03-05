<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Activist_Network_Theme
 */

/**
 * Count Widgets in Sidebar
 * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
 * https://gist.github.com/slobodan/6156076
 */
function anp_network_main_count_widgets( $sidebar_id ) {
  // If loading from front page, consult $_wp_sidebars_widgets rather than options to see if wp_convert_widget_settings() has made manipulations in memory.
  global $_wp_sidebars_widgets;

  if ( empty( $_wp_sidebars_widgets ) ) :
    $_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
  endif;
  
  $sidebars_widgets_count = $_wp_sidebars_widgets;
  
  if ( isset( $sidebars_widgets_count[ $sidebar_id ] ) ) :

    $widget_count = count( $sidebars_widgets_count[ $sidebar_id ] );
    $widget_classes = 'widget-count-' . count( $sidebars_widgets_count[ $sidebar_id ] );
    if ( $widget_count % 4 == 0 || $widget_count > 6 ) :
      // Four widgets er row if there are exactly four or more than six
      $widget_classes .= ' per-row-4';
    elseif ( $widget_count >= 3 ) :
      // Three widgets per row if there's three or more widgets 
      $widget_classes .= ' per-row-3';
    elseif ( 2 == $widget_count ) :
      // Otherwise show two widgets per row
      $widget_classes .= ' per-row-2';
    endif;

    return $widget_classes;

  endif;

}

/**
 * Custom Event Meta
 */
if( !function_exists( 'anp_get_event_meta_list' ) ) {

  function anp_get_event_meta_list( $event_id = 0 ) {

    $event_id = (int) ( empty( $event_id ) ? get_the_ID() : $event_id);

    if( empty( $event_id ) ){ 
      return false;
    }

    $html  = '<div class="entry-meta event-meta">';
    $venue = get_taxonomy( 'event-venue' );

    if( get_the_terms( $event_id, 'event-category' ) ) {
      $html .= get_the_term_list( $event_id, 'event-category', '<ul class="meta event-categories categories"><li>','</li><li>', '</li></ul>' );
    }

    if( get_the_terms( $event_id, 'event-tag' ) && !is_wp_error( get_the_terms( $event_id, 'event-tag' ) ) ) {
      $html .= get_the_term_list( $event_id, 'event-tag', '<ul class="meta event-tags tags"><li>','</li><li>', '</li></ul>' );
    }

    $html .='</div>';

    return $html;
  }

}

/**
 * BuddyPress Cover Image Callback
 *
 * @see bp_legacy_theme_cover_image() to discover the one used by BP Legacy
 */
function anp_cover_image_callback( $params = array() ) {
    if ( empty( $params ) ) {
        return;
    }
 
    return '
        /* Cover image - Do not forget this part */
        #buddypress #header-cover-image {
            height: ' . $params["height"] . 'px;
            background-image: url(' . $params['cover_image'] . ');
        }
    ';
}

/**
 * BuddyPress Cover Image Callback
 *
 * @see bp_legacy_theme_cover_image() to discover the one used by BP Legacy
 */
function anp_buddypress_cover_image_css( $settings = array() ) {
    /**
     * If you are using a child theme, use bp-child-css
     * as the theme handle
     */
    $theme_handle = 'bp-parent-css';
 
    $settings['theme_handle'] = $theme_handle;
 
    $settings['callback'] = 'anp_cover_image_callback';
     
    return $settings;
}
add_filter( 'bp_before_xprofile_cover_image_settings_parse_args', 'anp_buddypress_cover_image_css', 10, 1 );
add_filter( 'bp_before_groups_cover_image_settings_parse_args', 'anp_buddypress_cover_image_css', 10, 1 );
 

/**
 * Custom Jetpack Support
 */
remove_theme_support( 'jetpack-testimonial' );


