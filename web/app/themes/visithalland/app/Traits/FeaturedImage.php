<?php

namespace App\Traits;

trait FeaturedImage
{

    /**
    * Returns content from theme options page for site banner
    * @return array Output banner content
    */
    public static function getFeaturedImageObject($post) {
    	$featured_image = array();
    	
    	$image_sizes = get_intermediate_image_sizes();
    	$sizes = array();
    	$sizes = array_fill_keys($image_sizes, '');

    	if( ! has_post_thumbnail($post)) {
    		return array(
	    		"sizes" => $sizes,
	    		"alt" => "",
	    		"title" => "",
	    		"image_caption" => ""
	    	);
    	}

    	$thumbnail_id = get_post_thumbnail_id($post);
		$thumbnail_post = get_the_post_thumbnail($thumbnail_id);
    	$featured_image = array();
    	$thumbnail_post = get_post($thumbnail_id);
    	$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

       	foreach ($image_sizes as $key => $image_size) {
        	$sizes[$image_size] = get_the_post_thumbnail_url($post, $image_size);
        }

    	$featured_image = array(
    		"sizes" => $sizes,
    		"alt" => $alt,
    		"title" => $thumbnail_post->post_content,
    		"image_caption" => $thumbnail_post->post_excerpt
    	);

        return $featured_image;
    }
}
