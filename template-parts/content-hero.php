<?php
/**
 * The template used for displaying hero content.
 *
 * @package Activist_Network_Theme
 */
?>

<?php if ( has_post_thumbnail() ) : ?>
	<div class="anp-network-main-hero">
		<?php the_post_thumbnail( 'anp-network-main-hero' ); ?>
	</div><!-- .hero -->
<?php endif; ?>
