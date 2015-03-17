<?php 
function retrieveparameters(){
	$username= "";
	if (isset($_POST['username']) && $_POST['username'] != ""){
		$username = $_POST['username'];
   }else if (isset($_GET['username']) && $_GET['username'] != ""){
		$username = $_GET['username'];
   }
   $userid = "";
	if (isset($_POST['userid']) && $_POST['userid'] != ""){
		$userid = $_POST['userid'];
	}else if (isset($_GET['userid']) && $_GET['userid'] != ""){
		$userid = $_GET['userid'];
   }
	$userrole = "";
	if (isset($_POST['userrole']) && $_POST['userrole'] != ""){
		$userrole = $_POST['userrole'];
	}else if (isset($_GET['userrole']) && $_GET['userrole'] != ""){
		$userrole = $_GET['userrole'];
   }
	$usercompany = "";
	if (isset($_POST['usercompany']) && $_POST['usercompany'] != ""){
		$usercompany = $_POST['usercompany'];
	}else if (isset($_GET['usercompany']) && $_GET['usercompany'] != ""){
		$usercompany = $_GET['usercompany'];
   }
	$division = "";
	if (isset($_POST['division']) && $_POST['division'] != ""){
		$division = $_POST['division'];
	}else if (isset($_GET['division']) && $_GET['division'] != ""){
		$division = $_GET['division'];
   }
	$scope = "";
	if (isset($_POST['scope']) && $_POST['scope'] != ""){
		$scope = $_POST['scope'];
	}else if (isset($_GET['scope']) && $_GET['scope'] != ""){
		$scope = $_GET['scope'];
   }
	$category = "";
	if (isset($_POST['category']) && $_POST['category'] != ""){
		$category = $_POST['category'];
	}else if (isset($_GET['category']) && $_GET['category'] != ""){
		$category = $_GET['category'];
   }
	$unit = "";
	if (isset($_POST['unit']) && $_POST['unit'] != ""){
		$unit = $_POST['unit'];
	}else if (isset($_GET['unit']) && $_GET['unit'] != ""){
		$unit = $_GET['unit'];
   }
	$period = "";
	if (isset($_POST['period']) && $_POST['period'] != ""){
		$period = $_POST['period'];
	}else if (isset($_GET['period']) && $_GET['period'] != ""){
		$period = $_GET['period'];
   }
	$reportyearfrom = "";
	if (isset($_POST['reportyearfrom']) && $_POST['reportyearfrom'] != ""){
		$reportyearfrom = $_POST['reportyearfrom'];
	}else if (isset($_GET['reportyearfrom']) && $_GET['reportyearfrom'] != ""){
		$reportyearfrom = $_GET['reportyearfrom'];
   }
	$reportyearto = "";
	if (isset($_POST['reportyearto']) && $_POST['reportyearto'] != ""){
		$reportyearto = $_POST['reportyearto'];
	}else if (isset($_GET['reportyearto']) && $_GET['reportyearto'] != ""){
		$reportyearto = $_GET['reportyearto'];
   }
	$reportformat = "";
	if (isset($_POST['reportformat']) && $_POST['reportformat'] != ""){
		$reportformat = $_POST['reportformat'];
	}else if (isset($_GET['reportformat']) && $_GET['reportformat'] != ""){
		$reportformat = $_GET['reportformat'];
   }
	$reportunit = "";
	if (isset($_POST['reportunit']) && $_POST['reportunit'] != ""){
		$reportunit = $_POST['reportunit'];
	}else if (isset($_GET['reportunit']) && $_GET['reportunit'] != ""){
		$reportunit = $_GET['reportunit'];
   }
	$reportbyyear = "";
	if (isset($_POST['reportbyyear']) && $_POST['reportbyyear'] != ""){
		$userid = $_POST['reportbyyear'];
	}else if (isset($_GET['reportbyyear']) && $_GET['reportbyyear'] != ""){
		$userid = $_GET['reportbyyear'];
   }
	$reportbydivision = "";
	if (isset($_POST['reportbydivision']) && $_POST['reportbydivision'] != ""){
		$userid = $_POST['reportbydivision'];
	}else if (isset($_GET['reportbydivision']) && $_GET['reportbydivision'] != ""){
		$userid = $_GET['reportbydivision'];
   }
   $reportbyforecast = "";
	if (isset($_POST['reportbyforecast']) && $_POST['reportbyforecast'] != ""){
		$reportbyforecast = $_POST['reportbyforecast'];
	}else if (isset($_GET['reportbyforecast']) && $_GET['reportbyforecast'] != ""){
		$reportbyforecast = $_GET['reportbyforecast'];
   }
   $reportbypeer = "";
	if (isset($_POST['reportbypeer']) && $_POST['reportbypeer'] != ""){
		$userid = $_POST['reportbypeer'];
	}else if (isset($_GET['reportbypeer']) && $_GET['reportbypeer'] != ""){
		$userid = $_GET['reportbypeer'];
   }
   $reportbyemployee = "";
	if (isset($_POST['reportbyemployee']) && $_POST['reportbyemployee'] != ""){
		$reportbyemployee = $_POST['reportbyemployee'];
	}else if (isset($_GET['reportbyemployee']) && $_GET['reportbyemployee'] != ""){
		$reportbyemployee = $_GET['reportbyemployee'];
   }
   $reportbysqfeet = "";
	if (isset($_POST['reportbysqfeet']) && $_POST['reportbysqfeet'] != ""){
		$reportbysqfeet = $_POST['reportbysqfeet'];
	}else if (isset($_GET['reportbysqfeet']) && $_GET['reportbysqfeet'] != ""){
		$reportbysqfeet = $_GET['reportbysqfeet'];
   }
	$reportcomparative = "";
	if (isset($_POST['reportcomparative']) && $_POST['reportcomparative'] != ""){
		$reportcomparative = $_POST['reportcomparative'];
	}else if (isset($_GET['reportcomparative']) && $_GET['reportcomparative'] != ""){
		$reportcomparative = $_GET['reportcomparative'];
   }
   $reportdetail = "";
	if (isset($_POST['reportdetail']) && $_POST['reportdetail'] != ""){
		$reportdetail = $_POST['reportdetail'];
	}else if (isset($_GET['reportdetail']) && $_GET['reportdetail'] != ""){
		$reportdetail = $_GET['reportdetail'];
   }
   $companyname = "";
	if (isset($_POST['companyname']) && $_POST['companyname'] != ""){
		$companyname = $_POST['companyname'];
	}else if (isset($_GET['companyname']) && $_GET['companyname'] != ""){
		$companyname = $_GET['companyname'];
   }
   $companyname = str_replace("&", "and", $companyname);
	$divisionname = "";
	if (isset($_POST['divisionname']) && $_POST['divisionname'] != ""){
		$divisionname = $_POST['divisionname'];
	}else if (isset($_GET['divisionname']) && $_GET['divisionname'] != ""){
		$divisionname = $_GET['divisionname'];
   }
   $divisionname = str_replace("&", "and", $divisionname);
	$categoryname = "";
	if (isset($_POST['categoryname']) && $_POST['categoryname'] != ""){
		$categoryname = $_POST['categoryname'];
	}else if (isset($_GET['categoryname']) && $_GET['categoryname'] != ""){
		$categoryname = $_GET['categoryname'];
   }
   $categoryname = str_replace("&", "and", $categoryname);
   if ($reportunit == "GHG Tonnes"){
	$units="Tonnes";
	$type="co2";
	}
elseif ( $reportunit == "GHG Kgrams"){
	$units ="Kgs";
	$type="co2";
	}
elseif ( $reportunit == "GHG Tons"){
	$units ="Tons";
	$type="co2";
	}
elseif ( $reportunit == "GHG Pounds"){
	$units ="Pounds";
	$type="co2";
	}
	
elseif ( $reportunit == "GJoules"){
	$units ="GJoules";
	$type="energy";
	}
elseif ( $reportunit == "$$"){
	$units ="$$";
	$type="cost";
	}
   
   $temp = Array('usercompany'=>$usercompany,
   				'companyname'=>$companyname,
				'division'=>$division,
				'scope'=>$scope,
				'category'=>$category,
				'reportyearfrom'=>$reportyearfrom,
				'reportyearto'=>$reportyearto,
				'reportformat'=>$reportformat,
				'reportunit'=>$reportunit,
				'reportbyforecast'=>$reportbyforecast,
				'reportcomparative'=>$reportcomparative,
				'reportdetail'=>$reportdetail,
				'units'=>$units,
				'type'=>$type);
   return $temp;
}

?>