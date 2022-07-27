<?php
include_once('../conn.php');
error_reporting(0);
// headers
header("Access-Control-Allow-Origin: *"); //allow communication with other sites
header("Content-Type: application/json");  //formart data in json way
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");   // lifespan of commnunication
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 $data = json_decode(file_get_contents("php://input"));
   
    // print_r($data);
    //if(!empty($data)){
    $search = $data->search;
    // -- $sql = "SELECT * FROM message_from WHERE telephone LIKE '%$search%'";         
    $sql = "SELECT * FROM message_from WHERE CONCAT(msg_code, msg_from_txt, telephone, status) LIKE '%$search%'";         
    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0)
    {
      
        
   echo json_encode($data);

   }
  