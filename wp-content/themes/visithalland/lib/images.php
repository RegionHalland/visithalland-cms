<?php

//Modify inserted images to be enclosed by a figure tag
function title_caption_image($html, $id, $caption, $title, $align, $url, $size, $alt) {
    $attachment = get_post( $id );
    $image_description = "";
    if (isset($attachment)) {
        $image_description = $attachment->post_content;
    }
    $src  = wp_get_attachment_image_src( $id, $size, false );
    $html5 = "<figure class='align$align'>";
    $html5 .= "<img src='$src[0]' alt='$alt' />";
    if ( $caption && $alt ) {
        $html5 .= "<figcaption><span class='image-description'>" . $caption . "</span><span class='image-credit'>" . $image_description . "</span></figcaption>";
    }
    $html5 .= "</figure>";
    return $html5;
}
add_filter( 'image_send_to_editor', 'title_caption_image', 10, 9 );


/* 
	Add custom image sizes
*/
//Add image size for hero images
add_image_size( 'vh_profile', 75, 75, array( 'center', 'top' ) );
add_image_size( 'vh_profile@2x', 150, 150, array( 'center', 'top' ) );

add_image_size( 'vh_thumbnail', 200, 200, array( 'center', 'center' ) );
add_image_size( 'vh_thumbnail@2x', 400, 400, array( 'center', 'center' ) );

add_image_size( 'vh_small', 400, 300, array( 'center', 'center' ) );
add_image_size( 'vh_small@2x', 800, 600, array( 'center', 'center' ) );

add_image_size( 'vh_medium', 800, 600, array( 'center', 'center' ) );
add_image_size( 'vh_medium@2x', 1200, 900, array( 'center', 'center' ) );

add_image_size( 'vh_medium_square', 800, 800, array( 'center', 'center' ) );
add_image_size( 'vh_medium_square@2x', 1200, 1200, array( 'center', 'center' ) );

add_image_size( 'vh_large', 900, 675 , array( 'center', 'center' ) );
add_image_size( 'vh_large@2x', 1800, 1350, array( 'center', 'center' ) );

add_image_size( 'vh_hero_wide', 1920, 1080, array( 'center', 'center' ) );
add_image_size( 'vh_hero_wide@2x', 2880, 1620, array( 'center', 'center' ) );

add_image_size( 'vh_hero_tall', 400, 500, array( 'center', 'center' ) );
add_image_size( 'vh_hero_tall@2x', 800, 1000, array( 'center', 'center' ) );

add_image_size( 'hero', 1920, 1200 ); // 1920 pixels wide by 550 pixels tall, soft proportional crop mode

/* Remove default image sizes to save space and cpu load on upload */
/*function remove_default_image_sizes( $sizes) {
    unset($sizes['thumbnail']);
    unset($sizes['medium']);
    unset($sizes['medium_large']);
    unset($sizes['large']);
    return $sizes;
}
add_filter('intermediate_image_sizes_advanced','remove_default_image_sizes');*/


//Add support for choosing our image sizes in Wysiyg admin
add_filter( 'image_size_names_choose', 'my_custom_sizes' ); 
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'vh_profile' => __( 'Profile' ),
        'vh_profile@2x' => __( 'Profile @2x' ),
        'vh_thumbnail' => __( 'Thumbnail' ),
        'vh_thumbnail@2x' => __( 'Thumbnail @2x' ),
        'vh_small' => __( 'Small' ),
        'vh_small@2x' => __( 'Small @2x' ),
        'vh_medium' => __( 'Medium' ),
        'vh_medium@2x' => __( 'Medium @2x' ),
        'vh_large' => __( 'Large' ),
        'vh_large@2x' => __( 'Large @2x' ),
        'vh_hero_wide' => __( 'Hero Wide' ),
        'vh_hero_wide@2x' => __( 'Hero Wide @2x' ),
        'vh_hero_tall' => __( 'Hero Tall' ),
        'vh_hero_tall@2x' => __( 'Hero Tall @2x' ),
    ) );
}
?>