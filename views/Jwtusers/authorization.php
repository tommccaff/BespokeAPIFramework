<?php

$vm_json = json_decode($viewmodel);

// message array
$message_arr=array();

// if (str_contains($viewmodel, 'error')) {  // PHP 8 ONLY!!!  So use strstr() for PHP 7 server

if (strstr($viewmodel, 'error')) {

	$message_arr["status"] =  0;
	$message_arr["message"] = "JWT Token Failed.";
	$message_arr["error"] = $vm_json->{"error"};

    // set response code - 400 Bad Request
	http_response_code(400);
  
	echo json_encode($message_arr);	
} else {
  

    http_response_code(200);
  
	$message_arr["status"] =  1;
	$message_arr["message"] = "JWT Token Success!";
	$message_arr["decoded_jwt_token"]=$vm_json;

	echo json_encode($message_arr);	
}