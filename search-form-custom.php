<?php 

if( is_post_type_archive() ) :
    $queried_object = get_queried_object();
    $post_type = $queried_object->query_var;
    $search_items = $queried_object->labels->search_items;
elseif( is_tax() ) :
    $queried_taxonomy = get_query_var( 'taxonomy' );
    $tax_object = get_taxonomy( $queried_taxonomy );
    $post_type = $tax_object->object_type;
    $post_type_object = get_post_type_object( $post_type[0] );
    $search_items = $post_type_object->labels->search_items;
endif;

?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'anp-network-main' ); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo ( ! empty( $search_items ) ) ? $search_items . ' ...' : 'Search ...' ; ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
        <?php if( ! empty( $post_type ) ) : ?>
        <input type="hidden" value="<?php echo $post_type; ?>" name="post_type" id="post_type" />
        <?php endif; ?>
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'anp-network-main' ); ?>">
</form>