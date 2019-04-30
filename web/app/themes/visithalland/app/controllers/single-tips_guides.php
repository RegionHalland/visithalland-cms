<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingelTipsGuides extends Controller
{
	public function mentions() {

	    $mentions = get_field("mentioned"); 
	    
		return $mentions;
	}
}
