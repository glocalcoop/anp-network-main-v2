<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Activist_Network_Theme
 */

?>

<?php 
?>

<?php
/**
 * Hide sidebar for full layout
 *
 * @since 2.0.29
 *
 * @link http://themehybrid.com/docs/theme-layouts
 */
if( 'full' == hybrid_get_theme_layout() ) {
    return;
}
?>

<?php do_action ( 'anp_network_main_sidebar_before' );?>

<?php
/**
 * Handbook and Glossary Pages
 *
 * @since 2.0.29
 *
 * @uses anp_is_post_type()
 *
 * @link https://codex.wordpress.org/Conditional_Tags#Conditional_Tags_Index
 */
if( anp_is_post_type( 'handbook' ) || anp_is_post_type( 'glossary' ) ) : ?>

    <?php if ( is_active_sidebar( 'sidebar-handbook' ) ) : ?>
        <div id="secondary" class="widget-area sidebar widget-handbook" role="complementary">
            <?php dynamic_sidebar( 'sidebar-handbook' ); ?>
        </div><!-- #secondary -->
    <?php else : ?>
         <div id="secondary" class="widget-area sidebar widget-default" role="complementary">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div><!-- #secondary -->
    <?php endif; ?>

<?php
/**
 * BB Forums
 *
 * @since 2.0.29
 *
 * @uses anp_is_post_type()
 *
 * @link https://codex.wordpress.org/Conditional_Tags#Conditional_Tags_Index
 */
elseif( anp_is_post_type( 'forum' ) || anp_is_post_type( 'topic' ) || anp_is_post_type( 'reply' ) || is_tax( 'topic-tag' ) ) : ?>

   <?php if ( is_active_sidebar( 'sidebar-buddypress' ) ) : ?>
        <div id="secondary" class="widget-area sidebar widget-buddypress" role="complementary">
            <?php dynamic_sidebar( 'sidebar-buddypress' ); ?>
        </div><!-- #secondary -->
    <?php else : ?>
         <div id="secondary" class="widget-area sidebar widget-default" role="complementary">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div><!-- #secondary -->
    <?php endif; ?>

<?php 
/**
 * Knowledge Base
 *
 * @since 2.0.29
 *
 * @uses anp_is_post_type()
 *
 * @link https://codex.wordpress.org/Conditional_Tags#Conditional_Tags_Index
 */
elseif( anp_is_post_type( 'knowledge_base' ) || is_tax( 'knowledge_base_category' ) ) :?>

    <?php if ( is_active_sidebar( 'sidebar-knowledge-base' ) ) : ?>
        <div id="secondary" class="widget-area sidebar widget-knowledge-base" role="complementary">
            <?php dynamic_sidebar( 'sidebar-knowledge-base' ); ?>
        </div><!-- #secondary -->
    <?php else : ?>
         <div id="secondary" class="widget-area sidebar widget-default" role="complementary">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div><!-- #secondary -->
    <?php endif; ?>

<?php else : ?>

    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <div id="secondary" class="widget-area sidebar widget-default" role="complementary">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div><!-- #secondary -->
    <?php endif; ?>

<?php endif; ?>

<?php do_action ( 'anp_network_main_sidebar_after' );?>
