<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\sessions_94910;

class SessionController extends Controller
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

$query = "SELECT session_id, exercise, sets, location, session_date FROM sessions_94910";
$result = array();
$sessionArray = array();
$response = array();
//Prepare the query
if($stmt = $con->prepare($query)){
    $stmt->execute();
    
    $stmt->bind_result($session_id,$exercise, $sets, $location, $session_date);
    //Fetch 1 row at a time                 
    while($stmt->fetch()){
        
        $sessionArray["session_id"] = $session_id;
        $sessionArray["exercise"] = $exercise;
        $sessionArray["sets"] = $sets;
        $sessionArray["location"] = $location;
        $sessionArray["session_date"] = $session_date;
        
        $result[]=$sessionArray;
        
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
