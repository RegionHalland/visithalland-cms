<?php
add_action( 'init', 'create_book_tax' );

function create_book_tax() {
	register_taxonomy(
		'taxonomy_concept',
		array('meet_local', 'trip', 'happening', 'places', 'editor_tip', 'companies'),
		array(
			'label' => __( 'Genre' ),
			'rewrite' => array( 'slug' => 'genre' ),
			'hierarchical' => true,
		)
	);
}

// Register Best of
/*function custom_taxonomy_concept() {
	$labels = array(
		'name'                       => _x( 'Koncept', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Koncept', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Koncept', 'text_domain' ),
	);	
	$args = array(
		//'rewrite' 					=> array( 'slug' => 'koncept', 'with_front' => false ),
		'rewrite' => array('slug' => 'koncept', 'with_front' => false, 'hierarchical' => true, 'with_front' => true ), // this makes hierarchical URLs
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 
		'taxonomy_concept',
		array('meet_local', 'trip', 'happening', 'places', 'editor_tip', 'companies')
	);

}
add_action( 'init', 'custom_taxonomy_concept', 0);*/


?>