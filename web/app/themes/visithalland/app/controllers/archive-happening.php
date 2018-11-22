<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class ArchiveHappening extends Controller
{

	public function getHappeningsByMonth()
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
}
