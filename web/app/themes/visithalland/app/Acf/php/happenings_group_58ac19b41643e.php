<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_58ac19b41643e',
    'title' => 'Happenings',
    'fields' => array(
        0 => array(
            'key' => 'field_58ac19daf5381',
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
            'key' => 'field_58ac19e6f5382',
            'label' => __('Startdatum', 'visithalland'),
            'name' => 'start_date',
            'type' => 'date_picker',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'display_format' => 'j F, Y',
            'return_format' => 'Y/m/d',
            'first_day' => 1,
        ),
        2 => array(
            'key' => 'field_58ac1a17f5384',
            'label' => __('Slutddatum', 'visithalland'),
            'name' => 'end_date',
            'type' => 'date_picker',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'display_format' => 'j F, Y',
            'return_format' => 'Y/m/d',
            'first_day' => 1,
        ),
        3 => array(
            'key' => 'field_58c6d7694d1ac',
            'label' => __('Extern länk', 'visithalland'),
            'name' => 'external_link',
            'type' => 'url',
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
        ),
        4 => array(
            'key' => 'field_58c96103a894f',
            'label' => __('Plats', 'visithalland'),
            'name' => 'location',
            'type' => 'google_map',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'center_lat' => '',
            'center_lng' => '',
            'zoom' => '',
            'height' => '',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'happening',
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
    'description' => 'Här fyller vi i information om vår happening',
));
}