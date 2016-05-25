<?php
/**
 * The template for displaying page builder layouts.
 *
 *
 * Template Name: Page Builder
 *
 * @package Activist_Network_Theme
 */
get_header(); ?>

	<div class="wrap">

		<div class="primary content-area">
			<main class="site-main">

            <?php do_action ( 'anp_site_main_top' );?>    

			<?php the_content(); ?>

            <?php do_action ( 'anp_site_main_bottom' );?>

			</main><!-- #main -->
		</div><!-- .primary -->

	</div><!-- .wrap -->

<?php get_footer(); ?>
