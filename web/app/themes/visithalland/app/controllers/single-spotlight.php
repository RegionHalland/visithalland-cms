<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleSpotlight extends Controller
{

	public function spotlights() {
		$spotlights = get_field("stops");

		return $spotlights;
	}

}
