<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class FrontPage extends Controller
{
	use \App\Traits\TopLists;

	public function navigationItems() {
		return \App::getPrimaryNavigationChildren();
	}

	public function campaignMode()
	{
		return get_field('campaign_toggle');
	}

	public function campaignTitle()
	{
		return get_field('campaign_title');
	}

	public function campaignImg()
	{
		return get_field('campaign_img');
	}

	public function campaignExcerpt()
	{
		return get_field('campaign_excerpt');
	}

	public function campaignInternalLink()
	{
		return get_field('internal_link');
	}

	public function campaignExternalLink()
	{
		return get_field('external_link');
	}

	public function recentPosts() {
		return \App::getPosts(array('event', 'happening', 'activity', 'companies', 'places', 'top_list'), null, 10);
	}

	public function happenings() {
		return \App::getHappenings(4);
	}

}
