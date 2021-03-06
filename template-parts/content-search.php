<?php
/**
 * The template part for displaying results in search pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Activist_Network_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php do_action ( 'anp_entry_header_before' );?>

	<header class="entry-header">

		<?php do_action ( 'anp_entry_header_top' );?>

		<?php the_title( sprintf( '<h3 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php anp_network_main_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

		<?php do_action ( 'anp_entry_header_bottom' );?>
		
	</header><!-- .entry-header -->

	<?php do_action ( 'anp_entry_content_before' );?>

	<div class="entry-summary entry-content">
		<?php do_action ( 'anp_entry_content_top' );?>

		<?php the_excerpt(); ?>

		<?php do_action ( 'anp_entry_content_bottom' );?>

	</div><!-- .entry-summary -->

	<?php do_action ( 'anp_entry_content_after' );?>

	<footer class="entry-footer">

		<?php do_action ( 'anp_entry_footer_top' );?>

		<?php anp_network_main_entry_footer(); ?>

		<?php do_action ( 'anp_entry_footer_bottom' );?>

	</footer><!-- .entry-footer -->

	<?php do_action ( 'anp_entry_footer_after' );?>

</article><!-- #post-## -->

