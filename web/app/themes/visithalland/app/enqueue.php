<?php

namespace App;

add_action('wp_enqueue_scripts', function()
{
    wp_dequeue_style('algolia-autocomplete');
    wp_dequeue_style('algolia-instantsearch');

    wp_enqueue_style('mapbox', 'https://api.tiles.mapbox.com/mapbox-gl-js/v0.49.0/mapbox-gl.css');
    wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBzfYgyGwvbQi9oq1ydDRfNbLm5LZ9qVHw&libraries=places', 'jquery', false, true);
}, 20);
