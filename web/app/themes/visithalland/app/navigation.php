<?php

namespace App;

// Add active class to current menu item
add_filter('wp_get_nav_menu_items', function ($items, $menu, $args) {
    _wp_menu_item_classes_by_context($items);

    foreach ($items as $key => $value) {
        //if we have a current menu-item or a current-menu-parent page add our own active class
        if (in_array("current-menu-item", $value->classes) || in_array("current-menu-parent", $value->classes)) {
            array_push($value->classes, "active");
        }
    }
    return $items;
}, 10, 3);


if (class_exists("VisithallandCustomPostTypes") || class_exists("VisithallandCustomPostTypes")) {
    // Prefix all links to our custom posts using our taxnomy tags
    add_filter('post_type_link', function ($post_link, $post) {
        if (is_object($post) && in_array($post->post_type, VISITHALLAND_POST_TYPES)) {
            $terms = wp_get_object_terms($post->ID, 'taxonomy_concept');
            if ($terms) {
                return str_replace('%taxonomy_concept%', $terms[0]->slug, $post_link);
            } else {
                return str_replace('%taxonomy_concept%', 'coastal-living', $post_link);
            }
        }
        return $post_link;
    }, 10, 3);
} else {
    //TODO: throw error
    return _e('Missing plugin visithalland-custom-post-types or/and visithalland-custom-taxonomies.', 'visithalland');

    //echo new \WP_Error('broke', __("Plugin visithalland-custom-post-types missing", "visithalland-custom-post-types"))->get_error_message();

    /*if (is_wp_error($return) && WP_DEBUG) {
        echo $return->get_error_message();
    }*/
}

/*add_filter('init', function ()
{
    global $wp_rewrite;
    $wp_rewrite->page_structure = $wp_rewrite->root . 'coastal-living/%pagename%';
});*/