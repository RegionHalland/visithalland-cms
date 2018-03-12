<?php

namespace App\Traits;

trait Posts
{
    use Authors;
    use Taxonomies;

    public static function getHappenings(Int $number_posts = 3)
    {
        $tax_query = array();

        $posts = get_posts(array(
            'post_type' => array(
                "happening"
            ),
            'numberposts'  => $number_posts,
            'tax_query' 	 => $tax_query,
            'suppress_filters' => false
        ));

        foreach ($posts as $key => $value) {
            // Self here actually refers to our trait Authors. See ”use Authors;” Above.
            $value->author = self::getAuthor($value->post_author);
            // Get all ACF meta_fields of the WP_post
            $value->meta_fields = get_fields($value->ID);
            $value->terms = self::getTerms($value);
        }

        // Sort happenings by start date asc.
        usort($posts, function ($a, $b) {
            return strcmp(strtotime($a->meta_fields["start_date"]), strtotime($b->meta_fields["start_date"]));
        });

        return $posts;
    }

    /*private static function getAuthor(){
        return array("author" => "my authorr");
    }*/
}
