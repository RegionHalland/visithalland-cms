<?php

function visithalland_scripts() {
	global $post;

	wp_enqueue_script( 'flickity-script', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCwAJMUt4ODfivqIGMgeZeTlH90-QqRFrU&libraries=places', array( 'jquery' ) );
	wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/assets/dist/js/app.min.js', array( 'jquery' ) );
	
	$postData = array(
    	'post' => $post,
    	'meta_fields' => get_fields($post->ID)
	);

	wp_localize_script( 'app', 'phpVars', $postData);
}
add_action( 'wp_enqueue_scripts', 'visithalland_scripts' );
