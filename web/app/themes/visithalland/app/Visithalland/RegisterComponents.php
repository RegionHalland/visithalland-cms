<?php

namespace App\Visithalland;

class RegisterComponents
{
	public function __construct()
	{
		add_action('init', array($this, 'addComponents'));
	}

	public function addComponents() {
		\App\sage('blade')->compiler()->component('components.alert');
		\App\sage('blade')->compiler()->component('components.concept_thumbnail');
		\App\sage('blade')->compiler()->component('components.button');
		\App\sage('blade')->compiler()->component('components.article_thumbnail');
		\App\sage('blade')->compiler()->component('components.event_list_item');
		\App\sage('blade')->compiler()->component('components.header');
		\App\sage('blade')->compiler()->component('components.top_list');
		\App\sage('blade')->compiler()->component('components.article_image_thumbnail');
		\App\sage('blade')->compiler()->component('components.article_thumbnail_small');
		\App\sage('blade')->compiler()->component('components.article_full');
		\App\sage('blade')->compiler()->component('components.read_more');
		\App\sage('blade')->compiler()->component('components.scroll_indicator');
		\App\sage('blade')->compiler()->component('components.date');
		\App\sage('blade')->compiler()->component('components.icon_link');
		\App\sage('blade')->compiler()->component('components.theme_link');
		\App\sage('blade')->compiler()->component('components.author');
		\App\sage('blade')->compiler()->component('components.image_credit');
		\App\sage('blade')->compiler()->component('components.map');

	}
}