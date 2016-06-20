<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Activist_Network_Theme
 */

?>

<?php 
/**
 * Hide sidebar for full and grid layouts
 *
 * @since 2.0.20
 *
 * @link http://themehybrid.com/docs/theme-layouts
 */
?>

<!-- Don't show sidebar if full-width or grid layout -->
<?php if( 'full' != hybrid_get_theme_layout() && 'grid' != hybrid_get_theme_layout() ) : ?>

    <?php do_action ( 'anp_network_main_sidebar_before' );?>

    <?php
    // Handbook and Glossary Pages
    if( 'handbook' == get_post_type() || 'glossary' == get_post_type() ) : ?>

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
    // Community and Forum Pages - Community sidebar is loaded from buddypress.php template
    elseif( 'forum' == get_post_type() || 'topic' == get_post_type() || 'reply' == get_post_type() || is_post_type_archive( array( 'forum', 'topic', 'reply' ) ) || is_tax( 'topic-tag' ) ) : ?>

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
    // Knowledge Base Pages
    elseif( 'knowledge_base' == get_post_type() || is_post_type_archive( 'knowledge_base' ) || is_tax( 'knowledge_base_category' ) || is_page( 'knowledge-base' ) || is_page( 'knowledgebase' ) ) :?>

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

<?php endif; ?>