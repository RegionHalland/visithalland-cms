<?php

namespace App\Traits;

trait Breadcrumbs
{

    /**
     * Returns array of breadcrumbs.
     * @return array
     */
    public function getBreadcrumbs()
    {

        global $post;

        var_dump("HAHAAHAH");

        if (!is_a($post, 'WP_Post') || is_front_page()) {
            return;
        }
        
        $title = get_the_title();
        $post_type = get_post_type_object($post->post_type);
        $breadcrumbs = self::addBreadcrumb(array(), __('Home'), get_home_url());
        

        if (is_single() && $post_type->has_archive) {
            $cpt_archive_link = (is_string($post_type->has_archive)) ? 
                get_permalink(get_page_by_path($post_type->has_archive)) : 
                get_post_type_archive_link($post_type->name);

            $breadcrumbs = self::addBreadcrumb($breadcrumbs, $post_type->label, $cpt_archive_link);
        }

        var_dump("HAHAAHAH");

        if (isset(wp_get_post_terms($post->ID, 'taxonomy_concept')[0])) {
            $term = wp_get_post_terms($post->ID, 'taxonomy_concept')[0];

            var_dump(!is_archive());
            var_dump(term_exists($term->name));
            if (term_exists($term->name) && !is_archive()) {
                $breadcrumbs = self::addBreadcrumb($breadcrumbs, $term->name, get_term_link($term->term_id));
                var_dump(get_term_link($term->term_id));
            }
        }
           
        if (is_page() || (is_single() && $post_type->hierarchical == true)) {
                if ($post->post_parent) {
                    $anc = array_reverse(get_post_ancestors($post->ID));
                    $title = get_the_title();

                    foreach ($anc as $ancestor) {
                        if (get_post_status($ancestor) != 'private') {

                            $breadcrumbs = self::addBreadcrumb($breadcrumbs, get_the_title($ancestor), get_permalink($ancestor));
                        }
                    }
                    
                    $breadcrumbs = self::addBreadcrumb($breadcrumbs, $title, false);

                } else {
                    $breadcrumbs = self::addBreadcrumb($breadcrumbs, get_the_title(), false);
                }
            } else {
                if (is_home()) {
                    $title = single_post_title();
                } elseif (is_tax()) {
                    $title = single_cat_title(null, false);
                } elseif (is_category()) {
                    $title = get_the_category();
                } elseif (is_archive()) {
                    $title = post_type_archive_title(null, false);
                } else {
                    $title = get_the_title();
                }
                
                $breadcrumbs = self::addBreadcrumb($breadcrumbs, $title, false);
        }

        return $breadcrumbs;
    }

    /**
     * Add item to breadcrumbs list
     * @param array $list 
     * @param string $name
     * @param string|boolean $url
     * @return array
     */
    public static function addBreadcrumb($list, $name, $url)
    {
        $list[] = array(
            'name' => $name,
            'url' => $url
        );
        return $list;
    }
}