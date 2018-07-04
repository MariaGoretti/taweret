<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorController extends Controller
{
     public function showinstructors(Request $req)
	{
		$data = instructors_94910::all();
		return $data;
	}

	public function saveInstructor(Request $req)
	{
		$full_name = $req['full_name'];
		$phone_number = $req['phone_number'];
		$email = $req['email'];
		$gender = $req['gender'];
		$profile_photo = $req['profile_photo'];

		$instructors_94910 = new instructors_94910;
		$instructors_94910->name = $name;
		$instructors_94910->contact = $contact;
		$instructors_94910->email = $email;
		$instructors_94910->gender = $gender;
		$instructors_94910->profile_photo = $profile_photo;
		$instructors_94910->save();

		return $instructors_94910->toJson();		
	}
}
