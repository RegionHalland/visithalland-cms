<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5ce3b78c5c8cf',
    'title' => __('A Day in Halland-listordning', 'visithalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5ce3b7977ddf8',
            'label' => __('Listor', 'visithalland'),
            'name' => 'lists',
            'type' => 'relationship',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'wpml_cf_preferences' => 2,
            'post_type' => array(
                0 => 'activity',
            ),
            'taxonomy' => '',
            'filters' => array(
                0 => 'search',
            ),
            'elements' => array(
                0 => 'featured_image',
            ),
            'min' => 1,
            'max' => '',
            'return_format' => 'object',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'options_page',
                'operator' => '==',
                'value' => 'acf-options-listordning',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
));
}