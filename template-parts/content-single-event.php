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

		<?php get_template_part( 'event-meta', 'event-single' ); ?>
         <div class="entry-description event-description">

            <!-- The content or the description of the event-->
            <?php the_content(); ?>

            <!-- Does the event have a venue? -->
            <?php if( eo_get_venue() ): ?>
                <!-- Display map -->
                <div class="event-map">
                    <?php echo eo_get_venue_map(eo_get_venue(),array('width'=>'100%')); ?>
                </div>
            <?php endif; ?>

        </div>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'anp-network-main' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if( function_exists( 'eo_get_event_meta_list' ) ) : ?>
			<?php echo anp_get_event_meta_list(); ?>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'content-bottom' ) ) : ?>
		<?php $widget_class = anp_network_main_count_widgets( 'content-bottom' ); ?>
        <div class="content-widgets <?php echo $widget_class; ?>">
            <?php dynamic_sidebar( 'content-bottom' ); ?>
        </div>
        <?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

