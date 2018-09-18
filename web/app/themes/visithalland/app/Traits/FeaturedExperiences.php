<?php

namespace App\Traits;

trait FeaturedExperiences
{

    /**
    * Returns content from theme options page for site banner
    * @return array Output banner content
    */
    public function featuredExperiences() {
    	$term = get_queried_object();
    	$featured_experiences = get_field('featured', $term);

        return $featured_experiences;
    }
}
