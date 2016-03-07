<?php
/**
 * Template part for displaying Event Organiser meta content
 *
 * @package Activist_Network_Theme
 */
?>

<div class="entry-meta">

	<!-- Is event recurring or a single event -->
	<?php if ( eo_recurs() ) :?>
		<!-- Event recurs - is there a next occurrence? -->
		<?php $next = eo_get_next_occurrence( eo_get_event_datetime_format() );?>

		<?php if ( $next ) : ?>
			<!-- If the event is occurring again in the future, display the date -->
			<?php printf( '<p>' . __( 'This event is running from %1$s until %2$s. It is next occurring on %3$s', 'eventorganiser' ) . '</p>', eo_get_schedule_start( 'j F Y' ), eo_get_schedule_last( 'j F Y' ), $next );?>

		<?php else : ?>
			<!-- Otherwise the event has finished (no more occurrences) -->
			<?php printf( '<p>' . __( 'This event finished on %s', 'eventorganiser' ) . '</p>', eo_get_schedule_last( 'd F Y', '' ) );?>
		<?php endif; ?>
	<?php endif; ?>






</div><!-- .entry-meta -->
