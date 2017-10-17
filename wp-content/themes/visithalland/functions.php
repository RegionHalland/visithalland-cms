<?php
//Modification of acf plugin
include_once('lib/acf.php');

//Register custom post types
include_once('lib/register_custom_post_types.php');

//Register custom taxonomies
include_once('lib/register_custom_taxonomies.php');

//Wordpress admin menu modifications
include_once('lib/admin_menu.php');

//Modification for Algolia Search
include_once('lib/algolia_search.php');

//Image related, sizes, captions and more
include_once('lib/images.php');

//Register menus
include_once('lib/menu.php');

//Editor modifications
include_once('lib/editor.php');


/* 

***	REST related files

*/

/* 
	v1 API
*/

//Add custom v1 REST routes
include_once('lib/rest/v1/routes.php');

//Add custom v1 REST callbacs
include_once('lib/rest/v1/callbacks.php');


/* 
	v2 API
*/

//Add custom v2 REST routes
include_once('lib/rest/v2/routes.php');

//Add custom v2 REST callbacks
include_once('lib/rest/v2/callbacks.php');


//Add helpers used in callbacks.php for generic methods
include_once('lib/rest/helpers.php');
