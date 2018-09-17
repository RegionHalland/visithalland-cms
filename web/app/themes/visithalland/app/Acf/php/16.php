<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5b8cd59ba21a0',
    'title' => __('Tips & Guider', 'visithalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5b8cd5a0a2667',
            'label' => __('Utvalda Tips', 'visithalland'),
            'name' => 'featured-tips-guides',
            'type' => 'relationship',
            'instructions' => __('Välj vilka guider som ska visas högst upp', 'visithalland'),
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'post_type' => array(
                0 => 'tips_guides',
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
            'max' => 10,
            'return_format' => 'object',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'acf-options-tips-guider',
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
    'description' => 'Används för att justera innehållet i Tips & Guider',
));
}