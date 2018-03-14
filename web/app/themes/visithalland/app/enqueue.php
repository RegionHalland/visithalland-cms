<?php

namespace App;

add_action('wp_enqueue_scripts', function()
{
    wp_dequeue_style('algolia-autocomplete');
    wp_dequeue_style('algolia-instantsearch');

    /* wp_enqueue_script('flickity', 'https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js', 'jquery', false, true);
    wp_enqueue_script('lazysizes', 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/4.0.1/lazysizes.min.js', 'jquery', false, true);
    wp_enqueue_script('infinite-scroll', 'https://unpkg.com/infinite-scroll@3/dist/infinite-scroll.pkgd.min.js', 'jquery', false, true);
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCwAJMUt4ODfivqIGMgeZeTlH90-QqRFrU&libraries=places', 'jquery', false, true);
 */
}, 20);
