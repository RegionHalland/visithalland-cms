<?php

//Modification of acf plugin
include_once('lib/acf.php');

//Register custom taxonomies
include_once('lib/register_custom_taxonomies.php');

//Register custom post types
include_once('lib/register_custom_post_types.php');

//Wordpress admin menu modifications
include_once('lib/admin_menu.php');

//Modification for Algolia Search
include_once('lib/algolia_search.php');

//Image related, sizes, captions and more
include_once('lib/images.php');

//Register menus
include_once('lib/menu.php');

//Editor modifications
include_once('lib/editor.php');

//Enqueues of styles and scripts
include_once('lib/enqueue.php');

function hwl_home_pagesize( $query ) {
    $query->set( 'posts_per_page', 50 );
    return;
}
add_action( 'pre_get_posts', 'hwl_home_pagesize', 1 );


/* 

***	REST related files

*/

/* 
	v1 API
*/

//Add custom v1 REST routes
include_once('lib/rest/v1/routes.php');

//Add custom v1 REST callbacs
include_once('lib/rest/v1/callbacks.php');


/* 
	v2 API
*/

//Add custom v2 REST routes
include_once('lib/rest/v2/routes.php');

//Add custom v2 REST callbacks
include_once('lib/rest/v2/callbacks.php');


//Add helpers used in callbacks.php for generic methods
//include_once('lib/helpers.php');

function wpa_show_permalinks( $post_link, $post ){
    if ( is_object( $post ) && $post->post_type == 'editor_tip' || $post->post_type == 'meet_local' || $post->post_type == 'trip' || $post->post_type == 'happening' || $post->post_type == 'places' || $post->post_type == 'companies' ){
        $terms = wp_get_object_terms( $post->ID, 'taxonomy_concept' );
        if( $terms ){
            return str_replace( '%taxonomy_concept%', $terms[0]->slug, $post_link );
        }
    }
    return $post_link;
}
add_filter( 'post_type_link', 'wpa_show_permalinks', 1, 2 );

add_filter( 'wp_get_nav_menu_items', 'prefix_nav_menu_classes', 10, 3 );
function prefix_nav_menu_classes($items, $menu, $args) {
    _wp_menu_item_classes_by_context($items);

    $taxonomy = 'taxonomy_concept';
    $tax_terms = get_terms($taxonomy);
    $terms = vh_get_post_taxonomy();

    foreach ($items as $key => $value) {
        //if we have a current menu-item or a current-menu-parent page add our own active class
        if(in_array("current-menu-item", $value->classes) || in_array("current-menu-parent", $value->classes)){
            array_push($value->classes, "active");
        }
    }
    return $items;
}

function include_files(){
    // Here we load from our includes directory
    // This considers parent and child themes as well    
    locate_template( array( 'lib/helpers.php' ), true, true );
}
add_action( 'after_setup_theme', 'include_files' );

