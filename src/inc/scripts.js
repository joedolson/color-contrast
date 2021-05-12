jQuery(document).ready( function($) {
	$( '.inactive' ).hide();
	$( '.inactive input' ).attr( 'disabled', 'disabled' );
	$( '.rgb-on a' ).on( 'click', function() {  
		$(this).parent().addClass( 'active' ); 
		$( '.hex-on' ).removeClass('active'); 
		$( '.hsl-on' ).removeClass('active'); 
		$( '.hex' ).hide();
		$( '.hsl' ).hide(); 		
		$( '.rgb' ).show(); 
		$('.rgb input').removeAttr( 'disabled' );
		$( '.hex input' ).attr( 'disabled', 'disabled' );
		$( '.hsl input' ).attr( 'disabled', 'disabled' );		
	} );
	$( '.hex-on a' ).on( 'click', function() { 
		$(this).parent().addClass( 'active' ); 
		$( '.rgb-on' ).removeClass('active'); 
		$( '.hsl-on' ).removeClass('active'); 
		$( '.rgb' ).hide(); 
		$( '.hex' ).show();
		$( '.hsl' ).hide(); 		
		$('.hex input').removeAttr( 'disabled' );
		$( '.rgb input' ).attr( 'disabled', 'disabled' );
		$( '.hsl input' ).attr( 'disabled', 'disabled' );		
	} );
	$( '.hsl-on a' ).on( 'click', function() { 
		$(this).parent().addClass( 'active' ); 
		$( '.rgb-on' ).removeClass('active');
		$( '.hex-on' ).removeClass('active'); 
		$( '.rgb' ).hide();
		$( '.hex' ).hide(); 
		$( '.hsl' ).show(); 
		$('.hsl input').removeAttr( 'disabled' );
		$( '.rgb input' ).attr( 'disabled', 'disabled' );
		$( '.hex input' ).attr( 'disabled', 'disabled' );		
	} );

	$( '.invert' ).on( 'click', function() {
		var fore = $( this ).attr( 'data-fore' );
		var back = $( this ).attr( 'data-back' );
		var current = $( '.views p' ).css( 'color' );

		if ( back == current ) {
			$( '.views .view' ).css( { 
				"color": fore,
				"background-color": back
			} );			
		} else {
			$( '.views .view' ).css( { 
				"color": back,
				"background-color": fore
			} );
		}
	} );
});