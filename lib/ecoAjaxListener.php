<?php
	include_once('DBCON.php');

	connect();

	// Set up initial variables
	$user = $p4a_username;
	$role = $p4a_role;
	$page = $_POST['page'];
	$action = $_POST['action'];

	// The response to return to the AJAX call
	$response; 

	// Switch on the tab that sent the request
	// If forking this file, this is the part you need to add to.  
	// Create your own "case" according to the tab you're working on.
	switch($page) {

		case "corp":
			if($action == "update") {
				// Update an existing row in the database
				
			}

			if($action == "add") {
				// Push new data to the database

			}

			if($action == "delete") {
				// Delete the requested corporation from the database

			}
			if($action == "pull") {
				// Pull data from the database

			}
			break;

		case "gsEmissionSources":
			if($action == "update") {
				// Pull data from the database corresponding to the current user
				
			}

			if($action == "add") {
				// Push data to the database

			}

			if($action == "delete") {
				// Delete the requested corporation from the database

			}
			if($action == "pull") {
				// Pull data from the database

				if(isset($_POST[0]) && $_POST[0] == "thename") {
					// grab stuff from the database related to "thename"
					// set the data to the var $response
				}

			}
			break;

		default:
			$response['error'] = "Page " + $page + " currently not supported or doesn't exist";
			break;
	}

	// Send response and exit gracefully
	echo $response;
	exit();
?>