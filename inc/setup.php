<?php

if ( ! function_exists( 'anp_network_main_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function anp_network_main_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on Activist NetworkTheme v2, use a find and replace
   * to change 'anp-network-main' to the name of your theme in all the template files
   */
  load_theme_textdomain( 'anp-network-main', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails' );

  add_image_size( 'anp-network-main-hero', 1280, 1000, true );
  add_image_size( 'anp-network-main-thumbnail-avatar', 100, 100, true );


  // This theme uses wp_nav_menu() in three locations.
  register_nav_menus( array(
    'header-menu' => esc_html__( 'Header Menu', 'anp-network-main' ),
    'footer-menu' => esc_html__( 'Footer Menu', 'anp-network-main' ),
    'social'  => __( 'Social Links Menu', 'anp-network-main' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

  /*
   * Enable support for Post Formats.
   * See http://codex.wordpress.org/Post_Formats
   */
  add_theme_support( 'post-formats', array(
    'aside',
    'image',
    'video',
    'quote',
    'link',
  ) );

  /*
   * Enable support for site logo
   *
   * @link https://make.wordpress.org/core/2016/02/24/theme-logo-support/
   */
  add_image_size( 'site-logo', 0, 100 );
  add_theme_support( 'site-logo', array(
      'header-text' => array(
          'site-title',
          'site-description'
      ),
      'size' => 'site-logo',
  )); 

  /*
   * Set up the WordPress core custom background feature.
   *
   * @link https://codex.wordpress.org/Custom_Backgrounds
   */
  // add_theme_support( 'custom-background', apply_filters( 'anp_network_main_custom_background_args', array(
  //   'default-color' => 'ffffff',
  //   'default-image' => '',
  // ) ) );

  add_theme_support( 'custom-header', array(
    'header-text' => false
  ) );
}
endif; // anp_network_main_setup
add_action( 'after_setup_theme', 'anp_network_main_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function anp_network_main_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'anp_network_main_content_width', 640 );
}
add_action( 'after_setup_theme', 'anp_network_main_content_width', 0 );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function anp_network_main_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'anp-network-main' ),
    'id'            => 'sidebar-1',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="wrap">',
    'after_widget'  => '</div></aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Header', 'anp-network-main' ),
    'id'            => 'sidebar-header',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="wrap">',
    'after_widget'  => '</div></aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Footer', 'anp-network-main' ),
    'id'            => 'sidebar-footer',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="wrap">',
    'after_widget'  => '</div></aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Content Footer', 'anp-network-main' ),
    'id'            => 'content-bottom',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="wrap">',
    'after_widget'  => '</div></aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Home', 'anp-network-main' ),
    'id'            => 'sidebar-home',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="wrap">',
    'after_widget'  => '</div></aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => esc_html__( 'Community', 'anp-network-main' ),
    'id'            => 'sidebar-buddypress',
    'description'   => '',
    'before_widget' => '<aside id="%1$s" class="widget %2$s"><div class="wrap">',
    'after_widget'  => '</div></aside>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'anp_network_main_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function anp_network_main_scripts() {
  wp_enqueue_style( 'anp-network-main-style', get_stylesheet_uri() );

  wp_enqueue_script( 'anp-network-main', get_template_directory_uri() . '/dist/scripts/app.js', array('jquery'), '', true );

  wp_enqueue_script( 'navigation', get_template_directory_uri() . '/dist/scripts/navigation.js', array('jquery'), '', true );

  wp_enqueue_script( 'skip-link-focus', get_template_directory_uri() . '/dist/scripts/skip-link-focus-fix.js', array('jquery'), '', true );

  wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/dist/vendor/bootstrap-sass/assets/javascripts/bootstrap.js', array('jquery'), '', true );


  // Dequeue BuddyPress styles
  wp_dequeue_style( 'bp-groupblog-screen' );
  //wp_dequeue_style( 'bbp-default' );
  wp_dequeue_style( 'invite-anyone-by-email-style' );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}
add_action( 'wp_enqueue_scripts', 'anp_network_main_scripts' );

