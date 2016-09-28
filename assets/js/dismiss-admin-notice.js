;( function ( $, url ) {
	'use strict';

	$( function() {
		$( 'div.notice.is-dismissible' ).on( 'click', 'button.notice-dismiss', function ( e ) {
			var $notice = $( e.currentTarget ).closest( 'div.notice' );
			if ( $notice.length ) {
				$.post( url, {
					action: 'stringintelligenz-dismiss-admin-notice',
					hash: $notice.data( 'hash' ),
					nonce: $notice.data( 'nonce' )
				} );
			}
		} );
	} );
} )( jQuery, ajaxurl );
