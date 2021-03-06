<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Activist_Network_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function anp_network_main_body_classes( $classes ) {

  if ( is_multi_author() ) {
    $classes[] = 'group-blog';
  }

  if( is_page() ) {
    global $post;
    $classes[] = 'page-' . $post->post_name;
  }

  if( is_archive() ) {
      $layout = get_theme_mod( 'archive_layout', 'list' );
      $classes[] = 'layout-' . $layout;
  }

  return $classes;
}
add_filter( 'body_class', 'anp_network_main_body_classes' );


/**
 * Count Widgets in Sidebar
 * Used to add classes to widget areas so widgets can be displayed one, two, three or four per row
 * https://gist.github.com/slobodan/6156076
 */
if( ! function_exists( 'anp_network_main_count_widgets' ) ) {

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

}

/**
 * Custom Event Meta
 */
if( ! function_exists( 'anp_get_event_meta_list' ) ) {

  function anp_get_event_meta_list( $event_id = 0 ) {

    $event_id = (int) ( empty( $event_id ) ? get_the_ID() : $event_id);

    if( empty( $event_id ) ){ 
      return false;
    }

    $html  = '<div class="entry-meta event-meta">';
    $venue = get_taxonomy( 'event-venue' );

    if( get_the_terms( $event_id, 'event-category' ) ) {
      $html .= get_the_term_list( $event_id, 'event-category', '<ul class="category event-category"><li>','</li><li>', '</li></ul>' );
    }

    if( get_the_terms( $event_id, 'event-tag' ) && !is_wp_error( get_the_terms( $event_id, 'event-tag' ) ) ) {
      $html .= get_the_term_list( $event_id, 'event-tag', '<ul class="event-tags tags"><li>','</li><li>', '</li></ul>' );
    }

    $html .='</div>';

    return $html;
  }

}


/**
 * Custom Jetpack Support
 */
remove_theme_support( 'jetpack-testimonial' );


/**
 * Event Organiser Modifications
 */
remove_action( 'eventorganiser_additional_event_meta', 'bpeo_add_ical_link_to_eventmeta', 50 );

remove_action( 'eventorganiser_additional_event_meta', 'bpeo_list_connected_groups' );

remove_action( 'eventorganiser_additional_event_meta', 'bpeo_list_author' );


/**
 * Display a list of connected groups on single event pages.
 */
if( ! function_exists( 'anp_list_event_groups' ) ) {

  if( function_exists( 'bpeo_get_event_groups' ) ) {

    function anp_list_event_groups() {
      $event_group_ids = bpeo_get_event_groups( get_the_ID() );

      if ( empty( $event_group_ids ) ) {
        return;
      }

      $event_groups = groups_get_groups( array(
        'include' => $event_group_ids,
        'show_hidden' => true, // We roll our own.
      ) );

      $markup = array();
      foreach ( $event_groups['groups'] as $eg ) {
        // Remove groups that the current user should not have access to.
        if ( 'public' !== $eg->status && ! current_user_can( 'bp_moderate' ) && ! groups_is_user_member( bp_current_user_id(), $eg->id ) ) {
          continue;
        }

        $markup[] = sprintf(
          '<a href="%s">%s</a>',
          esc_url( bpeo_get_group_permalink( $eg ) ),
          esc_html( stripslashes( $eg->name ) )
        );
      }

      if ( empty( $markup ) ) {
        return;
      }

      $count = count( $markup );
      $base = _n( '<span class="meta-label">Group</span> %s', '<span class="meta-label">Groups</span> %s', $count, 'anp-network-main' );

      echo sprintf( '<li>' . wp_filter_kses( $base ) . '</li>', implode( ', ', $markup ) );
    }

    add_action( 'eventorganiser_additional_event_meta', 'anp_list_event_groups' );
  }

}


/**
 * Load custom BuddyPress functions.
 */
require get_template_directory() . '/inc/class-anp-filter-walker.php';


/**
 * Display Post Filter on Archive Pages
 * Render filter if customizer settings set to show (default: false)
 * 
 * @since 2.0.29
 *
 * @uses get_theme_mod()
 * @link https://codex.wordpress.org/Function_Reference/remove_action
 * Redeclare `anp_archive_post_filter()` {function} in child theme in order to modify
 */
if( !function_exists( 'anp_archive_post_filter' ) ) {

  function anp_archive_post_filter() {

    if(! is_archive() && ! is_home() ) {
      return;
    } 

    if( function_exists( 'anp_taxonomy_filter' ) ) {

      if( is_home() ) {

        anp_taxonomy_filter();

      } elseif( is_post_type_archive( 'event' ) ) {

        anp_taxonomy_filter( 'event-category' );

      } elseif( is_post_type_archive( 'meeting' ) ) {

        anp_taxonomy_filter( 'meeting_type' );

      } elseif( is_post_type_archive( 'network_directory' ) ) {
        
        anp_taxonomy_filter( 'subsite_category' );
        
      } else {

        return;
        
      }

    }

    return;

  }

  $option = get_theme_mod( 'archive_filters', '0' );

  if( $option ) {
    add_action( 'anp_page_header_bottom', 'anp_archive_post_filter' );
  } else {
    return;
  }

}

/**
 * Display Search on Archive Pages
 * Render search if customizer settings set to show (default: false)
 * 
 * @since 2.0.29
 *
 * @uses get_theme_mod()
 * Remove action in order to not display on archive pages
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 * Redeclare `anp_archive_post_filter()` {function} in child theme in order to modify
 */
if( !function_exists( 'anp_archive_post_type_search' ) ) {

  function anp_archive_post_type_search() {

    if(! is_archive() && ! is_home() ) {
      return;
    } 

    get_template_part( 'search-form-custom' );
    
  }

  $option = get_theme_mod( 'archive_search', '0' );

  if( $option ) {
    add_action( 'anp_page_header_bottom', 'anp_archive_post_type_search' );
  } else {
    return;
  }

}

/**
 * Display Hybrid Core Breadcrumbs
 * @link http://themehybrid.com/docs/breadcrumb-trail
 */

if( ! function_exists( 'anp_display_breadcrumbs' ) ) {

  function anp_display_breadcrumbs() {

    if ( current_theme_supports( 'breadcrumb-trail' ) ) :

      if( is_post_type_archive( 'knowledge_base' ) || is_tax( 'knowledge_base_category' ) || 'knowledge_base' == get_post_type() ) :

        breadcrumb_trail();

      endif;

    endif; 

  }

  add_action( 'anp_site_main_top', 'anp_display_breadcrumbs' );

}

/**
 * Numbered Pagination
 * Added numeric pagination function
 *
 * @since 2.0.29
 *
 * @link https://codex.wordpress.org/Function_Reference/paginate_links
 */
function anp_numeric_posts_nav() {

  if( is_singular() )
    return;

  global $wp_query;

  /**
   * Bail if only 1 page
   */
  if( $wp_query->max_num_pages <= 1 ) {
    return;
  }

  $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
  $max   = intval( $wp_query->max_num_pages );

  /**
   * Add current page to the array
   */
  if ( $paged >= 1 ) {
    $links[] = $paged;
  }

  /** 
   * Add the pages around the current page to the array 
   */
  if ( $paged >= 3 ) {
    $links[] = $paged - 1;
    $links[] = $paged - 2;
  }

  if ( ( $paged + 2 ) <= $max ) {
    $links[] = $paged + 2;
    $links[] = $paged + 1;
  }

  echo '<div class="navigation"><ul>' . "\n";

  /**
   * Previous Post Link
   */
  if ( get_previous_posts_link() ) {
    printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
  }

  /**
   * Link to first page, plus ellipses if necessary 
   */
  if ( ! in_array( 1, $links ) ) {
    $class = 1 == $paged ? ' class="active"' : '';

    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

    if ( ! in_array( 2, $links ) )
      echo '<li>…</li>';
  }

  /**
   * Link to current page, plus 2 pages in either direction if necessary
   */
  sort( $links );
  foreach ( (array) $links as $link ) {
    $class = $paged == $link ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
  }

  /** 
   * Link to last page, plus ellipses if necessary 
   */
  if ( ! in_array( $max, $links ) ) {
    if ( ! in_array( $max - 1, $links ) )
      echo '<li>…</li>' . "\n";

    $class = $paged == $max ? ' class="active"' : '';
    printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
  }

  /** 
   * Next Post Link
   */
  if ( get_next_posts_link() )
    printf( '<li>%s</li>' . "\n", get_next_posts_link() );

  echo '</ul></div>' . "\n";


}

/**
 * Is of post type
 * Checks if page is related to specific post type
 *
 * @since 2.0.29
 *
 * @uses get_post_type()
 * @uses is_post_type_archive()
 * @uses is_tax()
 *
 * @param string $post_type
 * @param string/array $taxonomy
 * @return bool true/false
 *
 *
 * @link https://codex.wordpress.org/Conditional_Tags#Conditional_Tags_Index
 */
function anp_is_post_type( $post_type ) {
  return ( $post_type == get_post_type() || is_post_type_archive( $post_type ) || is_page( $post_type ) );
}