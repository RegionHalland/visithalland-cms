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
            $primary_menu_id = $nav_menus["primary_navigation"];
            $current_language_menu_id = apply_filters('wpml_object_id', $primary_menu_id, 'nav_menu', true);
            $primary_navigation_items = wp_get_nav_menu_items($current_language_menu_id);
            $newArr = array();
            foreach ($primary_navigation_items as $key => $value) {
                // Get term object of navigation item
                /*if($value->menu_item_parent != "0") {
                    //$value->children = "$value";
                    //$primary_navigation_items[$key] .= $value;
                    //unset($primary_navigation_items[$key]);
                    //array_push($newArr, $value);
                    //$newArr .= $value;
                }*/

                $term = get_term(get_post_meta( $value->ID, '_menu_item_object_id', true ));
                $value->meta_fields = get_fields($term);
            }

            return $newArr;
        }

        //return ["Error"];

        //$menuItems = self::getMenuItemsFromLocation('primary_navigation');
        //var_dump($menuItems);
        return;
    }

    static function get_navbar_items () {
        $nav_menus = get_nav_menu_locations();
        $primary_menu_id = $nav_menus["primary_navigation"];
        $current_language_menu_id = apply_filters('wpml_object_id', $primary_menu_id, 'nav_menu', true);
        // wordpress does not group child menu items with parent menu items
        $navbar_items = wp_get_nav_menu_items($current_language_menu_id);
        $child_items = [];
        // pull all child menu items into separate object
        foreach ($navbar_items as $key => $item) if ($item->menu_item_parent) {
            array_push($child_items, $item);
            unset($navbar_items[$key]);
        }
        // push child items into their parent item in the original object
        foreach ($navbar_items as $item)
            foreach ($child_items as $key => $child)
                if ($child->menu_item_parent == $item->ID) {
                    if (!$item->children) $item->children = [];
                    array_push($item->children, $child);
                    unset($child_items[$key]);
                }
        // return navbar object where child items are grouped with parents
        return $navbar_items;
    }


    /*public static function getSecondaryNavigation() {
        return Navigation->secondaryMenuItems();
    }*/

    /**
    * Returns navigation items located at the menu of theme_location secondary_navigation
    *
    * @return array Output menu items in current language
    */
    static function secondaryMenuItems()
	{
        /*
            TODO: Make the secondary menu item non static. So it can be named anything. Maybe
            we can use the theme_location instead.

            If the language code is sv (Swedish) we don't prefix the menu name with the code because sv is default.
            We assume that the secondary menu name is ”sekundar-meny” for swedish and ”sekundar-meny-{languagecode}” for other languages.
        */

        $lang_menu_code = ICL_LANGUAGE_CODE != "sv" ? "-" . ICL_LANGUAGE_CODE : "";
		$secondary_menu_items = wp_get_nav_menu_items("support-meny" . $lang_menu_code);

		return $secondary_menu_items;
    }

    /**
    * Returns navigation items located at the menu of theme_location primary_navigation
    *
    * @return array Output menu items in current language
    */
    public static function getStNavigation() {
        $nav_menus = get_nav_menu_locations();

        if(isset($nav_menus["skordetider_navigation"])){
            return wp_get_nav_menu_items($nav_menus["skordetider_navigation"]);
        }

        return ["Error"];
    }

}
