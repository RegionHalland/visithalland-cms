<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5b0ffc9a39c66',
    'title' => __('Aktiviteter', 'visithalland'),
    'fields' => array(
        0 => array(
            'key' => 'field_5b1001b2bea79',
            'label' => __('Kategorier', 'visithalland'),
            'name' => 'category',
            'type' => 'repeater',
            'instructions' => __('Lägg till en kategori för varje område såsom: boende, gårdsbutiker och skördefester.', 'visithalland'),
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
            'layout' => 'row',
            'button_label' => __('Lägg till kategori', 'visithalland'),
            'sub_fields' => array(
                0 => array(
                    'key' => 'field_5b2a521b26240',
                    'label' => __('Kategori', 'visithalland'),
                    'name' => '',
                    'type' => 'accordion',
                    'instructions' => '',
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'open' => 0,
                    'multi_expand' => 0,
                    'endpoint' => 0,
                ),
                1 => array(
                    'key' => 'field_5b1001e3bea7a',
                    'label' => __('Namn på kategori', 'visithalland'),
                    'name' => 'name',
                    'type' => 'text',
                    'instructions' => __('Namn på kategorin som visas tillsammans med bildgalleriet.', 'visithalland'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => __('T.ex. Boenden i Halland', 'visithalland'),
                    'prepend' => '',
                    'append' => '',
                    'maxlength' => '',
                ),
                2 => array(
                    'key' => 'field_5b1004391b711',
                    'label' => __('Beskrivning', 'visithalland'),
                    'name' => 'description',
                    'type' => 'textarea',
                    'instructions' => __('Inspirerande text om kategorin.', 'visithalland'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'default_value' => '',
                    'placeholder' => __('T.ex. Det är verkligen något speciellt med att bo i Halland...', 'visithalland'),
                    'maxlength' => '',
                    'rows' => 4,
                    'new_lines' => '',
                ),
                3 => array(
                    'key' => 'field_5b10020bbea7b',
                    'label' => __('Bildspel', 'visithalland'),
                    'name' => 'gallery',
                    'type' => 'gallery',
                    'instructions' => __('Bildgalleri som visas tillsammans med kategorin som ger en helhetsupplevelse av kategorin.', 'visithalland'),
                    'required' => 0,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'min' => '',
                    'max' => '',
                    'insert' => 'append',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => '',
                ),
                4 => array(
                    'key' => 'field_5b20d7c96cb74',
                    'label' => __('Ikon', 'visithalland'),
                    'name' => 'icon',
                    'type' => 'select',
                    'instructions' => __('Välj den ikon som ska visas tillsammans med kategorin.', 'visithalland'),
                    'required' => 1,
                    'conditional_logic' => 0,
                    'wrapper' => array(
                        'width' => '',
                        'class' => '',
                        'id' => '',
                    ),
                    'choices' => array(
                        '/images/map-pin.svg' => __('Gårdsbutik', 'visithalland'),
                    ),
                    'default_value' => array(
                    ),
                    'allow_null' => 0,
                    'multiple' => 0,
                    'ui' => 0,
                    'ajax' => 0,
                    'return_format' => 'value',
                    'placeholder' => '',
                ),
                5 => array(
                    'key' => 'field_5b1002b1bea7c',
                    'label' => __('Länkar till näringslivsaktörer', 'visithalland'),
                    'name' => 'links',
                    'type' => 'repeater',
                    'instructions' => __('Länkar till de näringslivsaktörer som visas tillsammans med kategorin.', 'visithalland'),
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
                    'layout' => 'block',
                    'button_label' => __('Lägg till länk till näringslivsaktör', 'visithalland'),
                    'sub_fields' => array(
                        0 => array(
                            'key' => 'field_5b1002e1bea7d',
                            'label' => __('Namn', 'visithalland'),
                            'name' => 'name',
                            'type' => 'text',
                            'instructions' => __('Namn på näringslivsaktör.', 'visithalland'),
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => __('T.ex. Steninge Vandrarhem', 'visithalland'),
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        1 => array(
                            'key' => 'field_5b100300bea7e',
                            'label' => __('Länk', 'visithalland'),
                            'name' => 'link',
                            'type' => 'text',
                            'instructions' => __('Länk till näringslivsaktörs hemsida, Facebook-sida eller liknande.', 'visithalland'),
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'default_value' => '',
                            'placeholder' => __('T.ex. https://www.steningevandrarhem.se/', 'visithalland'),
                            'prepend' => '',
                            'append' => '',
                            'maxlength' => '',
                        ),
                        2 => array(
                            'key' => 'field_5b10030fbea7f',
                            'label' => __('Plats', 'visithalland'),
                            'name' => 'location',
                            'type' => 'google_map',
                            'instructions' => __('Plats där näringslivsaktören ligger eller går att besöka.', 'visithalland'),
                            'required' => 0,
                            'conditional_logic' => 0,
                            'wrapper' => array(
                                'width' => '',
                                'class' => '',
                                'id' => '',
                            ),
                            'center_lat' => '56.948293',
                            'center_lng' => '12.2094796',
                            'zoom' => '',
                            'height' => '',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_template',
                'operator' => '==',
                'value' => 'views/template-all-activities-skordetider.blade.php',
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
    'description' => 'Används för att skapa aktiviteter under Skördetid i Halland.',
));
}