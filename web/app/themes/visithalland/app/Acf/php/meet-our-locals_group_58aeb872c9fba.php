<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_58aeb872c9fba',
    'title' => 'Meet our locals',
    'fields' => array(
        0 => array(
            'key' => 'field_58aeb87d24f03',
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
            'key' => 'field_58aeb8a824f04',
            'label' => __('Citat', 'visithalland'),
            'name' => 'quote',
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
        2 => array(
            'key' => 'field_58aeb9ef07217',
            'label' => __('Tips', 'visithalland'),
            'name' => 'tips',
            'type' => 'repeater',
            'instructions' => __('Välj tips och skriv citat/text om tipset.', 'visithalland'),
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'collapsed' => '',
            'min' => 0,
            'max' => 0,
            'layout' => 'table',
            'button_label' => '',
            'sub_fields' => array(
                0 => array(
                    'key' => 'field_58aeba4c07218',
                    'label' => __('Tips', 'visithalland'),
                    'name' => 'tip',
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
                        0 => 'places',
                        1 => 'happening',
                        2 => 'trip',
                        3 => 'companies',
                    ),
                    'taxonomy' => array(
                    ),
                    'filters' => array(
                        0 => 'search',
                        1 => 'post_type',
                    ),
                    'elements' => '',
                    'min' => '',
                    'max' => '',
                    'return_format' => 'object',
                ),
                1 => array(
                    'key' => 'field_58aeba7c07219',
                    'label' => __('Text/Citat om tips', 'visithalland'),
                    'name' => 'quote',
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
            ),
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'meet_local',
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
    'description' => 'Innehåll som används i Meet a Local-artiklar',
));
}