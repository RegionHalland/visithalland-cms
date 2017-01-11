<?php

if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
}

// Register Custom Post Type
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
		'supports'              => array( ),
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
	register_post_type( 'post_type_adventure', $args );

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
		'supports'              => array( ),
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
	register_post_type( 'post_type_event', $args );

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
		'supports'              => array( ),
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
		'show_in_rest'       => true
	);
	register_post_type( 'post_type_meet', $args );

}
add_action( 'init', 'custom_post_type_meet', 0 );






// Register Custom Post Type
function custom_post_type_editor_tip() {

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
		'supports'              => array('title', 'revisions'),
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
	register_post_type( 'post_type_editor_tip', $args );

}
add_action( 'init', 'custom_post_type_editor_tip', 0 );






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
		'supports'              => array('title', 'editor', 'revisions'),
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
	register_post_type( 'post_type_list', $args );

}
add_action( 'init', 'custom_post_type_list', 0 );











// Register Custom Post Type
function custom_post_type_attraction() {

	$labels = array(
		'name'                  => _x( 'Sevärdheter', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Sevärdhet', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Sevärdheter', 'visithalland' ),
		'name_admin_bar'        => __( 'Sevärdheter', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Sevärdhet', 'visithalland' ),
		'description'           => __( 'Post Type Description', 'visithalland' ),
		'labels'                => $labels,
		'supports'              => array( ),
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
		'menu_icon'				=> 'dashicons-palmtree'
	);
	register_post_type( 'post_type_attraction', $args );

}
add_action( 'init', 'custom_post_type_attraction', 0 );






// Register Custom Post Type
function custom_post_type_company() {

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
		'supports'              => array( ),
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
	register_post_type( 'post_type_company', $args );

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
		'supports'              => array('title', 'revisions' ),
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
	register_post_type( 'post_type_activity', $args );

}
add_action( 'init', 'custom_post_type_activity', 0 );







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
	register_taxonomy( 'taxonomy_segment', array('post_type_company', 'post_type_adventure', 'post_type_event', 'post_type_list', 'post_type_meet', 'post_type_attraction', 'post_type_editor_tip', 'post_type_activity'), $args );

}
add_action( 'init', 'custom_taxonomy_segment', 0 );










// Register Custom Taxonomy
function custom_taxonomy_season() {

	$labels = array(
		'name'                       => _x( 'Säsonger', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Säsong', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Säsonger', 'text_domain' ),
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
	register_taxonomy( 'taxonomy_season', array('post_type_company', 'post_type_adventure', 'post_type_event', 'post_type_list', 'post_type_meet', 'post_type_attraction', 'post_type_editor_tip', 'post_type_activity'), $args );

}

add_action( 'init', 'custom_taxonomy_season', 0 );


// Register Custom Taxonomy
function custom_taxonomy_category() {

	$labels = array(
		'name'                       => _x( 'Kategorier', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Kategori', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Kategorier', 'text_domain' ),
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
	register_taxonomy( 'taxonomy_category', array('post_type_company', 'post_type_adventure', 'post_type_event', 'post_type_list', 'post_type_meet', 'post_type_attraction', 'post_type_editor_tip', 'post_type_activity'), $args );

}

add_action( 'init', 'custom_taxonomy_category', 0 );



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

    if ( 'speaker' !== $post->post_type ) {
        // We only want to add an attribute for the 'speaker' post type.
        // Here the post isn't a 'speaker', so we return the attributes unaltered.
        return $attributes;
    }

    // Get the field value with the 'get_field' method and assign it to the attributes array.
    // @see https://www.advancedcustomfields.com/resources/get_field/
    $attributes['bio'] = get_field( 'bio', $post->ID );

    // Always return the value we are filtering.
    return $attributes;
}







/**
 * This is our callback function that embeds our phrase in a WP_REST_Response
 */
function get_feed($data) {
    // rest_ensure_response() wraps the data we want to return into a WP_REST_Response, and ensures it will be properly returned.
    //$queryParams = $data->get_query_params(); //returns a string of the body
    $paged = $data->get_query_params()["page"];
    $taxonomy_category = $data->get_query_params()["taxonomy"];
    $langCode = $data->get_query_params()["lang"];

    //wp_die();

	$postArray = array();

	// WP_Query arguments
	$args = array(
		'post_type'	=> array( 
			'post_type_editor_tip',
			'post_type_adventure',
			'post_type_event',
			'post_type_meet',
			'post_type_list' 
		),
		'posts_per_page' => -1,
		'paged' => $paged,
		//'taxonomy_segment' => $taxonomy_category,
		//TODO: Fix multi lang
		//'lang' => $langCode
	);

	$the_query = new WP_Query( $args );
	//return rest_ensure_response( 'Hello World, this is the WordPress REST API' );
	// The Loop
	if ( $the_query->have_posts() ) {
		$i = 0;
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

			$postArray[$i] = new stdClass(); 
			$postArray[$i]->ID = get_the_id();
			$postArray[$i]->title = get_the_title();			
			$postArray[$i]->meta_fields = get_field_objects(get_the_id());

			foreach ($postArray[$i]->meta_fields['platser']['value'] as $key => $value) {
				$value->meta_fields = get_field_objects($value->ID);
			}
			
			$i++;
		}
		/* Restore original Post Data */
		wp_reset_postdata();

		return rest_ensure_response($postArray);
	} else {
		// no posts found
		return rest_ensure_response([
			'success' => false,
			'msg'	  => "No posts found"
 		]);
	}

	return rest_ensure_response([
			'success' => false,
			'msg'	  => "Unknown error"
 	]);
}


/**
 * GET single post
 */
function get_single_post($data) {
    // rest_ensure_response() wraps the data we want to return into a WP_REST_Response, and ensures it will be properly returned.
    //$queryParams = $data->get_query_params(); //returns a string of the body

	$postID = $data->get_query_params()["id"];
    //wp_die();

	$postArray = array();

	// WP_Query arguments
	$args = array(
		'p' => $postID,
		'post_type' => 'any'
	);

	$the_query = new WP_Query( $args );
	//return rest_ensure_response( 'Hello World, this is the WordPress REST API' );
	// The Loop
	if ( $the_query->have_posts() ) {
		$i = 0;
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

			$postArray[$i] = new stdClass(); 
			$postArray[$i]->ID = get_the_id();
			$postArray[$i]->title = get_the_title();
			$postArray[$i]->content = get_the_content();
			$postArray[$i]->meta_fields = get_field_objects(get_the_id());

			foreach ($postArray[$i]->meta_fields['platser']['value'] as $key => $value) {
				$value->meta_fields = get_field_objects($value->ID);
			}
			
			$i++;
		}

		/* Restore original Post Data */
		wp_reset_postdata();

		return rest_ensure_response($postArray);
	} else {
		// no posts found
		return rest_ensure_response([
			'success' => false,
			'msg'	  => "No posts found"
 		]);
	}

	return rest_ensure_response([
			'success' => false,
			'msg'	  => "Unknown error"
 	]);
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