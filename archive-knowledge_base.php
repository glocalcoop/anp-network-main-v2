<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Activist_Network_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php do_action ( 'anp_network_main_site_main_top' );?>

		<?php if ( have_posts() ) : ?>

			<?php get_template_part( 'template-parts/header', 'archive' ); ?>

			<div class="entries-list">

			<?php echo do_shortcode( '[knowledge-base]' ); ?>

			</div>

			<?php the_posts_navigation(); ?>

		<?php endif; ?>

		<?php do_action ( 'anp_network_main_site_main_bottom' );?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
