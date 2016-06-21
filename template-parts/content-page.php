<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Activist_Network_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php do_action ( 'anp_entry_header_before' );?>

	<header class="page-header">

		<?php do_action ( 'anp_entry_header_top' );?>

		<?php the_title( '<h1 class="page-title">', '</h1>' ); ?>

		<?php do_action ( 'anp_entry_header_bottom' );?>

	</header><!-- .page-header -->

	<?php do_action ( 'anp_entry_content_before' );?>

	<div class="entry-content">

		<?php do_action ( 'anp_entry_header_top' );?>

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'anp-network-main' ),
				'after'  => '</div>',
			) );
		?>

		<?php do_action ( 'anp_entry_header_bottom' );?>

	</div><!-- .entry-content -->

	<?php do_action ( 'anp_entry_content_after' );?>

	<footer class="entry-footer">

		<?php do_action ( 'anp_entry_footer_top' );?>

		<?php edit_post_link( esc_html__( 'Edit', 'anp-network-main' ), '<span class="edit-link">', '</span>' ); ?>

		<?php if ( is_active_sidebar( 'content-bottom' ) ) : ?>
		<?php $widget_class = anp_network_main_count_widgets( 'content-bottom' ); ?>
        <div class="content-widgets <?php echo $widget_class; ?>">
            <?php dynamic_sidebar( 'content-bottom' ); ?>
        </div>
        <?php endif; ?>

        <?php do_action ( 'anp_entry_footer_bottom' );?>

	</footer><!-- .entry-footer -->

	<?php do_action ( 'anp_entry_footer_after' );?>
	
</article><!-- #post-## -->

