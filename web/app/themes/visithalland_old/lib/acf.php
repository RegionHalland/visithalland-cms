<?php

/**
 * Add Google maps API key to acf field
 *
 */

function my_acf_google_map_api( $api ) {	
	$api['key'] = 'AIzaSyDat-2hNlZNccIJfnXPqPmzsxzXb0ZjYd0';
	
	return $api;	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

?>