<?php

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=excelfile.xls");
header("Pragma: no-cache");
header("Expires: 0");

// include "defs.php";
// include "util.php";

include ('DBCON.php');
require_once ("functionsreports.php");
require_once ("functionsreportshtml.php");
if (isset($_POST['usercompany']) && $_POST['usercompany'] != ""){$p['usercompany'] = $_POST['usercompany'];}else if (isset($_GET['usercompany']) && $_GET['usercompany'] != ""){$p['usercompany'] = $_GET['usercompany'];}
if (isset($_POST['companyname']) && $_POST['companyname'] != ""){$p['companyname'] = $_POST['companyname'];}else if (isset($_GET['companyname']) && $_GET['companyname'] != ""){$p['companyname'] = $_GET['companyname'];}
if (isset($_POST['division']) && $_POST['division'] != ""){$p['division'] = $_POST['division'];}else if (isset($_GET['division']) && $_GET['division'] != ""){$p['division'] = $_GET['division'];}
if (isset($_POST['scope']) && $_POST['scope'] != ""){$p['scope'] = $_POST['scope'];}else if (isset($_GET['scope']) && $_GET['scope'] != ""){$p['scope'] = $_GET['scope'];}
if (isset($_POST['category']) && $_POST['category'] != ""){$p['category'] = $_POST['category'];}else if (isset($_GET['category']) && $_GET['category'] != ""){$p['category'] = $_GET['category'];}
if (isset($_POST['reportyearfrom']) && $_POST['reportyearfrom'] != ""){$p['reportyearfrom'] = $_POST['reportyearfrom'];}else if (isset($_GET['reportyearfrom']) && $_GET['reportyearfrom'] != ""){$p['reportyearfrom'] = $_GET['reportyearfrom'];}
if (isset($_POST['reportyearto']) && $_POST['reportyearto'] != ""){$p['reportyearto'] = $_POST['reportyearto'];}else if (isset($_GET['reportyearto']) && $_GET['reportyearto'] != ""){$p['reportyearto'] = $_GET['reportyearto'];}
if (isset($_POST['reportformat']) && $_POST['reportformat'] != ""){$p['reportformat'] = $_POST['reportformat'];}else if (isset($_GET['reportformat']) && $_GET['reportformat'] != ""){$p['reportformat'] = $_GET['reportformat'];}
if (isset($_POST['reportunit']) && $_POST['reportunit'] != ""){$p['reportunit'] = $_POST['reportunit'];}else if (isset($_GET['reportunit']) && $_GET['reportunit'] != ""){$p['reportunit'] = $_GET['reportunit'];}
if (isset($_POST['reportcomparative']) && $_POST['reportcomparative'] != ""){$p['reportcomparative'] = $_POST['reportcomparative'];}else if (isset($_GET['reportcomparative']) && $_GET['reportcomparative'] != ""){$p['reportcomparative'] = $_GET['reportcomparative'];}
if (isset($_POST['units']) && $_POST['units'] != ""){$p['units'] = $_POST['units'];}else if (isset($_GET['units']) && $_GET['units'] != ""){$p['units'] = $_GET['units'];}
if (isset($_POST['type']) && $_POST['type'] != ""){$p['type'] = $_POST['type'];}else if (isset($_GET['type']) && $_GET['type'] != ""){$p['type'] = $_GET['type'];}

connect();
$div = builddiv($p);

if(isset($_POST['report1'])) {
	reportsummarybyyeartarget($p,$div);				
}
elseif(isset($_POST['report2'])) {
	reportsummarybyyeartargetonediv($p, $div);
}
elseif(isset($_POST['report3'])) {
	reportdetailsscopesbunit($p,$div);	
}
elseif(isset($_POST['report4'])) {
	reportdetailsscopes($p,$div);
}
elseif(isset($_POST['report5'])) {
	reportsummarybyyear($p,$div);		
}
elseif(isset($_POST['report6'])) {
	reportdetailsonescopes($p,$div,$p['scope']);
}
elseif(isset($_POST['report7'])) {
	reportdetailsonescopesbunit($p,$div,$p['scope']);
}
elseif(isset($_POST['report8'])) {
 	reportdetailsscopesonebunit($p,$div);
}
elseif(isset($_POST['report9'])) {
 	reportdetailsonescopesonebunit($p,$div,$p['scope']);
}
elseif(isset($_POST['report10'])) {
 	reportsummarybyscopetarget($p,$div, $p['scope']);
}
elseif(isset($_POST['report11'])) {
 	reportsummarybyyeartargetonediv($p, $div);
}
elseif(isset($_POST['report12'])) {
 	reportsummarybyyeartargetonedivonesc($p, $div, $p['scope']);
}

?>