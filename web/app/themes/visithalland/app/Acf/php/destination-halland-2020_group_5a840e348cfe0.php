<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5a840e348cfe0',
    'title' => 'Destination Halland 2020',
    'fields' => array(
        0 => array(
            'key' => 'field_5a840e44f0e6e',
            'label' => __('Utdrag', 'visithalland'),
            'name' => 'eu_excerpt',
            'type' => 'text',
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
            'prepend' => '',
            'append' => '',
            'maxlength' => '',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'page',
                'operator' => '==',
                'value' => '4394',
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
    'description' => 'Här fyller vi på med information som krävs för EU-projekt',
));
}