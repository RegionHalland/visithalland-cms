<?php

// Register Meet a local
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
		'menu_position'         => 2,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'       => true,
		'menu_icon'           => 'dashicons-admin-users'
	);
	register_post_type( 'meet', $args );

}
add_action( 'init', 'custom_post_type_meet', 0 );



// Register Trip ideas
function custom_post_type_trips() {

	$labels = array(
		'name'                  => _x( 'Trips', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Trips', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Trip Ideas', 'visithalland' ),
		'name_admin_bar'        => __( 'Trips Ideas', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Trips', 'visithalland' ),
		'description'           => __( 'Post Type Description', 'visithalland' ),
		'labels'                => $labels,
		'supports'              => array('title', 'author', 'revisions'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 3,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'       => true,
		'menu_icon'           => 'dashicons-location-alt'
	);
	register_post_type( 'trip', $args );

}
add_action( 'init', 'custom_post_type_trips', 0 );



// Register Custom Post Type
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
		'menu_position'         => 4,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'       => true,
		'menu_icon'           => 'dashicons-calendar-alt'
	);
	register_post_type( 'happening', $args );

}
add_action( 'init', 'custom_post_type_happenings', 0 );



// Register Featured
/*function custom_post_type_featured() {

	$labels = array(
		'name'                  => _x( 'Utvalda', 'Post Type General Name', 'visithalland' ),
		'singular_name'         => _x( 'Utvalda', 'Post Type Singular Name', 'visithalland' ),
		'menu_name'             => __( 'Utvalda', 'visithalland' ),
		'name_admin_bar'        => __( 'Utvalda', 'visithalland' ),
	);
	$args = array(
		'label'                 => __( 'Utvalda', 'visithalland' ),
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
add_action( 'init', 'custom_post_type_featured', 0 );*/









// Register Custom Post Type
/*function custom_post_type_event() {

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


// Register Meet a local
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
add_action( 'init', 'custom_post_type_meet', 0 );*/






// Register Editor Tip
/*function custom_post_type_editortip() {

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








// Register Custom Post Type Places
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

?>