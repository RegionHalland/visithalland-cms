<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TaxonomyTaxonomyConcept extends Controller
{

	use \App\Traits\TopLists;
	use \App\Traits\FeaturedExperiences;
    use \App\Traits\FeaturedArticle;
	
    public function term()
    {
        return get_queried_object();
    }

    public function posts() {
    	return \App::getPosts(array("happening", "places", "companies"), get_queried_object(), -1);
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
