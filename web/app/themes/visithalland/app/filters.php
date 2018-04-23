<?php

namespace App;

use Carbon\Carbon;


add_action( 'rest_api_init', function () {
	register_rest_route( 'myplugin/v1', '/activity', array(
		'methods' => 'GET',
		'callback' => function(\WP_REST_Request $request){
            $activityId = $request['activityId'];
            $date = $request['date'];
            // TODO: Use location from client
            $user_location_lat = $request['user_location_lat'];
            $user_location_lng = $request['user_location_lng'];
            $user_location = array($user_location_lat, $user_location_lng);

            $activitiy_links = get_field("links", $activityId);
            foreach ($activitiy_links as $key => $activity) {
                $activity["link"]->meta_fields = get_fields($activity["link"]->ID);
            }

            // TODO: use $date varible from client below
            $date = Carbon::parse($date);
            $date = $date->addHour();
            $weatherForcast = json_decode(getWeather("56.9452822, 11.6488989", $date->timestamp));

            // We use weather in one hour because it takes some time to arrive at the location
            $rainOneHourFromNow = $weatherForcast->currently->icon === "rain" ? true : false;

            // 1. Group happenings
            $happenings = array_filter($activitiy_links, function ($a) {
                return $a['link']->post_type === "happening";
            });

            // 2. Group activities close to the user. Disregarding weather conditions and happenings are included
            //$distance_between_user_and_activity = vincentyGreatCircleDistance($user_location[0], $user_location[1], "56.671814", "12.8511821", $earthRadius = 6371000);
            $close_activities = array_filter($activitiy_links, function ($a) use ($user_location) {
                if (isset($a['link']->meta_fields["location"])) {
                    return vincentyGreatCircleDistance($user_location[0], $user_location[1], $a['link']->meta_fields["location"]["lat"], $a['link']->meta_fields["location"]["lng"], $earthRadius = 6371000)
                        < 5000;
                }
            });

            // 3. Filter out activities and happenings if we have rain in one hour
            $activitiy_links = array_filter($activitiy_links, function ($a) use ($rainOneHourFromNow) {
                // TODO: loose the if's
                if($a['weather_dependent'] === true){
                    if($rainOneHourFromNow === true){
                        return;
                    }
                }
                return $a;
            });

            $posts_array = array(
                "happenings" => $happenings,
                "near_you" => $close_activities,
                "all_activities" => $activitiy_links
            );

            $controller = new \WP_REST_Posts_Controller('post');
            foreach ($posts_array["happenings"] as $post) {
                $data = $controller->prepare_item_for_response($post["link"], $request);
                $posts["happenings"][] = $controller->prepare_response_for_collection($data);
            }
            foreach ($posts_array["near_you"] as $post) {
                $data = $controller->prepare_item_for_response($post["link"], $request);
                $posts["near_you"][] = $controller->prepare_response_for_collection($data);
            }
            foreach ($posts_array["all_activities"] as $post) {
                $data = $controller->prepare_item_for_response($post["link"], $request);
                $posts["all_activities"][] = $controller->prepare_response_for_collection($data);
            }

            if($posts){
                return rest_ensure_response($posts);
            }

            return rest_ensure_response("error");

        },
	) );
} );

/**
 * Calculates the great-circle distance between two points, with
 * the Vincenty formula.
 * @param float $latitudeFrom Latitude of start point in [deg decimal]
 * @param float $longitudeFrom Longitude of start point in [deg decimal]
 * @param float $latitudeTo Latitude of target point in [deg decimal]
 * @param float $longitudeTo Longitude of target point in [deg decimal]
 * @param float $earthRadius Mean earth radius in [m]
 * @return float Distance between points in [m] (same as earthRadius)
 */
function vincentyGreatCircleDistance(
  $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
{
  // convert from degrees to radians
  $latFrom = deg2rad($latitudeFrom);
  $lonFrom = deg2rad($longitudeFrom);
  $latTo = deg2rad($latitudeTo);
  $lonTo = deg2rad($longitudeTo);

  $lonDelta = $lonTo - $lonFrom;
  $a = pow(cos($latTo) * sin($lonDelta), 2) +
    pow(cos($latFrom) * sin($latTo) - sin($latFrom) * cos($latTo) * cos($lonDelta), 2);
  $b = sin($latFrom) * sin($latTo) + cos($latFrom) * cos($latTo) * cos($lonDelta);

  $angle = atan2(sqrt($a), $b);
  return $angle * $earthRadius;
}


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
