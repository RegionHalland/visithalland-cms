<?php

namespace App\Traits;

trait Navigation
{
    public static function getPrimaryNavigationItems()
    {
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
                    $term = get_term(get_post_meta( $child->ID, '_menu_item_object_id', true ));
                    $child->meta_fields = get_fields($term);
                    //$child->meta_fields = get_fields($child);
                    array_push($item->children, $child);
                    unset($child_items[$key]);
                }
        
        // return navbar object where child items are grouped with parents
        return $navbar_items;
    }
 
    public static function getPrimaryNavigationChildren()
    {
        $children = array();
        $primaryNavigationItems = self::getPrimaryNavigationItems();
        foreach ($primaryNavigationItems as $key => $value) {
            if (is_array($value->children)){
                foreach ($value->children as $k => $v) {
                    array_push($children, $v);
                }
            }
        }

        //Return all children from all primary navigation items
        return $children;
    }

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
