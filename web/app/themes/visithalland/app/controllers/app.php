<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller
{
    use Traits\Posts;

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

	public function secondaryMenuItems()
	{
        /*
            TODO: Make the secondary menu item non static. So it can be named anything. Maybe
            we can use the theme_location instead.

            If the language code is sv (Swedish) we don't prefix the menu name with the code because sv is default.
            We assume that the secondary menu name is ”sekundar-meny” for swedish and ”sekundar-meny-{languagecode}” for other languages.
        */

        $lang_menu_code = ICL_LANGUAGE_CODE != "sv" ? "-" . ICL_LANGUAGE_CODE : "";
		$secondary_menu_items = wp_get_nav_menu_items("sekundar-meny" . $lang_menu_code);

        //return $images;
		return $secondary_menu_items;
    }

    /*public static function vh_get_happenings($numberposts = 3)
    {
        $tax_query = array();

        $posts = get_posts(array(
            'post_type' => array(
                "happening"
            ),
            'numberposts'  => $numberposts,
            'tax_query' 	 => $tax_query,
            'suppress_filters' => false
        ));

        foreach ($posts as $key => $value) {
            $value->meta_fields = get_fields($value->ID);
            $value->author = vh_get_author($value->post_author);
            $value->taxonomy = array(
                "name" 	=> wp_get_post_terms($value->ID, 'taxonomy_concept', array( '' ))[0]->name,
                "slug"	=> wp_get_post_terms($value->ID, 'taxonomy_concept', array( '' ))[0]->slug
            );
        }

        //Sort happenings by start date
        usort($posts, function ($a, $b) {
            return strcmp(strtotime($a->meta_fields["start_date"]), strtotime($b->meta_fields["start_date"]));
        });

        return $posts;
    }

    }*/
}
