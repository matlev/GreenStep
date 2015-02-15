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
			$companyID;
			$regionID;
			$countryName;

			if($action == "add") {
				// Push new data to the database

				// Find out if this user has a company yet
				$sql = "SELECT companyID FROM gb_employee WHERE username LIKE '$user'";
				$rslt = db_query($sql) -> fetch_assoc();
				$companyID = $rslt['companyID'];

				// Get some IDs/names like country and region
				$info = db_query("SELECT name FROM gb_country WHERE id = ".sanitize($_POST['selCountry'])) -> fetch_assoc();
				$countryName = $info['name'];

				if($_POST['selStateProv'] == '0') {
					$regionID = 1;
				} else {
					$info = db_query("SELECT id FROM gb_region WHERE code LIKE '".sanitize($_POST['selStateProv'])."'") -> fetch_assoc();
					$regionID = $info['id'];
				}

				// This user doesn't have a company yet, so they're creating a new one
				if($companyID == 0){
					$sql = "INSERT INTO gb_company (countryId, regionId, name, trade, contact, address, email, telephone, insertDate, title, name2, title2, telephone2, email2, website, fiscalMonth, fiscalDay, id2, country2, region2, partner2, baseline, target, percentage) 
					                        VALUES ('".sanitize($_POST['selCountry'])."', '1', '".sanitize($_POST['corpname'])."', '".sanitize($_POST['tradename'])."', '".sanitize($_POST['champname'])."', '".sanitize($_POST['addr1'])."', '".sanitize($_POST['champemail'])."', '".sanitize($_POST['champtelnum'])."', NOW(), '".sanitize($_POST['champtitle'])."', '".sanitize($_POST['accountname'])."', '".sanitize($_POST['accounttitle'])
					                        	."', '".sanitize($_POST['accounttelnum'])."', '".sanitize($_POST['accountemail'])."', '".sanitize($_POST['weburl'])."', '".sanitize($_POST['yearEndMonth'])."', '".sanitize($_POST['yearEndDay'])."', '".sanitize($_POST['zippost'])."', '$countryName', '".sanitize($_POST['city'])."', '$regionID', '".sanitize($_POST['baseYear'])."', '".sanitize($_POST['targetYear'])."', '".sanitize($_POST['reducTar'])."')";
					if(!db_query($sql)) {
						$response['actionPerformed'] = "Insert was not";
					} else {
						// We need to update the companyID value for the employee
						global $con;
						db_query("UPDATE gb_employee SET companyID = ".$con -> insert_id." WHERE username LIKE '$user'");
					}
					
					$response['actionPerformed'] = "Insert";
				} else {
					// The user belongs to a company, they're updating information, set the action flag accordingly
					$action = "update";
				}
			}

			if($action == "update") {
				// Update an existing row in the database
				$sql = "UPDATE gb_company SET countryId = '".sanitize($_POST['selCountry'])."', regionId = '1', name = '".sanitize($_POST['corpname'])."', trade = '".sanitize($_POST['tradename'])."', contact = '".sanitize($_POST['champname'])."', address = '".sanitize($_POST['addr1'])."', email = '".sanitize($_POST['champemail'])."', telephone = '".sanitize($_POST['champtelnum'])."', title = '".sanitize($_POST['champtitle'])."', 
					name2 = '".sanitize($_POST['accountname'])."', title2 = '".sanitize($_POST['accounttitle'])."', telephone2 = '".sanitize($_POST['accounttelnum'])."', email2 = '".sanitize($_POST['accountemail'])."', website = '".sanitize($_POST['weburl'])."', fiscalMonth = '".sanitize($_POST['yearEndMonth'])."', fiscalDay = '".sanitize($_POST['yearEndDay'])."', id2 = '".sanitize($_POST['zippost'])."', country2 = '$countryName', 
					region2 = '".sanitize($_POST['city'])."', partner2 = '$regionID', baseline = '".sanitize($_POST['baseYear'])."', target = '".sanitize($_POST['targetYear'])."', percentage = '".sanitize($_POST['reducTar'])."' WHERE id = '$companyID'";

				if(!db_query($sql)) {
					$response['actionPerformed'] = "Update was not";
				} else {
					$response['actionPerformed'] = "Update";
				}
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
				$data['rCode'] = ($region['code'] == "NA" ? 0 : $region['code']);
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
				$rslt = db_query($sql) -> fetch_assoc();
				// General Information
				$data['id'] = $rslt['id'];
				$data['name']= $rslt['city'];
				$data['cid'] = $rslt['countryId'];
				$data['address'] = $rslt['address'];

				$response['data'] = $data;
			}
		break;
		case "access":
			if($action == "pull") {
				// Pull data from the database
				$divisionID;
				$sql = "SELECT * FROM gb_division WHERE companyId =(SELECT id FROM gb_company WHERE id = (SELECT companyId FROM gb_employee WHERE username LIKE '$user'))";
				$info = db_query($sql);
				
				$rowCounter = 0;
				while($rslt = $info -> fetch_assoc()){
					if($rowCounter == 0){
						$divisionID = $rslt['id'];
					}
					$data['accUnits'][$rowCounter] = $rslt['name'];
			
					$rowCounter++;
				}
			
				if(isset($_POST['changeUnit'])){
					$unitName = $_POST['changeUnit'];
					
					$sql = "SELECT id FROM gb_division WHERE name LIKE '$unitName' AND companyId =(SELECT id FROM gb_company WHERE id = (SELECT companyId FROM gb_employee WHERE username LIKE '$user'))";
					$info = db_query($sql) -> fetch_assoc();
					
					$divisionID = $info['id'];
				}
			
				$sql = "SELECT * FROM gb_employee WHERE divisionId = '$divisionID'";
				$info = db_query($sql);
				
				$rowCounter = 0;
				while($rslt = $info -> fetch_assoc()){
					$data['accUsers'][$rowCounter] = $rslt['username'];
					$data['userPassword'][$rowCounter] = $rslt['password'];
			
					$rowCounter++;
				}

				$response['data'] = $data;
			}
			if($action == "update") {
				// Update an existing row in the database

				$userN=$_POST['username'];
				$userP=$_POST['password'];
				$sql = "UPDATE bg_employee SET username ='$userN', password =  '$userP' WHERE divisionId = '$divisionID'  ";
				if(!db_query($sql)) {
					$response['actionPerformed'] = "Update was not";
				} else {
					$response['actionPerformed'] = "Update";
				}
			}

			if($action == "add") {
				$userN=$_POST['username'];
				$userP=$_POST['password'];
				$sql = "INSERT INTO bg_employee VALUES username ='$userN', password = '$userP' , divisionId = '$divisionID'";
				if(!db_query($sql)) {
					$response['actionPerformed'] = "Update was not";
				} else {
					$response['actionPerformed'] = "Update";
				}
			}

			if($action == "delete") {
				// Delete the requested corporation from the database
				
			}
			break;
	}

	// Send response and exit gracefully
	echo json_encode($response);
	exit();
?>