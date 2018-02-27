<?php
//Add our styles to the editor
function editorStyle()
{
    add_editor_style(get_stylesheet_directory_uri() . '/assets/dist/css/editor.min.css');
    add_editor_style('https://use.typekit.net/vzi2bvt.css');
}
add_action('admin_init', 'editorStyle');

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


//Remove some formatting when pasting text in the visual editor
function configure_tinymce($in) {
	$in['paste_preprocess'] = "function(plugin, args){
		// Strip all HTML tags except those we have whitelisted
		var whitelist = 'p,span,b,strong,i,em,h3,h4,h5,h6,ul,li,ol';
		var stripped = jQuery('<div>' + args.content + '</div>');
		var els = stripped.find('*').not(whitelist);
		for (var i = els.length - 1; i >= 0; i--) {
			var e = els[i];
			jQuery(e).replaceWith(e.innerHTML);
		}
		// Strip all class and id attributes
		stripped.find('*').removeAttr('id').removeAttr('class');
		// Return the clean HTML
		args.content = stripped.html();
		}";
	return $in;
}
add_filter( 'tiny_mce_before_init', 'configure_tinymce');