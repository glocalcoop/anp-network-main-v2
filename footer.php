<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Activist_Network_Theme
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

        <?php if ( is_active_sidebar( 'sidebar-footer' ) ) : ?>
        <?php $widget_class = anp_network_main_count_widgets( 'sidebar-footer' ); ?>
        <div class="footer-widgets <?php echo $widget_class; ?>">
            <?php dynamic_sidebar( 'sidebar-footer' ); ?>
        </div>
        <?php endif; ?>

        <div class="copyright">
            <?php get_template_part( 'components/site-info/site-info' ); ?>

            <?php get_template_part( 'components/top-navigation/bottom-navigation' ); ?>
        </div>

	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
