<?php

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

?>