<?php

//Modification of acf plugin
include_once('lib/acf.php');

//Register custom post types
include_once('lib/register_custom_post_types.php');

//Register custom taxonomies
include_once('lib/register_custom_taxonomies.php');

//Wordpress admin menu changes
include_once('lib/admin_menu.php');

//Add custom REST routes and methods
include_once('lib/rest.php');

//Modification for Algolia Search
include_once('lib/algolia_search.php');

function title_caption_image($html, $id, $caption, $title, $align, $url, $size, $alt) {
    $src  = wp_get_attachment_image_src( $id, $size, false );
    $html5 = "<figure class='align$align'>";
    $html5 .= "<img src='$src[0]' alt='$alt' />";
    if ( $caption && $alt ) {
        $html5 .= "<figcaption><p class='image-description'><span>$alt: </span>$caption</p></figcaption>";
    }
    $html5 .= "</figure>";
    return $html5;
}
add_filter( 'image_send_to_editor', 'title_caption_image', 10, 9 );