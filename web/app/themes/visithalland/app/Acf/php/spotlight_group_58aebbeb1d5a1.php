<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_58aebbeb1d5a1',
    'title' => __('Spotlight', 'visithalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_58aebc6d424dc',
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
            'maxlength' => 200,
            'rows' => 5,
            'new_lines' => '',
        ),
        1 => array(
            'key' => 'field_58aed74f30476',
            'label' => __('Lista med besöksmål', 'visithalland'),
            'name' => 'stops',
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
                0 => 'editor_tip',
                1 => 'places',
                2 => 'happening',
                3 => 'companies',
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
                'value' => 'spotlight',
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
    'description' => 'Här väljer vi ut vilka platser, företag eller artiklar som ska ingå i en s.k. Spotlight',
));
}