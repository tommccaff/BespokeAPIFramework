<?php

if (!is_null($viewmodel))
{
	// message array
	$message_arr=array();

	$message_arr["status"] =  1;
	$message_arr["message"] = "Donation Successful";
	$message_arr["SeqID"]=$viewmodel;

	http_response_code(200);
  
	// show products data in json format
	echo json_encode($message_arr);	
} else {
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user Donation failed
    echo json_encode(
      array("message" => "Donation Insert Failed")
    );
}