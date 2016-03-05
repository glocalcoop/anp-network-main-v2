<?php
/**
 * The template for displaying all single posts.
 *
 * @package Activist_Network_Theme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

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

        </main><!-- #main -->
    </div><!-- #primary -->

<?php if( 'full' != hybrid_get_post_layout( get_the_id() ) && 'grid' != hybrid_get_post_layout( get_the_id() ) ) : ?>

<?php get_sidebar(); ?>

<?php endif; ?>

<?php get_footer(); ?>
