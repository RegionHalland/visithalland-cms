<?php

/* V2 callback functions */
function vh_v2_landing_callback(){
	$page = get_post(12);
	$page->meta_fields = get_fields($page->ID);
	$menu = vh_get_menu_by_name("Huvudmeny", 3);
	
	//Get the three latest Meet A locals
	$meet_locals = get_posts(array(
	    'post_type'     => 'meet_local',
	    'posts_per_page'    => 3,
	));
	foreach ($meet_locals as $key => $meet_local) {
		$meet_local->meta_fields = get_fields($meet_local->ID);
		$meet_local->taxonomy = array(
			"title" => wp_get_post_terms($meet_local->ID, 'taxonomy_concept', array( '' ) )[0]->name,
			"slug"	=> wp_get_post_terms($meet_local->ID, 'taxonomy_concept', array( '' ) )[0]->slug
		);
	}

	$featured = array();
	foreach ($menu as $key => $value) {
		$featured[$key] = $value["featured"][0];
	}

	// get all happenings
	$happenings = get_posts(array(
	    'post_type'     => 'happening',
	    'posts_per_page'    => -1,
	));

	foreach ($happenings as $key => $happening) {
		$happening->meta_fields = get_fields($happening->ID);
		$happening->author = vh_get_author($happening->post_author);
		$happening->taxonomy = array(
			"name" 	=> wp_get_post_terms($happening->ID, 'taxonomy_concept', array( '' ) )[0]->name,
			"slug"	=> wp_get_post_terms($happening->ID, 'taxonomy_concept', array( '' ) )[0]->slug
				);
	}

	//Sort happenings by start date
	usort($happenings, function($a, $b)
	{
		return strcmp(strtotime($a->meta_fields->start_date), strtotime($b->meta_fields->start_date));
	});


	return rest_ensure_response([
			"featured" => $featured,
			"page" 	=> $page,
			"happenings" => array_slice($happenings, 0, 6),
			"concepts" => $menu,
			"meet_locals" => $meet_locals,
			"menu" 	=> $menu,
			"seo"	=> array(
				"title" 		=> $page->post_title,
				"description"	=> get_field("excerpt", $page->ID),
				"keywords"		=> WPSEO_Meta::get_value('focuskw', $page->ID)
			)
		]
	);
}

function vh_v2_page_callback($data) {
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
			"posts" => vh_get_posts_without_happenings_by_taxonomy_concept($the_query->post->ID, -1),
			"meet_local" => vh_get_meet_local_by_taxonomy_concept($the_query->post->ID, 2),
			"happenings" => vh_get_happenings_by_taxonomy_concept($the_query->post->ID, 6),
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
?>