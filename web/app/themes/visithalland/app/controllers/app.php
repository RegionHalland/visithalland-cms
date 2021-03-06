<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller
{
    use Traits\Posts;
    use Traits\Navigation;
    use Traits\Breadcrumbs;
    use Traits\Banner;
    use Traits\EuropeanUnion;

    public function siteName()
    {
        return get_bloginfo('name');
    }

    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
	}

	public function nonActiveLangs()
	{
		$all_langs = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');

        // Filter out so we only return the langauges that is not active.
        $non_active_langs = array_filter($all_langs, function($lang) {
            return $lang["active"] == false;
        });

		return $non_active_langs;
	}

    public static function classNameGenerator(Array $classes)
    {
        $classString = "";
        foreach ($classes as $key => $value) {
            $classString .= $value . " ";
        }

        return $classString; 
    }
}
