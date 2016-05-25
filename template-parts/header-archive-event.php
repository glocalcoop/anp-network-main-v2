<header class="page-header">

    <?php do_action ( 'anp_page_header_top' );?>

    <?php $venue_id = get_queried_object_id(); ?>
    <?php $venue_address = eo_get_venue_address( $venue_id ); ?>
    
    <h1 class="page-title">
        <?php the_archive_title(); ?>
    </h1>

    <?php do_action ( 'anp_page_header_bottom' );?>
    
</header><!-- .page-header -->