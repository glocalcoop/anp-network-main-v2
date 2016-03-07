<?php
/**
 * Template part for displaying Event Organiser meta content
 *
 * @package Activist_Network_Theme
 */

?>


<!-- Choose a different date format depending on whether we want to include time -->
<?php 
	$time_format = get_option( 'time_format' );
	$date_format = get_option( 'date_format' );
?>

<div class="event-details">
	<h4 class="date-time">
		<span class="event-day"><?php eo_the_start( 'l,' ); ?></span>
		<span class="event-date"><?php eo_the_start( $date_format ); ?></span>
		<span class="event-time"><?php eo_the_start( $time_format ); ?> - <?php eo_the_end( $time_format ); ?></span>
	</h4>

	<ul class="eo-event-meta">

		<?php do_action( 'eventorganiser_additional_event_meta' ) ?>

		<?php get_template_part( 'template-parts/content', 'event-address' ); ?>

		<?php if ( eo_recurs() ) {
				//Event recurs - display dates.
				$upcoming = new WP_Query(array(
					'post_type'         => 'event',
					'event_start_after' => 'today',
					'posts_per_page'    => -1,
					'event_series'      => get_the_ID(),
					'group_events_by'   => 'occurrence',
				));

				if ( $upcoming->have_posts() ) : ?>

					<li><span class="label"><?php _e( 'Upcoming Dates', 'anp-network-main' ); ?></span>
						<ul class="upcoming-dates">
							<?php
							while ( $upcoming->have_posts() ) {
								$upcoming->the_post();
								echo '<li>' . eo_format_event_occurrence() . '</li>';
							};
							?>
						</ul>
					</li>

					<?php
					wp_reset_postdata();
					//With the ID 'eo-upcoming-dates', JS will hide all but the next 5 dates, with options to show more.
					wp_enqueue_script( 'eo_front' );
					?>
				<?php endif; ?>
		<?php } ?>

	</ul>
	
	<?php if( function_exists( 'bpeo_get_the_ical_link' ) ) : ?>
	<div class="tools">
		<a href="<?php echo bpeo_get_the_ical_link( get_the_ID() ); ?>" class="add-to-calendar button"><?php _e( 'Save to Calendar', 'anp-network-theme' ); ?></a>
	</div>
	<?php endif; ?>

	<?php if( function_exists( 'eo_get_event_meta_list' ) ) : ?>
        <?php echo anp_get_event_meta_list(); ?>
    <?php endif; ?>

</div>