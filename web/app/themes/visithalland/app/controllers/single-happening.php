<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleHappening extends Controller
{
	
	public function happenings() {
		return \App::getHappenings(3);
	}

}
