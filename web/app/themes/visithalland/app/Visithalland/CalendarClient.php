<?php

namespace App\Visithalland;
use GuzzleHttp\Client;

class CalendarClient
{
    const municipios = array(
        "varberg" => array(
            "resultObject" => "resultList",
            "apiUrl" => "https://www.visitvarberg.se/4.52a9a2e615abe2be36cab481/12.52a9a2e615abe2be36cab4a3.json?enddate=1538428980000&maxhit=500&path=4.52a9a2e615abe2be36c96755&query&sort=date&startdate=1523484000000&starthit=0"
        ),
        "kungsbacka" => array(
            "resultObject" => "Result",
            "apiUrl" => "https://www.visitkungsbacka.se/umbraco/surface/basetool/events?Areas=146&Categories=5&Channel=1006&ChannelKey=1&DateFrom=2018-04-25%2B16:33&DateInterval=365&DateTo=2019-04-25&Facets=true&Lang=sv&OrderBy=relevance&Page=0&PageSize=200&Subjects=1151&Type=2&geo=0&s=1"
        ),
        "falkenberg" => array(
            "resultObject" => "events",
            "apiUrl" => "https://www.falkenberg.se/4.6f45c23415674cef4142d3d9/12.12caa5581576962b51a31a6.portlet?getjson=true"
        )
    );

    public function __construct()
    {
        $this->server_google_api_key = "AIzaSyCNmC2-2XUoygVKXNYikn0e8pVOWVczjmQ";
    }

    public function runRequest(String $municipio)
    {
        if (!isset(self::municipios[$municipio])) return;
        // Create a client with a base URI
        $client = new Client();

        // Send a request to
        $response = $client->request('GET', self::municipios[$municipio]["apiUrl"]);
        $resultObject = self::municipios[$municipio]["resultObject"];

        $responseArray = json_decode($response->getBody())->$resultObject;

        return self::saveEvent($responseArray, $municipio);
    }

    public function saveEvent(Array $events, String $municipio)
    {
        //Insert recived events
        foreach ($events as $key => $event) {
            // Insert every post in wp
            switch ($municipio) {
                case 'varberg':
                    self::programmatically_create_post(
                        array(
                            "post_title" => $event->title ? $event->title : "Titel saknas",
                            "post_name" => $event->title ? urlencode($event->title): "namn-saknas".$key,
                            "post_content" => $event->desc ? $event->desc : "",
                            "location" => self::getCoordinatesByAdress($event->place),
                            "start_date" => isset($event->startDate) ? $event->startDate : "",
                            "end_date" => isset($event->endDate) ? $event->endDate : "",
                            "url" => $event->url ? "https://www.visitvarberg.se" . $event->url : "missing_url_" . uniqid(),
                            "unique_id" => $event->url ? $event->url : uniqid(),
                            "img_url" => $event->image ? "https://www.visitvarberg.se" . $event->image : "",
                            "excerpt" => $event->desc ? $event->desc : "",
                            "municipio" => ucfirst($municipio)
                        )
                    );
                    break;
                case 'kungsbacka':
                    self::programmatically_create_post(array(
                            "post_title" => $event->Heading ? $event->Heading : "Titel saknas",
                            "post_name" => $event->Heading ? urlencode($event->Heading) : "namn-saknas".$key,
                            "post_content" => $event->Description ? $event->Description : "",
                            "location" => self::getAdressByCoordinates(array(
                                "lat" => isset($event->Latitude) ? $event->Latitude : "",
                                "lng" => isset($event->Longitude) ? $event->Longitude : ""
                            )),
                            "start_date" => isset($event->Dates[0]->Date) ? $event->Dates[0]->Date : "",
                            "end_date" => isset($event->DateTo) ? $event->DateTo : "",
                            "url" => $event->Id ? "http://www.kungsbacka.se/Uppleva-och-gora/Det-hander-i-Kungsbacka/Evenemangslista/Evenemang/?EventId=" . $event->Id : "",
                            "unique_id" => $event->Id ? $event->Id : uniqid(),
                            "img_url" => isset($event->ImageLarge->Path) ? "https://media.basetool.se/" . $event->ImageLarge->Path : "",
                            "excerpt" => $event->Description ? $event->Description : "",
                            "municipio" => ucfirst($municipio)
                        )
                    );
                    break;
                case 'falkenberg':
                    // Only add posts with images
                    if($event->heroimg == "/images/18.14f66b78164d4721a21e561/1533197878079/defaultevent.jpg") continue;

                    // The format we get (googleMapCordinate) is 56.902966, 12.493640
                    $coordinate_string = empty($event->googleMapCordinate) ? null : $event->googleMapCordinate;
                    $coordinate_string = str_replace(' ', '', $coordinate_string);
                    $location = null;

                    if(!empty($coordinate_string)) {
                        $exploredcoordinates = explode(",", $coordinate_string);
                        $lat = $exploredcoordinates[0];
                        $lng = $exploredcoordinates[1];
                        $location = self::getAdressByCoordinates(array(
                                "lng" => $lng,
                                "lat" => $lat
                        ));
                    }

                    self::programmatically_create_post(array(
                            "post_title" => $event->title ? $event->title : "Titel saknas",
                            "post_name" => $event->title ? urlencode($event->title): "namn-saknas".$key,
                            "post_content" => $event->description ? $event->description : "",
                            "location" => $location,
                            "start_date" => isset($event->startdate) ? date("Y-m-d H:i:s", strtotime($event->startdate)) : "",
                            "end_date" => isset($event->enddate) ? date("Y-m-d H:i:s", strtotime($event->enddate)) : "",
                            "url" => $event->link ? $event->link : "missing_url_" . uniqid(),
                            "unique_id" => $event->uuid ? $event->uuid : uniqid(),
                            "img_url" => $event->heroimg ? "https://www.falkenberg.se" . $event->heroimg : "",
                            "excerpt" => $event->description ? $event->description : "",
                            "municipio" => ucfirst($municipio)
                        )
                    );
                    break;

                default:
                    return;
                    break;
            }

        }

    }

    /**
     * A function used to programmatically create a post in WordPress. The slug, author ID, and title
     * are defined within the context of the function.
     *
     * @returns -1 if the post was never created, -2 if a post with the same title exists, or the ID
     *          of the post if successful.
     */
    function programmatically_create_post(Array $post)
    {
        // Initialize the page ID to -1. This indicates no action has been taken.
        $post_id = -1;

        // Setup the author, slug, and title for the post
        $author_id = 1;

        // If the page doesn't already exist, then create it
        //$pageExists = get_page_by_title($post["post_title"], OBJECT, 'event');
        $pageExists = get_posts(array(
            'numberposts'	=> 1,
            'post_type' => 'event',
            'meta_key'		=> 'unique_id',
            'meta_value'	=> $post["unique_id"],
            'post_status' => array('publish', 'pending', 'draft', 'auto-draft', 'future', 'private', 'inherit', 'trash')
        ));

        if ( !isset($pageExists[0]) ) {
            // Set the post ID so that we know the post was created successfully
            add_filter('wp_insert_post_data', array($this, 'alter_post_modification_time'), 99, 2);
            $post_id = wp_insert_post(
                array(
                    'comment_status'	=>	'closed',
                    'ping_status'		=>	'closed',
                    'post_author'		=>	$author_id,
                    'post_modified'     =>  $post["start_date"],
                    'post_name'		    =>	$post["post_name"],
                    'post_content'      =>  $post["post_content"],
                    'post_title'		=>	$post["post_title"],
                    'post_status'		=>	'publish',
                    'post_type'		    =>	'event'
                )
            );

            update_field('unique_id', $post["unique_id"], $post_id);
            update_field('img_url', $post["img_url"], $post_id);
            update_field('location', $post["location"], $post_id);
            update_field('start_date', $post["start_date"], $post_id);
            update_field('end_date', $post["end_date"], $post_id);
            update_field('external_link', $post["url"], $post_id);
            update_field('municipio', $post["municipio"], $post_id);
            update_field('excerpt', $post["excerpt"], $post_id);

            remove_filter('wp_insert_post_data', array($this, 'alter_post_modification_time'), 99, 2);


        // Otherwise, we'll stop
        } else {
            // Arbitrarily use -2 to indicate that the page with the title already exists
            $post_id = -2;
        } // end if

        return "success";
    }

    function alter_post_modification_time($data, $postarr)
    {
        if (!empty($postarr['post_modified'])) {
            $data['post_date'] = $postarr['post_modified'];
            $data['post_modified'] = $postarr['post_modified'];
            $data['post_modified_gmt'] = $postarr['post_modified'];
        }

        return $data;
    }


    public function getCoordinatesByAdress($address)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://maps.google.com/maps/api/geocode/json?address='.$address . '&key=KEY');
        $responseArray = json_decode($response->getBody());

        if(isset($responseArray->results[0])) {
            return array(
                "address" => $address,
                "lat" => $responseArray->results[0]->geometry->location->lat,
                "lng" => $responseArray->results[0]->geometry->location->lng
            );
        }

        return null;
    }

    public function getAdressByCoordinates(Array $coordinates)
    {
        if($coordinates["lat"] == "" && $coordinates["lng"] == "") return false;

        $client = new Client();
        $response = $client->request('GET', 'https://nominatim.openstreetmap.org/reverse', [
            'query' => array(
                'lat' => $coordinates["lat"],
                'lon' => $coordinates["lng"],
                'format' => 'json'
            )
        ]);
        $responseArray = json_decode($response->getBody());

        return array(
            "address" => $responseArray->display_name,
            "lat" => $coordinates["lat"],
            "lng" => $coordinates["lng"]
        );


        /*return;

        if (isset($responseArray->results[0])) {
        
            /*return array(
                "address" => $responseArray->results[0]->formatted_address,
                "lat" => $coordinates["lat"],
                "lng" => $coordinates["lng"]
            );
        }

        return null;*/

        /*$client = new Client();
        $response = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?latlng='. $coordinates["lat"] .','. $coordinates["lng"] . '&key=KEY');
        $responseArray = json_decode($response->getBody());

        if (isset($responseArray->results[0])) {
            return array(
                "address" => $responseArray->results[0]->formatted_address,
                "lat" => $coordinates["lat"],
                "lng" => $coordinates["lng"]
            );
        }

        return null;*/
    }

    public function getAdressComponentsByCoordinates(Array $coordinates)
    {
        if($coordinates["lat"] == "" && $coordinates["lng"] == "") return false;

        $client = new Client();
        $response = $client->request('GET', 'https://maps.googleapis.com/maps/api/geocode/json?latlng='. $coordinates["lat"] .','. $coordinates["lng"] . '&key=' . $this->server_google_api_key);
        $responseArray = json_decode($response->getBody());

        if (isset($responseArray->results[0])) {
            return array(
                "address_components" => $responseArray->results[0]->address_components,
            );
        }

        return null;
    }
}

//$self = new CalendarClient();
