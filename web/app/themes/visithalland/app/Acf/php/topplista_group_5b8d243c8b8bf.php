<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5b8d243c8b8bf',
    'title' => 'Topplista',
    'fields' => array(
        0 => array(
            'key' => 'field_5b8d47cdcf55a',
            'label' => __('Topplista', 'visithalland'),
            'name' => 'top_list',
            'type' => 'relationship',
            'instructions' => __('Välj ut tips', 'visithalland'),
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'post_type' => array(
                0 => 'tips_guides',
                1 => 'editor_tip',
                2 => 'spotlight',
                3 => 'places',
                4 => 'companies',
                5 => 'happening',
            ),
            'taxonomy' => array(
            ),
            'filters' => array(
                0 => 'search',
                1 => 'post_type',
                2 => 'taxonomy',
            ),
            'elements' => array(
                0 => 'featured_image',
            ),
            'min' => 1,
            'max' => 7,
            'return_format' => 'object',
        ),
        1 => array(
            'key' => 'field_5b8d4807cf55b',
            'label' => __('Författare', 'visithalland'),
            'name' => 'top_list_author',
            'type' => 'user',
            'instructions' => __('Välj användare', 'visithalland'),
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'role' => '',
            'allow_null' => 0,
            'multiple' => 0,
            'return_format' => 'array',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'top_list',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => 'Används för att skapa och redigera enskilda topplistor',
));
}