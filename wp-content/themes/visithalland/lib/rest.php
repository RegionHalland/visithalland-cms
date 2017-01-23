<?php

/**
 * This is our callback function that embeds our phrase in a WP_REST_Response
 */
function get_feed($data) {
	// 1: Fetch all featured articles (WP-query)
	// 2: Fetch 5 latest articles from every taxonomy_segment (WP-query)
	// 3: Fetch 5 latest events (WP-query)
	// 4: Merge into assoc array
	// 5: Return assoc array
	// 6: Success

	// 1: Fetch all featured articles (WP-query)
	$post = get_post(18581);
	$featuredPost = new stdClass();
	$featuredPost->ID = $post->ID;
	$featuredPost->title = $post->post_title;
	$featuredPost->component_type = $post->post_type;
	$featuredPost->meta_fields = get_fields(18581);

	// 2: Fetch 5 latest articles from every taxonomy_segment (WP-query)
	// WP_Query arguments
	$editortip_args = array(
		'post_type'	=> array(
			'editortip',
		),
		'posts_per_page' => 6,
	);

	$editortip_query = new WP_Query( $editortip_args );

	// The Loop
	if ( $editortip_query->have_posts() ) {
		$i = 0;
		while ( $editortip_query->have_posts() ) {
			$editortip_query->the_post();

			$i++;
		}
	}
	wp_reset_postdata();




	// WP_Query arguments
	$event_args = array(
		'post_type'	=> array(
			'event',
		),
		'posts_per_page' => 6,
	);

	$event_query = new WP_Query( $event_args );

	// The Loop
	if ( $event_query->have_posts() ) {
		$i = 0;
		while ( $event_query->have_posts() ) {
			$event_query->the_post();

			$i++;
		}
	}
	wp_reset_postdata();




	// WP_Query arguments
	$meet_args = array(
		'post_type'	=> array(
			'meet',
		),
		'posts_per_page' => 6,
	);

	$meet_query = new WP_Query( $meet_args );

	// The Loop
	if ( $meet_query->have_posts() ) {
		$i = 0;
		while ( $meet_query->have_posts() ) {
			$meet_query->the_post();

			$i++;
		}
	}

	return rest_ensure_response([
			'featured_posts' => $featuredPost->meta_fields['featured'],
			'editor_tip' => $editortip_query->posts,
			'event' => $event_query->posts,
			'meet' => $meet_query->posts
		]);




	//Get available marknadssegment
	//$taxonomy_segment = get_terms('taxonomy_segment', array('hide_empty' => false));

	/*return rest_ensure_response([
		"page_count" => $pageCount,
		"taxonomy_segment" => $taxonomy_segment,
		"posts" => $postArray
	]);*/



    /*$paged = $data->get_query_params()["page"];
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

		/* Restore original Post Data 
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
	}*/
	//Unknown error
	return new WP_Error( 'unknown-error', __( 'Unknown error.', 'visithalland'), array( 'status' => 500 ) );
}


/**
 * GET single post
 */
function get_single_post($data) {
    // rest_ensure_response() wraps the data we want to return into a WP_REST_Response, and ensures it will be properly returned.
	$postSlug = $data->get_query_params()["slug"];

    // WP_Query arguments
	$args = array(
		'post_type'	=> array(
			'editortip',
			'adventure',
			'event',
			'meet',
			'list',
			'places'
		),
		'name' => $postSlug,
	);

	$the_query = new WP_Query( $args );
	if ($the_query->query['name'] == $postSlug && isset($postSlug)) {
		$post = $the_query->post;
		$post->meta_fields = get_fields($the_query->post->ID);

		if (is_array($post->meta_fields)) {
			if (array_key_exists('places', $post->meta_fields)) {
				foreach ($post->meta_fields['places'] as $key => $value) {
					$value->meta_fields = get_fields($value->ID);
				}
			}
		}

		return rest_ensure_response($post);
	}

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