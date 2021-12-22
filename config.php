<?php

// EXAMPLE CONFIG FILE - store this OUTSIDE of the web-enabled space, 
// for example in a directory like ../../dbconfig/config.php

// Define the following parameters:

// Define JWT key for encode/decode
define("JWT_SECRET_KEY", "");  // create a standard HS256 secret key
define("JWT_ALGORITHM", "HS256");
define("JWT_EXPIRATION_TIME_MINUTES", 15);

// Define DB Params
define("DB_HOST", "");
define("DB_USER", "");
define("DB_PASS", "");
define("DB_NAME", "");

// Define URL
define("ROOT_PATH", "/");
define("ROOT_URL", "http://yourapidomain.com/");