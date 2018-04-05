<?php

namespace App;

// Add active class to current menu item
add_action('admin_init', function () {
    add_editor_style(\App\asset_path('styles/editor.css'));
    add_editor_style('https://use.typekit.net/vzi2bvt.css');
});

add_filter('tiny_mce_before_init', function($init)
{
    $init['block_formats'] = 'Paragraph=p;Rubrik 1=h2;Rubrik 2=h3;Rubrik 3=h4;';

    return $init;
});

add_filter('mce_buttons', function($buttons)
{
    $remove = array('wp_more', 'alignleft', 'aligncenter', 'alignright');

    return array_diff($buttons, $remove);
});

add_filter('mce_buttons_2', function ($buttons) {
    $remove = array( 'indent', 'outdent', 'hr');

    return array_diff($buttons, $remove);
});

// Remove some formatting when pasting text in the visual editor
add_filter('tiny_mce_before_init', function($in)
{
    $in['paste_preprocess'] = "function(plugin, args){
		// Strip all HTML tags except those we have whitelisted
		var whitelist = 'p,span,b,strong,i,em,h2,h3,h4,h5,h6,ul,li,ol';
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
});
