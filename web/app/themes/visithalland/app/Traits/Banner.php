<?php

namespace App\Traits;

trait Banner
{

    /**
    * Returns content from theme options page for site banner
    * @return array Output banner content
    */
    public function banner() {
            
        $banner['title'] = get_field('banner_title', 'options');
        $banner['image'] = get_field('banner_image', 'options');
        $banner['link'] = get_field('banner_link', 'options');

        return $banner;
    }
}
