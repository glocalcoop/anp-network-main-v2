<?php
/**
 * Template part for displaying Event Organiser content
 *
 * @package Activist_Network_Theme
 */

?>

<!-- Choose a different date format depending on whether we want to include time -->
<?php 
    $time_format = get_option( 'time_format' );
    $date_format = get_option( 'date_format' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry event' ); ?>>

    <?php do_action ( 'anp_entry_header_before' );?>

    <header class="entry-header event-header">

        <?php do_action ( 'anp_entry_header_top' );?>

        <h3 class="entry-title event-title">
            <a title="<?php echo get_the_title(); ?>" href="<?php the_permalink(); ?>"><?php the_title();?></a>
        </h3>

        <?php do_action ( 'anp_entry_header_bottom' );?>

    </header>

    <?php do_action ( 'anp_entry_content_before' );?>

    <div class="entry-content event-content">

        <?php do_action ( 'anp_site_content_top' );?>

        <?php if( has_post_thumbnail() ) : ?>
        <div class="entry-image event-image">
            <?php the_post_thumbnail('medium'); ?> 
        </div>
        <?php endif; ?>

        <?php get_template_part( 'template-parts/event', 'dates' ); ?>

        <?php get_template_part( 'template-parts/event', 'address' ); ?>
        
        <p class="entry-excerpt event-description">
            <?php the_excerpt(); ?>
        </p>


        <?php if( function_exists( 'eo_get_event_meta_list' ) ) : ?>
            <?php echo anp_get_event_meta_list(); ?>
        <?php endif; ?>


        <?php do_action ( 'anp_site_content_bottom' );?>
        
    </div><!-- .entry-content -->

    <?php do_action ( 'anp_entry_content_after' );?>

    <footer class="entry-footer">

        <?php do_action ( 'anp_entry_footer_top' );?>

        <?php anp_network_main_entry_footer(); ?>

        <?php do_action ( 'anp_entry_footer_bottom' );?>

    </footer><!-- .entry-footer -->

    <?php do_action ( 'anp_entry_footer_after' );?>       

</article><!-- #post-<?php the_ID(); ?> -->