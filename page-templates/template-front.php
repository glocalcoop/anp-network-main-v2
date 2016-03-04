<?php
/**
 * Template Name: Front Page
 *
 * @package Activist_Network_Theme
 */
get_header(); ?>


	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php get_template_part( 'template-parts', 'hero' ); ?>
			<?php get_template_part( 'components/testimonials' ); ?>
		</main>
	</div>

<?php get_footer(); ?>
