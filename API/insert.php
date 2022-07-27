<?php
error_reporting(0);
include_once('../conn.php');
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers:access");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 $data = json_decode(file_get_contents("php://input"));
	if(!empty($data)){
        // Get data
   
    // print_r($data);
    $first_name = $data->first_name;
    $last_name = $data->last_name;
    $telephone = $data->telephone;
    $password = $data->password;

    $sql = "INSERT INTO users(first_name,last_name,telephone,password) VALUES('$first_name','$last_name','$telephone','$password')";

    $result = mysqli_query($conn,$sql);

    if($result){
        $response['data'] = array('status'=>'valid');
        echo json_encode($response);
    }else{
        $response['data'] = array('status'=>'Invalid');
        echo json_encode($response);
    }
    // close connection
    
 @mysqli_close($conn);
    }
	
?>