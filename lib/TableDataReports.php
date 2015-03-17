<?php 
/********************************************************************************************************
 * Copyright 2007 By David Wu @ Wire4Wireless Inc.
 *
 * Description: process comparison report with flash chart
 * NOTE: use '$p_' prefix for all variable used in the program except global variables pass in from html.
**********************************************************************************************************/
/*class SessionClass {
	var $p_Result = array();
	
	function SetResult($array)
	{
		$this->p_Result[] = $array;
	}
	
	function GetResult($index)
	{
		return ($this->p_Result[$index]);
	}
	
	function GetCount()
	{
		return (count($this->p_Result));
	}

	function GetNumArray()
	{
		return (count($this->p_Result[0]));
	}
}

header("ETag: PUB" . time());
header("Last-Modified: " . gmdate("D, d M Y H:i:s", time()-10) . " GMT");
header("Expires: " . gmdate("D, d M Y H:i:s", time() + 5) . " GMT");
header("Pragma: no-cache");
header("Cache-Control: max-age=1, s-maxage=1, no-cache, must-revalidate");
session_cache_limiter("nocache");

*/

// Legacy ecobase code
//include "PHPScript/defs.php";
//include "PHPScript/util.php";


   // if (DISPLAY_PHP_ERROR_REPORTING == '1')
   	// error_reporting(E_ALL);
   // else
      // error_reporting(0);
// 
   // if (session_is_registered('CONFIGURATION')){
      // session_unset();
      // session_destroy();
   // }
   // session_start();
//       
   // //post back variables
	// $username= "";
	// if (isset($_POST['username']) && $_POST['username'] != ""){
		// $username = $_POST['username'];
   // }else if (isset($_GET['username']) && $_GET['username'] != ""){
		// $username = $_GET['username'];
   // }
  	// if ($username == ""){
  		// $p_redirect = REDIRECT_UNAUTHORIZED_ACCESS;
  		// ExitOut($p_redirect);
  	// }

	// Legacy ecobase code
	//util.php
  	// $p_ConnectDB = ConnectToDatabase();
  	// if ($p_ConnectDB == FALSE)
  	// {
  		// $p_redirect = REDIRECT_DBFAIL_CONNECT;
  		// ExitOut($p_redirect);
  	// }
  	
  	// UBCO GreenStep Team DB connection API tools
  	include('DBCON.php');
  	connect();

	require_once "reportshtml.php";
	require_once "functionstablereport.php";
	
   global $P_parameters;
   $P_parameters = retrieveparameters();
   // print_r($P_parameters);
      reportshtml($P_parameters);

// Legacy ecobase code
// CloseToDatabase($p_ConnectDB);

	close_con();
?>