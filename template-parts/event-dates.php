<?php 
    $time_format = get_option( 'time_format' );
    $date_format = get_option( 'date_format' );
    $start_date = eo_get_the_start('Y-m-d');
    $end_date = eo_get_the_end('Y-m-d');
?>
<?php if( $end_date == $start_date ) : ?>
    <div class="date-time">
        <span class="event-day"><?php eo_the_start( 'l,' ); ?></span>
        <span class="event-date"><?php eo_the_start( $date_format ); ?><?php _e( ', ', 'anp-network-main' ) ?></span>
        <span class="event-time"><?php eo_the_start( $time_format ); ?><?php _e( ' - ', 'anp-network-main' ) ?><?php eo_the_end( $time_format ); ?></span>
    </div>
<?php else : ?>
    <div class="date-time multi-date">
        <span class="event-day"><?php eo_the_start( 'l,' ); ?></span>
        <span class="event-date"><?php eo_the_start( $date_format ); ?><?php _e( ', ', 'anp-network-main' ) ?></span>
        <span class="event-time"><?php eo_the_start( $time_format ); ?><?php _e( ' to ', 'anp-network-main' ) ?></span>

        <span class="event-day"><?php eo_the_end( 'l,' ); ?></span>
        <span class="event-date"><?php eo_the_end( $date_format ); ?><?php _e( ', ', 'anp-network-main' ) ?></span>
        <span class="event-time"><?php eo_the_end( $time_format ); ?></span>

    </div>
<?php endif; ?>