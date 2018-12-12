<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class SingleMeetLocal extends Controller
{
	public function tips() {
		$tips = get_field("tips");
		return $tips;
	}
}
