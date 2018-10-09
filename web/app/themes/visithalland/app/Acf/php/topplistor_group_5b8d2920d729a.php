<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5b8d2920d729a',
    'title' => 'Topplistor',
    'fields' => array(
        0 => array(
            'key' => 'field_5b8d4cb049df2',
            'label' => __('Topplistor', 'visithalland'),
            'name' => 'top_lists',
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
                0 => 'top_list',
            ),
            'taxonomy' => array(
            ),
            'filters' => array(
                0 => 'search',
            ),
            'elements' => array(
                0 => 'featured_image',
            ),
            'min' => '',
            'max' => 4,
            'return_format' => 'object',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'page',
                'operator' => '==',
                'value' => '12',
            ),
        ),
        1 => array(
            0 => array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'acf-options-tips-guider',
            ),
        ),
        2 => array(
            0 => array(
                'param' => 'taxonomy',
                'operator' => '==',
                'value' => 'all',
            ),
        ),
    ),
    'menu_order' => 2,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'field',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => 'Används för att välja ut topplistor som ska visas på respektive sida',
));
}