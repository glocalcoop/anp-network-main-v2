<?php
/**
 * Template part for displaying posts.
 *
 * @package Activist_Network_Theme
 */

?>

<ul id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<h2 class="entry-title event-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">

		<div class="date-time">
			<span class="event-day"><?php eo_the_start( 'l,' ); ?></span> 
			<span class="event-date"><?php eo_the_start( $date_format ); ?></span>
			<span class="event-time"><?php eo_the_start( $time_format ); ?> - <?php eo_the_end( $time_format ); ?></span>
		</div>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'anp-network-main' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php anp_network_main_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</ul><!-- #post-## -->
