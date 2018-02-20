<?php


function visithalland_scripts() {
	global $post;
	$postData = array();


	//Add custom jQuery to avoid scripts in <head>
	if (!is_admin()) {
		wp_deregister_script('jquery');
	    wp_register_script('vh-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', NULL, false, true);
	    wp_enqueue_script('vh-jquery');
    }

    wp_enqueue_style( 'stylesheet', get_stylesheet_directory_uri() . '/assets/dist/css/main.min.css' );
    wp_enqueue_style( 'typekit', 'https://use.typekit.net/vzi2bvt.css' );

	wp_enqueue_script( 'app', get_stylesheet_directory_uri() . '/assets/dist/js/app.min.js', array( 'vh-jquery' ), false, true );
	wp_enqueue_script( 'flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', array( 'vh-jquery' ), false, true );
	wp_enqueue_script( 'lazysizes', 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/4.0.1/lazysizes.min.js', array( 'vh-jquery' ), false, true );
	wp_enqueue_script( 'infinite-scroll', 'https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js', array( 'vh-jquery' ), false, true );
	wp_enqueue_script( 'google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCwAJMUt4ODfivqIGMgeZeTlH90-QqRFrU&libraries=places', array( 'vh-jquery' ), false, true );

	
	if($post){
		$postData = array(
    		'post' => $post,
    		'meta_fields' => get_fields($post->ID) ? get_fields($post->ID) : ""
		);
	}

	wp_localize_script( 'app', 'phpVars', $postData);
}

add_action( 'wp_enqueue_scripts', 'visithalland_scripts', 20 );


function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array('flickity', 'lazysizes', 'infinite-scroll', 'google-maps');
   
   foreach($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
         return str_replace(' src', ' defer="defer" src', $tag);
      }
   }
   return $tag;
}

add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);

/*function gutenberg_boilerplate_block() {
    wp_register_script(
        'gutenberg-boilerplate-es5-step01',
        plugins_url( 'visithalland-blocks/block.js'),
        array( 'wp-blocks', 'wp-element' )
    );

    register_block_type( 'gutenberg-boilerplate-es5/hello-world-step-01', array(
        'editor_script' => 'gutenberg-boilerplate-es5-step01',
    ) );
}
add_action( 'init', 'gutenberg_boilerplate_block' );*/