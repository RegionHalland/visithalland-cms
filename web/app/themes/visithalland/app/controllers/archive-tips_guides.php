<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class ArchiveTipsGuides extends Controller
{
	use \App\Traits\TopLists;

	public function featuredPosts()
	{
		return get_field('featured-tips-guides', 'option');
	}
}
