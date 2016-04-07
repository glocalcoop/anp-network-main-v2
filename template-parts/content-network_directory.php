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

		<?php $siteurl = get_post_meta( get_the_ID(), 'site_directory_siteurl', true ); ?>

		<?php $blog_id = get_post_meta( get_the_ID(), 'site_directory_blog_id', true ); ?>

		<?php 
		/*
		 * Site logo will be in core starting in v 4.5
		 * @links https://codex.wordpress.org/Theme_Logo
		 */
		if( function_exists( 'get_site_directory_logo' ) ) : ?>
			<div class="entry-avatar">
				<?php echo get_site_directory_logo( $blog_id, 'thumbnail', array( 'class' => 'avatar' ) ); ?>
			</div>
		<?php endif; ?> 

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( $siteurl ) ), '</a></h2>' ); ?>

		<?php do_action ( 'anp_network_main_entry_header_bottom' );?>

	</header><!-- .entry-header -->

	<?php do_action ( 'anp_network_main_entry_content_before' );?>

	<div class="entry-content">

		<?php do_action ( 'anp_network_main_entry_content_top' );?>

		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'anp-network-main' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
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

	<?php if( $terms = get_the_terms( $post->ID, 'subsite_category' ) ) : ?>

	<footer class="entry-footer">

        <?php do_action ( 'anp_network_main_entry_footer_top' );?>

        <?php $terms = hybrid_post_terms( array( 'taxonomy'   => 'subsite_category' ) ); 
        ?>

        <?php do_action ( 'anp_network_main_entry_footer_bottom' );?>

	</footer><!-- .entry-footer -->

	<?php endif; ?>

    <?php do_action ( 'anp_network_main_entry_footer_after' );?>

</article><!-- #post-## -->
