<?php
// Amp CSS 
add_action( 'amp_post_template_head', 'awts_amp_css' );
function awts_amp_css() {

$output = "<style amp-custom>" . file_get_contents(get_stylesheet_directory_uri() . "/assets/dist/css/amp.min.css") . "</style>";

echo $output;
}

add_filter( 'amp_customizer_is_enabled', '__return_false' );

add_filter( 'amp_post_template_file', 'xyz_amp_set_custom_template', 10, 3 );

function xyz_amp_set_custom_template( $file, $type, $post ) {
	if ($post->post_type === 'happening' || $post->post_type === 'meet_local' || $post->post_type === 'editor_tip' || $post->post_type === 'trip' || $post->post_type === 'places' || $post->post_type === 'companies') {
		$file = get_template_directory() . '/amp/'.$post->post_type.'.php';
	}
	return $file;
}