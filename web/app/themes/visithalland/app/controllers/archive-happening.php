<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use GuzzleHttp\Client;

class ArchiveHappening extends Controller
{

	public function happenings()
	{
		$happenings = \App::getHappenings(40);
		$months = [];

		foreach ($happenings as $key => $happening) {
			$unixTimeStamp = strtotime($happening->meta_fields['start_date']);
			$date = getdate($unixTimeStamp);
			$month = $date['month'];

			if (isset($months[$month])) {
				array_push($months[$month], $happening);
			} else {
				$months[$month][] = $happening;
			}
		}

		return $months;
	}

	public function events()
	{
		$api_url = getenv('VH_CALENDAR_API');
		// Create a client with a base URI
        $client = new Client();

        // Send a request to
        $response = $client->request('GET', "{$api_url}events?per_page=100&show_on=11");
        $events = json_decode($response->getBody());

		$events_months = [];
		foreach ($events as $key => $event) {
			$unixTimeStamp = strtotime($event->acf->dates[0]->start_date);
			$date = getdate($unixTimeStamp);
			$month = $date['month'];

			if (isset($events_months[$month])) {
				array_push($events_months[$month], $event);
			} else {
				$events_months[$month][] = $event;
			}
		}


        return $events_months;
	}
}
