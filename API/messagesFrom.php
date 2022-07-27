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
   
        // Get data
   
    // print_r($data);
    //if(!empty($data)){
    $msg_code = $data->msg_code;
    $telephone = $data->telephone;
    $msg_from_text = $data->msg_from_text;
    $sql = "INSERT INTO message_from (msg_code, msg_from_txt, telephone, status) VALUES('$msg_code','$msg_from_text','$telephone','unprocessed')";
             // sql query to insert values in the table msg_code,msg_from_txt,arrival_time,sender_number_from,status
            //  execute the query
    $result = mysqli_query($conn,$sql);
    if ($result == 1)
    {
      
        $data["message"] = "data saved successfully";
        $data["tatus"] = "Ok";
        //echo json_encode($data);
    }
    else
    {
        $data["message"] = "data not saved successfully";
        $data["status"] = "error";  
        //echo json_encode($data); 
    }
   echo json_encode($data);
   //}

// if ($_SERVER["REQUEST_METHOD"] === 'POST')
// {
//     // get use data
//     $senderId = $_POST['senderId'];
//     $number = $_POST['Unumber'];
//     $msg_text = $_POST['msg_text'];     
//         // insert data into database
   
// }
// else
// {
//     $data["message"] = "Format not supported";
//     $data["status"] = "error";    
// }
//     echo json_encode($data);