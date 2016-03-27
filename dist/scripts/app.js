( function( $ ) {    
    $('.taxonomy-filter').click( function(event) {
 
        event.preventDefault();

        // Get tag slug from title attirbute
        var selected_taxonomy = $(this).data('taxonomy');
        var selected_term = $(this).data('term');
        var selected_post_type = $(this).data('posttype');

        $('.active').not(this).removeClass('active');
        $(this).toggleClass('active');
 
        data = {
            action: 'filter_posts', // function to execute
            anp_filter_nonce: anp_filter_vars.anp_filter_nonce, // wp_nonce
            taxonomy: selected_taxonomy,
            term: selected_term, // selected tag
            post_type: selected_post_type,
            };
 
        $.post( anp_filter_vars.anp_filter_ajax_url, data, function(response) {
 
            if( response ) {
                // Display posts on page
                $('.entries-list').html( response );

            };
        });
 
    });
} )( jQuery );
