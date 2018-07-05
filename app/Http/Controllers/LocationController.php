<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\locations_94910;

class LocationController extends Controller
{
    public function saveGym(Request $req)
	{
		$gym_name = $req['gym_name'];
		$location = $req['location'];
		$opening_time = $req['opening_time'];
		$closing_time = $req['closing_time'];

		$locations_94910 = new locations_94910;
		$locations_94910->gym_name = $gym_name;
		$locations_94910->location = $location;
		$locations_94910->opening_time = $opening_time;
		$locations_94910->closing_time = $closing_time;

		$locations_94910->save();

		return $locations_94910->toJson();
	}

	public function showGym(Request $req)
	{
		$data = locations_94910::all();

		return $data->toJson();
	}

	public function gymNear(Request $req)
	{
		$location->req->input('location');

		$data = locations_94910::where('location',$location)->get();

		return $data->toJson();

	}
}
