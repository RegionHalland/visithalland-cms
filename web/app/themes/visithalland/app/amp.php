<?php

namespace App;

// Amp CSS
add_filter('amp_post_template_head', function ()
{
    $output = "<style amp-custom>" . file_get_contents(\App\asset_path('styles/main.css')) . "</style>";
    echo $output;
},10, 3);

/* AMP Template mapping */
add_filter('amp_post_template_file', function ($file, $type, $post)
{
    if ($post->post_type === 'happening' || $post->post_type === 'meet_local' || $post->post_type === 'editor_tip' || $post->post_type === 'trip' || $post->post_type === 'places' || $post->post_type === 'companies') {
        $file = get_template_directory() . '/views/amp/'.$post->post_type.'.php';
    }
    return $file;
}, 10, 3);

add_filter('amp_customizer_is_enabled', '__return_false');
