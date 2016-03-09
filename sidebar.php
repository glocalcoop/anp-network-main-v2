<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Activist_Network_Theme
 */

?>

<!-- Don't show sidebar if full-width or grid layout -->
<?php if( 'full' != hybrid_get_post_layout( get_the_id() ) && 'grid' != hybrid_get_post_layout( get_the_id() ) ) : ?>

    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <div id="secondary" class="widget-area sidebar" role="complementary">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div><!-- #secondary -->
    <?php endif; ?>

<?php endif; ?>