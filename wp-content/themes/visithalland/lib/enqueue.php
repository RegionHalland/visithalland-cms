<?php

function visithalland_scripts() {
	wp_enqueue_style( 'flickity-css', 'https://unpkg.com/flickity@2/dist/flickity.min.css');
	wp_enqueue_script( 'flickity-script', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array( 'jquery' ) );
	wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/assets/dist/js/app.min.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'visithalland_scripts' );
