<?php
include_once('COREHEADERS.API.php');
include_once('../conn.php');

# run a query to select all users in the database from users table
$selectMsgs = "SELECT * FROM message_from ORDER BY msg_id DESC";
$resultSelectMsgs = mysqli_query($conn, $selectMsgs);


$json_array = array();


while ($row = mysqli_fetch_assoc($resultSelectMsgs)) {

$json_array[]  = $row; 
    
}
echo json_encode($json_array); 






















