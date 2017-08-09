<?php
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

		if (is_array($the_query->post->meta_fields["featured"])) {
			foreach ($the_query->post->meta_fields["featured"] as $key => $value) {
				$the_query->post->meta_fields["featured"][$key]->meta_fields = get_fields($value->ID);
				$the_query->post->meta_fields["featured"][$key]->author = vh_get_author($value->post_author);
			}
		}

		return rest_ensure_response([
			"page" 	=> $the_query->post,
			//"featured" => $featuredTemp,
			"posts" => vh_get_posts_by_taxonomy_concept($the_query->post->ID, -1),
			"meet_local" => vh_get_meet_local_by_taxonomy_concept($the_query->post->ID, 2),
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
	if($post) {
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
		
		$post->taxonomy = array(
						"title" => wp_get_post_terms($post->ID, 'taxonomy_concept', array( '' ) )[0]->name,
						"slug"	=> wp_get_post_terms($post->ID, 'taxonomy_concept', array( '' ) )[0]->slug
					);

		return rest_ensure_response([
			"post" => $post,
			"menu" => vh_get_menu_by_name("Huvudmeny"),
			"next_article" => vh_get_next_article($post),
			"further_reading" 	=> vh_get_further_reading_by_taxonomy_concept($post->ID),
			"seo" => array(
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

	//No posts found
	return new WP_Error( 'post-not-found', __( 'No post found.', 'visithalland'), array( 'status' => 404 ) );
}


function vh_post_in_concept_callback($data) {
	$post_path = $data["post_path"];
	$post_type = explode("/", $post_path)[0];
	$post_slug = explode("/", $post_path)[1];
	$paged = ( $data["page"] ) ? $data["page"] : 1;
	$post = get_page_by_path( $post_slug, OBJECT, $post_type);

	$terms = wp_get_post_terms($post->ID, 'taxonomy_concept', array( '' ) );
	$tax_query = array(
		array(
			'taxonomy' => 'taxonomy_concept',
			'field' 	 => 'id',
			'terms'	 => $terms[0]->term_id, // Where term_id of Term 1 is "1".
			'include_children' => false
		)
	);

	$posts = get_posts(array(
		'post_type' => array(
			"meet_local",
			"editor_tip",
			"trip",
			"happening"
		),
		'numberposts'  	=> 1,
		'paged'        	=> $paged,
		'exclude' 	 	=> array($post->ID),
		'tax_query' 	=> $tax_query
	));

	if (count($posts) === 1) {
		//We have one post
		$posts[0]->meta_fields = get_fields($posts[0]->ID);
		//Add post author
		$posts[0]->meta_fields["author"] = vh_get_author($posts[0]->post_author);
		$posts[0]->taxonomy = array(
			"title" => wp_get_post_terms($posts[0]->ID, 'taxonomy_concept', array( '' ) )[0]->name,
			"slug"	=> wp_get_post_terms($posts[0]->ID, 'taxonomy_concept', array( '' ) )[0]->slug
		);

		//Get stops meta fields if we have a trip
		if (is_array($posts[0]->meta_fields["stops"])) {
			foreach ($posts[0]->meta_fields["stops"] as $key => $value) {
				$value->meta_fields = get_fields($value->ID);
			}
		}

		//Get mentioned meta fields
		if (is_array($posts[0]->meta_fields["mentioned"])) {
			foreach ($posts[0]->meta_fields["mentioned"] as $key => $value) {
				$value->meta_fields = get_fields($value->ID);
			}
		}

		//Get tips meta fields if we have a meet a local
		if (is_array($posts[0]->meta_fields["tips"])) {
			foreach ($posts[0]->meta_fields["tips"] as $key => $value) {
				//$value->meta_fields = get_fields($value["tip"]->ID);
				$value["tip"][0]->meta_fields = get_fields($value["tip"][0]->ID);
			}
		}

		//Remove drafts from the stops object
		if (is_array($posts[0]->meta_fields["stops"])) {
			foreach ($posts[0]->meta_fields["stops"] as $key => $value) {
				if ($value->post_status == "draft") {
					unset($posts[0]->meta_fields["stops"][$key]);
				}
			}
			$posts[0]->meta_fields["stops"] = array_values($posts[0]->meta_fields["stops"]);
		}

		return rest_ensure_response([
				"post" => $posts[0],
				"menu" => vh_get_menu_by_name("Huvudmeny"),
				"further_reading" => vh_get_further_reading_by_taxonomy_concept($posts[0]->ID),
				'next_article' => vh_get_next_article($post, $paged+1),
				"seo" => array(
					"title" 		=> $posts[0]->post_title,
					"description"	=> get_field("excerpt", $posts[0]->ID),
					"keywords"		=> WPSEO_Meta::get_value('focuskw', $posts[0]->ID)
				),
				"breadcrumbs" => array(
					array(
						"title" => wp_get_post_terms($posts[0]->ID, 'taxonomy_concept', array( '' ) )[0]->name,
						"slug"	=> wp_get_post_terms($posts[0]->ID, 'taxonomy_concept', array( '' ) )[0]->slug,
					),
					array(
						"title" => $posts[0]->post_title,
						"slug"	=> $posts[0]->post_name,
					)
				)
			]);
		}

	// No posts found
	return new WP_Error( 'unknown-error', __( 'Unknown error.', 'visithalland'), array( 'status' => 500 ) );
}


function vh_remove_old_happenings_callback() {
	// get posts
	return remove_old_happenings();	
}

?>