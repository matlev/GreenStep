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

	case "es":
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
			$esBU;
			$sql = "SELECT * FROM gb_division WHERE companyId = (SELECT companyId FROM gb_employee WHERE username LIKE '$user')";
			$info = db_query($sql);

			$rows = 0;
			while($rslt = $info -> fetch_assoc()){
				$esBU = $rslt['id'];
				$data['loadUnits'][$rows] = $rslt['name'];

				$rows++;
			}

			$response['data'] = $data;

		}
	break;

	case "bu":

		if($action == "update") {
		// Pull data from the database corresponding to the current user

		}

		if($action == "add") {

		}

		if($action == "delete") {
		// Delete the requested corporation from the database
			$esBU;
			$sql = "SELECT * FROM gb_division WHERE companyId = (SELECT companyId FROM gb_employee WHERE username LIKE '$user')";
			$info = db_query($sql);

			$rows = 0;
			while($rslt = $info -> fetch_assoc()){
				$esBU = $rslt['id'];
				$data['loadUnits'][$rows] = $rslt['name'];

				$rows++;
			}

			$response['data'] = $data;

		}

		if($action == "pull") {
			$buID;
			$sql = "SELECT * FROM gb_division WHERE companyId = (SELECT companyId FROM gb_employee WHERE username LIKE '$user')";
			$info = db_query($sql);

			$rowCounter = 0;
			while($rslt = $info -> fetch_assoc()){
				$buID = $rslt['id'];
				$data['accUnits'][$rowCounter] = $rslt['name'];

				$rowCounter++;
			}

			//	check to see if business units have any data
			$sql = "SELECT * FROM gb_division WHERE companyId = (SELECT companyId FROM gb_employee WHERE username LIKE '$user')";
			$rslt = db_query($sql);
			$num_row1 = $rslt -> num_rows;

			$sql1 = "SELECT * FROM gb_comparative WHERE companyId = (SELECT companyId FROM gb_employee WHERE username LIKE '$user')";
			$rslt1 = db_query($sql1);

			$sql2 = "SELECT * FROM gb_division WHERE companyId = (SELECT companyId FROM gb_employee WHERE username LIKE '$user')";
			$info = db_query($sql2);

			// if business units have no data
			if($num_row1 == 0)
			{
				$sql = "SELECT * FROM gb_company WHERE id = (SELECT companyId FROM gb_employee WHERE username LIKE '$user')";
				$rslt = db_query($sql) -> fetch_assoc();
				$region = db_query("SELECT name, code FROM gb_region WHERE id = ".$rslt['partner2']) -> fetch_assoc();

				//pull corporate data
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
			//bussiness units have data
			else
			{
				$rslt = $rslt -> fetch_assoc();
				$rslt1= $rslt1 -> fetch_assoc();

				// General Information
				$data['id'] = $rslt['id'];
				$data['city']= $rslt['city'];
				$data['name'] = $rslt['name'];
				$data['cid'] = $rslt['countryId'];
				$data['address'] = $rslt['address'];
				$data['address2'] = $rslt['address2'];
				$data['zip']= $rslt['postal'];
				$data['province']= $rslt['province'];
				$data['baseline'] = $rslt['baseline'];
				$data['percentage'] = $rslt['percentage'];
				$data['target'] = $rslt['target'];
				

				//Table data from Comparative
				$data['custom1Name']= $rslt1['custom1Name'];
				$data['custom2Name']= $rslt1['custom2Name'];
				$data['custom3Name']= $rslt1['custom3Name'];
				$data['year']=$rslt1['year'];

			$rowCounter = 0;
			while($rslt2 = $info -> fetch_assoc()){
				$data['name2'][$rowCounter] = $rslt2['name'];
				$data['city2'][$rowCounter] = $rslt2['city'];
				$data['address3'][$rowCounter] = $rslt2['address'];
				$data['address4'][$rowCounter] = $rslt2['address2'];
				$data['cid2'][$rowCounter] = $rslt2['countryId'];
				$data['zip2'][$rowCounter] = $rslt2['postal'];
				$data['province2'][$rowCounter] = $rslt2['province'];
				$data['baseYear'][$rowCounter] = $rslt2['baseline'];
				$data['redTarget'][$rowCounter] = $rslt2['percentage'];
				$data['targetYear'][$rowCounter] = $rslt2['target'];
				$rowCounter++;
			}

				$response['data'] = $data;
			}
		}
	break;

	case "access":
		if($action == "pull") 
		{
			// Pull data from the database
			$divisionID;
			// $sql = "SELECT * FROM gb_division WHERE companyId =(SELECT id FROM gb_company WHERE id = (SELECT companyId FROM gb_employee WHERE username LIKE '$user'))";
			$sql = "SELECT * FROM gb_division WHERE companyId =(SELECT id FROM gb_company WHERE name = '$user')";

			$info = db_query($sql);


			$rowCounter = 0;
			while($rslt = $info -> fetch_assoc())
			{
				if($rowCounter == 0)
				{
					$divisionID = $rslt['id'];
				}
				$data['accUnits'][$rowCounter] = $rslt['name'];

				$rowCounter++;
			}


			if(isset($_POST['changeUnit']))
			{
				$unitName = $_POST['changeUnit'];

				$sql = "SELECT id FROM gb_division WHERE name LIKE '$unitName' AND companyId =(SELECT id FROM gb_company WHERE id = (SELECT companyId FROM gb_employee WHERE username LIKE '$user'))";
				$info = db_query($sql) -> fetch_assoc();

				$divisionID = $info['id'];
			}


			$sql = "SELECT * FROM gb_employee WHERE divisionId = '$divisionID'";
			$info = db_query($sql);

			$rowCounter = 0;
			while($rslt = $info -> fetch_assoc())
			{
				$data['accUsers'][$rowCounter] = $rslt['username'];
				$data['userPassword'][$rowCounter] = $rslt['password'];
				$data['userRole'][$rowCounter] = $rslt['role'];


				$rowCounter++;
			}

			$response['data'] = $data;
		}

		if($action == "update") {
			// Update an existing row in the database
			$userID = $_POST['accessUser']; // The name of the user we're updating
			$userN=$_POST['username']; // The possibly new username
			$userP=$_POST['password']; // The possibly new password
		//	$newRole = "" . $_POST['accessAdmin'] . $_POST['accessMeasure'] . $_POST['accessReport'] . $_POST['accessReduce'] . $_POST['accessOffset'];

			$sql = "UPDATE gb_employee SET username ='$userN', password =  '$userP' WHERE username = '$userID'";
			//, role ='$newRole'
			if(!db_query($sql)) {
				$response['actionPerformed'] = "Update was not";
			} else {
				$response['actionPerformed'] = "Update";
				$response['debug_message'] = "SQL query: " .  $sql . ".\n  Updated role: " . $newRole;
			}
		} 

		if($action == "add") {
			// Get the ID for the currently selected division (AKA the business unit) that we are adding a user to
			$divisionID = $_POST['accessUnit'];
			$dvID = db_query("SELECT id FROM gb_division WHERE name LIKE '$divisionID'") -> fetch_assoc();
			$divisionID = $dvID['id'];

			// Get the company ID
			$cID = db_query("SELECT id FROM gb_company WHERE name LIKE '$user'") -> fetch_assoc();
			$companyID = $cID['id'];

			$newRole= $_POST['accessAdmin']+$_POST['accessMeasure']+$_POST['accessReport']+$_POST['accessReduce']+$_POST['accessOffset'];


			$userN=sanitize($_POST['username']);
			$userP=sanitize($_POST['password']);
			$sql = "INSERT INTO gb_employee (username, password, divisionId, companyId, insertDate,role) VALUES ('$userN', '$userP', '$divisionID', '$companyID', NOW()),'$newRole'";
			if(!db_query($sql)) {
				$response['actionPerformed'] = "ADD was not";
			} else {
				$response['actionPerformed'] = "ADD";
			}
		}

		if($action == "delete") {
			$userID = $_POST['accessUser']; // The name of the user we're deleting
			$sql = "DELETE FROM gb_employee WHERE username = '$userID' ";

			if(!db_query($sql)) {
				$response['actionPerformed'] = "delete was not";
			} else {
				$response['actionPerformed'] = "delete";
			}
		}
	break;
	
	case "offset":
			// Only need to pull information here
		if($action == "pull") 
		{
			$offID;
			$sql = "SELECT * FROM gb_division WHERE companyId = (SELECT companyId FROM gb_employee WHERE username LIKE '$user')";
			$info = db_query($sql);

			$rowCounter = 0;
			while($rslt = $info -> fetch_assoc())
			{
				$offID = $rslt['id'];
				$data['units'][$rowCounter] = $rslt['name'];
				$data['year'][$rowCounter]= $rslt['year'];
				$rowCounter++;
			}
			$response['data'] = $data;
		}
	break;

	case "report":

	if($action == "pull") 
{
			// Pull data from the database
			$divisionID;
			// $sql = "SELECT * FROM gb_division WHERE companyId =(SELECT id FROM gb_company WHERE id = (SELECT companyId FROM gb_employee WHERE username LIKE '$user'))";
			$sql = "SELECT * FROM gb_division WHERE companyId =(SELECT id FROM gb_company WHERE name = '$user')";

			$info = db_query($sql);


			$rowCounter = 0;
			while($rslt = $info -> fetch_assoc())
			{
				if($rowCounter == 0)
				{
					$divisionID = $rslt['id'];
				}
				$data['org'][$rowCounter] = $rslt['name'];

				$rowCounter++;
			}

			$response['data'] = $data;
		}

	break;

	case "measure":
	if($action == "pull") {
		// Pull business units from the database
			$measureBU;
			$sql = "SELECT * FROM gb_division WHERE companyId = (SELECT companyId FROM gb_employee WHERE username LIKE '$user')";
			$info = db_query($sql);

			$rows = 0;
			while($rslt = $info -> fetch_assoc()){
				$measureBU = $rslt['id'];
				$data['loadUnits'][$rows] = $rslt['name'];

				$rows++;
			}

			$response['data'] = $data;
		
		// // Pull year from the database
		// $measureYear;
		// $sql2 = "SELECT year FROM gb_coefficient2year WHERE countryId = ()"

		}

	break;

}

// Send response and exit gracefully
echo json_encode($response);
exit();
?>