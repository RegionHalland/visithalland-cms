<?php

namespace App\Traits;

trait Navigation
{
    /**
    * Returns navigation items located at the menu of theme_location primary_navigation
    *
    * @return array Output menu items in current language
    */
    public static function getPrimaryNavigation() {
        $nav_menus = get_nav_menu_locations();
        if(isset($nav_menus["primary_navigation"])){
            $primary_navigation_id = $nav_menus["primary_navigation"];
            $current_language_menu_id = apply_filters('wpml_object_id', $primary_navigation_id, 'nav_menu', true);
            $primary_navigation_items = wp_get_nav_menu_items($current_language_menu_id);

            $original_language_menu_id = $primary_navigation_id;
            $original_navigation_items = wp_get_nav_menu_items($current_language_menu_id);

            foreach ($primary_navigation_items as $key => $navigation_item) {

                foreach ($original_navigation_items as $k => $value) {
                    $navigation_item->post_name = strpos(end(explode('/', $navigation_item->url)), end(explode('/', $value->url))) ? "contains match" : "no match";
                }
                //var_dump($navigation_item->post_name);
                //$navigation_item->post_name = "beach-coast";
            }
            return $original_navigation_items;
        }

        return ["Error"];
    }


}
