<?php
/**
 * Custom BuddyPress functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Activist_Network_Theme
 */

/**
 * BuddyPress Cover Image Callback
 *
 * @see bp_legacy_theme_cover_image() to discover the one used by BP Legacy
 */
if( ! function_exists( 'anp_cover_image_callback' ) ) {

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

}

/**
 * BuddyPress Cover Image Callback
 *
 * @see bp_legacy_theme_cover_image() to discover the one used by BP Legacy
 */
if( ! function_exists( 'anp_buddypress_cover_image_css' ) ) {

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
}

/**
 * Change Default Group Icon
 * @link https://premium.wpmudev.org/blog/how-to-add-a-custom-default-avatar-for-buddypress-members-and-groups/
 * @link https://codex.buddypress.org/themes/guides/customizing-buddypress-avatars/
 */
if( ! function_exists( 'anp_buddypress_group_icon' ) ) {

  if( function_exists( 'bp_core_avatar_default' ) ) {

    function anp_buddypress_group_icon( $avatar ) {
      global $bp, $groups_template;

      if( strpos( $avatar,'group-avatars' ) ) {
        return $avatar;
      }
      else {
        $custom_avatar = get_template_directory_uri() .'/dist/images/buddypress-group.png';

        if( $bp->current_action == "" ) {
          return '<img class="avatar" alt="' . attribute_escape( $groups_template->group->name ) . '" src="' . $custom_avatar . '" width="'. BP_AVATAR_THUMB_WIDTH .'" height="'.BP_AVATAR_THUMB_HEIGHT .'" />';
        }
        else {
          return '<img class="avatar" alt="' . attribute_escape( $groups_template->group->name ) . '" src="' . $custom_avatar . '" width="'. BP_AVATAR_FULL_WIDTH .'" height="'. BP_AVATAR_FULL_HEIGHT . '" />';
        }
      }
    }
    add_filter( 'bp_get_group_avatar', 'anp_buddypress_group_icon' );

    /**
     * Change the BuddyPress Avatar size to 100 x 100
     *
     * @link https://codex.buddypress.org/themes/guides/customizing-buddypress-avatars/
     */
    define ( 'BP_AVATAR_THUMB_WIDTH', 100 );
    define ( 'BP_AVATAR_THUMB_HEIGHT', 100 );
  }

}


/**
 * Display the event author on single event pages.
 */
if( ! function_exists( 'anp_event_author' ) ) {

  if( function_exists( 'bp_core_get_userlink' ) ) {

    function anp_event_author() {
      $event = get_post( get_the_ID() );
      $author_id = $event->post_author;
      $base = __( '%s', 'anp-network-main' );

      echo sprintf( '<div class="entry-author"><span class="meta-label">Author</span> ' . wp_filter_kses( $base ) . '</div>', bp_core_get_userlink( $author_id ) );
    }

    add_action( 'eventorganiser_additional_event_meta', 'anp_event_author' );

  }

}


/**
 * Display BuddyPress Attribution
 */
if( !function_exists( 'anp_buddypress_attribution' ) ) {

  function anp_buddypress_attribution() {

    echo '<div class="buddypress-attribution"><a href="https://buddypress.org/" target="_blank" rel="author">Powered By BuddyPress</a></div>';

  }

  add_action( 'anp_buddypress_main_bottom', 'anp_buddypress_attribution' );
  
  
}

