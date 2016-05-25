<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Activist_Network_Theme
 */

?>
        <?php do_action ( 'anp_site_content_bottom' );?>

        </div><!-- .site-content-container-->

	</div><!-- #content -->

    <?php do_action ( 'anp_footer_before' );?>

	<footer id="colophon" class="site-footer" role="contentinfo">

        <?php do_action ( 'anp_footer_top' );?>

        <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
        <?php $widget_class = anp_network_main_count_widgets( 'sidebar-footer' ); ?>
        <div class="footer-widgets <?php echo $widget_class; ?>">
            <div class="footer-widget-container">
            <?php dynamic_sidebar( 'sidebar-footer' ); ?>    
            </div>
        </div>
        <?php endif; ?>

        <?php get_template_part( 'components/bottom-navigation/bottom-navigation' ); ?>

        <div class="copyright">
            <?php get_template_part( 'components/site-info/site-info' ); ?>
        </div>

        <?php do_action ( 'anp_footer_bottom' );?>

	</footer><!-- #colophon -->

    <?php do_action ( 'anp_footer_after' );?>

</div><!-- #page -->

<?php do_action ( 'anp_after' );?>

<?php wp_footer(); ?>

</body>
</html>
