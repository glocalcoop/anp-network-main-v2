<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Activist_Network_Theme
 */

?>
<?php $home_post_class = ($post->post_content) ? 'intro-content' : 'empty' ; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class($home_post_class); ?>>

	<?php do_action ( 'anp_entry_content_before' );?>

	<div class="entry-content">

		<?php do_action ( 'anp_entry_header_top' );?>

		<?php the_content(); ?>

		<?php do_action ( 'anp_entry_header_bottom' );?>

	</div><!-- .entry-content -->

	<?php do_action ( 'anp_entry_content_after' );?>

	<footer class="entry-footer">

		<?php do_action ( 'anp_entry_footer_top' );?>

		<?php edit_post_link( esc_html__( 'Edit', 'anp-network-main' ), '<span class="edit-link">', '</span>' ); ?>

		<?php do_action ( 'anp_entry_footer_bottom' );?>

	</footer><!-- .entry-footer -->

	<?php do_action ( 'anp_entry_footer_after' );?>
	
</article><!-- #post-## -->

