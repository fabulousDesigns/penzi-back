<?php
include_once('COREHEADERS.API.php');
include_once('../conn.php');

# run a query to select all users in the database from users table
$selectUsers = "SELECT * FROM users ORDER BY id DESC";
$resultSelectUsers = mysqli_query($conn, $selectUsers);

$json_array = array();


while ($row = mysqli_fetch_assoc($resultSelectUsers)) {

$json_array[]  = $row; 
    
}
echo json_encode($json_array); 





