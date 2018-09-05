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
}
