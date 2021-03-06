<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\instructors_94910;
use DB;

class InstructorController extends Controller
{
	public function getAll()
    {
define('DB_USER', "taweret");
define('DB_PASSWORD', "mariagoreti");
define('DB_DATABASE', "taweret");
define('DB_HOST', "db4free.net");
 
$con = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);
 
// Check connection
if(mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$query = "SELECT id, full_name, email, phone_number, gender, profile_photo FROM instructors_94910";
$result = array();
$instructorArray = array();
$response = array();
//Prepare the query
if($stmt = $con->prepare($query)){
	$stmt->execute();
	
	$stmt->bind_result($id,$full_name, $email,$phone_number,$gender,$profile_photo);
	//Fetch 1 row at a time					
	while($stmt->fetch()){
		
		$instructorArray["id"] = $id;
		$instructorArray["full_name"] = $full_name;
		$instructorArray["email"] = $email;
		$instructorArray["phone_number"] = $phone_number;
		$instructorArray["gender"] = $gender;
		$instructorArray["profile_photo"] = $profile_photo;
		$result[]=$instructorArray;
		
	}
	$stmt->close();
	$response["success"] = 1;
	$response["data"] = $result;
	
 
}else{
	//Some error while fetching data
	$response["success"] = 0;
	$response["message"] = mysqli_error($con);
		
	
}
//Display JSON response
echo json_encode($response);


 }
}

