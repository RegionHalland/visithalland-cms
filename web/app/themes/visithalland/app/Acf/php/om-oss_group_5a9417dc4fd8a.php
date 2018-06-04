<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5a9417dc4fd8a',
    'title' => 'Om oss',
    'fields' => array(
        0 => array(
            'key' => 'field_5a9417df08ac5',
            'label' => __('Kontaktpersoner', 'visithalland'),
            'name' => 'contact',
            'type' => 'repeater',
            'instructions' => '',
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
            'button_label' => __('Lägg till kontaktperson', 'visithalland'),
            'sub_fields' => array(
                0 => array(
                    'key' => 'field_5a94180308ac6',
                    'label' => __('kontaktperson', 'visithalland'),
                    'name' => 'contact_person',
                    'type' => 'user',
                    'instructions' => __('Lägg till kontaktpersoner här', 'visithalland'),
                    'required' => 0,
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
        ),
        1 => array(
            'key' => 'field_5a96d09e2256f',
            'label' => __('Ingress', 'visithalland'),
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
            'maxlength' => 500,
            'rows' => 10,
            'new_lines' => '',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'page',
                'operator' => '==',
                'value' => '4906',
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
    'description' => 'Här hanterar vi information som finns på om oss-sidan',
));
}