<?php
/**
 * Template part for displaying single event posts.
 *
 * @package Activist_Network_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php do_action ( 'anp_entry_header_before' );?>

	<header class="page-header">

        <?php do_action ( 'anp_entry_header_top' );?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

        <?php do_action ( 'anp_entry_header_bottom' );?>

	</header><!-- .entry-header -->

    <?php do_action ( 'anp_entry_content_before' );?>

	<div class="entry-content">

        <?php do_action ( 'anp_entry_content_top' );?>

        <?php if( has_post_thumbnail() ) : ?>
        <div class="main-image">
            <?php the_post_thumbnail('full'); ?> 
        </div>
        <?php endif; ?>

		<?php get_template_part( 'template-parts/event', 'meta' ); ?>

        <div class="entry-description event-description">

            <?php the_content(); ?>

        </div>

        <?php do_action ( 'anp_entry_content_bottom' );?>

	</div><!-- .entry-content -->

    <?php do_action ( 'anp_entry_content_after' );?>

	<footer class="entry-footer">

        <?php do_action ( 'anp_entry_footer_top' );?>

		<?php if ( is_active_sidebar( 'content-bottom' ) ) : ?>
		<?php $widget_class = anp_network_main_count_widgets( 'content-bottom' ); ?>
        <div class="content-widgets <?php echo $widget_class; ?>">
            <?php dynamic_sidebar( 'content-bottom' ); ?>
        </div>
        <?php endif; ?>

        <?php do_action ( 'anp_entry_footer_bottom' );?>

	</footer><!-- .entry-footer -->

    <?php do_action ( 'anp_entry_footer_after' );?>
    
</article><!-- #post-## -->

