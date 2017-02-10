<?php
function get_segment_detail($data) {
	$postSlug = $data->get_query_params()["slug"];

    // 1: Fetch all featured articles with slug provided (WP-query)
	// WP_Query arguments
	$args = array(
		'post_type'	=> array(
			'featured',
		),
		'name' => $postSlug,
	);

	$the_query = new WP_Query( $args );
	if ($the_query->post !== null) {
		$post = $the_query->post;
		$post->meta_fields = get_fields($the_query->post->ID);

		if (is_array($post->meta_fields)) {
			if (array_key_exists('featured', $post->meta_fields)) {
				foreach ($post->meta_fields['featured'] as $key => $value) {
					$taxonomiesArray = wp_get_post_terms($value->ID, 'taxonomy_segment', array( '' ) );
					$value->meta_fields = get_fields($value->ID);

					foreach ($taxonomiesArray as $k => $val) {
						$cover_image = get_field('cover_image', $val->taxonomy . '_' . $val->term_id);
						$title = get_field('title', $val->taxonomy . '_' . $val->term_id);
						$value->taxonomies = array(
							'name' => $val->name,
							'slug' => $val->slug,
							'cover_image' => $cover_image
						);
						$taxnomyObject = array(
							'name' => $val->name,
							'title' => $title,
							'description' => $val->description,
							'slug' => $val->slug,
							'cover_image' => $cover_image
						);
					}
				}
			}
		}

		// We also need to fetch the menu items and articles inside those items
		$taxonomiesObject = get_terms('taxonomy_segment', array('hide_empty' => false));
		$taxonomies = $taxonomiesObject;
		$postsByTaxonomy = [];
		
		foreach ($taxonomiesObject as $key => $value) {
			//if (count(get_posts_by_taxonomy($value->slug)) > 0) {
				$postsByTaxonomy["posts"][$value->slug] = get_posts_by_taxonomy($value->slug);
				$postsByTaxonomy["taxonomies"][$key] = array(
					'name' => $value->name,
					'slug' => $value->slug
				);
			//}
			//wp_die(count(get_posts_by_taxonomy($value->slug)));
		}
		
		return rest_ensure_response([
			'featured_posts' => [
					"taxonomy" => $taxnomyObject,
					"posts" => $post->meta_fields['featured']
			],
			'posts' => get_posts_by_taxonomy($postSlug),
			'events' => get_posts_type_taxonomy('event', $postSlug),
			'menu' => $postsByTaxonomy
		]);
	}

	return new WP_Error( 'unknown-error', __( 'Unknown error.', 'visithalland'), array( 'status' => 500 ) );
}


function get_feed($data) {
	// 1: Fetch all featured articles (WP-query)
	// 2: Fetch 5 latest events (WP-query)
	// 3: Fetch 5 latest articles from every taxonomy_segment (WP-query)
	// 4: Merge into assoc array
	// 5: Return assoc array
	// 6: Success

	// 1: Fetch all featured articles (WP-query)
	$post = get_post(18581);
	$featuredPost = new stdClass();
	$featuredPost->meta_fields = get_fields(18581);
	foreach ($featuredPost->meta_fields['featured'] as $key => $value) {
		$value->meta_fields = get_fields($value->ID);

		$value->taxonomies = array();
		$taxonomies = wp_get_post_terms( $value->ID, 'taxonomy_segment', array( '' ) );

		foreach ($taxonomies as $k => $val) {
			array_push($value->taxonomies, array(
					'name' => $val->name,
					'slug' => $val->slug
				)
			);
		}
	}

	// 3: Fetch 5 latest articles from every taxonomy_segment (WP-query)
	$taxonomiesObject = get_terms('taxonomy_segment', array('hide_empty' => false));
	$taxonomies = $taxonomiesObject;
	$postsByTaxonomy = [];
	
	foreach ($taxonomiesObject as $key => $value) {		
		$postsByTaxonomy["posts"][$value->slug] = get_posts_by_taxonomy($value->slug);
		/*$postsByTaxonomy[$value->slug] = new stdClass();
		$postsByTaxonomy[$value->slug] = get_posts_by_taxonomy($value->slug);
		$postsByTaxonomy[$value->slug]->tax = "test";
		$postsByTaxonomy[$key] = get_posts_by_taxonomy($value->slug);
		*/
		$postsByTaxonomy["taxonomies"][$key] = array(
				'name' => $value->name,
				'slug' => $value->slug
				//'cover_image' => $cover_image
			);
	}

	/*$taxonomies = wp_get_post_terms( $posts[$i]->ID, 'taxonomy_segment', array( '' ) );
	foreach ($taxonomies as $k => $val) {
		//$cover_image = get_field('cover_image', $val->taxonomy . '_' . $val->term_id);
		$postsByTaxonomy["taxonomies"]->taxonomies = array(
				'name' => $val->name,
				'slug' => $val->slug,
				'cover_image' => $cover_image
			);
	}*/

	




	return rest_ensure_response([
			'featured_posts' => $featuredPost->meta_fields['featured'],
			'events' => get_posts_by_type('event'),
			'posts_by_taxonomy' => $postsByTaxonomy
		]);

	//Unknown error
	return new WP_Error( 'unknown-error', __( 'Unknown error.', 'visithalland'), array( 'status' => 500 ) );
}

/*function get_taxonomy_by_slug($post_id, $taxonomy_slug) {
	$taxonomiesArray = [];
	$taxonomies = wp_get_post_terms( $post_id, $taxonomy_slug, array( '' ) );

	/*foreach ($taxonomies as $k => $val) {
		$cover_image = get_field('cover_image', $val->taxonomy . '_' . $val->term_id);
		$taxonomiesArray

		/*$taxonomiesArray[$i]->taxonomies = array(
				'name' => $val->name,
				'slug' => $val->slug,
				'cover_image' => $cover_image
			);
	}

	return $taxonomiesArray;
}*/

function get_posts_type_taxonomy($type, $taxonomy, $posts_per_page = 6) {
	$args = array(
		'post_type'	=> array(
			$type,
		),
		"taxonomy_segment" => $taxonomy,
		'posts_per_page' => $posts_per_page,
	);
	$query = new WP_Query( $args );
	// The Loop
	if ( $query->have_posts() ) {
		$i = 0;
		while ( $query->have_posts() ) {
			$query->the_post();

			$posts[$i] = new stdClass();
			$posts[$i]->ID = get_the_id();
			$posts[$i]->post_title = get_the_title();
			$posts[$i]->post_name = $query->post->post_name;
			$posts[$i]->post_type = $query->post->post_type;
			$posts[$i]->component_type = get_post_type();
			$posts[$i]->meta_fields = get_fields(get_the_id());

			$i++;
		}
	}
	wp_reset_postdata();

	return $posts;
}


function get_posts_by_type($type, $posts_per_page = 6) {
	$args = array(
		'post_type'	=> array(
			$type,
		),
		'posts_per_page' => $posts_per_page,
	);
	$query = new WP_Query( $args );
	// The Loop
	if ( $query->have_posts() ) {
		$i = 0;
		while ( $query->have_posts() ) {
			$query->the_post();

			$posts[$i] = new stdClass();
			$posts[$i]->ID = get_the_id();
			$posts[$i]->post_title = get_the_title();
			$posts[$i]->post_name = $query->post->post_name;
			$posts[$i]->post_type = $query->post->post_type;
			$posts[$i]->component_type = get_post_type();
			$posts[$i]->meta_fields = get_fields(get_the_id());

			$i++;
		}
	}
	wp_reset_postdata();

	return $posts;
}

function get_posts_by_taxonomy($taxonomy) {
	// WP_Query arguments
	$args = array(
		'post_type'	=> array(
			'editortip',
			'meet',
			'event'
		),
		"taxonomy_segment" => $taxonomy,
		'posts_per_page' => 6
	);

	$query = new WP_Query( $args );

	// The Loop
	if ( $query->have_posts() ) {
		$i = 0;
		while ( $query->have_posts() ) {
			$query->the_post();

			$posts[$i] = new stdClass();
			$posts[$i]->ID = get_the_id();
			$posts[$i]->post_title = get_the_title();
			$posts[$i]->post_name = $query->post->post_name;
			$posts[$i]->post_type = $query->post->post_type;
			$posts[$i]->component_type = get_post_type();
			$posts[$i]->meta_fields = get_fields(get_the_id());

			//$posts[$i]->taxonomies = array();
			$taxonomies = wp_get_post_terms( $posts[$i]->ID, 'taxonomy_segment', array( '' ) );

			foreach ($taxonomies as $k => $val) {
				$cover_image = get_field('cover_image', $val->taxonomy . '_' . $val->term_id);
				$posts[$i]->taxonomies = array(
						'name' => $val->name,
						'slug' => $val->slug,
						'cover_image' => $cover_image
					);
			}
			$i++;
		}
	}

	wp_reset_postdata();
	return $posts;
}


/**
 * GET single post
 */
function get_single_post($data) {
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
	if ($the_query->post !== null) {
		$post = $the_query->post;		
		$post->meta_fields = get_fields($the_query->post->ID);

		if (is_array($post->meta_fields)) {
			if (is_array($post->meta_fields["places"])) {
				foreach ($post->meta_fields['places'] as $key => $value) {
					$value->meta_fields = get_fields($value->ID);
				}
			}

			if (is_array($post->meta_fields["related"])) {
				foreach ($post->meta_fields['related'] as $key => $value) {
					$value->meta_fields = get_fields($value->ID);
				}
			}
		}
		
		// We also need to fetch the menu items and articles inside those items
		$taxonomiesObject = get_terms('taxonomy_segment', array('hide_empty' => false));
		$taxonomies = $taxonomiesObject;
		$postsByTaxonomy = [];
		
		foreach ($taxonomiesObject as $key => $value) {		
			$postsByTaxonomy["posts"][$value->slug] = get_posts_by_taxonomy($value->slug);
			$postsByTaxonomy["taxonomies"][$key] = array(
					'name' => $value->name,
					'slug' => $value->slug
				);
		}

		return rest_ensure_response([
			"post" => $post,
			'menu' => $postsByTaxonomy
		]);
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
    register_rest_route( 'halland/v1', 'segment', array(
		'methods' => 'GET',
		'callback' => 'get_segment_detail',
	) );

	// register_rest_route() handles more arguments but we are going to stick to the basics for now.
    register_rest_route( 'halland/v1', 'post/', array(
		'methods' => 'GET',
		'callback' => 'get_single_post',
	) );
}
 
add_action( 'rest_api_init', 'prefix_register_example_routes' );
?>