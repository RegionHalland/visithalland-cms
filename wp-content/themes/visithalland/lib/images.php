<?php
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
?>