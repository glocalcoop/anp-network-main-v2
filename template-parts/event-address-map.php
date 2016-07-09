<?php
/**
 * Template part for displaying Event Organiser venue content
 *
 * @package Activist_Network_Theme
 */

?>

<?php if ( eo_get_venue() && eo_venue_has_latlng( eo_get_venue() ) ) : ?>
	<!-- Display map -->
	<div class="eo-event-venue-map">
		<?php echo eo_get_venue_map( eo_get_venue(), array( 'width' => '100%' ) ); ?>
	</div>
<?php endif; ?>