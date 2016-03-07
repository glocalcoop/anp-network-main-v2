<?php
/**
 * Template part for displaying Event Organiser venue content
 *
 * @package Activist_Network_Theme
 */

?>

<?php if( eo_get_venue() ) : ?>

	<?php $venue_id = eo_get_venue( get_the_ID() ); ?>
	<?php $venue_address = eo_get_venue_address( $venue_id ); ?>
	<?php $venue_link = eo_get_venue_link( $venue_id ); ?>

	<div class="event-location">
		<?php if( !is_tax( 'event-venue' ) ) : ?>
		<span class="location-name"><a href="<?php echo esc_url( $venue_link ); ?>"><?php echo eo_get_venue_name( $venue_id ); ?></a></span>
		<?php endif; ?>
 		<span class="street-address"><?php echo $venue_address['address']; ?></span>
 		<span class="city-state-postalcode">
	 		<span class="city"><?php echo $venue_address['city']; ?></span>
	 		<span class="state"><?php echo $venue_address['state']; ?></span>
	 		<span class="postal-code"><?php echo $venue_address['postcode']; ?></span>
 		</span>
 		<span class="country"><?php echo $venue_address['country']; ?></span>
	</div>

	<?php if ( eo_get_venue() && eo_venue_has_latlng( eo_get_venue() ) ) : ?>
		<!-- Display map -->
		<div class="eo-event-venue-map">
			<?php echo eo_get_venue_map( eo_get_venue(), array( 'width' => '100%' ) ); ?>
		</div>
	<?php endif; ?>

<?php endif; ?>
