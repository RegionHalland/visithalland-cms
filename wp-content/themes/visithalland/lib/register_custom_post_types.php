<?php

// Register Meet a local
function custom_post_type_meet_local() {
	$labels = array(
		'name'                  => _x( 'Meet our locals', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Meet our locals', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Meet our locals', 'visithalland' ),
		'name_admin_bar'        => __( 'Meet our locals', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Meet our locals', 'visithalland' ),
		'description'           => __( 'Post Type Description', 'visithalland' ),
		'labels'                => $labels,
		'supports'              => array('title', 'author', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'       => true,
		'menu_icon'           => 'dashicons-admin-users',
		'rewrite' => array( 'slug' => '%taxonomy_concept%/meet-a-local', 'with_front' => false )
	);
	register_post_type( 'meet_local', $args );

}
add_action( 'init', 'custom_post_type_meet_local', 1 );



// Register Editor tip
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
		'supports'              => array('editor' ,'title', 'author', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'       => true,
		'menu_icon'           => 'dashicons-admin-users',
		'rewrite' => array( 'slug' => '%taxonomy_concept%/editor_tip', 'with_front' => false )
	);
	register_post_type( 'editor_tip', $args );

}
add_action( 'init', 'custom_post_type_editor_tip', 200 );



// Register Trip ideas
function custom_post_type_trips() {
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
		'menu_position'         => 4,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'       => true,
		'menu_icon'           => 'dashicons-location-alt',
		'rewrite' => array( 'slug' => '%taxonomy_concept%/trip', 'with_front' => false )
	);
	register_post_type( 'trip', $args );

}
add_action( 'init', 'custom_post_type_trips', 1 );



// Register Happenings
function custom_post_type_happenings() {
	$labels = array(
		'name'                  => _x( 'Happenings', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Happening', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Happenings', 'visithalland' ),
		'name_admin_bar'        => __( 'Happenings', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Happenings', 'visithalland' ),
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
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'       => true,
		'menu_icon'           => 'dashicons-calendar-alt',
		'rewrite' => array( 'slug' => '%taxonomy_concept%/happening', 'with_front' => false )
	);
	register_post_type( 'happening', $args );

}
add_action( 'init', 'custom_post_type_happenings', 1 );


// Register Places
function custom_post_type_places() {
	$labels = array(
		'name'                  => _x( 'Platser', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Platser', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Platser', 'visithalland' ),
		'name_admin_bar'        => __( 'Platser', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Platser', 'visithalland' ),
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
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'       => true,
		'menu_icon'           => 'dashicons-location-alt',
		'rewrite' => array( 'slug' => '%taxonomy_concept%/place', 'with_front' => false )
	);
	register_post_type( 'places', $args );

}
add_action( 'init', 'custom_post_type_places', 1 );

// Register companies
function custom_post_type_companies() {
	$labels = array(
		'name'                  => _x( 'Näringslivsaktörer', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Näringslivsaktörer', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Näringslivsaktörer', 'visithalland' ),
		'name_admin_bar'        => __( 'Näringslivsaktörer', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Näringslivsaktörer', 'visithalland' ),
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
		'has_archive'           => false,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'       => true,
		'menu_icon'           => 'dashicons-store',
		'rewrite' => array( 'slug' => '%taxonomy_concept%/business', 'with_front' => false )
	);
	register_post_type( 'companies', $args );

}
add_action( 'init', 'custom_post_type_companies', 1 );