<?php
	 include('DBCON.php');
 	
	 connect();
 	
	// /* Production Code
	// $user = $p4a_username;
	// $role = $p4a_role;
	// */
 	
	// // Development Code
	 $user = "GobiSOFT Demo";
	 $role = "ADMINLARGE";
 	
	 $r_d = $_POST['rd'];
	 $chartType = $_POST['chart'];
 	
	 $sql = "SELECT id, role, companyId FROM gb_employee WHERE username LIKE '$user'";
	 $emp = db_query($sql) -> fetch_assoc();
 	
	 $sql = "SELECT name FROM gb_company WHERE id = ".$emp['companyId'];
	 $compName = db_query($sql) -> fetch_assoc();
	
	// CHANGE $role TO $emp['role'] WHEN NEW ROLE SYSTEM IS WORKING
	// CHANGE THE reportyearfrom AND reportyearto VARIABLES TO BE date("Y") - 3 AND date("Y") WHEN ON THE LIVE SERVER
	 $paramString = "username=".$user
		 ."&userid=".$emp['id']
		 ."&userrole=".$role
		 ."&usercompany=".$emp['companyId']
		 ."&companyname=".$compName['name']
		 ."&division=&divisionname=&scope=&category=&categoryname=&unit=&period=&reportyearfrom=2012&reportyearto=2015&reportformat=".$chartType
		 ."&reportunit=GHG%20Tonnes&reportbyyear=&reportbydivision=&reportbyforecast=&reportbypeer=&reportbyemployee=&reportbysqfeet=&reportcomparative=&reportcomparativelabel=&category2meterId=&multimetername=&reportdetail=".$r_d;
 		
	echo $paramString;
	
	exit();
?>