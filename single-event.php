<?php
/**
 * The template for displaying all single posts.
 *
 * @package Activist_Network_Theme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php do_action ( 'anp_network_main_site_main_top' );?>

        <?php while ( have_posts() ) : the_post(); ?>

            <?php get_template_part( 'template-parts/content', 'single-event' ); ?>

            <?php the_post_navigation(); ?>

            <?php
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            ?>

        <?php endwhile; // End of the loop. ?>

        <?php do_action ( 'anp_network_main_site_main_bottom' );?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
