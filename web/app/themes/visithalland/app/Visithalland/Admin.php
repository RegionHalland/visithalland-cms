<?php

namespace App\Visithalland;

class Admin
{
	public function __construct()
	{
		add_action('admin_menu', array($this, 'addTaxonomyMenuItem'));
		add_action('parent_file', array($this, 'highlightTaxonomyMenuItem'));
		add_action('admin_menu', array($this, 'addCreateContentMenuItem'));
		add_action('admin_menu', array($this, 'addAdayInHallandMenuItem'));

		// Create option sub pages
		add_action('acf/init', array($this, 'addThemeSettingsOption'));
		add_action('acf/init', array($this, 'addAdayInHallandOption'));
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
	    add_menu_page('Skapa innehåll', 'Skapa innehåll', 'publish_pages', 'create_content', '', 'dashicons-welcome-write-blog', 10);
	}

	public function addAdayInHallandMenuItem()
	{
		// Adds menu group A Day in Halland related content
	    add_menu_page('A Day in Halland', 'A Day in Halland', 'publish_pages', 'a_day_in_halland', '', 'dashicons-tide', 10);
	}

	public function addThemeSettingsOption()
	{
		if( function_exists('acf_add_options_page') ) {
			// Adds Theme Options Page 
			acf_add_options_sub_page(array(
				'page_title'    => __('Temainställningar', 'visithalland'),
				'menu_title'    => __('Temainställningar', 'visithalland'),
				'parent_slug'   => 'themes.php',
				'capability'    => 'edit_posts',
				'redirect'      => false
			));
		}
	}

	public function addAdayInHallandOption()
	{
		if(function_exists('acf_add_options_page') ) {
			acf_add_options_sub_page(array(
				'page_title'    => __('Listordning', 'visithalland'),
				'menu_title'    => __('Listordning', 'visithalland'),
				'parent_slug'   => 'a_day_in_halland',
				'post_id'    => 'a_day_in_halland' . $this->getLangSuffix(),
				'capability'    => 'edit_posts',
				'redirect'      => false
			));
		}
	}

	// Get language suffix if not default language
	function getLangSuffix()
	{
		if( function_exists('icl_get_languages')){
			global $sitepress;
			$default_lang = $sitepress->get_default_language();
			$lang = ICL_LANGUAGE_CODE;
			if($lang != $default_lang) return '_'.$lang;
		}

		return '';
	}
}