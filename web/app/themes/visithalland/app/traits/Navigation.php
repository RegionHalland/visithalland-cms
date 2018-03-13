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
            foreach ($primary_navigation_items as $key => $value) {
                // Get term object of navigation item
                $term = get_term(get_post_meta( $value->ID, '_menu_item_object_id', true ));
                $value->meta_fields = get_fields($term);
            }

            return $primary_navigation_items;
        }

        return ["Error"];
    }

}
