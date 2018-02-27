<?php 

/**
 * @param array   $shared_attributes
 * @param WP_Post $post
 *
 * @return array
 */
function my_post_shared_attributes( array $shared_attributes, WP_Post $post ) {
    // Here we make sure we push the post's language data to Algolia.
    $shared_attributes['wpml'] = apply_filters( 'wpml_post_language_details', null,  $post->ID );

    return $shared_attributes;
}

// Push WPML data for both posts and searchable posts indices.
add_filter( 'algolia_post_shared_attributes', 'my_post_shared_attributes', 10, 2 );
add_filter( 'algolia_searchable_post_shared_attributes', 'my_post_shared_attributes', 10, 2 );

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