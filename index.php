<?php
//phpinfo();
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
//error_reporting(E_ALL);

// Start Session
session_start();

// Require Composer Dependencies
require_once 'vendor/autoload.php';

// Include Config.php - stored outside of the htdocs webspace
//require('..\..\dbconfig\config.php');
require('../../dbconfig/config.php');


// Include our classes, controllers, and models
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/beers.php');
require('controllers/merch.php');
require('controllers/events.php');
require('controllers/settings.php');
require('controllers/donations.php');
require('controllers/jwtusers.php');

require('models/beer.php');
require('models/merch.php');
require('models/event.php');
require('models/setting.php');
require('models/donation.php');
require('models/jwtuser.php');


// Currently only supporting GET and POST.  If POST, only supporting JSON payloads for now

if ($_SERVER['REQUEST_METHOD'] == "GET") {
	$payload = "";
} else {
	$payload = file_get_contents('php://input');
}

$bootstrap = new Bootstrap($_SERVER['REQUEST_METHOD'], $_REQUEST, $payload);
$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}

