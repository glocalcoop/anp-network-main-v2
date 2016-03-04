<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Activist_Network_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="en
		try-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'anp-network-main' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'anp-network-main' ), '<span class="edit-link">', '</span>' ); ?>

		<?php if ( is_active_sidebar( 'content-bottom' ) ) : ?>
		<?php $widget_class = anp_network_main_count_widgets( 'content-bottom' ); ?>
        <div class="content-widgets <?php echo $widget_class; ?>">
            <?php dynamic_sidebar( 'content-bottom' ); ?>
        </div>
        <?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

