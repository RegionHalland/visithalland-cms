<?php

namespace App\Traits;

trait TaxonomyFeaturedPosts
{

    /**
    * Returns content from theme options page for site banner
    * @return array Output banner content
    */
    public function taxonomyFeaturedPosts() {
    	$term = get_queried_object();
    	$taxonomy_featured_posts = get_field('featured', $term);

        return $taxonomy_featured_posts;
    }
}
