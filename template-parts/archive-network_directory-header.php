<header class="page-header">

    <?php do_action ( 'anp_network_main_page_header_top' );?>
    
    <h1 class="page-title">
        <?php the_archive_title(); ?>
    </h1>

    <?php do_action ( 'anp_network_main_page_header_bottom' );?>

    <?php anp_taxonomy_filter( $taxonomy = 'subsite_category' ); ?>
    
</header><!-- .page-header -->