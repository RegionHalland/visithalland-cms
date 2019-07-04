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
			$month = strftime("%b", $unixTimeStamp);

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
		$todays_date = Date('Y-m-d');

        // Send a request to
		$response = $client->request('GET', "{$api_url}events?filter%5Bmeta_key%5D=".'dates_$_start_date'."&filter%5Bmeta_compare%5D=%3E&filter%5Bmeta_value%5D={$todays_date}&per_page=100&filter%5Borderby%5D=".'dates_$_start_date'."&order=asc&show_on=11");
		$events = json_decode($response->getBody());

		$events_months = [];
		foreach ($events as $key => $event) {
			$unixTimeStamp = strtotime($event->acf->dates[0]->start_date);
			$month = strftime("%b", $unixTimeStamp);

			if (isset($events_months[$month])) {
				array_push($events_months[$month], $event);
			} else {
				$events_months[$month][] = $event;
			}
		}


        return $events_months;
	}
}
