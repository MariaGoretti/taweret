<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\locations_94910;

class LocationController extends Controller
{
    

	public function showGymLocation(Request $req)
	{
		$data = locations_94910::all();

		return $data->toJson();
	}

	public function nearGymLocation(Request $req)
	{
		$location->req->input('location');

		$data = locations_94910::where('location',$location)->get();

		return $data->toJson();

	}
}
