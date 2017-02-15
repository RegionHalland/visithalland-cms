<?php
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
	register_taxonomy( 'taxonomy_segment', array('adventure', 'event', 'list', 'meet', 'editortip', 'places', 'featured'), $args );

}
add_action( 'init', 'custom_taxonomy_segment', 0 );








// Register Custom Taxonomy
function custom_taxonomy_category() {
	$labels = array(
		'name'                       => _x( 'Kategorier', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Kategori', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Kategorier', 'text_domain' ),
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
	register_taxonomy( 'taxonomy_category', array('adventure', 'event', 'list', 'meet', 'editortip', 'places'), $args );

}

add_action( 'init', 'custom_taxonomy_category', 0 );




// Register Custom Taxonomy
function custom_taxonomy_tag() {

	$labels = array(
		'name'                       => _x( 'Taggar', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Tagg', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Taggar', 'text_domain' ),
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
	register_taxonomy( 'taxonomy_tag', array('adventure', 'event', 'list', 'meet', 'editortip', 'places'), $args );

}

add_action( 'init', 'custom_taxonomy_tag', 0 );
?>