<?php
	include_once('DBCON.php');

	connect();

	// Set up initial variables

	/** Deployment code **
	$user = $p4a_username;
	$role = $p4a_role;
	**********************/
	
	// Development Code //
	$user = "GobiSOFT Demo";
	$role = "original";
	// Remove this block //

	$page = $_POST['page'];
	$action = $_POST['action'];

	// The response to return to the AJAX call
	$response = array(); 
	$data = array();

	// Switch on the tab that sent the request
	// If forking this file, this is the part you need to add to.  
	// Create your own "case" according to the tab you're working on.
	switch($page) {

		case "corp":
			if($action == "add") {
				// Push new data to the database

				// Find out if this user has a company yet
				$sql = "SELECT companyID FROM gb_employee WHERE username LIKE '$user'";
				$rslt = db_query($sql) -> fetch_assoc();

				// This user doesn't have a company yet, so they're creating a new one
				if($rslt['companyID'] == 0){
					

				} else {
					// The user belongs to a company, they're updating information
					$action = "update";
				}
			}

			if($action == "update") {
				// Update an existing row in the database

				$response['actionPerformed'] = $_POST;
			}

			if($action == "delete") {
				// Delete the requested corporation from the database
				
			}
			if($action == "pull") {
				// Pull data from the database
				$sql = "SELECT * FROM gb_company WHERE id = (SELECT companyID FROM gb_employee WHERE username LIKE '$user')";
				$rslt = db_query($sql) -> fetch_assoc();
				$region = db_query("SELECT name, code FROM gb_region WHERE id = ".$rslt['partner2']) -> fetch_assoc();

				// General Information
				$data['cName'] = $rslt['name'];
				$data['cTrade'] = $rslt['trade'];
				$data['address'] = $rslt['address'];
				$data['city'] = $rslt['region2'];
				$data['country'] = $rslt['country2'];
				$data['rCode'] = $region['code'];
				$data['region'] = $region['name'];
				$data['zip'] = $rslt['id2'];
				$data['website'] = $rslt['website'];

				// Emission Reduction Target
				$data['baseline'] = $rslt['baseline'];
				$data['percentage'] = $rslt['percentage'];
				$data['target'] = $rslt['target'];
				
				// GHG Champion
				$data['champName'] = $rslt['contact'];
				$data['champTitle'] = $rslt['title'];
				$data['champNumber'] = $rslt['telephone'];
				$data['champEmail'] = $rslt['email'];

				// GHG Accountant
				$data['accName'] = $rslt['name2'];
				$data['accTitle'] = $rslt['title2'];
				$data['accNumber'] = $rslt['telephone2'];
				$data['accEmail'] = $rslt['email2'];

				// Reporting Year
				$data['fiscMonth'] = $rslt['fiscalMonth'];
				$data['fiscDay'] = $rslt['fiscalDay'];

				$response['data'] = $data;
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
		case "bu":
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
				$sql = "SELECT * FROM gb_division WHERE 'id'=4 AND 'companyId'=3";
				$rslt = fetch_assoc(db_query($sql));
				// General Information
				$data['id'] = $rslt['id'];
				$data['name']= $rslt['city'];
				$data['cid'] = $rslt['countryId'];
				$data['address'] = $rslt['address'];

				$response['data'] = $data;
			}
		break;
		default:
			$response['error'] = "Page " + $page + " currently not supported or doesn't exist";
			break;
	}

	// Send response and exit gracefully
	echo json_encode($response);
	exit();
?>