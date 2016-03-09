<?php
/**
 * The template part for displaying a message that posts cannot be found.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Activist_Network_Theme
 */

?>

<section class="no-results not-found">

	<?php do_action ( 'anp_network_main_entry_header_before' );?>

	<header class="page-header">

		<?php do_action ( 'anp_network_main_entry_header_top' );?>

		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'anp-network-main' ); ?></h1>

		<?php do_action ( 'anp_network_main_entry_header_bottom' );?>

	</header><!-- .page-header -->

	<?php do_action ( 'anp_network_main_entry_content_before' );?>

	<div class="page-content">

		<?php do_action ( 'anp_network_main_entry_header_top' );?>

		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'anp-network-main' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'anp-network-main' ); ?></p>
			<?php get_search_form(); ?>

		<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'anp-network-main' ); ?></p>
			<?php get_search_form(); ?>

		<?php endif; ?>

		<?php do_action ( 'anp_network_main_entry_header_bottom' );?>

	</div><!-- .page-content -->

	<?php do_action ( 'anp_network_main_entry_content_after' );?>

</section><!-- .no-results -->
