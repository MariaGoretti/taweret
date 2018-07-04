<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function save(Request $req)
    {
    	$exercise = $req['exercise'];
    	$sets = $req['sets'];
    	$location = $req['location'];
    	$date = $req['date'];

    	$sessions_94910 = new sessions_94910;
    	$sessions_94910->exercisee = $exercise;
    	$sessions_94910->sets = $sets;
    	$sessions_94910->location = $location;
    	$sessions_94910->date = $date;
    	$sessions_94910->save();

    	return $sessions_94910;
    }

    public function session(Request $req)
    {
    	$data = sessions_94910::all();
        return $data;

    }
}
