<?php
/**
 * The template for displaying search results pages.
 *
 * @package Activist_Network_Theme
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php do_action ( 'anp_network_main_site_main_top' );?>

		<?php if ( have_posts() ) : ?>

			<?php get_template_part( 'components/search-header/search-header' ); ?>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'components/content-search/content', 'search' );
				?>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'components/content-none/content', 'none' ); ?>

		<?php endif; ?>

		<?php do_action ( 'anp_network_main_site_main_bottom' );?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
