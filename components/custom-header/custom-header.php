		<?php
		// You can upload a custom header and it'll output in a smaller logo size.
		$header_image = get_header_image(); ?>


		<?php if ( ! empty( $header_image ) ) { ?>
			<?php get_template_part( 'components/site-branding/site-branding' ); ?>
			<div id="header-image" class="custom-header">
				<div class="header-wrapper custom-header-container">
					
					<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" class="header-image" alt="">
				</div><!-- .header-wrapper -->
			</div><!-- #header-image .custom-header -->
		<?php } else { ?>
			<?php get_template_part( 'components/site-branding/site-branding' ); ?>
		<?php } ?>