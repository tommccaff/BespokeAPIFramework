<?php

use Firebase\JWT\JWT;

class JwtuserModel extends Model{

	public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		// Create hashed password to compare with stored data
		$password = md5($post['password']);

		// Compare Login
		$this->query('SELECT * FROM users WHERE email = :email AND password = :password');
		$this->bind(':email', $post['email']);
		$this->bind(':password', $password);
		
		$row = $this->single();

		if($row){
			$exptime = time() + 900; // Expire in 15 minutes

			$payload = array(
			    "name" => $row['name'],
			    "email" => $row['email'],
			    "exp" => $exptime
			);

			$jwt = JWT::encode($payload, JWT_SECRET_KEY);

			return $jwt;
		} else {
			return NULL;
		}
	}

	public function authorization(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if (!isset($_SERVER['HTTP_AUTHORIZATION'])) {

			// Authorization field was not found in the request
		    return json_encode(
      			array("error" => "HTTP_AUTHORIZATION not found in request."));
		}

		if (! preg_match('/Bearer\s(\S+)/', $_SERVER['HTTP_AUTHORIZATION'], $matches)) {

			// Authorization Bearer field was not found in the request
		    return json_encode(
      			array("error" => "HTTP_AUTHORIZATION not found in request."));
		}

		$jwt = $matches[1];
		if (! $jwt) {

		    // No token was able to be extracted from the authorization header
		    return json_encode(
      			array("error" => "JWT Token not found in request."));
		} else {

			try {
			    $jwt_decoded = JWT::decode($jwt, JWT_SECRET_KEY, array('HS256'));
			} catch (Exception $e) {
				
			    // JWT token is malformed in some way or is expired; getMessage will tell.
			    return json_encode(
      			array("error" => $e->getMessage()));
			}

			return json_encode($jwt_decoded);
		}
	}
}