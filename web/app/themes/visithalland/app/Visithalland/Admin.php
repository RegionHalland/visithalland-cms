<?php

namespace App\Visithalland;

class Admin
{

	public function __construct()
	{
		add_action('admin_menu', array($this, 'addTaxonomyMenuItem'));
		add_action('admin_menu', array($this, 'addCreateContentMenuItem'));
		add_action('parent_file', array($this, 'highlightTaxonomyMenuItem'));


		//Adds filter for adding properties to post object
		add_filter('acf/format_value/type=relationship', array($this, 'my_acf_load_value'), 11, 3);
		add_filter('the_posts', array($this, 'filter_the_posts'), 10, 1 );
	}

	public function filter_the_posts($posts)
	{
		//Don't filter posts on admin pages
		if(is_admin()) return $posts;

		$image_sizes = get_intermediate_image_sizes();
        foreach ($posts as $key => $post) {
        	$thumbnail_id = get_post_thumbnail_id($post->ID);
        	$thumbnail = get_post($thumbnail_id);
            $post->featured_image = [];

            // Here we add image meta data to the post object
	    	$post->alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
	    	$post->photographer = $thumbnail->post_content;
	    	$post->image_caption = $thumbnail->post_excerpt;
	    	$post->excerpt = get_field('excerpt', $post->ID);
	    	$post->url = get_the_permalink($post->ID);

	    	// Here we add image sizes and image urls to the post object
			$post->featured_image = array_fill_keys($image_sizes, '');
            foreach ($image_sizes as $key => $image_size) {
                $post->featured_image[$image_size] = get_the_post_thumbnail_url($post, $image_size);
            }

        }
		return $posts;
	}

	public function my_acf_load_value($value, $post_id, $field)
	{
		//Don't filter posts on admin pages
		if(is_admin()) return $posts;
		
		$image_sizes = get_intermediate_image_sizes();

        foreach ($value as $key => $current_value) {
        	$thumbnail_id = get_post_thumbnail_id($current_value->ID);
        	$thumbnail = get_post($thumbnail_id);
            $current_value->featured_image = [];

            // Here we add image meta data to the post object
	    	$current_value->alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
	    	$current_value->photographer = $thumbnail->post_content;
	    	$current_value->image_caption = $thumbnail->post_excerpt;
	    	$current_value->excerpt = get_field('excerpt', $current_value->ID);
	    	$current_value->url = get_the_permalink($current_value->ID);

	    	// Here we add image sizes and image urls to the post object
            $current_value->featured_image = [];
            $current_value->featured_image = array_fill_keys($image_sizes, '');
            foreach ($image_sizes as $key => $image_size) {
                $current_value->featured_image[$image_size] = get_the_post_thumbnail_url($current_value, $image_size);
            }
        }

		return $value;
	}


	public function addTaxonomyMenuItem()
	{
		// Add a new top-level menu (ill-advised):
    	add_menu_page(__('Upplevelser', 'visithalland'), __('Upplevelser', 'visithalland'), 'manage_options', 'edit-tags.php?taxonomy=experience', '', 'dashicons-tag', 11);
	}

	public function highlightTaxonomyMenuItem($file)
	{
		// Highlight the Taxonomy Concept menu item
	    global $current_screen;

	    $taxonomy = $current_screen->taxonomy;
	    if ( $taxonomy == 'experience' ) {
	        $file = 'edit-tags.php?taxonomy=experience';
	    }

	    return $file;
	}

	public function addCreateContentMenuItem()
	{
	    // Adds menu group for Custom Post Types
	    add_menu_page('Skapa innehåll','Skapa innehåll', 'administrator' , 'create_content', '', 'dashicons-welcome-write-blog' , 10);

	    if (!function_exists('acf_add_options_page')) {
	        return false;
	    }
	    
	    // Adds Theme Options Page 
	    $themeOptionsCapability = 'administrator';
	    $themeOptionsParent = 'themes.php';

	    global $submenu;
	    
	    $submenu[$themeOptionsParent][] = array( 
	        '', 
	        'read', 
	        '', 
	        '', 
	        'wp-menu-separator'
	    );

	    acf_add_options_sub_page(array(
	        'page_title'    => __('Temainställningar', 'visithalland'),
	        'menu_title'    => __('Temainställningar', 'visithalland'),
	        'parent_slug'   => $themeOptionsParent,
	        'capability'    => $themeOptionsCapability,
	        'redirect'      => false
	    ));
	}

}