<?php 



    'key' => 'group_58a6da2dafd35',
    'title' => 'Koncept',
    'fields' => array(
        0 => array(
            'key' => 'field_58ac64c532084',
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
            'key' => 'field_58ac1e314914e',
            'label' => __('Omslagsbild', 'visithalland'),
            'name' => 'cover_image',
            'type' => 'image',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'return_format' => 'array',
            'preview_size' => 'thumbnail',
            'library' => 'all',
            'min_width' => '',
            'min_height' => '',
            'min_size' => '',
            'max_width' => '',
            'max_height' => '',
            'max_size' => '',
            'mime_types' => '',
        ),
        2 => array(
            'key' => 'field_5acb577ffecfd',
            'label' => __('Utvalda artiklar', 'visithalland'),
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'placement' => 'top',
            'endpoint' => 0,
        ),
        3 => array(
            'key' => 'field_58d2a4f73acee',
            'label' => __('Utvalda artiklar', 'visithalland'),
            'name' => 'featured',
            'type' => 'relationship',
            'instructions' => __('Lägg till utvalda artiklar som visas högst upp på varje koncept', 'visithalland'),
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'post_type' => array(
                0 => 'meet_local',
                1 => 'editor_tip',
                2 => 'companies',
                3 => 'trip',
                4 => 'happening',
                5 => 'places',
            ),
            'taxonomy' => array(
            ),
            'filters' => array(
                0 => 'search',
                1 => 'taxonomy',
            ),
            'elements' => array(
                0 => 'featured_image',
            ),
            'min' => '',
            'max' => '',
            'return_format' => 'object',
        ),
        4 => array(
            'key' => 'field_5acb571b95e17',
            'label' => __('Utvald artikel', 'visithalland'),
            'name' => 'featured_article',
            'type' => 'post_object',
            'instructions' => __('Lägg till utvald artikel för det valda konceptet', 'visithalland'),
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'post_type' => array(
                0 => 'meet_local',
                1 => 'editor_tip',
                2 => 'happening',
                3 => 'places',
                4 => 'companies',
                5 => 'trip',
            ),
            'taxonomy' => array(
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'return_format' => 'object',
            'ui' => 1,
        ),
        5 => array(
            'key' => 'field_5acb5792fecfe',
            'label' => __('Metainformation', 'visithalland'),
            'name' => '',
            'type' => 'tab',
            'instructions' => '',
            'required' => 0,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'placement' => 'top',
            'endpoint' => 0,
        ),
        6 => array(
            'key' => 'field_5acb56ed95e16',
            'label' => __('Klassnamn', 'visithalland'),
            'name' => 'class_name',
            'type' => 'text',
            'instructions' => __('Fyll i klassnamnet för att visa rätt ikon och färg för varje koncept', 'visithalland'),
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
                'param' => 'taxonomy',
                'operator' => '==',
                'value' => 'taxonomy_concept',
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
    'description' => 'Här väljer vi ut vilka artiklar som ska synas högst upp samt ingress och bakgrundsbild för varje koncept',
));
