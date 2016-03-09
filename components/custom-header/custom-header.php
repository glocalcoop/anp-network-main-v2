		<?php
		// You can upload a custom header and it'll output in a smaller logo size.
		$header_image = get_header_image();

		if ( ! empty( $header_image ) ) { ?>
			<div id="header-image" class="custom-header">
				<div class="header-wrapper custom-header-container">
					<?php get_template_part( 'components/site-branding/site-branding' ); ?>
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
				</div><!-- .header-wrapper -->
			</div><!-- #header-image .custom-header -->
		<?php } else { ?>
			<?php get_template_part( 'components/site-branding/site-branding' ); ?>
		<?php } ?>