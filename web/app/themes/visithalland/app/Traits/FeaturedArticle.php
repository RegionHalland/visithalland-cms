<?php

namespace App\Traits;

trait FeaturedArticle
{

    /**
    * Returns content from theme options page for site banner
    * @return array Output banner content
    */
    public function featuredArticle() {
    	$term = get_queried_object();
        $featured_article = get_field('featured_article', $term);
        
        return $featured_article;
    }
}
