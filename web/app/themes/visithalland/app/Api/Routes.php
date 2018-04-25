<?php

// Remove CORS support / Enable it on NGINX instead - for microcaching support
add_action('rest_api_init', function () {
    remove_filter('rest_pre_serve_request', 'rest_send_cors_headers');
}, 15);

// Register our rest routes
add_action('rest_api_init', function () {
    // Register route - set happenings that have been to drafts
    register_rest_route('visit/v1', 'remove_old_happenings', array(
        'methods' => 'GET',
        'callback' => 'vh_set_passed_happenings_to_draft_callback'
    ));

    // Register route - Get single activity. Used in ”a day in Halland'.
    register_rest_route('visit/v1', 'activity', array(
        'methods' => 'GET',
        'callback' => 'vh_get_activity'
    ));

});

