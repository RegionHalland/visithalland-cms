<?php
/* Helper methods */

function vh_get_next_article($post, $paged = 1){
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
		'exclude' 	 	=> $post->ID,
		'tax_query' 	=> $tax_query
	));

	//return $posts;

	if (count($posts) === 1) {
		return array(
			'post_title' 	=> $posts[0]->post_title,
			'cover_image' 	=> get_field("cover_image", $posts[0]->ID)["sizes"]["thumbnail"]
		);
	}

	return null;
}

function remove_old_happenings() {
	// get posts
	$posts = get_posts(array(
	    'post_type'     => 'happening',
	    'posts_per_page'    => -1,
	));

	$oldHappenings = array();

	if( $posts ) {
		foreach ($posts as $key => $value) {
			# code...
			$value->meta_fields = get_fields($value->ID);
			if(strtotime($value->meta_fields["end_date"]) < time()) {
				array_push($oldHappenings, $value->post_name);
				$value->post_status = "draft";
    			wp_update_post($value);
			}
		}
	    return rest_ensure_response(array(
	    		'Removed happenings' => $oldHappenings
	    	)
	    );
	}

	// No posts found
	return new WP_Error( 'unknown-error', __( 'Unknown error.', 'visithalland'), array( 'status' => 500 ) );
}

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
	  		//"meet_local",
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
		$value->taxonomy = array(
					"name" 	=> wp_get_post_terms($value->ID, 'taxonomy_concept', array( '' ) )[0]->name,
					"slug"	=> wp_get_post_terms($value->ID, 'taxonomy_concept', array( '' ) )[0]->slug
				);
	}
	return $posts;
}

function vh_get_posts_without_happenings_by_taxonomy_concept($post_id, $numberposts = 3) {
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
	  		//"meet_local",
			"editor_tip",
			"trip",
			//"happening"
	  ),
	  'numberposts'  => $numberposts,
	  'exclude' 	 => array($post_id),
	  'tax_query' 	 => $tax_query
	));

	foreach ($posts as $key => $value) {
		$value->meta_fields = get_fields($value->ID);
		$value->author = vh_get_author($value->post_author);
		$value->taxonomy = array(
					"name" 	=> wp_get_post_terms($value->ID, 'taxonomy_concept', array( '' ) )[0]->name,
					"slug"	=> wp_get_post_terms($value->ID, 'taxonomy_concept', array( '' ) )[0]->slug
				);
	}
	return $posts;
}

function vh_get_happenings_by_taxonomy_concept($post_id, $numberposts = 1) {
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
	  		"happening"
	  ),
	  'numberposts'  => $numberposts,
	  'exclude' 	 => array($post_id),
	  'tax_query' 	 => $tax_query
	));

	foreach ($posts as $key => $value) {
		$value->meta_fields = get_fields($value->ID);
		$value->author = vh_get_author($value->post_author);
		$value->taxonomy = array(
					"name" 	=> wp_get_post_terms($value->ID, 'taxonomy_concept', array( '' ) )[0]->name,
					"slug"	=> wp_get_post_terms($value->ID, 'taxonomy_concept', array( '' ) )[0]->slug
				);
	}

	//Sort happenings by start date
	usort($posts, function($a, $b)
	{
		return strcmp(strtotime($a->meta_fields["start_date"]), strtotime($b->meta_fields["start_date"]));
	});

	return $posts;
}

function vh_get_meet_local_by_taxonomy_concept($post_id, $numberposts = 1) {
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
	  		"meet_local"
	  ),
	  'numberposts'  => $numberposts,
	  'exclude' 	 => array($post_id),
	  'tax_query' 	 => $tax_query
	));

	foreach ($posts as $key => $value) {
		$value->meta_fields = get_fields($value->ID);
		$value->author = vh_get_author($value->post_author);
		$value->taxonomy = array(
					"name" 	=> wp_get_post_terms($value->ID, 'taxonomy_concept', array( '' ) )[0]->name,
					"slug"	=> wp_get_post_terms($value->ID, 'taxonomy_concept', array( '' ) )[0]->slug
				);
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
		$value->taxonomy = array(
					"name" 	=> wp_get_post_terms($value->ID, 'taxonomy_concept', array( '' ) )[0]->name,
					"slug"	=> wp_get_post_terms($value->ID, 'taxonomy_concept', array( '' ) )[0]->slug
				);

	}
	shuffle($posts);

	return array_slice($posts, 0, 3);
}

function vh_get_menu_by_name($menu_name, $featuredAmount = 2) {
	$menu = wp_get_nav_menu_items( $menu_name, array() );
	$menuArray = array();
	foreach ($menu as $key => $value) {
		$slugArray = explode("/", $value->url);
		if (count($slugArray) > 2) {
			$slug = $slugArray[3];
			$featuredTemp = array_slice(get_field("featured", get_post(get_post_meta( $value->ID, '_menu_item_object_id', true ))), 0, $featuredAmount);
			$featured = [];

			foreach ($featuredTemp as $k => $val) {
				$featured[$k] = $val;
				$featured[$k]->author = vh_get_author($val->post_author);
				$featured[$k]->meta_fields = get_fields($val->ID);
				$featured[$k]->taxonomy = array(
					"name" 	=> wp_get_post_terms($val->ID, 'taxonomy_concept', array( '' ) )[0]->name,
					"slug"	=> wp_get_post_terms($val->ID, 'taxonomy_concept', array( '' ) )[0]->slug
					);
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
?>