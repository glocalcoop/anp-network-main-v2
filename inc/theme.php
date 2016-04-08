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

if( function_exists( 'bpeo_get_the_ical_link' ) ) {

  function anp_add_ical_link_to_eventmeta() {
    // do not show for drafts
    if ( 'draft' === get_post( get_the_ID() )->post_status ) {
      return;
    }
  ?>
    <li><?php
      printf(
      __( "%sSave to Calendar%s", 'bp-event-organiser' ),
      '<a class="add-to-calendar button" href="' . bpeo_get_the_ical_link( get_the_ID() ) . '">',
      '</a>'
    ); ?></li>

  <?php
  }
  //add_action( 'eventorganiser_additional_event_meta', 'anp_add_ical_link_to_eventmeta', 50 );


/**
 * Display a list of connected groups on single event pages.
 */
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
 * Remove action in order to not display on archive pages
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

  add_action( 'anp_network_main_page_header_bottom', 'anp_archive_post_filter' );

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

  add_action( 'anp_network_main_site_main_top', 'anp_display_breadcrumbs' );

}


/**
 * Display Search on Archive Pages
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

  add_action( 'anp_network_main_page_header_bottom', 'anp_archive_post_type_search' );

}

/**
 * Numbered Pagination
 * Adds numbered pagination to archive pages
 * @link https://codex.wordpress.org/Function_Reference/paginate_links
 */

if( ! function_exists( 'anp_numeric_posts_nav' ) ) {

  function anp_numeric_posts_nav() {

    if( is_singular() )
      return;

    global $wp_query;

    $big = 12345678;
    $page_format = paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'current' => max( 1, get_query_var( 'paged' ) ),
      'total' => $wp_query->max_num_pages,
      'type'  => 'array',
      'prev_text'          => __( '<span aria-hidden="true">&laquo;</span> <span class="screen-reader-text previous">Previous</span>', 'anp-network-main' ),
      'next_text'          => __( '<span aria-hidden="true">&raquo;</span> <span class="screen-reader-text next">Next</span>', 'anp-network-main' ),
    ) );
    if( is_array( $page_format ) ) {
      $paged = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var('paged');
      echo '<nav class="navigation posts-navigation" role="navigation">';
      echo '<h2 class="screen-reader-text">Posts navigation</h2>';
      echo '<ul class="pagination">';
      echo '<li><span>'. $paged . ' of ' . $wp_query->max_num_pages .'</span></li>';
      foreach ( $page_format as $page ) {
        echo "<li>$page</li>";
      }
     echo '</ul></nav>';
    }

  }

}
