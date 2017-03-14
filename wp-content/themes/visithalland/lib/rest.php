<?php

function vh_best_of_callback($data) {
	$getPage = get_post($data["id"]);
	$page["ID"] = $getPage->ID;
	$page["post_title"] = $getPage->post_title;
	$page["post_name"] = $getPage->post_name;
	$page["post_type"] = $getPage->post_type;
	$page["cover_video"] = get_field("cover_video", $getPage->ID);
	$page["excerpt"] = get_field("excerpt", $getPage->ID);
	//$best_of = vh_get_menu_by_name("Best of Coastal Living");

	$posts = get_posts(array(
		  'post_type' => array(
		  		"meet_local",
				"editor_tip",
				"trip",
				"happening"
		  ),
	  	'numberposts'  => -1,
	  )
	);

	foreach ($posts as $key => $value) {
		$value->meta_fields = get_fields($value->ID);
		$value->meta_fields["author"] = vh_get_author($value->post_author);
	}

	/*foreach ($best_of as $key => $value) {
		$best_of[$key]["featured"] = get_field("featured", vh_get_page_by_path("best-of-coastal-living/" . $value["post_name"])->ID);
	}*/

	return rest_ensure_response([
		"page" => $page,
		"posts" => $posts,
		"menu" => vh_get_menu_by_name("Huvudmeny"),
		"breadcrumbs" =>
			array(
				array(
					"title" => $getPage->post_title,
					"slug"	=> $getPage->post_name,
				)
			),
		"seo"	=> array(
			"title" 		=> $getPage->post_title,
			"description"	=> get_field("excerpt", $getPage->ID),
			"keywords"		=> WPSEO_Meta::get_value('focuskw', $getPage->ID)
		)
	]);
}

function vh_posts_by_type_callback($data) {
	$post_type = array();

	if($data["post_type"] == "local_story") {
		$post_type = array(
			"meet_local",
			"editor_tip"
		);
		$data["post_type"] = "local_story";
	} else {
		$post_type = array($data["post_type"]);
	}
	$page_number = $data["page_number"];
	$paged = ( $page_number ) ? $page_number : 1;

    // Fetch 10 posts by post_type (WP-query)
	$args = array(
		'post_type'	=> $post_type,
		'posts_per_page' => 10,
		'paged' => $paged
	);

    // The Query
	$the_query = new WP_Query( $args );
	// Create array to hold posts
	$posts = [];

	// The Loop
	if ( $the_query->have_posts() ) {
		$i = 0;
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$posts[$i]["ID"] = get_the_id();
			$posts[$i]["post_title"] = get_the_title();
			$posts[$i]["post_name"] = $the_query->posts[$i]->post_name;
			$posts[$i]["post_type"] = $the_query->posts[$i]->post_type;
			$posts[$i]["meta_fields"] = get_fields($the_query->get_the_id());
			$posts[$i]["meta_fields"]["author"] = vh_get_author(get_the_author_meta('ID'));

			$i++;
		}

		// Restore original Post Data
		wp_reset_postdata();

		$page = vh_get_page_by_path($data["post_type"]);
		$page->meta_fields = get_fields($page->ID);

		return rest_ensure_response([
			"page" 	=> $page,
			"posts" => $posts,
			"menu" 	=> vh_get_menu_by_name("Huvudmeny"),
			"seo"	=> array(
				"title" 		=> vh_get_page_by_path($data["post_type"])->post_title,
				"description"	=> get_field("excerpt", vh_get_page_by_path($data["post_type"])->ID),
				"keywords"		=> WPSEO_Meta::get_value('focuskw', vh_get_page_by_path($data["post_type"])->ID)
			)
		]);
	} else {
		// No posts found
		return new WP_Error( 'unknown-error', __( 'Unknown error.', 'visithalland'), array( 'status' => 500 ) );
	}
}

function vh_page_callback($data) {
	$page_slug = $data["page_slug"];
	$breadcrumbs = array();
	if ($page_slug == "best-of-coastal-living") {
		$the_query = new WP_Query( array( 'pagename' => $page_slug) );	
		$breadcrumbs = array(array("title" => $the_query->post->post_title, "slug" => "best-of-coastal-living"));
	} else {
		$the_query = new WP_Query( array( 'pagename' => 'best-of-coastal-living/' . $page_slug ) );
		$breadcrumbs = get_breadcrumb($the_query->post);
	}
	

	// The Loop
	if ( $the_query->have_posts() ) {
		$the_query->post->meta_fields = get_fields($the_query->post->ID);
		if (is_array($the_query->post->meta_fields["best_of"])) {
			foreach ($the_query->post->meta_fields["best_of"] as $key => $value) {
				$the_query->post->meta_fields["best_of"][$key]->meta_fields = get_fields($value->ID);
				$value->meta_fields["author"] = vh_get_author($value->post_author);
			}
		}

		return rest_ensure_response([
			"page" 	=> $the_query->post,
			"posts" => vh_get_posts_by_taxonomy_concept($the_query->post->ID, -1),
			"menu" 	=> vh_get_menu_by_name("Huvudmeny"),
			"seo"	=> array (
				"title" 		=> $the_query->post->post_title,
				"description"	=> get_field("excerpt", vh_get_page_by_path($post_type)->ID),
				"keywords"		=> WPSEO_Meta::get_value('focuskw', $the_query->post->ID)
			),
			"breadcrumbs" => $breadcrumbs
		]);

		wp_reset_postdata();
	} else {
		// no posts found
		return new WP_Error( 'unknown-error', __( 'Unknown error.', 'visithalland'), array( 'status' => 500 ) );
	}
}

/**
 * Get post by path
 *
 * @param     string $data    Path to post, ex: happening/hallifornia
 *
 * @return    object
 */
function vh_post_callback($data) {
	$post_path = $data["post_path"];
	$post_type = explode("/", $post_path)[0];
	$post_slug = explode("/", $post_path)[1];

	$post = get_page_by_path( $post_slug, OBJECT, $post_type);
	$post->meta_fields = get_fields($post->ID);

	//Get stops meta fields if we have a trip
	if (is_array($post->meta_fields["stops"])) {
		foreach ($post->meta_fields["stops"] as $key => $value) {
			$value->meta_fields = get_fields($value->ID);
		}
	}

	return rest_ensure_response([
		"post" => $post,
		"menu" => vh_get_menu_by_name("Huvudmeny"),
		"further_reading" 	=> vh_get_posts_by_taxonomy_concept($post->ID),
		"seo"	=> array(
			"title" 		=> $post->post_title,
			"description"	=> get_field("excerpt", $post->ID),
			"keywords"		=> WPSEO_Meta::get_value('focuskw', $post->ID)
		),
		"breadcrumbs" => array(
			array(
				"title" => wp_get_post_terms($post->ID, 'taxonomy_concept', array( '' ) )[0]->name,
				"slug"	=> wp_get_post_terms($post->ID, 'taxonomy_concept', array( '' ) )[0]->slug,
			),
			array(
				"title" => $post->post_title,
				"slug"	=> $post->post_name,
			)
		)
	]);
}




/* Generic methods */

function vh_get_page_by_path($page_path) {
	return get_page_by_path( $page_path, OBJECT, 'page' );
}

function vh_get_posts_by_taxonomy_concept($post_id, $numberposts = 3) {
	$terms = wp_get_post_terms($post_id, 'taxonomy_concept', array( '' ) );
	$tax_query = array();

	//If coastal living
	if ($post_id != 12) {
		$tax_query = array(
	  		array(
		      'taxonomy' => 'taxonomy_concept',
		      'field' 	 => 'id',
		      'terms'	 => $terms[0]->term_id, // Where term_id of Term 1 is "1".
		      'include_children' => false
		    )
	  	);
	}
	$posts = get_posts(array(
	  'post_type' => array(
	  		"meet_local",
			"editor_tip",
			"trip",
			"happening"
	  ),
	  'numberposts'  => $numberposts,
	  'exclude' 	 => array($post_id),
	  'tax_query' 	 => $tax_query
	));

	foreach ($posts as $key => $value) {
		$value->meta_fields = get_fields($value->ID);
		$value->meta_fields["author"] = vh_get_author($value->post_author);
	}
	return $posts;
}

function vh_get_menu_by_name($menu_name) {
	$menu = wp_get_nav_menu_items( $menu_name, array() );
	$menuArray = array();
	foreach ($menu as $key => $value) {
		$slugArray = explode("/", $value->url);
		if (count($slugArray) > 2) {
			$slug = $slugArray[3];
			array_push($menuArray, array(
					"ID" 			=> $value->ID,
					"post_title" 	=> $value->title,
					"post_name" 	=> get_post(get_post_meta( $value->ID, '_menu_item_object_id', true ))->post_name,
					"excerpt" 		=> get_field( 'excerpt', get_post(get_post_meta( $value->ID, '_menu_item_object_id', true )) ),
					"cover_image" 	=> get_field("cover_image", get_post(get_post_meta( $value->ID, '_menu_item_object_id', true )))
				)
			);
		}
	}
	return $menuArray;
}

/* GET AUTHOR */
function vh_get_author($author_id) {
	return array(
		"ID" => $author_id,
		"name" => get_user_by( "id", $author_id)->data->display_name,
		"role" => get_field('role', 'user_'.$author_id),
		"profile_image" => get_field('profile_image', 'user_'.$author_id)
	);
}

/* Get breadcrumbs for the page/post */
function get_breadcrumb($post) {
	 $breadcrumbs = array();
     $page_title = get_the_title($post->ID);

     if($post->post_parent) {
     $parent_id = $post->post_parent;
     
     /*while ($parent_id) {
         $page = get_page($parent_id);
         array_push($breadcrumbs, array(
         		"title" => get_the_title($page->ID),
         		"slug" 	=> $page->post_name
         	)
         );
         $parent_id = $page->post_parent;
     }*/
 	
 	array_push($breadcrumbs, array(
     		"title" => $page_title,
     		"slug" 	=> $post->post_name
     	));
     }
     
     return $breadcrumbs; 
}

/**
 * Register our rest routes
 */
function visithalland_register_routes() {
	// Register route
    register_rest_route( 'visit/v1', 'bestof', array(
		'methods' => 'GET',
		'callback' => 'vh_best_of_callback',
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

    // Register route
    /*register_rest_route( '/v1', 'feed', array(
		'methods' => 'GET',
		'callback' => 'get_feed',
	) );

	// Register route
    register_rest_route( '/v1', 'segment', array(
		'methods' => 'GET',
		'callback' => 'get_segment_detail',
	) );

	// Register route
    register_rest_route( '/v1', 'post/', array(
		'methods' => 'GET',
		'callback' => 'get_single_post',
	) );*/
}
 
add_action( 'rest_api_init', 'visithalland_register_routes' );
?>



<?php
/*function get_segment_detail($data) {
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
			$postsByTaxonomy["posts"][$value->slug] = get_posts_by_taxonomy($value->slug, 3);
			$title = get_field('title', $val->taxonomy . '_' . $val->term_id);
			$postsByTaxonomy["taxonomies"][$key] = array(
				'name' => $value->name,
				'slug' => $value->slug,
				'title' => $title,
				'description' => $val->description,
				'cover_image' => $cover_image
			);
		}
		
		return rest_ensure_response([
			'featured_posts' => [
					"taxonomy" => $taxnomyObject,
					"posts" => $post->meta_fields['featured']
			],
			'posts' => get_posts_by_taxonomy($postSlug, 30),
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
		$postsByTaxonomy["posts"][$value->slug] = get_posts_by_taxonomy($value->slug, 3);
		$cover_image = get_field('cover_image', $value->taxonomy . '_' . $value->term_id);
		$title = get_field('title', $value->taxonomy . '_' . $value->term_id);

		$postsByTaxonomy["taxonomies"][$key] = array(
				'name' => $value->name,
				'slug' => $value->slug,
				'title' => $title,
				'description' => $value->description,
				'cover_image' => $cover_image
			);
	}

	return rest_ensure_response([
			'featured_posts' => $featuredPost->meta_fields['featured'],
			'events' => get_posts_by_type('event'),
			'posts_by_taxonomy' => $postsByTaxonomy
		]);

	//Unknown error
	//return new WP_Error( 'unknown-error', __( 'Unknown error.', 'visithalland'), array( 'status' => 500 ) );
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

/*function get_posts_type_taxonomy($type, $taxonomy, $posts_per_page = 6) {
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
}*/


/*function get_posts_by_type($type, $posts_per_page = 6) {
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
}*/

/*function get_posts_by_taxonomy($taxonomy, $posts_per_page = 6) {
	// WP_Query arguments
	$args = array(
		'post_type'	=> array(
			'editortip',
			'meet',
			'event',
			'places'
		),
		"taxonomy_segment" => $taxonomy,
		'posts_per_page' => $posts_per_page
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
				$title = get_field('title', $value->taxonomy . '_' . $value->term_id);
				$posts[$i]->taxonomies = array(
						'name' => $val->name,
						'slug' => $val->slug,
						'cover_image' => $cover_image,
						'title' => $title,
						'description' => $value->description,
					);
			}
			$i++;
		}
	}

	wp_reset_postdata();
	return $posts;
}*/


/**
 * GET single post
 */
/*
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
			$postsByTaxonomy["posts"][$value->slug] = get_posts_by_taxonomy($value->slug, 3);
			$cover_image = get_field('cover_image', $value->taxonomy . '_' . $value->term_id);
			$title = get_field('title', $value->taxonomy . '_' . $value->term_id);
			$postsByTaxonomy["taxonomies"][$key] = array(
				'name' => $value->name,
				'slug' => $value->slug,
				'title' => $title,
				'description' => $value->description,
				'cover_image' => $cover_image
			);
		}

		return rest_ensure_response([
			"post" => $post,
			'menu' => $postsByTaxonomy
		]);
	}

	//Unknown error
	return new WP_Error( 'unknown-error', __( 'Unknown error.', 'visithalland'), array( 'status' => 500 ) );
}*/
?>