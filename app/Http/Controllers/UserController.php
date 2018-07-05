<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\users_94910;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function addUser()
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

     $response = array();
 
//Check for mandatory parameters
if(isset($_POST['first_name'])&&isset($_POST['last_name'])&&isset($_POST['email_address'])&&isset($_POST['password'])&&isset($_POST['confirm_password'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $password = md5($_POST['password']);
    
    //Query to insert a user
    $query = "INSERT INTO users_94910(first_name, last_name, email_address, password) VALUES (?,?,?,?)";
    //Prepare the query
    if($stmt = $con->prepare($query)){
        //Bind parameters
        $stmt->bind_param("ssis",$first_name,$last_name,$email_address,$password);
        //Exceting MySQL statement
        $stmt->execute();

        //Check if data got inserted
        if($stmt->affected_rows == 1){
            $response["success"] = 1;           
            $response["message"] = "User Successfully Added";           
            
        }else{
            //Some error while inserting
            $response["success"] = 0;
            $response["message"] = "Error while adding user";
        }                   
    }else{
        //Some error while inserting
        $response["success"] = 0;
        $response["message"] = mysqli_error($con);
}
}else{
        //Some error while inserting
            $response["success"] = 0;
            $response["message"] = "Missing manadatory parameters";
        
    }

//Displaying JSON response
echo json_encode($response);

 }
}
