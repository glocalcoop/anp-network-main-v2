<?php
/**
 * Flexible Posts Widget: Default widget template
 * 
 * @since 3.4.0
 *
 * This template was added to overcome some often-requested changes
 * to the old default template (widget.php).
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

if ( ! empty( $title ) )
	echo $before_title . $title . $after_title;

if ( $flexible_posts->have_posts() ):
?>
	<ul class="recent-posts">
	<?php while ( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>
		<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<a href="<?php echo the_permalink(); ?>" rel="bookmark">

				<?php if ( $thumbnail == true ) : ?>

					<?php if( has_post_thumbnail() ) : ?>

						<div class="entry-image">

							<?php the_post_thumbnail( $thumbsize ); ?>

						</div>

					<?php endif; ?>

				<?php endif; ?>

				<h4 class="entry-title"><?php the_title(); ?></h4>
				<div class="entry-meta">
					<time datetime="2011-01-12"><?php the_date( get_option( 'date_format' ) ); ?></time>
				</div><!-- .entry-meta -->
			</a>
		</li>
	<?php endwhile; ?>
	</ul><!-- .recent-posts -->
<?php	
endif; // End have_posts()
	
echo $after_widget;
