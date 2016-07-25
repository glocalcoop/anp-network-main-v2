( function( $ ) {    
    $('.taxonomy-filters .cat-item-all a').addClass('active');

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

        console.log('data', data);
 
        $.post( anp_filter_vars.anp_filter_ajax_url, data, function(response) {
 
            if( response ) {
                // Display posts on page
                $('.entries-list').html( response );

            };
        });
 
    });

    $('.taxonomy-filters .cat-item-all a').click( function(event) {
        $(this).addClass('active');
        $('.active').not(this).removeClass('active');
    } );

    $('.site-main .search-submit').click( function(event) {
 
        event.preventDefault();

        // Get post_type from localized data
        var selected_post_type = anp_search_vars.anp_post_type;
        var selected_keyword = $(this).parents('form').find('.search-field').val();
 
        data = {
            action: 'search_posts', // function to execute
            anp_search_nonce: anp_search_vars.anp_search_nonce, // wp_nonce
            post_type: selected_post_type,
            s: selected_keyword,
        };
 
        $.post( anp_search_vars.anp_search_ajax_url, data, function(response) {
 
            if( response ) {
                // Display posts on page
                $('.entries-list').html( response );

            };
        });
 
    });
} )( jQuery );

/**
 * BP Docs
 * Fix bad JS handling of hide/show 
 *
 */
( function( $ ) {
    $( '#toggle-folders-hide' ).click( function( event ) {
        event.preventDefault();
        $( this ).removeAttr( 'style' ).attr( 'aria-expanded', 'false' ).removeClass( 'show' ).addClass( 'hide' );
        $( '#toggle-folders-show' ).removeAttr( 'style' ).attr( 'aria-expanded', 'true' ).removeClass( 'hide' ).addClass( 'show' );
    } );
    $( '#toggle-folders-show' ).click( function( event ) {
        event.preventDefault();
        $( this ).removeAttr( 'style' ).attr( 'aria-expanded', 'false' ).removeClass( 'show' ).addClass( 'hide' );
        $( '#toggle-folders-hide' ).removeAttr( 'style' ).attr( 'aria-expanded', 'true' ).removeClass( 'hide' ).addClass( 'show' );
    } );
} )( jQuery );
