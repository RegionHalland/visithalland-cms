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

    // Get the field value with the 'get_field' method and assign it to the attributes array.
    // @see https://www.advancedcustomfields.com/resources/get_field/
    $attributes['cover_image'] = get_field('cover_image', $post->ID)["sizes"]["medium_large"];
    $attributes['description'] = get_field('description', $post->ID);
    $attributes['post_name'] = $post->post_name;

    //Place specific
    $location = get_field('location', $post->ID)
    if($location) {
        $attributes['location'] = get_field('location', $post->ID);
    }

    // Always return the value we are filtering.
    return $attributes;
}
?>