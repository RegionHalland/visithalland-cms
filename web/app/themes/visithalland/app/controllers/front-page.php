<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{

	use \App\Traits\TopLists;

	public function navigationItems() {
		return \App::getPrimaryNavigationChildren();
	}

	public function recentPosts() {
		return \App::getPosts(array('event', 'happening', 'activity', 'companies', 'place'), null, 10);

	}

}
