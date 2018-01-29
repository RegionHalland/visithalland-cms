<?php

/*	    <!-- Link needed for infinite scroll -->
		<?php
// Get terms for post
$terms = get_the_terms( $post->ID , 'taxonomy_concept' );
// Loop over each item since it's an array
if ( $terms != null ){
foreach( $terms as $term ) {
// Print the name method from $term which is an OBJECT
$termSlug = $term->slug;
// Get rid of the other data stored in the object, since it's not needed
unset($term);
} } ?>

<?php

$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );

echo $term->slug; // will show the slug

// get_posts in same custom taxonomy
$postlist_args = array(
'posts_per_page' => -1,
'orderby' => 'rand',
'post_type' => array(
			"meet_local",
			"editor_tip",
			"trip",
			"happening"
		),
'taxonomy_concept' => $termSlug // get slug of product category from above - change productcat for your taxonomy slug
);
$postlist = get_posts( $postlist_args );

// get ids of posts retrieved from get_posts
$ids = array();
foreach ($postlist as $thepost) {
$ids[] = $thepost->ID;
}

// get and echo previous and next post in the same taxonomy
$thisindex = array_search($post->ID, $ids);
$previd = $ids[$thisindex-1];
$nextid = $ids[$thisindex+1];

?>

<?php

if ( !empty($previd) ) {
echo '<a rel="prev" href="' . get_permalink($previd). '">previous</a>';
}

if ( !empty($nextid) ) {
echo '<a class="next-link" rel="next" href="' . get_permalink($nextid). '">next</a>';
}

?>*/
add_action( 'init', 'custom_page_rules' );
function custom_page_rules() {
  global $wp_rewrite;
  $wp_rewrite->page_structure = $wp_rewrite->root . 'coastal-living/%pagename%'; 
}

function posts_link_next_class($format){
     $format = str_replace('href=', 'class="next-link" href=', $format);
     return $format;
}
//add_filter('previous_post_link', 'posts_link_next_class');
//add_filter('next_post_link', 'posts_link_next_class');

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
        } else {
            return str_replace( '%taxonomy_concept%', 'coastal-living', $post_link );
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

