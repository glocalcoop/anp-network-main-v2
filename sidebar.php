<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Activist_Network_Theme
 */

?>

<!-- Don't show sidebar if full-width or grid layout -->
<?php if( 'full' != hybrid_get_post_layout( get_the_id() ) && 'grid' != hybrid_get_post_layout( get_the_id() ) ) : ?>

    <?php do_action ( 'anp_network_main_sidebar_before' );?>

    <?php if( 'handbook' == get_post_type() || 'glossary' == get_post_type() ) : ?>

        <?php if ( is_active_sidebar( 'handbook' ) ) : ?>
            <div id="secondary" class="widget-area sidebar" role="complementary">
                <?php dynamic_sidebar( 'handbook' ); ?>
            </div><!-- #secondary -->
        <?php endif; ?>

    <?php elseif( 'forum' == get_post_type() || 'topic' == get_post_type() || 'reply' == get_post_type() || is_post_type_archive( array( 'forum', 'topic', 'reply' ) ) || is_tax( 'topic-tag' ) ) : ?>

            <?php if ( is_active_sidebar( 'sidebar-buddypress' ) ) : ?>
                <div id="secondary" class="widget-area sidebar buddypress" role="complementary">
                    <?php dynamic_sidebar( 'sidebar-buddypress' ); ?>
                </div><!-- #secondary -->
            <?php endif; ?>

    <?php else : ?>

        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
            <div id="secondary" class="widget-area sidebar" role="complementary">
                <?php dynamic_sidebar( 'sidebar-1' ); ?>
            </div><!-- #secondary -->
        <?php endif; ?>

    <?php endif; ?>

    <?php do_action ( 'anp_network_main_sidebar_after' );?>

<?php endif; ?>