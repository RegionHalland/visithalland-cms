<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5add78b8c9eda',
    'title' => 'A Day in Halland',
    'fields' => array(
        0 => array(
            'key' => 'field_5b14e113d0245',
            'label' => __('Väderberoende', 'visithalland'),
            'name' => 'list_weather_dependent',
            'type' => 'true_false',
            'instructions' => __('Kryssa i om hela listan är beroende av bra väder.', 'visithalland'),
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => '',
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ),
        1 => array(
            'key' => 'field_5add78bf6e545',
            'label' => __('Länkar', 'visithalland'),
            'name' => 'links',
            'type' => 'repeater',
            'instructions' => __('Lägg till länkar för A Day in Halland-förslag', 'visithalland'),
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
                    'key' => 'field_5add78d86e546',
                    'label' => __('Länk', 'visithalland'),
                    'name' => 'link',
                    'type' => 'post_object',
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
                        1 => 'happening',
                        2 => 'editor_tip',
                        3 => 'trip',
                        4 => 'places',
                        5 => 'companies',
                    ),
                    'taxonomy' => array(
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'return_format' => 'object',
                    'ui' => 1,
                ),
                1 => array(
                    'key' => 'field_5add791e6e547',
                    'label' => __('Väderberoende', 'visithalland'),
                    'name' => 'weather_dependent',
                    'type' => 'true_false',
                    'instructions' => __('Är tipset beroende av bra väder?', 'visithalland'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'message' => __('Tipset är beroende av bra väder', 'visithalland'),
                    'default_value' => 0,
                    'ui' => 0,
                    'ui_on_text' => '',
                    'ui_off_text' => '',
                ),
            ),
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'activity',
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
    'description' => 'Används för att lista "A Day in Halland"-aktiviteter',
));
}