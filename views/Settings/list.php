<?php

if (count($viewmodel)>0)
{

	// message array
	$message_arr=array();

	$message_arr["status"] =  1;
	$message_arr["message"] = "settings list";
	$message_arr["settings"]=$viewmodel;

	http_response_code(200);
  
	// show products data in json format
	echo json_encode($message_arr);	
} else {
  
    // set response code - 404 Not found
    http_response_code(404);
  
    // tell the user no items found
    echo json_encode(
      array("message" => "No items found.")
    );
}
