<?php

namespace App;

add_action('wp_enqueue_scripts', function()
{
    wp_dequeue_style('algolia-autocomplete');
    wp_dequeue_style('algolia-instantsearch');

    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCwAJMUt4ODfivqIGMgeZeTlH90-QqRFrU&libraries=places', 'jquery', false, true);
}, 20);
