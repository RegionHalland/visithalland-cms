<?php


add_filter( 'wp_enqueue_scripts', 'visithalland_scripts', 0 );

function visithalland_scripts() {
	global $post;
	$postData = array();

	wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCwAJMUt4ODfivqIGMgeZeTlH90-QqRFrU&libraries=places', array( 'jquery' ) );
	wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/assets/dist/js/app.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'infinite-scroll', 'https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js', array( 'jquery' ) );
	wp_enqueue_style( 'stylesheet', get_stylesheet_directory_uri() . '/assets/dist/css/main.min.css' );
	//wp_enqueue_style ('typekit', "https://use.typekit.net/vzi2bvt.css");
	
	if($post){
		$postData = array(
    		'post' => $post,
    		'meta_fields' => get_fields($post->ID) ? get_fields($post->ID) : ""
		);
	}

	wp_localize_script( 'app', 'phpVars', $postData);
}
add_action( 'wp_enqueue_scripts', 'visithalland_scripts' );
