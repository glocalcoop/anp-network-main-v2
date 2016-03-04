<header class="page-header">
    <?php $venue_id = get_queried_object_id(); ?>
    <?php $venue_address = eo_get_venue_address( $venue_id ); ?>
    
    <h1 class="page-title">
        <?php
        if( eo_is_event_archive('day') )
        //Viewing date archive
            echo __('Events: ','anp-network-main').' '.eo_get_event_archive_date('jS F Y');
        elseif( eo_is_event_archive('month') )
        //Viewing month archive
            echo __('Events: ','anp-network-main').' '.eo_get_event_archive_date('F Y');
        elseif( eo_is_event_archive('year') )
        //Viewing year archive
            echo __('Events: ','anp-network-main').' '.eo_get_event_archive_date('Y');
        else
        _e('Events','anp-network-main');
        ?>
    </h1>
</header><!-- .page-header -->