<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\instructors_94910;

class InstructorController extends Controller
{
	public function getAll()
    {
$instructorArray = array();
$response = array();

	$query = "SELECT full_name, email, phone_number, gender, profile_photo FROM instructors_94910";
	if($stmt = $con->prepare($query)){
		$stmt->execute();
		
		//Bind fetched result to $ variables
		$stmt->bind_result($full_name,$email,$phone_number, $gender, $profile_photo);
		//Check for results		
		if($stmt->fetch()){
			$count=1;

			$instructorArray["full_name"] = $full_name;
			$instructorArray["email"] = $email;
		    $instructorArray["phone_number"] = $phone_number;
			$instructorArray["profile_photo"] = $profile_photo;
			$instructorArray["gender"] = $gender;
			
			$response["success"] = 1;
			$response["data"] = $instructorArray;
		$count++;
		
		}else{
			
			$response["success"] = 0;
			$response["message"] = "Instructor does not exist";
		}
		$stmt->close();


	}else{
		//When some error occurs
		$response["success"] = 0;
		$response["message"] = mysqli_error($con);
		
	}

//Display JSON response
echo json_encode($response);
}
}
