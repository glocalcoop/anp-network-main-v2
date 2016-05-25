<?php
/**
 * The template used for displaying page content in buddypress.php
 *
 * @package Activist_Network_Theme
 */
?>

<article <?php post_class(); ?>>

    <?php do_action ( 'anp_entry_content_before' );?>

	<div class="entry-content">

        <?php do_action ( 'anp_entry_content_top' );?>

		<?php the_content(); ?>

        <?php do_action ( 'anp_entry_content_bottom' );?>

	</div><!-- .entry-content -->

    <?php do_action ( 'anp_entry_content_after' );?>
	
</article><!-- #post-## -->
