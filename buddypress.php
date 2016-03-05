<?php
/**
 * The template for displaying buddypress pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Activist_Network_Theme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php get_template_part( 'template-parts/content', 'buddypress' ); ?>

            <?php endwhile; // End of the loop. ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php if ( is_active_sidebar( 'sidebar-buddypress' ) ) : ?>
    <div id="secondary" class="widget-area sidebar" role="complementary">
        <?php dynamic_sidebar( 'sidebar-buddypress' ); ?>
    </div><!-- #secondary -->
<?php endif; ?>
<?php get_footer(); ?>
