<?php

namespace App\Traits;

trait TopLists
{

    /**
    * Returns top list acf repeater field from selected pages
    * @return array Output top list array
    */
    public function topLists() {
        global $post;

        if (is_tax()) {
            $term = get_queried_object();
            return get_field('top_lists', $term);
        }

        if (is_archive() && !is_tax()) {
            return get_field('top_lists', 'option');
        }

        return get_field('top_lists', $post->ID);
    }
}
