<?php

/* V2 callback functions */
function vh_v2_landing_callback(){
	//Get language attribute
	$lang = isset($_GET["lang"]) ? $_GET["lang"] : '';
	
	//Get Coastal Living page depending on lang attribute
	$page = get_post(pll_get_post(12, $lang));
	$page->meta_fields = get_fields($page->ID);
	//Get primary menu
	$menu = vh_get_menu($lang, 3);
	
	//Get the three latest Meet A locals
	$meet_locals = get_posts(array(
	    'post_type'      => 'meet_local',
	    'posts_per_page' => 3,
	    'lang' => $lang
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
	    'lang' => $lang
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
		return strcmp(strtotime($a->meta_fields["start_date"]), strtotime($b->meta_fields["start_date"]));
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
	$lang = isset($_GET["lang"]) ? $_GET["lang"] : '';
	$page_slug = $data["page_slug"];
	$breadcrumbs = array();

	$the_query = new WP_Query( array(
		'pagename' => 'best-of-coastal-living/' . $page_slug
	));

	// The Loop
	if ( $the_query->have_posts() ) {
		$page = get_post(pll_get_post($the_query->post->ID, $lang));
	 	$breadcrumbs = get_breadcrumb($page);

		$page->meta_fields = get_fields($page->ID);
		$page->author = vh_get_author($page->post_author);

		if (is_array($page->meta_fields["featured"])) {
			foreach ($page->meta_fields["featured"] as $key => $value) {
				$page->meta_fields["featured"][$key]->meta_fields = get_fields($value->ID);
				$page->meta_fields["featured"][$key]->author = vh_get_author($value->post_author);
			}
		}
		
		return rest_ensure_response([
			"page" 	=> $page,
			"posts" => vh_get_posts_without_happenings_by_taxonomy_concept($page->ID, -1),
			"meet_local" => vh_get_meet_local_by_taxonomy_concept($page->ID, 2),
			"happenings" => vh_get_happenings_by_taxonomy_concept($page->ID, 6),
			"menu" 	=> vh_get_menu($lang, 3),
			"seo"	=> array (
				"title" 		=> $page->post_title,
				"description"	=> get_field("excerpt", vh_get_page_by_path('best-of-coastal-living/' . $page->post_name)->ID),
				"keywords"		=> WPSEO_Meta::get_value('focuskw', $page->ID)
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