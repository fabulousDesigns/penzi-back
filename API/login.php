<?php
// error_reporting(0);
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers:access");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
// CONNECT TO DATABASE
include_once('../conn.php');
	// Get data
    $data = json_decode(file_get_contents("php://input"));
    //print_r($data);
    $telephone = $data->telephone;
    $password = $data->password;
    $result = mysqli_query($conn,"SELECT * FROM users WHERE telephone = '".$telephone."' AND password = '".$password."'");
     
     $nums = mysqli_num_rows($result);
      $rs = mysqli_fetch_array($result);

    if($nums >=1){
       http_response_code(200);
       $outp = "";

     $outp .= '{ "telephone":"' . $rs["telephone"] . '",';
       $outp .= '"password":"' . $rs["password"] . '",';
          $outp .= '"Status":"200"}';

           echo $outp;
   } else{
       http_response_code(202);
   }

	
 @mysqli_close($conn);
	
?>