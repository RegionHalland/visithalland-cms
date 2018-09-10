<?php
/**
 * Add Google maps API key to acf field
 *
 */

add_filter('acf/fields/google_map/api', function($api)
{
    $api['key'] = 'AIzaSyBzfYgyGwvbQi9oq1ydDRfNbLm5LZ9qVHw';

    return $api;
});
