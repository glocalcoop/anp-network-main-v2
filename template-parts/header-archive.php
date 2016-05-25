<header class="page-header">

    <?php do_action ( 'anp_page_header_top' );?>

	<?php
		the_archive_title( '<h1 class="page-title">', '</h1>' );
		the_archive_description( '<div class="taxonomy-description">', '</div>' );
	?>

    <?php do_action( 'anp_page_header_bottom' );?>

</header><!-- .page-header -->