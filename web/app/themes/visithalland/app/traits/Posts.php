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

    public static function getHappenings(Int $number_posts = 3)
    {
        $tax_query = array();

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

    public static function getPosts(array $exludeTypes = array("happening"), \WP_Term $term = null, int $numberposts = 10)
    {
        self::$post_types = array_diff(self::$post_types, $exludeTypes);

        if($term !== null) {
            $tax_query = array(
                array(
                    'taxonomy' => 'taxonomy_concept',
                    'field' 	 => 'id',
                    'terms'	 => $term->term_id, // Where term_id of Term 1 is "1".
                    'include_children' => false
                )
            );
        }

        $posts = get_posts(array(
            'post_type'   => self::$post_types,
            'numberposts' => $numberposts,
            'tax_query'   => $tax_query ? $tax_query : null
            //'exclude' 	 => $exclude,
        ));

        foreach ($posts as $key => $value) {
            $value->terms = self::getTerms($value);
            $value->post_type_label = get_post_type_object($value->post_type)->labels->name;

        }

        return $posts;

        /*if (!isset($term)) {
            $terms = wp_get_post_terms($post_id, 'taxonomy_concept', array( '' ));
            $tax_query = array(
                    array(
                        'taxonomy' => 'taxonomy_concept',
                        'field' 	 => 'id',
                        'terms'	 => $terms[0]->term_id, // Where term_id of Term 1 is "1".
                        'include_children' => false
                    )
                );
            $exclude = array($post_id);
        } else {
            $tax_query = array(
                    array(
                        'taxonomy' => 'taxonomy_concept',
                        'field' 	 => 'id',
                        'terms'	 => $term->term_id, // Where term_id of Term 1 is "1".
                        'include_children' => false
                    )
                );
        }

            $posts = get_posts(array(
                'post_type' => array(
                        "editor_tip",
                        "trip",
                        "happening"
                ),
                'numberposts'  => $numberposts,
                'exclude' 	 => $exclude,
                'tax_query' 	 => $tax_query
            ));

            foreach ($posts as $key => $value) {
                $value->meta_fields = get_fields($value->ID);
                $value->author = vh_get_author($value->post_author);
                $value->taxonomy = array(
                            "name" 	=> wp_get_post_terms($value->ID, 'taxonomy_concept', array( '' ))[0]->name,
                            "slug"	=> wp_get_post_terms($value->ID, 'taxonomy_concept', array( '' ))[0]->slug
                        );
            }
            return $posts;*/
    }
}
