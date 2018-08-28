<?php

namespace App;

/* Load our custom searchform blade-file */
add_filter('get_search_form', function () {
    return template('partials.searchform');
});
