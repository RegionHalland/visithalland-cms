<?php

/*function vh_best_of_callback($data) {
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
	}

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
}*/

function vh_landing_callback($data) {
	$data["id"] = 12;
	$page = get_post($data["id"]);
	$page->meta_fields = get_fields($page->ID);
	$menu = vh_get_menu_by_name("Huvudmeny");

	return rest_ensure_response([
			"page" 	=> $page,
			"menu" 	=> $menu,
			"seo"	=> array(
				"title" 		=> $page->post_title,
				"description"	=> get_field("excerpt", $page->ID),
				"keywords"		=> WPSEO_Meta::get_value('focuskw', $page->ID)
			)
		]
	);
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
		$the_query->post->author = vh_get_author($the_query->post->post_author);
		
		/*if (is_array($the_query->post->meta_fields["featured"])) {
			foreach ($the_query->post->meta_fields["featured"] as $key => $value) {
				//$the_query->post->meta_fields["featured"][$key]->meta_fields = get_fields($value->ID);
				//$value->meta_fields["featured"] = vh_get_author($value->post_author);
				//$value["meta_fields"] = "asd";				
				//array_push($value->author, array("author" => "asd"));
				//$value->meta_fields->test = new stdClass();
				//$the_query->post->meta_fields["featured"][$key]->meta_fields["test"] = "dlas";
				//$value->meta_fields = "adsasdash";
			}
		}*/

		/*if (is_array($the_query->post->meta_fields["best_of"])) {
			foreach ($the_query->post->meta_fields["best_of"] as $key => $value) {
				$the_query->post->meta_fields["best_of"][$key]->meta_fields = get_fields($value->ID);
				$value->meta_fields["author"] = vh_get_author($value->post_author);
			}
		}*/

		if (is_array($the_query->post->meta_fields["featured"])) {
			foreach ($the_query->post->meta_fields["featured"] as $key => $value) {
				$the_query->post->meta_fields["featured"][$key]->meta_fields = get_fields($value->ID);
				$the_query->post->meta_fields["featured"][$key]->author = vh_get_author($value->post_author);
			}
		}

		//$featuredTemp = array_slice(get_field("featured", get_post(get_post_meta( $the_query->post->ID, '_menu_item_object_id', true ))), 0, 3);
		//$featuredTemp = get_field("featured", get_post(get_post_meta( $the_query->post->ID, '_menu_item_object_id', true )));
		/*$featured = [];

		foreach ($featuredTemp as $k => $val) {
			$featured[$k] = $val;
			$featured[$k]->author = vh_get_author($val->post_author);
			$featured[$k]->meta_fields = get_fields($val->ID);
		}*/

		return rest_ensure_response([
			"page" 	=> $the_query->post,
			//"featured" => $featuredTemp,
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

	//Get mentioned meta fields
	if (is_array($post->meta_fields["mentioned"])) {
		foreach ($post->meta_fields["mentioned"] as $key => $value) {
			$value->meta_fields = get_fields($value->ID);
		}
	}

	//Get tips meta fields if we have a meet a local
	if (is_array($post->meta_fields["tips"])) {
		foreach ($post->meta_fields["tips"] as $key => $value) {
			//$value->meta_fields = get_fields($value["tip"]->ID);
			$value["tip"][0]->meta_fields = get_fields($value["tip"][0]->ID);
		}
	}

	//Remove drafts from the stops object
	if (is_array($post->meta_fields["stops"])) {
		foreach ($post->meta_fields["stops"] as $key => $value) {
			if ($value->post_status == "draft") {
					unset($post->meta_fields["stops"][$key]);
			}
		}
		$post->meta_fields["stops"] = array_values($post->meta_fields["stops"]);
	}

	//Add post author
	$post->meta_fields["author"] = vh_get_author($post->post_author);
	

	return rest_ensure_response([
		"post" => $post,
		"menu" => vh_get_menu_by_name("Huvudmeny"),
		"further_reading" 	=> vh_get_further_reading_by_taxonomy_concept($post->ID),
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


function vh_post_in_concept_callback($data) {
	$post_path = $data["post_path"];
	$post_type = explode("/", $post_path)[0];
	$post_slug = explode("/", $post_path)[1];
	$paged = ( $data["page"] ) ? $data["page"] : 1;
	$post = get_page_by_path( $post_slug, OBJECT, $post_type);

	$terms = wp_get_post_terms($post_id, 'taxonomy_concept', array( '' ) );
	$tax_query = array();
	$posts = get_posts(array(
	  'post_type' => array(
	  		"meet_local",
			"editor_tip",
			"trip",
			"happening"
	  ),
	  'numberposts'  => 1,
	  'paged'        => $paged,
	  'exclude' 	 => array($post_id),
	  'tax_query' 	 => $tax_query
	));

	return rest_ensure_response([
		"post" => $posts[0],
		"menu" => vh_get_menu_by_name("Huvudmeny"),
		"further_reading" 	=> vh_get_further_reading_by_taxonomy_concept($posts[0]->ID),
		"seo"	=> array(
			"title" 		=> $posts[0]->post_title,
			"description"	=> get_field("excerpt", $posts[0]->ID),
			"keywords"		=> WPSEO_Meta::get_value('focuskw', $posts[0]->ID)
		)]
		);
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
		$value->author = vh_get_author($value->post_author);
	}
	return $posts;
}

function vh_get_posts_by_taxonomy_concept_sort_by_featured($post_id, $numberposts = 3) {
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
		'numberposts'  	=> $numberposts,
		'exclude'		=> array($post_id),
		'tax_query'		=> $tax_query,
		//This might be a solution, for sorting by featured
		/*'meta_key' 	=> 'featured',
		'orderby' 	=> 'meta_value_num'*/
	));

	foreach ($posts as $key => $value) {
		$value->meta_fields = get_fields($value->ID);
		$value->meta_fields["author"] = vh_get_author($value->post_author);
	}

	return $posts;
}

function vh_get_further_reading_by_taxonomy_concept($post_id, $numberposts = 20) {
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
	shuffle($posts);

	return array_slice($posts, 0, 3);
}

function vh_get_menu_by_name($menu_name) {
	$menu = wp_get_nav_menu_items( $menu_name, array() );
	$menuArray = array();
	foreach ($menu as $key => $value) {
		$slugArray = explode("/", $value->url);
		if (count($slugArray) > 2) {
			$slug = $slugArray[3];
			$featuredTemp = array_slice(get_field("featured", get_post(get_post_meta( $value->ID, '_menu_item_object_id', true ))), 0, 2);
			$featured = [];

			foreach ($featuredTemp as $k => $val) {
				$featured[$k] = $val;
				$featured[$k]->author = vh_get_author($val->post_author);
				$featured[$k]->meta_fields = get_fields($val->ID);
			}

			array_push($menuArray, array(
					"ID" 			=> $value->ID,
					"post_title" 	=> $value->title,
					"post_name" 	=> get_post(get_post_meta( $value->ID, '_menu_item_object_id', true ))->post_name,
					"featured"		=> $featured,
					"excerpt" 		=> get_field( 'excerpt', get_post(get_post_meta( $value->ID, '_menu_item_object_id', true )) ),
					"cover_image" 	=> get_field("cover_image", get_post(get_post_meta( $value->ID, '_menu_item_object_id', true ))),
					"cover_video" 	=> get_field("cover_video", get_post(get_post_meta( $value->ID, '_menu_item_object_id', true ))),
					"cover_video_safari" 	=> get_field("cover_video_safari", get_post(get_post_meta( $value->ID, '_menu_item_object_id', true )))
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