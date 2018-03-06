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

add_filter('algolia_post_images_sizes', function($sizes) {
    $sizes[] = 'vh_medium';
    $sizes[] = 'vh_thumbnail'; 

    return $sizes;
});


function my_post_attributes( array $attributes, WP_Post $post ) {

    if ( $post->post_type !== 'places' && $post->post_type !== 'companies' && $post->post_type !== 'meet_local' && $post->post_type !== 'editor_tip' && $post->post_type !== 'trip' && $post->post_type !== 'happening') {
        // We only want to add an attribute for the 'speaker' post type.
        // Here the post isn't a 'speaker', so we return the attributes unaltered.
        // Here we make sure we push the post's language data to Algolia.
        $attributes['wpml'] = apply_filters( 'wpml_post_language_details', null,  $post->ID );
        return $attributes;
    }

    // Get the field value with the 'get_field' method and assign it to the attributes array.
    // @see https://www.advancedcustomfields.com/resources/get_field/
    
    $post_name = $post->post_name;
    $cover_image = get_field('cover_image', $post->ID);
    $description = get_field('description', $post->ID);    
    $taxonomy = wp_get_post_terms($post->ID, 'taxonomy_concept', array( '' ));
    $location = get_field('location', $post->ID);

    $start_date = get_field('start_date', $post->ID);

    if($start_date) {
        $attributes['start_date'] = $start_date;
    }

    if($post_name) {
        $attributes['post_name'] = $post_name;
    }
    if($cover_image) {
        $attributes['cover_image'] = $cover_image["sizes"]["vh_thumbnail"];
        $attributes['cover_image_2x'] = $cover_image["sizes"]["vh_thumbnail@2x"];
    }
    if($description) {
        $attributes['description'] = $description;
    }
    if($location) {
        $attributes['location'] = $location;
    }
    if(count($taxonomy) > 0) {
        $attributes['taxonomy'] = array(
            "title" => $taxonomy[0]->name,
            "slug"  => $taxonomy[0]->slug
        );
    }

    // Here we make sure we push the post's language data to Algolia.
    $attributes['wpml'] = apply_filters( 'wpml_post_language_details', null,  $post->ID );

    // Always return the value we are filtering.
    return $attributes;
}

/**
 * @param array $settings
 *
 * @return array
 */
function my_posts_index_settings( array $settings ) {
    // We add the language code to the facets to be able to easily filter on it.
    $settings['attributesForFaceting'][] = 'wpml.language_code';

    return $settings;
}

add_filter( 'algolia_posts_index_settings', 'my_posts_index_settings' );
add_filter( 'algolia_searchable_posts_index_settings', 'my_posts_index_settings' );
?>