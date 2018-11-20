<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TaxonomyTaxonomyConcept extends Controller
{

	use \App\Traits\TopLists;
	use \App\Traits\TaxonomyFeaturedPosts;
    use \App\Traits\FeaturedArticle;
	
    public function term()
    {
        return get_queried_object();
    }

    public function posts() {
    	$posts = \App::getPosts(array("happening", "places", "companies"), get_queried_object(), -1);
        // Get featured posts so we can remove them from the array. We only want to show every post one time
        $featured_posts = $this->taxonomyFeaturedPosts();
        
        // Remove featured posts from the $posts array
        foreach ($posts as $key => $value) {
            foreach ($featured_posts as $k => $v) {
                if($value->ID == $v->ID) {
                    unset($posts[$key]);
                }
            }
        }

        $posts = array_values($posts);
        return $posts;
    }

    public function postsWithPlacesCompanies() {
        return \App::getPosts(array("happening"), get_queried_object(), -1);
    }

    public function navigationItems() {
		return \App::getPrimaryNavigationChildren();
	}

    public function happenings() {
		return \App::getHappenings(4, $this->term());
	}

}
