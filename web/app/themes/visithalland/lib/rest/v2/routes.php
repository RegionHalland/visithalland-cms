<?php

//Remove CORS support / Enable it on NGINX instead - for microcaching support
add_action( 'rest_api_init', function() {    
	remove_filter( 'rest_pre_serve_request', 'rest_send_cors_headers' );
}, 15 );

/**
 * Register our rest routes
*/
function visithalland_register_v2_routes() {
	register_rest_route( 'visit/v2', 'landing', array(
		'methods' => 'GET',
		'callback' => 'vh_v2_landing_callback',
	) );

	register_rest_route( 'visit/v2', 'page', array(
		'methods' => 'GET',
		'callback' => 'vh_v2_page_callback',
	) );
}

add_action( 'rest_api_init', 'visithalland_register_v2_routes' );
?>