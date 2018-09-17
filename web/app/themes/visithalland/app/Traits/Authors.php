<?php

namespace App\Traits;

trait Authors
{
    /**
    * Returns author of received author id.
    *
    * @param string $author_id Author id as a string value.
    * @return array Output author with some properties
    */
    public static function getAuthor($author_id)
    {
        $author = array(
            "ID" => $author_id,
            "name" => get_user_by("id", $author_id)->display_name,
            "role" => get_field('role', 'user_'.$author_id),
            "profile_image" => get_field('profile_image', 'user_'.$author_id),
            "byline_image" => get_field('byline_image', 'user_'.$author_id)
        );

        return $author;
    }
}
