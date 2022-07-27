<?php
# error_reporting(0);
#============================== headers============================================
header("Access-Control-Allow-Origin: *"); # allow communication with other sites
header("Content-Type: application/json");  # formart data in json way
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Max-Age: 3600");   # lifespan of commnunication
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
header("Content-Type:application/json");
#============================== End headers ========================================
#================================== Response Function ==============================
function response($msg_id,$msg_code,$msg_from_text,$telephone,$status,$arrival_time){
$response['msg_id'] = $msg_id;
$response['msg_code'] = $msg_code;
$response['msg_from_txt'] = $msg_from_text;
$response['telephone'] = $telephone;
$response['status'] = $status;
$response['arrival_time'] = $arrival_time;
$json_array = array($response);

echo json_encode($json_array); 

}


// TODO: 
// get the query param
// how to pass it in select

include_once('../conn.php');
// $msg_id = $_GET['msg_id'];
// $msg_code = $_GET['msg_code'];
// $msg_from_text = $_GET['msg_from_text'];
// $telephone = $_GET['telephone'];
// $status = $_GET['status'];
// $arrival_time = $_GET['arrival_time'];
$queryProcessMessagesFrom = mysqli_query($conn, "SELECT * FROM message_from ORDER BY msg_id DESC");
$json_array = array();
if(mysqli_num_rows($queryProcessMessagesFrom) > 0){
while ($row = mysqli_fetch_array($queryProcessMessagesFrom)) {
// $msg_id = $row['msg_id'];
// $msg_code = $row['msg_code'];
// $msg_from_txt = $row['msg_from_txt'];
// $telephone =$row['telephone'];
// $status =$row['status'];
// $arrival_time = $row['arrival_time'];

// response($msg_id,$msg_code,$msg_from_txt,$telephone,$status,$arrival_time);
 $json_array[]  = $row;

} echo json_encode($json_array); 

mysqli_close($conn);
}else{
response(NULL,NULL,NULL,NULL,NULL);
}


