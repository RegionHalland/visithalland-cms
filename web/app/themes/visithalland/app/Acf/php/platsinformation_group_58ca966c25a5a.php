<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_58ca966c25a5a',
    'title' => 'Platsinformation',
    'fields' => array(
        0 => array(
            'key' => 'field_58ca985930f32',
            'label' => __('Inspirerande rubrik', 'visithalland'),
            'name' => 'title',
            'type' => 'text',
            'instructions' => __('Detta fält används för att skapa mer inspirerande rubriker för att undvika känslan av platslistning.
Ex: Bullar & Bång på Stålboms konditori istället för Stålboms Konditori', 'visithalland'),
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
        1 => array(
            'key' => 'field_58cba566c98e1',
            'label' => __('Utdrag', 'visithalland'),
            'name' => 'excerpt',
            'type' => 'textarea',
            'instructions' => '',
            'required' => 1,
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
        2 => array(
            'key' => 'field_58cba488bc794',
            'label' => __('Plats', 'visithalland'),
            'name' => 'location',
            'type' => 'google_map',
            'instructions' => '',
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'center_lat' => '56.946725',
            'center_lng' => '12.2354168',
            'zoom' => 8,
            'height' => '',
        ),
        3 => array(
            'key' => 'field_5a815c415aacf',
            'label' => __('Google information', 'visithalland'),
            'name' => 'google_information',
            'type' => 'true_false',
            'instructions' => __('Kryssa i den här rutan om du vill använda Googles information baserat på platsdata. Om du hellre fyller i länkar själv så kryssar du helt enkelt ur den här rutan.', 'visithalland'),
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'message' => __('Ska automatisk information från Google användas?', 'visithalland'),
            'default_value' => 0,
            'ui' => 0,
            'ui_on_text' => '',
            'ui_off_text' => '',
        ),
        4 => array(
            'key' => 'field_58ca988230f33',
            'label' => __('Extern länk', 'visithalland'),
            'name' => 'external_link',
            'type' => 'url',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => array(
                0 => array(
                    0 => array(
                        'field' => 'field_5a815c415aacf',
                        'operator' => '!=',
                        'value' => '1',
                    ),
                ),
            ),
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'default_value' => '',
            'placeholder' => '',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'companies',
            ),
        ),
        1 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'places',
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
    'description' => 'Platsinformation för besöksmål och näringslivsaktörer runt om i Halland',
));
}