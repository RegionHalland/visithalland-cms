if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_58ca966c25a5a',
	'title' => 'Platsinformation',
	'fields' => array(
		array(
			'key' => 'field_58ca985930f32',
			'label' => 'Inspirerande rubrik',
			'name' => 'title',
			'type' => 'text',
			'instructions' => 'Detta fält används för att skapa mer inspirerande rubriker för att undvika känslan av platslistning.
Ex: Bullar & Bång på Stålboms konditori istället för Stålboms Konditori',
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
		array(
			'key' => 'field_58cba566c98e1',
			'label' => 'Utdrag',
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
		array(
			'key' => 'field_58cba488bc794',
			'label' => 'Plats',
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
		array(
			'key' => 'field_5a815c415aacf',
			'label' => 'Google information',
			'name' => 'google_information',
			'type' => 'true_false',
			'instructions' => 'Kryssa i den här rutan om du vill använda Googles information baserat på platsdata. Om du hellre fyller i länkar själv så kryssar du helt enkelt ur den här rutan.',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => 'Ska automatisk information från Google användas?',
			'default_value' => 0,
			'ui' => 0,
			'ui_on_text' => '',
			'ui_off_text' => '',
		),
		array(
			'key' => 'field_58ca988230f33',
			'label' => 'Extern länk',
			'name' => 'external_link',
			'type' => 'url',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => array(
				array(
					array(
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
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'companies',
			),
		),
		array(
			array(
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

endif;