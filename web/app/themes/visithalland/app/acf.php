<?php
/**
 * Add Google maps API key to acf field
 *
 */

add_filter('acf/fields/google_map/api', function($api)
{
    $api['key'] = 'AIzaSyDat-2hNlZNccIJfnXPqPmzsxzXb0ZjYd0';

    return $api;
});
