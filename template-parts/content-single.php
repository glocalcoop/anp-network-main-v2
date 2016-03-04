<?php
/**
 * Template part for displaying single posts.
 *
 * @package Activist_Network_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php anp_network_main_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
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
		<?php anp_network_main_entry_footer(); ?>

		<?php if ( is_active_sidebar( 'content-bottom' ) ) : ?>
		<?php $widget_class = anp_network_main_count_widgets( 'content-bottom' ); ?>
        <div class="content-widgets <?php echo $widget_class; ?>">
            <?php dynamic_sidebar( 'content-bottom' ); ?>
        </div>
        <?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

