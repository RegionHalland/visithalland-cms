<?php
/**
 * Add Google maps API key to acf field
 *
 */

add_filter('acf/fields/google_map/api', function($api)
{
    $api['key'] = env('GOOGLE_MAPS_API_KEY');

    return $api;
});
