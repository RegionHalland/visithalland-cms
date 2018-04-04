<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TaxonomyTaxonomyConcept extends Controller
{
    public function term()
    {
        return get_queried_object();
    }
}
