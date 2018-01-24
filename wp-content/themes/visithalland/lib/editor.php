<?php
//Add our styles to the editor
function editorStyle()
{
    add_editor_style(get_stylesheet_directory_uri() . '/assets/dist/css/editor.min.css');
    add_editor_style('https://use.typekit.net/vzi2bvt.css');
}
add_action('admin_init', 'editorStyle');


//Add typekit to the editor
// function my_theme_mce_external_plugins( $plugin_array ) {
// 	$plugin_array['typekit'] = get_template_directory_uri() . '/assets/js/typekit.tinymce.js';
// 	return $plugin_array;
// }
// add_filter( 'mce_external_plugins', 'my_theme_mce_external_plugins' );


//Remove and only use pararaphs, h2 and h3
function vh_modify_block_formats( $init ) {
    $init['block_formats'] = 'Paragraph=p;Rubrik 1=h2;Rubrik 2=h3;Rubrik 3=h4;';

    return $init;
}
add_filter( 'tiny_mce_before_init', 'vh_modify_block_formats');

function vh_remove_mce_buttons( $buttons ) {
    $remove = array('wp_more', 'alignleft', 'aligncenter', 'alignright');

    return array_diff( $buttons, $remove );
}
add_filter( 'mce_buttons', 'vh_remove_mce_buttons');


function vh_remove_mce_2_buttons( $buttons ) {
    $remove = array( 'indent', 'outdent', 'hr');

    return array_diff( $buttons, $remove );
}
add_filter( 'mce_buttons_2', 'vh_remove_mce_2_buttons');