<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Activist_Network_Theme
 */

if ( ! function_exists( 'anp_network_main_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function anp_network_main_posted_on() {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);

	$posted_on = sprintf(
		esc_html_x( 'Posted on %s', 'post date', 'anp-network-main' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'anp-network-main' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

}
endif;

if ( ! function_exists( 'anp_network_main_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function anp_network_main_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' == get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( esc_html__( ', ', 'anp-network-main' ) );
		if ( $categories_list && anp_network_main_categorized_blog() ) {
			printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'anp-network-main' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'anp-network-main' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'anp-network-main' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'anp-network-main' ), esc_html__( '1 Comment', 'anp-network-main' ), esc_html__( '% Comments', 'anp-network-main' ) );
		echo '</span>';
	}

	edit_post_link( esc_html__( 'Edit', 'anp-network-main' ), '<span class="edit-link">', '</span>' );
}
endif;

if ( ! function_exists( 'the_archive_title' ) ) :
/**
 * Shim for `the_archive_title()`.
 *
 * Display the archive title based on the queried object.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the title. Default empty.
 * @param string $after  Optional. Content to append to the title. Default empty.
 */
function the_archive_title( $before = '', $after = '' ) {
	if ( is_category() ) {
		$title = sprintf( esc_html__( 'Category: %s', 'anp-network-main' ), single_cat_title( '', false ) );
	} elseif ( is_tag() ) {
		$title = sprintf( esc_html__( 'Tag: %s', 'anp-network-main' ), single_tag_title( '', false ) );
	} elseif ( is_author() ) {
		$title = sprintf( esc_html__( 'Author: %s', 'anp-network-main' ), '<span class="vcard">' . get_the_author() . '</span>' );
	} elseif ( is_year() ) {
		$title = sprintf( esc_html__( 'Year: %s', 'anp-network-main' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'anp-network-main' ) ) );
	} elseif ( is_month() ) {
		$title = sprintf( esc_html__( 'Month: %s', 'anp-network-main' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'anp-network-main' ) ) );
	} elseif ( is_day() ) {
		$title = sprintf( esc_html__( 'Day: %s', 'anp-network-main' ), get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'anp-network-main' ) ) );
	} elseif ( is_tax( 'post_format' ) ) {
		if ( is_tax( 'post_format', 'post-format-aside' ) ) {
			$title = esc_html_x( 'Asides', 'post format archive title', 'anp-network-main' );
		} elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) {
			$title = esc_html_x( 'Galleries', 'post format archive title', 'anp-network-main' );
		} elseif ( is_tax( 'post_format', 'post-format-image' ) ) {
			$title = esc_html_x( 'Images', 'post format archive title', 'anp-network-main' );
		} elseif ( is_tax( 'post_format', 'post-format-video' ) ) {
			$title = esc_html_x( 'Videos', 'post format archive title', 'anp-network-main' );
		} elseif ( is_tax( 'post_format', 'post-format-quote' ) ) {
			$title = esc_html_x( 'Quotes', 'post format archive title', 'anp-network-main' );
		} elseif ( is_tax( 'post_format', 'post-format-link' ) ) {
			$title = esc_html_x( 'Links', 'post format archive title', 'anp-network-main' );
		} elseif ( is_tax( 'post_format', 'post-format-status' ) ) {
			$title = esc_html_x( 'Statuses', 'post format archive title', 'anp-network-main' );
		} elseif ( is_tax( 'post_format', 'post-format-audio' ) ) {
			$title = esc_html_x( 'Audio', 'post format archive title', 'anp-network-main' );
		} elseif ( is_tax( 'post_format', 'post-format-chat' ) ) {
			$title = esc_html_x( 'Chats', 'post format archive title', 'anp-network-main' );
		}
	} elseif ( is_post_type_archive() ) {
		$title = sprintf( esc_html__( 'Archives: %s', 'anp-network-main' ), post_type_archive_title( '', false ) );
	} elseif ( is_tax() ) {
		$tax = get_taxonomy( get_queried_object()->taxonomy );
		/* translators: 1: Taxonomy singular name, 2: Current taxonomy term */
		$title = sprintf( esc_html__( '%1$s: %2$s', 'anp-network-main' ), $tax->labels->singular_name, single_term_title( '', false ) );
	} else {
		$title = esc_html__( 'Archives', 'anp-network-main' );
	}

	/**
	 * Filter the archive title.
	 *
	 * @param string $title Archive title to be displayed.
	 */
	$title = apply_filters( 'get_the_archive_title', $title );

	if ( ! empty( $title ) ) {
		echo $before . $title . $after;  // WPCS: XSS OK.
	}
}
endif;

if ( ! function_exists( 'the_archive_description' ) ) :
/**
 * Shim for `the_archive_description()`.
 *
 * Display category, tag, or term description.
 *
 * @todo Remove this function when WordPress 4.3 is released.
 *
 * @param string $before Optional. Content to prepend to the description. Default empty.
 * @param string $after  Optional. Content to append to the description. Default empty.
 */
function the_archive_description( $before = '', $after = '' ) {
	$description = apply_filters( 'get_the_archive_description', term_description() );

	if ( ! empty( $description ) ) {
		/**
		 * Filter the archive description.
		 *
		 * @see term_description()
		 *
		 * @param string $description Archive description to be displayed.
		 */
		echo $before . $description . $after;  // WPCS: XSS OK.
	}
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function anp_network_main_categorized_blog() {
  if ( false === ( $all_the_cool_cats = get_transient( 'anp_network_main_categories' ) ) ) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories( array(
      'fields'     => 'ids',
      'hide_empty' => 1,

      // We only need to know if there is more than one category.
      'number'     => 2,
    ) );

    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count( $all_the_cool_cats );

    set_transient( 'anp_network_main_categories', $all_the_cool_cats );
  }

  if ( $all_the_cool_cats > 1 ) {
    // This blog has more than 1 category so anp_network_main_categorized_blog should return true.
    return true;
  } else {
    // This blog has only 1 category so anp_network_main_categorized_blog should return false.
    return false;
  }
}

/**
 * Flush out the transients used in anp_network_main_categorized_blog.
 */
function anp_network_main_category_transient_flusher() {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
  }
  // Like, beat it. Dig?
  delete_transient( 'anp_network_main_categories' );
}
add_action( 'edit_category', 'anp_network_main_category_transient_flusher' );
add_action( 'save_post',     'anp_network_main_category_transient_flusher' );


/**
 * Add Taxonomy Filter
 */
function anp_taxonomy_filter( $taxonomy = 'category' ) {
    $taxonomy = $taxonomy;
    $terms = get_terms( $taxonomy );

    $count = count( $terms );
 
    if ( $count > 0 ): ?>
        <ul class="taxonomy-filters">
        <?php
        foreach ( $terms as $term ) {
            $term_link = get_term_link( $term, $taxonomy );
            echo '<li><a href="' . $term_link . '" class="taxonomy-filter" title="' . $term->slug . '" data-taxonomy="' . $taxonomy . '" data-term="' . $term->slug . '" data-posttype="' . get_post_type() . '">' . $term->name . '</a></li>';
        } ?>
        </ul>
    <?php endif;
}

/**
 * AJAX Get Posts Filter
 *
 * @global $_POST['term']
 * @global $_POST['taxonomy']
 * @global $_POST['post_type']
 *
 * @param string $term
 * @param string $taxonomy
 * @param string $post_type
 */
function anp_filter_get_posts( $term, $taxonomy = '', $post_type = '' ) {
 
  // Verify nonce
  if( !isset( $_POST['anp_filter_nonce'] ) || !wp_verify_nonce( $_POST['anp_filter_nonce'], 'anp_filter_nonce' ) )
    die( 'Permission denied' );
 
  $term = ( ! empty( $term ) ) ? $term : $_POST['term'];
  $taxonomy = ( ! empty( $taxonomy ) ) ? $taxonomy : $_POST['taxonomy'];
  $post_type = ( ! empty( $post_type ) ) ? $post_type : $_POST['post_type'];
 
  // WP Query
  $args = array(
    'post_type' => $post_type,
    'tax_query' => array(
      array(
      'taxonomy' => $taxonomy,
      'field'    => 'slug',
      'terms'    => $term,
      ),
    ),
  );

 
  // If taxonomy is not set, remove key from array and get all posts
  if( !$term ) {
    unset( $args['tax_query'] );
  }
 
  $query = new WP_Query( $args );
 
  if ( $query->have_posts() ) : ?>

    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

    <?php get_template_part( 'template-parts/content', $post_type ); ?>

    <?php endwhile; ?>

  <?php else : ?>

      Why not?

    <?php get_template_part( 'template-parts/content', 'none' ); ?>
 
  <?php endif;
 
  die();
}
 
add_action( 'wp_ajax_filter_posts', 'anp_filter_get_posts' );
add_action( 'wp_ajax_nopriv_filter_posts', 'anp_filter_get_posts' );
