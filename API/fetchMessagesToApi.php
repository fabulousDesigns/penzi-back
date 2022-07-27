<?php
include_once('COREHEADERS.API.php');
include_once('../conn.php');


# run a query to select all messages in the database from messages from table
$selectAllMessagesTo = "SELECT * FROM message_to ORDER BY msg_id DESC";
$resultSelectAllMessagesTo = mysqli_query($conn, $selectAllMessagesTo);


$json_array = array();

while ($row = mysqli_fetch_assoc($resultSelectAllMessagesTo)) {
	# code...
	 // if (mysqli_num_rows($resultSelectAllMessagesTo) > 0){
  //       $data["message"] = "data saved successfully";
  //       $data["Status"] = "Ok"; 
  //           static $success = true;
  //           if($success){
  //               echo json_encode($data); 
  //               $success = false;
  //             }
  //        $json_array[]  = $row; 
  //   }
  //   else
  //   {
  //       $data["message"] = "data not saved successfully";
  //       $data["status"] = "error";
  //       static $error = true;
  //           if($error){
  //               echo json_encode($data); 
  //               $error = false;
  //             }
  //   }


 $json_array[]  = $row; 
 /*if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `message_to` WHERE CONCAT(`msg_code`, `telephone`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `message_to`";
    $search_result = filterTable($query);
}*/

// // function to connect and execute the query
// function filterTable($query)
// {
//     $connect = mysqli_connect("localhost", "root", "", "test_db");
//     $filter_Result = mysqli_query($connect, $query);
//     return $filter_Result;
// }


	
}

echo json_encode($json_array); 