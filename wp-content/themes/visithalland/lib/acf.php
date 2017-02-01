<?php

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_utvalda_camping',
		'title' => 'Utvalda',
		'fields' => array (
			array (
				'key' => 'field_featured_camping',
				'label' => 'Utvalda',
				'name' => 'featured',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'event',
					1 => 'meet',
					2 => 'editortip',
					3 => 'places',
				),
				'taxonomy' => array (
					0 => 'taxonomy_segment:5',
					1 => 'taxonomy_segment:5',
					2 => 'taxonomy_segment:5',
					3 => 'taxonomy_segment:5',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post',
					'operator' => '==',
					'value' => '20248',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_utvalda_golf',
		'title' => 'Utvalda',
		'fields' => array (
			array (
				'key' => 'field_featured_golf',
				'label' => 'Utvalda',
				'name' => 'featured',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'event',
					1 => 'meet',
					2 => 'editortip',
					3 => 'places',
				),
				'taxonomy' => array (
					0 => 'taxonomy_segment:37',
					1 => 'taxonomy_segment:37',
					2 => 'taxonomy_segment:37',
					3 => 'taxonomy_segment:37',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post',
					'operator' => '==',
					'value' => '20250',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_utvalda_surf',
		'title' => 'Utvalda',
		'fields' => array (
			array (
				'key' => 'field_5888b0f78c9ec',
				'label' => 'Utvalda',
				'name' => 'featured',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'event',
					1 => 'meet',
					2 => 'editortip',
					3 => 'places',
				),
				'taxonomy' => array (
					0 => 'taxonomy_segment:36',
					1 => 'taxonomy_segment:36',
					2 => 'taxonomy_segment:36',
					3 => 'taxonomy_segment:36',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post',
					'operator' => '==',
					'value' => '20089',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_utvalda',
		'title' => 'Utvalda',
		'fields' => array (
			array (
				'key' => 'field_featured_all',
				'label' => 'Utvalda',
				'name' => 'featured',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'event',
					1 => 'meet',
					2 => 'editortip',
					3 => 'places',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post',
					'operator' => '==',
					'value' => '18581',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_marknadskoncept',
		'title' => 'Marknadskoncept',
		'fields' => array (
			array (
				'key' => 'field_58886d959b591',
				'label' => 'Omslagsbild',
				'name' => 'cover_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_58886ddf9b592',
				'label' => 'Omslagsfilm',
				'name' => 'cover_video',
				'type' => 'text',
				'instructions' => 'Länk till Vimeo.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'taxonomy_segment',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_event',
		'title' => 'Event',
		'fields' => array (
			array (
				'key' => 'field_58776d8e2095c',
				'label' => 'Beskrivning av event',
				'name' => 'description',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
				'required' => 1,
			),
			array (
				'key' => 'field_5873ad7947612',
				'label' => 'Länk till event',
				'name' => 'external_link',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
				'required' => 1,
			),
			array (
				'key' => 'field_5873adc947615',
				'label' => 'Startdatum',
				'name' => 'start_date',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
				'required' => 1
			),
			array (
				'key' => 'field_5873addb47616',
				'label' => 'Slutdatum',
				'name' => 'end_date',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
				'required' => 1
			),
			array (
				'key' => 'field_5873ada947613',
				'label' => 'Omslagsbild',
				'name' => 'cover_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'required' => 1
			),
			array (
				'key' => 'field_5873adb747614',
				'label' => 'Omslagsfilm',
				'name' => 'cover_video',
				'type' => 'text',
				'instructions' => 'Länk till Vimeo.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => ''
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'event',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_listor',
		'title' => 'Listor',
		'fields' => array (
			array (
				'key' => 'field_5878e37cd169f',
				'label' => 'Beskrivning',
				'name' => 'description',
				'type' => 'textarea',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_5873b9179f9aa',
				'label' => 'Omslagsbild',
				'name' => 'cover_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_58761277438fb',
				'label' => 'Se & Göra',
				'name' => 'places',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'places',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'list',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_meet-a-local',
		'title' => 'Meet a local',
		'fields' => array (
			array (
				'key' => 'field_5873b2c9f2a40',
				'label' => 'Namn på person',
				'name' => 'name',
				'type' => 'text',
				'instructions' => 'Ex. Therese Lindgren',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_58776f1a5b809',
				'label' => 'Titel på person',
				'name' => 'workrole',
				'type' => 'text',
				'instructions' => 'Ex. Känd bloggare',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5873b2d5f2a41',
				'label' => 'Presentation av person',
				'name' => 'bio',
				'type' => 'textarea',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_58776e34bf56a',
				'label' => 'Local story',
				'name' => 'local_story',
				'type' => 'textarea',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_58761225508f6',
				'label' => 'Tips (Se & Göra)',
				'name' => 'places',
				'type' => 'relationship',
				'instructions' => 'Välj vilka tips som personen har här.',
				'required' => 1,
				'return_format' => 'object',
				'post_type' => array (
					0 => 'places',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
			array (
				'key' => 'field_5873b9ad85b14',
				'label' => 'Omslagsbild',
				'name' => 'cover_image',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'meet',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_redationen-tipsar',
		'title' => 'Redationen Tipsar',
		'fields' => array (
			array (
				'key' => 'field_5874d4c1e0f7a',
				'label' => 'Namn på person',
				'name' => 'name',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5874d4e8e0f7b',
				'label' => 'Presentation av person',
				'name' => 'bio',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5874d4efe0f7c',
				'label' => 'Inledande text',
				'name' => 'intro',
				'type' => 'textarea',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'none',
			),
			array (
				'key' => 'field_5874d50be0f7e',
				'label' => 'Profilbild',
				'name' => 'profile_image',
				'type' => 'image',
				'required' => 1,
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
			array (
				'key' => 'field_5877aad200382',
				'label' => 'Tips (Se & Göra)',
				'name' => 'places',
				'type' => 'relationship',
				'required' => 1,
				'return_format' => 'object',
				'post_type' => array (
					0 => 'places',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'editortip',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_se-gora',
		'title' => 'Se & Göra',
		'fields' => array (
			array (
				'key' => 'field_587f8903b16f3',
				'label' => 'Beskrivning',
				'name' => 'description',
				'type' => 'wysiwyg',
				'required' => 1,
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
			array (
				'key' => 'field_587f9bef68c4b',
				'label' => 'Plats',
				'name' => 'location',
				'type' => 'google_map',
				'center_lat' => '',
				'center_lng' => '',
				'zoom' => '',
				'height' => '',
				'required' => 1,
			),
			array (
				'key' => 'field_587f898bb16f4',
				'label' => 'Omslagsbild',
				'name' => 'cover_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
				'required' => 1,
			),
			array (
				'key' => 'field_587fa13b51930',
				'label' => 'Omslagsvideo',
				'name' => 'cover_video',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_2',
				'label' => 'Relaterat innehåll',
				'name' => 'related',
				'type' => 'relationship',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'places',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'post_type',
					1 => 'post_title',
				),
				'max' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'places',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

/**
 * Add Google maps API key to acf field
 *
 */

function my_acf_google_map_api( $api ) {	
	$api['key'] = 'AIzaSyDat-2hNlZNccIJfnXPqPmzsxzXb0ZjYd0';
	
	return $api;	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

?>