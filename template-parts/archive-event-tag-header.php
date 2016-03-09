<header class="page-header">

    <?php do_action ( 'anp_network_main_page_header_top' );?>

    <?php $venue_id = get_queried_object_id(); ?>
    <?php $venue_address = eo_get_venue_address( $venue_id ); ?>
    
    <h1 class="page-title">
        <?php echo eo_get_venue_name( $venue_id ); ?>
    </h1>

    <?php if( $venue_description = eo_get_venue_description( $venue_id ) ) : ?>
         <div class="taxonomy-description">

            <div class="venue-description">
                <?php echo $venue_description; ?>
            </div>
            
         </div>
    <?php endif; ?>

    <h3><?php _e( 'Address', 'anp-network-main' ); ?></h3>

    <!-- Get event information, see template: event-venue-address.php -->
    <?php get_template_part( '/template-parts/event', 'venue-address' ); ?>
    
    <!-- Display the venue map. If you specify a class, ensure that class has height/width dimensions-->
    <?php echo eo_get_venue_map( $venue_id, array('width'=>"100%") ); ?>

    <h3><?php _e( 'Upcoming Events', 'anp-network-main' ); ?></h3>

    <?php do_action ( 'anp_network_main_page_header_bottom' );?>

</header><!-- .page-header -->