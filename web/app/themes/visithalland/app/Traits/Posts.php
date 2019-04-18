<?php

namespace App\Traits;
use RegionHalland\VisithallandCustomPostTypes;

trait Posts
{
    use Authors;
    use Taxonomies;

    public static $post_types = array();

    function __construct()
    {
        // We use the constant in the visithalland-custom-post-types plugin.
        self::$post_types = VISITHALLAND_POST_TYPES;
    }

    public static function getHappenings(Int $number_posts = 3, \WP_Term $term = null)
    {

        if($term !== null) {
            $tax_query = array(
                array(
                    'taxonomy' => 'experience',
                    'field'      => 'id',
                    'terms'  => $term->term_id, // Where term_id of Term 1 is "1".
                    'include_children' => false
                )
            );
        } else {
             $tax_query = array();
        }

        $posts = get_posts(array(
            'post_type' => array(
                "happening"
            ),
            'numberposts'  => $number_posts,
            'tax_query' 	 => $tax_query,
            'suppress_filters' => false
        ));

        foreach ($posts as $key => $value) {
            // Self here actually refers to our trait Authors. See ”use Authors;” Above.
            $value->author = self::getAuthor($value->post_author);
            $value->link = get_permalink($value->ID);
            // Get all ACF meta_fields of the WP_post
            $value->meta_fields = get_fields($value->ID);
            $value->terms = self::getTerms($value);
        }

        // Sort happenings by start date asc.
        usort($posts, function ($a, $b) {
            return strcmp(strtotime($a->meta_fields["start_date"]), strtotime($b->meta_fields["start_date"]));
        });

        return $posts;
    }

    public static function getPosts(array $exludeTypes = array("happening"), \WP_Term $term = null, int $numberposts = 10, Bool $excludeSelf = false)
    {
        // Get the global $post object
        global $post;
        
        // Get our post types and remove those included inside $excludeTypes
        $postTypesDiff = array_diff(self::$post_types, $exludeTypes);
        $tax_query = array();
        $exclude = null;
        
        if($term !== null) {
            $tax_query = array(
                array(
                    'taxonomy'          => 'experience',
                    'field'             => 'id',
                    'terms'	            => $term->term_id, // Where term_id of Term 1 is "1".
                    'include_children'  => false
                )
            );
        }

        // Should we exclude the current Post? Used in recommended articles
        if($excludeSelf) {
            $exclude = $post->ID;
        }

        // TODO: Remove this to remove bug where latest post do not show 'exclude' => $post->ID
        $posts = get_posts(array(
            'post_type'   => $postTypesDiff,
            'numberposts' => $numberposts,
            'tax_query'   => $tax_query ? $tax_query : null,
            'exclude' 	 => $exclude,
            'suppress_filters' => false
        ));

        foreach ($posts as $key => $value) {
            $value->terms = self::getTerms($value);
            $value->post_type_label = get_post_type_object($value->post_type)->labels->name;
        }

        return $posts;
    }

    public static function getPostsConceptGridTemp(array $exludeTypes = array("happening"), \WP_Term $term = null, int $numberposts = 10)
    {
        // Get the global $post object
        global $post;

        // Get our post types and remove those included inside $excludeTypes
        $postTypesDiff = array_diff(self::$post_types, $exludeTypes);

        $tax_query = array();
        if($term !== null) {
            $tax_query = array(
                array(
                    'taxonomy' => 'taxonomy_concept',
                    'field'      => 'id',
                    'terms'  => $term->term_id, // Where term_id of Term 1 is "1".
                    'include_children' => false
                )
            );
        }

        $posts = get_posts(array(
            'post_type'   => $postTypesDiff,
            'numberposts' => $numberposts,
            'tax_query'   => $tax_query ? $tax_query : null
        ));

        foreach ($posts as $key => $value) {
            $value->terms = self::getTerms($value);
            $value->post_type_label = get_post_type_object($value->post_type)->labels->name;
        }

        return $posts;
    }

    public static function getNextPostLink()
    {
        global $post;
        
        //global $sitepress;
        //wp_die(json_encode($sitepress->get_current_language()));

        // Get terms for post
        $terms = get_the_terms($post->ID, 'experience');
        if(!$terms) return [];
        // Loop over each item since it's an array
        if ($terms != null) {
            foreach ($terms as $term) {
                // Print the name method from $term which is an OBJECT
                $termSlug = $term->slug;
                // Get rid of the other data stored in the object, since it's not needed
                unset($term);
            }
        }

        $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
        // get_posts in same custom taxonomy
        $postlist_args = array(
            'paged' => get_query_var('paged'),
            'posts_per_page' => -1,
            'orderby' => 'title',
            'post__not_in' => array($post->ID),
            'post_type' => array(
                "meet_local",
                "editor_tip",
                "spotlight",
                "happening",
                "tips_guides"
            ),
            'experience' => isset($termSlug) ? $termSlug : '' // get slug of product category from above - change productcat for your taxonomy slug
        );
        $postlist = get_posts($postlist_args);

        $urlList = array();
        foreach ($postlist as $key => $value) {
            array_push($urlList,
                array(
                    "permalink" => get_permalink($value->ID),
                    "post_title" => $value->post_title,
                    "thumbnailUrl" => get_the_post_thumbnail_url( $value->ID, 'vh_thumbnail' ),
                    "thumbnailAlt" => get_the_post_thumbnail_caption($value->ID),
                )
            );
        }

        return $urlList;
    }
}
