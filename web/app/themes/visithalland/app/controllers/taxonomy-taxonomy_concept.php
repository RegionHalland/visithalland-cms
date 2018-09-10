<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TaxonomyTaxonomyConcept extends Controller
{

	use \App\Traits\TopLists;
	
    public function term()
    {
        return get_queried_object();
    }

    public function navigationItems() {
		return \App::getPrimaryNavigationChildren();
	}

    public function happenings() {
		return \App::getHappenings(4, $this->term());
	}
}
