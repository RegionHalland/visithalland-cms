<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class TemplateAboutUs extends Controller
{
	public function contacts() {

	 	$contacts = get_field('contact');
	    
		return $contacts;
	}
}
