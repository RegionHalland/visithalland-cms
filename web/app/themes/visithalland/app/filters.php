<?php

namespace App;

use Carbon\Carbon;


add_action( 'rest_api_init', function () {
	register_rest_route( 'myplugin/v1', '/activity', array(
		'methods' => 'GET',
		'callback' => function(\WP_REST_Request $request){
            $activityId = $request['activityId'];
            //$date = $request['date'];
            // TODO: Use location from client
            // $location = $request['location']

            // TODO: use $date varible from client below
            $date = Carbon::parse("2018-04-17T14:32:00.218+02:00");

            //$date = $date->addHour();


            die($date->timestamp);

            $weatherForcast = json_decode(getWeather("56.9452822,11.6488989", $date));

            var_dump($weatherForcast);
            //$rain =

            //var_dump($weatherForcast);

            /*printf("Now: %s", $dtToronto);
            echo '<br>';
            print($date->isToday());*/

            /*if ($date->isToday()) {
                // TODO: get todays weather check for rain
                die('We have a date today date');
            }
            if ($date->isTomorrow()) {
                // TODO: get tomorrows weather check for rain
                die('We have a tomorrow date');
            }
            if(!$date->isToday() && !$date->isTomorrow()){
                die('not today or tomorrow :/');
            }*/



            /*switch ($date) {
                case 'value':
                    # code...
                    break;

                default:
                    # code...
                    break;
            }*/

            //var_dump($param);
            die();
            /*$post = \get_post($param);
            $post->meta_fields = get_fields($post->ID);

            $wt = getWeather(null, "56.9452822,11.6488989");
            $wearher = json_decode($wt);

            var_dump($wearher->daily->icon !== "rain");
            die();


           /* var_dump($wt);
            die();*/


            return rest_ensure_response();
        },
	) );
} );


function getWeather($location, $date)
{
    $client = new \GuzzleHttp\Client();
    $response = $client->get('https://api.darksky.net/forecast/e4a57cb36d5e7fbce94542444920119e/'. $location . ','.$date.'?exclude=hourly,daily,flags&units=ca');
    return $response->getBody()->getContents();
}

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    /** Add page slug if it doesn't exist */
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    /** Add class if sidebar is active */
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    /** Clean up class names for custom templates */
    $classes = array_map(function ($class) {
        return preg_replace(['/-blade(-php)?$/', '/^page-template-views/'], '', $class);
    }, $classes);

    return array_filter($classes);
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
collect([
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'frontpage', 'page', 'paged', 'search', 'single', 'singular', 'attachment', 'searchform'
])->map(function ($type) {
    add_filter("{$type}_template_hierarchy", __NAMESPACE__.'\\filter_templates');
});

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    $data = collect(get_body_class())->reduce(function ($data, $class) use ($template) {
        return apply_filters("sage/template/{$class}/data", $data, $template);
    }, []);
    if ($template) {
        echo template($template, $data);
        return get_stylesheet_directory().'/index.php';
    }
    return $template;
}, PHP_INT_MAX);

/**
 * Tell WordPress how to find the compiled path of comments.blade.php
 */
add_filter('comments_template', function ($comments_template) {
    $comments_template = str_replace(
        [get_stylesheet_directory(), get_template_directory()],
        '',
        $comments_template
    );
    return template_path(locate_template(["views/{$comments_template}", $comments_template]) ?: $comments_template);
}, 10, 1);
