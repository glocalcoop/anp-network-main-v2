<?php
/**
 * Template part for displaying single posts.
 *
 * @package Activist_Network_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if( has_post_thumbnail() ) : ?>
		<div class="entry-image event-image">
			<?php the_post_thumbnail('full'); ?> 
		</div>
		<?php endif; ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	</header><!-- .entry-header -->

	<div class="entry-content">

		<?php get_template_part( 'template-parts/content', 'event-meta' ); ?>

        <div class="entry-description event-description">

            <?php the_content(); ?>

        </div>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php if ( is_active_sidebar( 'content-bottom' ) ) : ?>
		<?php $widget_class = anp_network_main_count_widgets( 'content-bottom' ); ?>
        <div class="content-widgets <?php echo $widget_class; ?>">
            <?php dynamic_sidebar( 'content-bottom' ); ?>
        </div>
        <?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

