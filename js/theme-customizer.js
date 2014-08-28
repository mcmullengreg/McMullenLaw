/** 
 * This file adds LIVE updates to the Theme Customizer live previewer
 */
 
 ( function( $ ) {
	 // Header Updates
	 wp.customize( 'blogname', function ( value ) {
		 value.bind( function( newval ) {
			 $( '#site-title a' ).html( newval );
		 } );
	 } );
	 
	 wp.customize( 'blogdescription', function( value ) {
		 value.bind( function( newval ){
			 $( '.site-description' ).html( newval );
		 } );
	 } );
	 
	 wp.customize( 'service_location', function( value ) {
		 value.bind( function( newval ){
			 $( '.service-location' ).html( newval );
		 } );
	 } );
	 
	 // Hero updates - doesn't work yet!
	 wp.customize( 'hero_height', function( value ) {
		 value.bind( function( newval ){
			 $( 'body .hero' ).css('height', newval).appendTo("style");
		 });
	 } );
	 
	 // Footer updates
	 wp.customize( 'advertisement_disclaimer', function( value ) {
		 value.bind( function( newval ){
			 $( '.advertisement-disclaimer' ).html( newval );
		 } );
	 } );
	 wp.customize( 'site_disclaimer_page', function( value ) {
		 value.bind( function( newval ){
			 $( '.site-disclaimer a' ).attr('href', newval );
		 } );
	 } );
	 
	 wp.customize( 'site_disclaimer_text', function( value ) {
		 value.bind( function( newval ){
			 $( '.site-disclaimer a' ).html( newval );
		 } );
	 } );
} ) ( jQuery );