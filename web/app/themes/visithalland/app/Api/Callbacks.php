<?php
use Carbon\Carbon;


function vh_set_passed_happenings_to_draft_callback()
{
    // get all happenings
    $posts = get_posts(array(
        'post_type'     => 'happening',
        'posts_per_page'    => -1,
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
