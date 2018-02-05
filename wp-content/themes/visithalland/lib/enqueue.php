<?php


add_filter( 'wp_enqueue_scripts', 'visithalland_scripts', 0 );

function visithalland_scripts() {
	global $post;
	$postData = array();

	wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/assets/dist/js/app.min.js', array( 'jquery' ) );
	wp_enqueue_style( 'stylesheet', get_stylesheet_directory_uri() . '/assets/dist/css/main.min.css' );
	
	if($post){
		$postData = array(
    		'post' => $post,
    		'meta_fields' => get_fields($post->ID) ? get_fields($post->ID) : ""
		);
	}

	wp_localize_script( 'app', 'phpVars', $postData);
}
add_action( 'wp_enqueue_scripts', 'visithalland_scripts' );


