<?php
# Allow from any origin
if (isset($_SERVER['HTTP_ORIGIN'])) {
	# should do acheck here to match $_SERVER['HTTP_ORIGIN'] to a 
	# whitelist of a safe domains
	header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
	header("Access-Control-Allow-Credentials: true");
	header("Access-Control-Max-Age: 86400"); # cache for a day	
}
// received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
	# code...
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    	header("Access-Control-Allow-Methods: GET,POST,PUT,DELETE,OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'])) 
    	header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    
}