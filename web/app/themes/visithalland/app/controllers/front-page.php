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
		return \App::getPosts(array('event', 'happening', 'activity', 'companies', 'places', 'top_list'), null, 10);
	}

	public function happenings() {
		return \App::getHappenings(4);
	}

}
