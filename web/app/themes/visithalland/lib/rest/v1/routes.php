<?php

/**
 * Register our rest routes
 */

function visithalland_register_v1_routes() {
	// Register routes
    register_rest_route( 'visit/v1', 'landing', array(
		'methods' => 'GET',
		'callback' => 'vh_landing_callback',
	) );

	register_rest_route( 'visit/v1', 'posts', array(
		'methods' => 'GET',
		'callback' => 'vh_posts_by_type_callback',
	) );

	register_rest_route( 'visit/v1', 'page', array(
		'methods' => 'GET',
		'callback' => 'vh_page_callback',
	) );

	register_rest_route( 'visit/v1', 'post', array(
		'methods' => 'GET',
		'callback' => 'vh_post_callback',
	) );

	register_rest_route( 'visit/v1', 'post_in_concept', array(
		'methods' => 'GET',
		'callback' => 'vh_post_in_concept_callback',
	) );

	register_rest_route( 'visit/v1', 'remove_old_happenings', array(
		'methods' => 'GET',
		'callback' => 'vh_remove_old_happenings_callback',
	) );

}
 
add_action( 'rest_api_init', 'visithalland_register_v1_routes' );
?>