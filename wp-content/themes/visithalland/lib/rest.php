<?php

/**
 * This is our callback function that embeds our phrase in a WP_REST_Response
 */
function get_feed($data) {
    // rest_ensure_response() wraps the data we want to return into a WP_REST_Response, and ensures it will be properly returned.
    $paged = $data->get_query_params()["page"];
    $taxonomies_query = $data->get_query_params()['taxonomies'];
    $taxonomies = explode(',', $taxonomies_query);
    if ($taxonomies[0] != "") {
    	$tax_query = array(
			array(
				'taxonomy' => 'taxonomy_segment',
				'field' => 'slug',
				'terms' => $taxonomies
			)
		);
    } else {
		$tax_query = '';
    }

    $langCode = $data->get_query_params()["lang"];
	$postArray = array();

	// WP_Query arguments
	$args = array(
		'post_type'	=> array(
			'editortip',
			'adventure',
			'event',
			'meet',
			'list'
		),
		'posts_per_page' => 6,
		'paged' => $paged,
		'tax_query' => $tax_query
		//'taxonomy_segment' => ,
		//TODO: Fix multi lang
		//'lang' => $langCode
	);

	$the_query = new WP_Query( $args );

	// The Loop
	if ( $the_query->have_posts() ) {
		$i = 0;
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

			$postArray[$i] = new stdClass(); 
			$postArray[$i]->ID = get_the_id();
			$postArray[$i]->title = get_the_title();
			$postArray[$i]->component_type = get_post_type();
			
			//Fetch meta fields
			$postArray[$i]->meta_fields = get_fields(get_the_id());

			//Fetch places relationships and place meta_fields
			if (is_array($postArray[$i]->meta_fields)) {
				if (array_key_exists('places', $postArray[$i]->meta_fields)) {
					foreach ($postArray[$i]->meta_fields['places'] as $key => $value) {
						$value->meta_fields = get_fields($value->ID);
					}
				}
			}

			$i++;
		}

		/* Restore original Post Data */
		wp_reset_postdata();

		//Get number of pages, used for paging
		$pageCount = $the_query->max_num_pages;

		//Get available marknadssegment
		$taxonomy_segment = get_terms('taxonomy_segment', array('hide_empty' => false));

		return rest_ensure_response([
			"page_count" => $pageCount,
			"taxonomy_segment" => $taxonomy_segment,
			"posts" => $postArray
		]);
	} else {
		// no posts found
		return new WP_Error( 'no-post-found', __( 'No posts found.', 'visithalland'), array( 'status' => 500 ) );
	}
	//Unknown error
	return new WP_Error( 'unknown-error', __( 'Unknown error.', 'visithalland'), array( 'status' => 500 ) );
}


/**
 * GET single post
 */
function get_single_post($data) {
    // rest_ensure_response() wraps the data we want to return into a WP_REST_Response, and ensures it will be properly returned.
    wp_reset_postdata();
	$postID = $data->get_query_params()["id"];
	$post = get_post($postID);
	$post->meta_fields = get_fields($postID);

	if (is_array($post->meta_fields)) {
		if (array_key_exists('places', $post->meta_fields)) {
			foreach ($post->meta_fields['places'] as $key => $value) {
				$value->meta_fields = get_fields($value->ID);
			}
		}
	}

	return rest_ensure_response($post);

	//Unknown error
	return new WP_Error( 'unknown-error', __( 'Unknown error.', 'visithalland'), array( 'status' => 500 ) );
}
 
/**
 * This function is where we register our routes for our example endpoint.
 */
function prefix_register_example_routes() {
    // register_rest_route() handles more arguments but we are going to stick to the basics for now.
    register_rest_route( 'halland/v1', 'feed', array(
		'methods' => 'GET',
		'callback' => 'get_feed',
	) );

	// register_rest_route() handles more arguments but we are going to stick to the basics for now.
    register_rest_route( 'halland/v1', 'post/', array(
		'methods' => 'GET',
		'callback' => 'get_single_post',
	) );
}
 
add_action( 'rest_api_init', 'prefix_register_example_routes' );
?>