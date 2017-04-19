<?php


$_tests_dir = getenv('WP_TESTS_DIR');
if ( !$_tests_dir ) $_tests_dir = '/tmp/wordpress-tests-lib';

require_once $_tests_dir . '/includes/functions.php';

function _manually_load_plugin() {
	require dirname( __FILE__ ) . '/../wp-content/plugins/timber-library/timber.php';
	require dirname( __FILE__ ) . '/../stream-manager.php';	
	require dirname( __FILE__ ) . '/../includes/class-stream-manager-admin.php';	
}

tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

require $_tests_dir . '/includes/bootstrap.php';
require_once('StreamManager_UnitTestCase.php');
