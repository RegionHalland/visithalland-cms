<?php
use App\Visithalland\CalendarClient;
use Carbon\Carbon;
use GuzzleHttp\Client;

function vh_get_cookie_policy(WP_REST_Request $request) {
    $current_lang = $request['lang'];
    if($current_lang) {
        global $sitepress;
        $sitepress->switch_lang("en");
    }

    return rest_ensure_response(array(
        "cookie_policy" => get_field("cookie_accept_message", apply_filters( 'wpml_object_id', get_page_by_path("kakor")->ID,'page' )),
        "cookie_page_url" => get_permalink( apply_filters( 'wpml_object_id', get_page_by_path("kakor")->ID, 'page' )),
        "cookie_user_agreement_text" => __( 'Se användningsvillkor', 'visithalland' ),
        "cookie_close_button_text" => __( 'Stäng', 'visithalland' )
    ));
}

function vh_get_location_by_coordinates(WP_REST_Request $request)
{
    $lat = $request['lat'];
    $lng = $request['lng'];

    $c = new CalendarClient();
    return $c->getAdressComponentsByCoordinates(array(
        "lat" => $lat,
        "lng" => $lng
    ));
}

function vh_get_events_happenings_by_date(WP_REST_Request $request)
{
    $date = $request['date'];
    var_dump($date);
    var_dump($request->get_param( 'date' ));
    if(!isset($date)) return new WP_Error('unknown-errorsss', __('Unknown errorsss.', 'visithalland'), array( 'status' => 400 ));
    $compareDate = date("Y-m-d", strtotime($date));
    $events_happenings_array = array();

    $events_happenings = get_posts(array(
        'numberposts'	=> 20,
        'post_type'     => array('event', 'happening'),
        'meta_query' => [
            [
                'key' => 'start_date',
                'value' => $compareDate,
                'compare' => '==',
                'type' => 'DATE'
            ],
        ],
        'post_status'   => array('publish', 'draft')
    ));

    $controller = new \WP_REST_Posts_Controller('post');
    foreach ($events_happenings as $post) {
        $data = $controller->prepare_item_for_response($post, $request);
        $events_happenings_array[] = $controller->prepare_response_for_collection($data);
    }

    if ($events_happenings_array) {
        return rest_ensure_response($events_happenings_array);
    };

    return new WP_Error('events-missing', __('Events saknas.', 'visithalland'), array( 'status' => 404 ));
}

function vh_add_events(WP_REST_Request $request)
{
    $municipio = $request['municipio'];

    $c = new CalendarClient();
    $c->runRequest($municipio);

    return;
}

function vh_set_passed_happenings_to_draft_callback()
{
    // get all happenings
    $posts = get_posts(array(
        'post_type'     => 'happening',
        'posts_per_page'    => -1
    ));
    $oldHappenings = array();

    if ($posts) {
        foreach ($posts as $key => $value) {
            $value->meta_fields = get_fields($value->ID);
            if (strtotime($value->meta_fields["end_date"]) < time()) {
                array_push($oldHappenings, $value->post_name);
                $value->post_status = "draft";
                wp_update_post($value);
            }
        }
        return rest_ensure_response(
            array(
                'Removed happenings' => $oldHappenings
            )
        );
    }

    // No posts found
    return new WP_Error('unknown-error', __('Unknown error.', 'visithalland'), array( 'status' => 500 ));
}

function vh_get_all_activities(\WP_REST_Request $request){
    // get all activities
    // Use the location from the user
    $user_location_lat = $request['user_location_lat'];
    $user_location_lng = $request['user_location_lng'];
    $user_location = array($user_location_lat, $user_location_lng);
    $date = $request['date'];
    // TODO: use $date varible from client below

    $current_lang = $request['lang'];
    if($current_lang) {
        global $sitepress;
        $sitepress->switch_lang("en");
    }

    $date = Carbon::parse($date);
    $date = $date->addHour();

    $weatherForcast = json_decode(getWeather($user_location[0], $user_location[1], $date->timestamp));

    // We use weather in one hour because it takes some time to arrive at the location
    $rainOneHourFromNow = $weatherForcast->currently->icon === "rain" ? true : false;

    $posts = get_posts(array(
        'post_type'         => 'activity',
        'posts_per_page'    => -1,
        'lang'              => 'en',
        'suppress_filters'  => 0
    ));

    foreach ($posts as $key => $post) {
        $list_weather_dependent = get_field("list_weather_dependent", $post->ID);
        if (isset($list_weather_dependent)) {
            if ($list_weather_dependent && $rainOneHourFromNow === true) {
                // Remove acitivty if it's gonna rain in one hour & the whole list is weather dependent
                unset($posts[$key]);
            }
        }
    }

    $controller = new \WP_REST_Posts_Controller('post');
    foreach ($posts as $post) {
        $data = $controller->prepare_item_for_response($post, $request);
        $posts_all[] = $controller->prepare_response_for_collection($data);
    }

    if ($posts_all) {
        return rest_ensure_response($posts_all);
    };

    return rest_ensure_response("err");

}

function vh_get_activity(\WP_REST_Request $request){
    $activityId = $request['activityId'];
    $date = $request['date'];

    // Use the location from the user
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
    $weatherForcast = json_decode(getWeather($user_location[0], $user_location[1], $date->timestamp));

    // We use weather in one hour because it takes some time to arrive at the location
    $rainOneHourFromNow = $weatherForcast->currently->icon === "rain" ? true : false;

    // 1. Group happenings
    $happenings = array_filter($activitiy_links, function ($a) {
        return $a['link']->post_type === "happening";
    });

    // 2. Group activities close to the user. Disregarding weather conditions and happenings are included
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
        $response = rest_ensure_response($posts);
        return $response;
    }

    return rest_ensure_response("error");
}

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
  $latitudeFrom,
    $longitudeFrom,
    $latitudeTo,
    $longitudeTo,
    $earthRadius = 6371000
) {
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

