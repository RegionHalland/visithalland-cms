if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_58bfc3087f47d',
	'title' => 'Author',
	'fields' => array(
		array(
			'key' => 'field_58bfc31c9344b',
			'label' => 'Profile Image',
			'name' => 'profile_image',
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
		array(
			'key' => 'field_58bfc83f2cb0d',
			'label' => 'Work Role',
			'name' => 'role',
			'type' => 'text',
			'instructions' => 'Ex: Webbredaktör',
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
		array(
			array(
				'param' => 'user_form',
				'operator' => '==',
				'value' => 'edit',
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
	'description' => 'Dessa fält gör att vi kan välja författare manuellt',
));

endif;