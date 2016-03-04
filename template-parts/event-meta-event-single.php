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

<section class="event-details">

	<h4 class="date-time">
		<span class="event-day"><?php eo_the_start( 'l,' ); ?></span>
		<span class="event-date"><?php eo_the_start( $date_format ); ?></span>
		<span class="event-time"><?php eo_the_start( $time_format ); ?> - <?php eo_the_end( $time_format ); ?></span>
	</h4>

	<!-- Get event information, see template: event-venue-address.php -->
	<?php get_template_part( '/partials/event', 'venue-address' ); ?>

	<div class="tools"><a href="" class="add-to-calendar button"><?php _e( 'Save to Calendar', 'anp-network-theme' ); ?></a></div>

	<?php if( function_exists( 'eo_get_event_meta_list' ) ) : ?>
        <?php echo anp_get_event_meta_list(); ?>
    <?php endif; ?>

</section>