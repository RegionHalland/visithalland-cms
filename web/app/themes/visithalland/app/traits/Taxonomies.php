<?php

namespace App\Traits;

trait Taxonomies
{
    public static function getTerms(\WP_Post $post, string $taxonomy = "taxonomy_concept")
    {
        $terms = wp_get_post_terms($post->ID, $taxonomy);

        if(is_wp_error($terms)){
            // No terms where found for the post.
            return "No terms found.";
        }

        return $terms;
        /*var_dump($terms);
        die();*/

        /*$taxonomies = array(
                "name" 	=> wp_get_post_terms($post->ID, 'taxonomy_concept', array( '' ))[0]->name,
                "slug"	=> wp_get_post_terms($post->ID, 'taxonomy_concept', array( '' ))[0]->slug
        );*/

        return $terms;
    }

}
