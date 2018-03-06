<?php
namespace App;

use Sober\Controller\Controller;

class App extends Controller
{
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

	public function langs()
	{
		$langs = icl_get_languages('skip_missing=N&orderby=KEY&order=DIR&link_empty_to=str');

		return $langs;
		//$langMenuCode = ICL_LANGUAGE_CODE != "sv" ? "-" . ICL_LANGUAGE_CODE : "";
		//$menuItems = wp_get_nav_menu_items("sekundar-meny" . $langMenuCode);
	}

	public function secondaryMenuItems()
	{
		$secondary_menu_items = wp_get_nav_menu_items("sekundar-meny" . $langMenuCode);

		return $secondary_menu_items;

		//$langMenuCode = ICL_LANGUAGE_CODE != "sv" ? "-" . ICL_LANGUAGE_CODE : "";
	}
}
