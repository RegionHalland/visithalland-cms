<?php

namespace App\Traits;

trait Taxonomies
{
    public static function getTerms(\WP_Post $post, string $taxonomy = "experience")
    {
        global $sitepress;
        global $icl_adjust_id_url_filter_off;
        $terms_default_lang = array();
        $terms = wp_get_post_terms($post->ID, $taxonomy);

        if(is_wp_error($terms)){
            // No terms where found for the post.
            return "No terms found.";
        }

        if(is_array($terms) && isset($terms[0])){
            /**
             * TODO: Try to get the wordpress primary terms in the future, if possible.
             * For now, just let's pick the first term.
            */
            $term_id = $terms[0]->term_id;
            $default_term_id = (int) icl_object_id($term_id, $taxonomy, true, $sitepress->get_default_language());
            $orig_flag_value = $icl_adjust_id_url_filter_off;
            $icl_adjust_id_url_filter_off = true;
            $terms_default_lang = get_term($default_term_id, $taxonomy);
            $icl_adjust_id_url_filter_off = $orig_flag_value;
        }

        return array(
            "terms" => $terms,
            "terms_default_lang" => $terms_default_lang
        );
    }

    public static function getTermClassName(string $taxonomy = "experience")
    {
        global $post;

        // For taxonomy-experience
        if(is_archive() && is_tax()) {
            $post = get_queried_object();
            //var_dump($post->slug);
            //$terms = wp_get_post_terms($post->ID, $taxonomy);
            return $post->slug;
        }

        // For general places where $post actually is a single post and not a post type archive
        if(wp_get_post_terms($post->ID, $taxonomy) && !is_post_type_archive()) {
            $terms = wp_get_post_terms($post->ID, $taxonomy);
            if(is_array($terms)){
                $term = $terms[0];
                return get_field("class_name", $term);
            }
        } else {
            return "visithalland";
        }
    }

}
