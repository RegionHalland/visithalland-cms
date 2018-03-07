<?php

namespace App\Traits;

trait Taxonomies
{
    public static function getTerms(\WP_Post $post, string $taxonomy = "taxonomy_concept")
    {
        global $sitepress;
        global $icl_adjust_id_url_filter_off;
        $terms_default_lang = array();
        $terms = wp_get_post_terms($post->ID, $taxonomy);

        if(is_wp_error($terms)){
            // No terms where found for the post.
            return "No terms found.";
        }

        if(is_array($terms)){
            /**
             * TODO: Try to get the wordpress primary terms in the future, if possible.
             * Let's pick the first term.
            */
            $term_id = $terms[0]->term_id;
            $default_term_id = (int) icl_object_id($term_id, $taxonomy, true, $sitepress->get_default_language());
            $orig_flag_value = $icl_adjust_id_url_filter_off;
            $icl_adjust_id_url_filter_off = true;
            $terms_default_lang = get_term($default_term_id, $taxonomy);
            $icl_adjust_id_url_filter_off = $orig_flag_value;
        }

        /*var_dump($terms_default_language);
        var_dump($terms);
        wp_die();*/

        return array(
            "terms" => $terms,
            "terms_default_lang" => $terms_default_lang
        );
    }
}
