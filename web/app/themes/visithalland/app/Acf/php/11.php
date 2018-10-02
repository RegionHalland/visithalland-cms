<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_58aeb92ed11fa',
    'title' => __('Utdrag och mentions', 'visithalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_58aeb94788cd3',
            'label' => __('Utdrag', 'visithalland'),
            'name' => 'excerpt',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
            'maxlength' => '',
            'rows' => 3,
            'new_lines' => '',
        ),
        1 => array(
            'key' => 'field_58c6aee9ccc8d',
            'label' => __('Nämnda i artikeln', 'visithalland'),
            'name' => 'mentioned',
            'type' => 'relationship',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'post_type' => array(
                0 => 'meet_local',
                1 => 'editor_tip',
                2 => 'trip',
                3 => 'happening',
                4 => 'places',
                5 => 'companies',
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
            'min' => '',
            'max' => '',
            'return_format' => 'object',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'editor_tip',
            ),
        ),
        1 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'tips_guides',
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
    'description' => 'Här väljer vi ut vilket innehåll som nämns i artikel samt utdrag',
));
}