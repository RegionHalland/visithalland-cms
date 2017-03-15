<?php
//Modification of acf plugin
include_once('lib/acf.php');

//Register custom post types
include_once('lib/register_custom_post_types.php');

//Register custom taxonomies
include_once('lib/register_custom_taxonomies.php');

//Wordpress admin menu changes
include_once('lib/admin_menu.php');

//Add custom REST routes and methods
include_once('lib/rest.php');

//Modification for Algolia Search
include_once('lib/algolia_search.php');

//Image related, sizes, captions and more
include_once('lib/images.php');

//Register menus
include_once('lib/menu.php');