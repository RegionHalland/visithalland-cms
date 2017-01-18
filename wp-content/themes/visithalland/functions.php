<?php

if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
}


// Register Custom Post Type Aktuellt
/*function custom_post_type_featured() {

	$labels = array(
		'name'                  => _x( 'Aktuellt', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Aktuellt', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Aktuellt', 'visithalland' ),
		'name_admin_bar'        => __( 'Aktuellt', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Aktuellt', 'visithalland' ),
		'description'           => __( 'Post Type Description', 'visithalland' ),
		'labels'                => $labels,
		'supports'              => array('title', 'author', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'       => true,
		'menu_icon'           => 'dashicons-megaphone'
	);
	register_post_type( 'featured', $args );

}
add_action( 'init', 'custom_post_type_featured', 0 );
*/


 
// Register Custom Post Type Äventyr
function custom_post_type_adventure() {

	$labels = array(
		'name'                  => _x( 'Äventyr', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Äventyr', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Äventyr', 'visithalland' ),
		'name_admin_bar'        => __( 'Äventyr', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Äventyr', 'visithalland' ),
		'description'           => __( 'Post Type Description', 'visithalland' ),
		'labels'                => $labels,
		'supports'              => array('title', 'author', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'       => true,
		'menu_icon'           => 'dashicons-location-alt'
	);
	register_post_type( 'adventure', $args );

}
add_action( 'init', 'custom_post_type_adventure', 0 );









// Register Custom Post Type
function custom_post_type_event() {

	$labels = array(
		'name'                  => _x( 'Events', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Event', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Events', 'visithalland' ),
		'name_admin_bar'        => __( 'Events', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Event', 'visithalland' ),
		'description'           => __( 'Post Type Description', 'visithalland' ),
		'labels'                => $labels,
		'supports'              => array('title', 'author', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'       => true,
		'menu_icon'           => 'dashicons-calendar-alt'
	);
	register_post_type( 'event', $args );

}
add_action( 'init', 'custom_post_type_event', 0 );


// Register Custom Post Type
function custom_post_type_meet() {

	$labels = array(
		'name'                  => _x( 'Meet a Local', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Meet a Local', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Meet a Local', 'visithalland' ),
		'name_admin_bar'        => __( 'Meet a Local', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Meet a Local', 'visithalland' ),
		'description'           => __( 'Post Type Description', 'visithalland' ),
		'labels'                => $labels,
		'supports'              => array('title', 'author', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'       => true,
		'menu_icon'           => 'dashicons-admin-users'
	);
	register_post_type( 'meet', $args );

}
add_action( 'init', 'custom_post_type_meet', 0 );






// Register Custom Post Type
function custom_post_type_editortip() {

	$labels = array(
		'name'                  => _x( 'Redaktionen tipsar', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Redaktionen tipsar', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Redaktionen tipsar', 'visithalland' ),
		'name_admin_bar'        => __( 'Redaktionen tipsar', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Redaktionen tipsar', 'visithalland' ),
		'description'           => __( 'Post Type Description', 'visithalland' ),
		'labels'                => $labels,
		'supports'              => array('title', 'author', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'menu_icon'				=> 'dashicons-groups',
		'show_in_rest'               => true
	);
	register_post_type( 'editortip', $args );

}
add_action( 'init', 'custom_post_type_editortip', 0 );






// Register Custom Post Type
function custom_post_type_list() {

	$labels = array(
		'name'                  => _x( 'Listor', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Listor', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Listor', 'visithalland' ),
		'name_admin_bar'        => __( 'Listor', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Listor', 'visithalland' ),
		'description'           => __( 'Post Type Description', 'visithalland' ),
		'labels'                => $labels,
		'supports'              => array('title', 'author', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'       	=> true,
		'menu_icon'				=> 'dashicons-list-view'
	);
	register_post_type( 'list', $args );

}
add_action( 'init', 'custom_post_type_list', 0 );











// Register Custom Post Type
function custom_post_type_places() {
	$labels = array(
		'name'                  => _x( 'Se & göra', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Se & göra', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Se & göra', 'visithalland' ),
		'name_admin_bar'        => __( 'Se & göra', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Se & Göra', 'visithalland' ),
		'description'           => __( 'Post Type Description', 'visithalland' ),
		'labels'                => $labels,
		'supports'              => array('title', 'author', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'       	=> true,
		'menu_icon'				=> 'dashicons-smiley'
	);
	register_post_type( 'places', $args );

}
add_action( 'init', 'custom_post_type_places', 0 );






// Register Custom Post Type
/*function custom_post_type_company() {

	$labels = array(
		'name'                  => _x( 'Näringslivsaktörer', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Näringslivsaktör', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Näringslivsaktörer', 'visithalland' ),
		'name_admin_bar'        => __( 'Näringslivsaktörer', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Näringslivsaktör', 'visithalland' ),
		'description'           => __( 'Post Type Description', 'visithalland' ),
		'labels'                => $labels,
		'supports'              => array('title', 'author', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'       	=> true,
		'menu_icon'				=> 'dashicons-store'
	);
	register_post_type( 'company', $args );

}
add_action( 'init', 'custom_post_type_company', 0 );




// Register Custom Post Type
function custom_post_type_activity() {

	$labels = array(
		'name'                  => _x( 'Aktiviteter', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Aktivitet', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Aktiviteter', 'visithalland' ),
		'name_admin_bar'        => __( 'Aktiviteter', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Aktivitet', 'visithalland' ),
		'description'           => __( 'Post Type Description', 'visithalland' ),
		'labels'                => $labels,
		'supports'              => array('title', 'author', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'       	=> true,
		'menu_icon'				=> 'dashicons-tickets-alt'
	);
	register_post_type( 'activity', $args );

}
add_action( 'init', 'custom_post_type_activity', 0 );
*/






// Register Custom Taxonomy
function custom_taxonomy_segment() {

	$labels = array(
		'name'                       => _x( 'Marknadskoncept', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Marknadskoncept', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Marknadskoncept', 'text_domain' ),
	);	
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'taxonomy_segment', array('adventure', 'event', 'list', 'meet', 'editortip', 'places'), $args );

}
add_action( 'init', 'custom_taxonomy_segment', 0 );



/*function sb_add_tax_to_api() {
    $mytax = get_taxonomy( 'taxonomy_segment' );
    $mytax->show_in_rest = true;
}
add_action( 'init', 'sb_add_tax_to_api', 30 );*/







// Register Custom Taxonomy
function custom_taxonomy_category() {
	$labels = array(
		'name'                       => _x( 'Kategorier', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Kategori', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Kategorier', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'taxonomy_category', array('adventure', 'event', 'list', 'meet', 'editortip', 'places'), $args );

}

add_action( 'init', 'custom_taxonomy_category', 0 );




// Register Custom Taxonomy
function custom_taxonomy_tag() {

	$labels = array(
		'name'                       => _x( 'Taggar', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Tagg', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Taggar', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'taxonomy_tag', array('adventure', 'event', 'list', 'meet', 'editortip', 'places'), $args );

}

add_action( 'init', 'custom_taxonomy_tag', 0 );


/**
 * enqueue scripts and styles 
 *
 */

function my_acf_google_map_api( $api ){
	
	$api['key'] = 'AIzaSyDat-2hNlZNccIJfnXPqPmzsxzXb0ZjYd0';
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');



/* Remove menus not needed */
function remove_menus(){
  remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit-comments.php' );
  remove_menu_page( 'edit.php?post_type=page' );
  
}
add_action( 'admin_menu', 'remove_menus' );








/**
 * Modfy search for algolia
 *
 */

add_filter( 'algolia_post_shared_attributes', 'my_post_attributes', 10, 2 );
add_filter( 'algolia_searchable_post_shared_attributes', 'my_post_attributes', 10, 2 );

/**
 * @param array   $attributes
 * @param WP_Post $post
 *
 * @return array
 */
function my_post_attributes( array $attributes, WP_Post $post ) {

    if ( 'places' !== $post->post_type ) {
        // We only want to add an attribute for the 'speaker' post type.
        // Here the post isn't a 'speaker', so we return the attributes unaltered.
        return $attributes;
    }

    // Get the field value with the 'get_field' method and assign it to the attributes array.
    // @see https://www.advancedcustomfields.com/resources/get_field/
    $attributes['cover_image'] = get_field('cover_image', $post->ID)["sizes"]["medium_large"];
    $attributes['description'] = get_field('description', $post->ID);
    $attributes['location'] = get_field('location', $post->ID);

    // Always return the value we are filtering.
    return $attributes;
}




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
			$postArray[$i]->meta_fields = new stdClass(); 
			$postArray[$i]->meta_fields->name = get_field('name', get_the_id());
			$postArray[$i]->meta_fields->workrole = get_field('workrole', get_the_id());
			$postArray[$i]->meta_fields->bio = get_field('bio', get_the_id());
			$postArray[$i]->meta_fields->local_story = get_field('local_story', get_the_id());

			//Fetch places relationships
			$postArray[$i]->meta_fields->places = get_field('places', get_the_id());
	
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
