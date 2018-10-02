<?php

namespace App\Visithalland;

class Filters
{
	use \App\Traits\FeaturedImage;

	public function __construct()
	{
		//Adds filter for adding properties to acf post object
		add_filter('acf/format_value/type=relationship', array($this, 'my_acf_load_value'), 11, 3);

		//Adds filter for adding properties to post object
		add_filter('the_posts', array($this, 'filter_the_posts'), 10, 1 );
	}

	public function filter_the_posts($posts)
	{
		//Don't filter posts on admin pages
		if( is_admin() ) return $posts;
		if( ! is_main_query()) return $posts;

		foreach ($posts as $key => $v) {
			$v->featured_image = $this->getFeaturedImageObject($v);
		}

		return $posts;
	}

	public function my_acf_load_value($value, $post_id, $field)
	{
		if( is_admin() ) return $value;
		if( ! is_array($value) ) return $value;

		foreach ($value as $key => $v) {
			// Get featured image object on every post
			if(has_post_thumbnail($v)) $v->featured_image = $this->getFeaturedImageObject($v);

			// Get permalink and excerpt on every post
			$v->excerpt = get_field('excerpt', $v->ID);
	    	$v->url = get_the_permalink($v->ID);
		}

		return $value;
	}
}