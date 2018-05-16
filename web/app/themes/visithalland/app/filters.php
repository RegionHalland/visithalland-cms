<?php

namespace App;


/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'searchform'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Tell WordPress how to find the compiled path of comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );
    return template_path(locate_template(["views/{$comments_template}", $comments_template]) ?: $comments_template);
}, 10, 1);




/**
 * CUSTOM VISITHALLAND FILTERS
 */


 add_action('wp_loaded', function () {
    //$cal = new CalendarClient;
    //var_dump($cal->runRequest());
    //die();
 });

 /**
 * Add thumbnail url as a prop
 */
add_action('rest_api_init', function () {
    //Add featured image
    register_rest_field(
        'post', // Where to add the field (Here, blog posts. Could be an array)
        'featured_image_src', // Name of new field (You can call this anything)
        array(
            'get_callback' =>
                function ($object, $field_name, $request) {
                    if($object['featured_media'] === 0) {
                        return get_field("img_url", $object["id"]);
                    }

                    $feat_img_array = wp_get_attachment_image_src(
                        $object['featured_media'], // Image attachment ID
                        'vh_thumbnail',  // Size.  Ex. "thumbnail", "large", "full", etc..
                        true // Whether the image should be treated as an icon.
                    );

                    if(isset($feat_img_array[0])) return $feat_img_array[0];
                },
            'update_callback' => null,
            'schema'          => null,
        )
    );

    //Add meta fields
    register_rest_field(
        'post', // Where to add the field (Here, blog posts. Could be an array)
        'meta_fields', // Name of new field (You can call this anything)
        array(
            'get_callback' =>
                function ($object, $field_name, $request) {
                    return get_fields($object["id"]);
                },
            'update_callback' => null,
            'schema'          => null,
        )
    );

});


/**
 * Remove prev next link
 */

add_filter('wpseo_prev_rel_link', '__return_empty_string');
add_filter('wpseo_next_rel_link', '__return_empty_string');

/* Only show certain search results */
add_filter('pre_get_posts', function ($query)
{
    if ($query->is_search && !is_admin()) {
        $query->set('post_type', array(
            'places',
            'meet_local',
            'editor_tip',
            'trip',
            'happening',
            'places',
            'companies',
        ));
    }

    return $query;
});

//add_filter('pre_get_posts', 'searchfilter');
