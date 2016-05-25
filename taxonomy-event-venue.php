<?php
/**
 * The template for displaying taxonomy pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Activist_Network_Theme
 */

get_header(); ?>

<?php 
	$time_format = get_option( 'time_format' );
	$date_format = get_option( 'date_format' );
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php do_action ( 'anp_site_main_top' );?>

			<?php if ( have_posts() ) : ?>

				<?php get_template_part( 'template-parts/header', 'archive' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', 'event' );
					?>

				<?php endwhile; ?>

				<?php anp_numeric_posts_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>

		<?php do_action ( 'anp_site_main_bottom' );?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
