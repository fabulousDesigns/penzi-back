<?php
include_once('COREHEADERS.API.php');
include_once('../conn.php');

# run a query to select all users in the database from users table
$selectAllUsers = "SELECT * FROM users ORDER BY id DESC";
$resultSelectAllUsers = mysqli_query($conn, $selectAllUsers);


$json_array = array();


while ($row = mysqli_fetch_assoc($resultSelectAllUsers)) {
	# code...
	 // if (mysqli_num_rows($resultSelectAllUsersFrom) > 0){
  //       $data["message"] = "data saved successfully";
  //       $data["Status"] = "Ok"; 
  //           static $success = true;
  //           if($success){
  //               echo json_encode($data); 
  //               $success = false;
  //             }
  //       
  //   }
    // else
    // {
    //     $data["message"] = "data not saved successfully";
    //     $data["status"] = "error";
    //     static $error = true;
    //         if($error){
    //             echo json_encode($data); 
    //             $error = false;
    //           }
    // }


$json_array[]  = $row; 
	
}
echo json_encode($json_array); 






















