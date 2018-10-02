<?php

namespace App\Visithalland;

class Admin
{
	public function __construct()
	{
		add_action('admin_menu', array($this, 'addTaxonomyMenuItem'));
		add_action('admin_menu', array($this, 'addCreateContentMenuItem'));
		add_action('parent_file', array($this, 'highlightTaxonomyMenuItem'));
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