<?php
/**
 * Modfy search for algolia
 *
 */

add_filter( 'algolia_post_shared_attributes', 'my_post_attributes', 10, 2 );
add_filter( 'algolia_searchable_post_shared_attributes', 'my_post_attributes', 10, 2 );

/**
 * @param array   $attributes
 * @param WP_Post $post
 *
 * @return array
 */
function my_post_attributes( array $attributes, WP_Post $post ) {

    if ( 'places' !== $post->post_type || 'happening' !== $post->post_type || 'trip' !== $post->post_type || 'editor_tip' !== $post->post_type || 'meet_local' !== $post->post_type || 'companies' !== $post->post_type ) {
        // We only want to add an attribute for the 'speaker' post type.
        // Here the post isn't a 'speaker', so we return the attributes unaltered.
        return $attributes;
    }

    $attributes['post_name'] = "TEST";
    // Get the field value with the 'get_field' method and assign it to the attributes array.
    // @see https://www.advancedcustomfields.com/resources/get_field/
    
    /*$post_name = $post->post_name;
    $cover_image = get_field('cover_image', $post->ID);
    $description = get_field('description', $post->ID);    
    //$taxonomy = get_field('location', $post->ID);
    $location = get_field('location', $post->ID);

    if($post_name) {
        $attributes['post_name'] = $post_name;
    }
    /*if($cover_image) {
        $attributes['cover_image'] = $cover_image["sizes"]["medium_large"];
    }
    if($description) {
        $attributes['description'] = $description;
    }
    if($location) {
        $attributes['location'] = $location;
    }*/
    
    /*if(count(wp_get_post_terms($post->ID, 'taxonomy_concept', array( '' ))) > 0) {
        $attributes['taxonomy'] = array(
                "title" => wp_get_post_terms($post->ID, 'taxonomy_concept', array( '' ) )[0]->name,
                "slug"  => wp_get_post_terms($post->ID, 'taxonomy_concept', array( '' ) )[0]->slug
        );
    }*/

    //Place specific


    // Always return the value we are filtering.
    return $attributes;
}
?>