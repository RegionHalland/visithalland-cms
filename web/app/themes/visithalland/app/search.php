<?php

namespace App;

add_filter('get_search_form', function () {
    return template('partials.searchform');
});
