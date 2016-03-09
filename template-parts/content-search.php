<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Activist_Network_Theme
 */
?>

<article <?php post_class(); ?>>

	<?php do_action ( 'anp_network_main_entry_header_before' );?>

	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php _s_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php do_action ( 'anp_network_main_entry_header_bottom' );?>
		
	</header><!-- .entry-header -->

	<?php do_action ( 'anp_network_main_entry_content_before' );?>

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<?php do_action ( 'anp_network_main_entry_content_after' );?>

</article><!-- #post-## -->
