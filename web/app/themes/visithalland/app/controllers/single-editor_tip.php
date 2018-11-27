<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleEditorTip extends Controller
{
	public function mentions() {

	    $mentions = get_field("mentioned"); 
	    
		return $mentions;
	}
}
