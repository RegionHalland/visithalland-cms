<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class PageHappenings extends Controller
{
	
	public function happenings() {
		return \App::getHappenings(40);
	}

}
