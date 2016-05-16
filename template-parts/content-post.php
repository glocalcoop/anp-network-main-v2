<?php
/**
 * Template part for displaying posts.
 *
 * @package Activist_Network_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>

	<?php do_action ( 'anp_network_main_entry_header_before' );?>

	<header class="entry-header">

		<?php do_action ( 'anp_network_main_entry_header_top' );?>

		<?php if( has_post_thumbnail() ) : ?>

        <div class="entry-image">
            <?php the_post_thumbnail('medium'); ?> 
        </div>

        <?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<div class="entry-meta">
			<?php anp_network_main_posted_on(); ?>
		</div><!-- .entry-meta -->

		<?php do_action ( 'anp_network_main_entry_header_bottom' );?>

	</header><!-- .entry-header -->

	<?php do_action ( 'anp_network_main_entry_content_before' );?>

	<div class="entry-content">

		<?php do_action ( 'anp_network_main_entry_content_top' );?>

		<?php
			the_excerpt();
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'anp-network-main' ),
				'after'  => '</div>',
			) );
		?>

		<?php do_action ( 'anp_network_main_entry_content_bottom' );?>

	</div><!-- .entry-content -->

	<?php do_action ( 'anp_network_main_entry_content_after' );?>

	<footer class="entry-footer">

        <?php do_action ( 'anp_network_main_entry_footer_top' );?>

		<?php if ( is_active_sidebar( 'content-bottom' ) ) : ?>
		<?php $widget_class = anp_network_main_count_widgets( 'content-bottom' ); ?>
        <div class="content-widgets <?php echo $widget_class; ?>">
            <?php dynamic_sidebar( 'content-bottom' ); ?>
        </div>
        <?php endif; ?>

        <?php do_action ( 'anp_network_main_entry_footer_bottom' );?>

	</footer><!-- .entry-footer -->

    <?php do_action ( 'anp_network_main_entry_footer_after' );?>

</article><!-- #post-## -->
