<?php

function retrieveparametersxml(){
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
	$p['usercompany'] = "";
	if (isset($_POST['usercompany']) && $_POST['usercompany'] != ""){
		$p['usercompany'] = $_POST['usercompany'];
	}else if (isset($_GET['usercompany']) && $_GET['usercompany'] != ""){
		$p['usercompany'] = $_GET['usercompany'];
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
		$reportbysqfeet = $_POST['reportcomparative'];
	}else if (isset($_GET['reportcomparative']) && $_GET['reportcomparative'] != ""){
		$reportcomparative = $_GET['reportcomparative'];
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
 $temp = Array('usercompany'=>$p['usercompany'],
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
				'units'=>$units,
				'type'=>$p['type']);
   return $temp;
}

//Function to run a query and get an array with the query result, parameters query and database as array
function sqltoarray($query){
	// Legacy ecobase code
	// $result = mysql_query($query);
	// $x=0;
	// $rows=array();
	// if($result==""){$rows=array();}
	// else{
	// while ($row = mysql_fetch_array($result)) {
    	// $rows[$x]=$row;
		// $x++;  
	// }}
	// return ($rows);
	
	// UBCO GreenStep team code
	$result = db_query($query);
	$rows = array();
	if($result -> num_rows != 0) {
		while($row = $result -> fetch_assoc()) {
			$rows[] = $row;
		}
	} 
	return $rows;
}

//function to retrieve all divisions in a company as array with id and name
function getdivisions($p){
	$query = 'SELECT id, name,  if(baseline="",0,baseline) as baseline, if(target="",0,target) as target, if(percentage/100="",-1,percentage/100) as value FROM gb_division WHERE companyId = ' . $p['usercompany'] . ' order by name';
	$temp = sqltoarray($query);
	return $temp;
}


function getonedivisions($p){
	$query='SELECT id, name,  if(baseline="",0,baseline) as baseline, if(target="",0,target) as target, if(percentage/100="",0,percentage/100) as value FROM gb_division WHERE id = ' . $p['division'];
	$temp= sqltoarray($query);
	return $temp;
}

function arraytargetcompany($p){
	$query='SELECT id, name, if(baseline="",0,baseline) as baseline, if(target="",0,target) as target, if(percentage/100="",0,percentage/100) as value FROM `gb_company` where id='.$p['usercompany'];
	$target=sqltoarray($query);
	return($target);
}

function marginaltarget($p){
	//	$query='SELECT baseline, target, percentage/100 FROM `gb_company` where id='. $p['usercompany'];
	if($p['division']==""){
		$target=arraytargetcompany($p);}
	else{
		$target=getonedivisions($p);}
	if($target[0]['baseline']==0 || $target[0]['target']==0 || $target[0]['value']==0){$marginaltarget=0;}
	if($target[0]['target']==$target[0]['baseline']){
		$totalyears=1;}
	else{$totalyears = $target[0]['target'] - $target[0]['baseline'];}	
	$marginaltarget=$target[0]['value']/$totalyears;
	
	return($marginaltarget);}


function builddiv($p){
	if ($p['division']==""){
		$temp = getdivisions($p);
		}
	else{$temp = getonedivisions($p);
		}
	return $temp;
	}

function comparativedivision($p, $divisionid , $year){
	if ($p['reportcomparative']!=""){
		$query='
			select '.$p['reportcomparative'].' as value 
			from gb_comparative 
			where companyid='. $p['usercompany'] .' and 
				year ='.$year.' and 
				divisionid='. $divisionid ;
		$temp= sqltoarray($query);
		if($temp!=array()){
			return $temp[0]['value'];
		}
		else{
		return 0;
		}
	}
	else{
		return 1;
	}
}


function comparativecompany($p, $year){
	$temp1=0;
	$div=getdivisions($p);
	for ($x=0;$x<=count($div)-1;$x++){
		$temp=comparativedivision($p, $div[$x]['id'], $year);
		$temp1=$temp1+$temp;
		}
	if($temp1==0){$temp1=1;}
	if($p['reportcomparative']==""){$temp1=1;}
	return $temp1;
}



//function to retrieve the annual numbers for the company comparative parameters
function annualnumberspercompany($p,$year){
	$query='select  sum('.$p['reportcomparative'].') as data from gb_comparative where companyid='.$p['usercompany'] .' and year ='.$year;
	$temp= sqltoarray($query);
	return $temp;
}

function gettradename($p){
	$query="SELECT trade FROM gb_company where id = ". $p['usercompany'];
	$trade= sqltoarray($query);
	if ($trade==array()){$trade[0]['trade']=$p['companyname'];}
	return $trade[0]['trade'];
}

//function to retrieve the title for the report
function title($p,$div){
	$per="";
	if($p['reportcomparative']=="employee"){
		$per=" per employee";}
	elseif($p['reportcomparative']=="footage"){
		$per=" per footage";}
	elseif($p['reportcomparative']=="sales"){
		$per=" per sales";}
	elseif($p['reportcomparative']=="guest"){
		$per=" per guest";}
	if ($p['reportyearfrom']<$p['reportyearto']){
		$years= ' from '.$p['reportyearfrom'].' to '.$p['reportyearto'];}
	else{$years="";}
	if($p['division']==""){
		//$temp2=gettradename($p);
		$temp2=$p['companyname'];
	}
	else{
		$temp2 =$div[0]['name'];
	}	
	if($p['reportdetail']=='SUMMARY'){
			$temp="Consumption";
	}
	elseif ($p['reportdetail']=='BU'){
		$temp="Consumption by Business Unit";
		}
	elseif ($p['reportdetail']=='ES'){
		$temp="Consumption by Emission Source";
	}	
	elseif ($p['reportdetail']=='BUES'){
		$temp="Consumption by Business Unit and Emission Source";
	}
		
	$temp='<h1>'.$temp2.'</h1>  <h2>'.$temp.$per.$years.'</h2>';
	
	return($temp);
}

//function to retrieve a title for the webpage, same as title but without the html tags

function titlepage($p){
	$per="";
	if($p['reportcomparative']=="employee"){
		$per=" per employee";}
	elseif($p['reportcomparative']=="footage"){
		$per=" per footage";}
	elseif($p['reportcomparative']=="sales"){
		$per=" per sales";}
	elseif($p['reportcomparative']=="guest"){
		$per=" per guest";}
	if ($p['reportyearfrom']<$p['reportyearto']){
		$years= ' from '.$p['reportyearfrom'].' to '.$p['reportyearto'];}
	else{$years="";}
	if($p['division']==""){
		//$temp2=gettradename($p);
		$temp2=$p['companyname'];
	}
	else{
		$temp2 =$div[0]['name'];
	}	
	if($p['reportdetail']=='SUMMARY'){
			$temp="Consumption";
	}
	elseif ($p['reportdetail']=='BU'){
		$temp="Consumption by Business Unit";
		}
	elseif ($p['reportdetail']=='ES'){
		$temp="Consumption by Emission Source";
	}	
	elseif ($p['reportdetail']=='BUES'){
		$temp="Consumption by Business Unit and Emission Source";
	}
	$temp= $temp2.' | '.$temp.$per.$years;
	return($temp);
}

//function to print out buttons to print or export to excel

function buttons($key, $p){
	?>
	<div class=buttons>
	<form action="xmlreport.php" method="post">
	<?php
	echo ('<input name="usercompany" type="hidden" value="'. $p['usercompany'] .'" /> ');
		echo ('<input name="companyname" type="hidden" value="'. $p['companyname'] .'" /> ');
		echo ('<input name="division" type="hidden" value="'. $p['division'] .'" /> ');
		echo ('<input name="scope" type="hidden" value="'. $p['scope'] .'" /> ');
		echo ('<input name="category" type="hidden" value="'. $p['category'] .'" /> ');
		echo ('<input name="reportyearfrom" type="hidden" value="'. $p['reportyearfrom'] .'" /> ');
		echo ('<input name="reportyearto" type="hidden" value="'. $p['reportyearto'] .'" /> ');
		echo ('<input name="reportformat" type="hidden" value="'. $p['reportformat'] .'" /> ');
		echo ('<input name="reportunit" type="hidden" value="'. $p['reportunit'] .'" /> ');
		echo ('<input name="reportbyforecast" type="hidden" value="'. $p['reportbyforecast'] .'" /> ');
		echo ('<input name="reportcomparative" type="hidden" value="'. $p['reportcomparative'] .'" /> ');
		echo ('<input name="reportdetail" type="hidden" value="'. $p['reportdetail'] .'" /> ');
		echo ('<input name="units" type="hidden" value="'. $p['units'] .'" /> ');
		echo ('<input name="type" type="hidden" value="'. $p['type'] .'" /> ');
	
	echo ('<input name="'.$key.'" type="hidden" value="true"/> ');
	$onmouseover= "'images/Export_over.gif';" ;
	$onmouseout= "'images/Export.gif';" ;
	echo ('<input name="export" type="image" src="images/Export.gif" onMouseOver="this.src='.$onmouseover.'" onmouseout="this.src='.$onmouseout.'" alt="Export" /> ');
	?>
	</form>
	<form action="" method="post">
	<input name="print" type="image" src="images/Print.gif" onMouseOver="this.src='images/Print_over.gif';" onmouseout="this.src='images/Print.gif';" onclick="printpage();" alt="Print" /> 
	</form>
	
	</div>
	<?php
	}
	
	//function to retrieve all scopeids for a company per table scopeid,table

function scopidpercopertable($p,$table){
	$div=getdivisions($p);
	$scopeids=Array();
	for ($x=0;$x<=count($div)-1;$x++){
		$temp=scopeidpersc($div[$x]['id'],$table);
		$scopeids=array_merge($scopeids,$temp);
		}
	return($scopeids);
	}

// function to retrieve all scopeid per table for an specific division as array scopeid,table
function scopeidpersc($divisionid,$table){
	$query="SELECT id," . $table . " `table` FROM `gb_scope" . $table . "` where divisionid = " .$divisionid ;
	$scopeids = sqltoarray($query);
	if ($scopeids==array()){$scopeids[0]['id']=0 ; $scopeids[0]['table']=0; }
	return $scopeids;
}

// function to retrieve all scopeid and tables for an specific division as array scopeid,table
function scopeidsperdiv($divisionid){
	for($x=1;x<=3;$x++){
	$temp=scopeidpersc($division,$x);
	$scopeids=array_merge($scopeids,$temp);
	}
	return $scopeids;
}

//function to get the total of CO2 per scope, scope1,scope2 or scope3 as integer
function co2scopeid($scopeid, $table, $year, $p){
	$query = "SELECT sum(".$p['type'].") as co2 FROM `gb_scope_entry` where scopeId= ". $scopeid . " and scopeTable= " . $table . " and year = " . $year;
	$total = sqltoarray($query);
	if ($total==array()){$total[0]['co2']=0 ;}
	return $total[0]['co2'];
}


//function to get the total of co2 per scope per year per division as integer
function co2perscopeperyear($divisionid,$year,$scope,$p){
	$scopeids = scopeidpersc($divisionid,$scope);
	$id="id";
	$total=0;
	for($x=0; $x<=count($scopeids)-1;$x++){
		$temp = co2scopeid($scopeids[$x][$id], $scope, $year, $p);
		$total = $total +  $temp;
	} 
	return($total);
}

//function to get the total of co2 per scope per year as integer
function co2perscpery($p,$scope,$year){
	$total=0;
	$id="id";
	$divisions=getdivisions($p);
	for($x=0; $x<=count($divisions)-1;$x++){
		$temp = co2perscopeperyear($divisions[$x][$id],$year,$scope,$p);
		$total = $total+$temp;
	} 
	return($total);
}

//function to get the total of co2 per division per year as integer
function co2perdivpery($divisionid,$year,$p){
	$total=0;
	for($x=1; $x<=3;$x++){
		$temp = co2perscopeperyear($divisionid,$year,$x,$p);
		$total = $total+$temp;
	} 
	return($total);
}

//function to get the total co2 for all the company
function co2percia($p,$year){
	$divisions = getdivisions($p);
	$id="id";
	$total=0;	
	for($x=0; $x<=count($divisions)-1;$x++){
		$temp = co2perdivpery($divisions[$x][$id], $year,$p);
		$total = $total + $temp;
	} 
	return($total);
}


function catnameperdivpertbl($p, $table){
	$query= 'SELECT distinct cat.name, cat.id, cat.code FROM gb_category cat , gb_scope_entry sc, gb_division2category cat2 where (sc.scopeid, sc.scopetable) in	( select id,' . $table . ' from gb_scope'.$table.' where companyid = ' . $p['usercompany'] . ' ) and categoryId = cat.id and cat.code = cat2.categoryCode and cat2.companyId = '.$p['usercompany'].' and cat2.scopeTable = ' . $table .' and cat2.checked > 0 and cat2.divisionid = '.$p['division'].' order by cat2.value1';
	
	$totalcats= sqltoarray($query);
	return($totalcats);
	}	

function catnamepercopertbl($p, $table){
	$query= 'SELECT distinct cat.name, cat.id, cat.code FROM gb_category cat , gb_scope_entry sc, gb_division2category cat2 where (sc.scopeid, sc.scopetable) in	( select id,' . $table . ' from gb_scope'.$table.' where companyid = ' . $p['usercompany'] . ' ) and categoryId = cat.id and cat.code = cat2.categoryCode and cat2.companyId = '.$p['usercompany'].' and cat2.scopeTable = ' . $table .' and cat2.checked > 0 order by cat2.value1';
	$totalcats= sqltoarray($query);
	return($totalcats);
	}	
function custcatname($p, $catcode){
	$query= 'SELECT distinct categoryname FROM `gb_division2misc` where companyid='.$p['usercompany'].' and categorycode = "'.$catcode.'" and categoryname <> ""';
	$catname= sqltoarray($query);
	return($catname[0]['categoryname']);
}
	
	
//function to retrieve co2 per categoriesid giving a scope id and categoryid as integer 
function co2percat($scopeid, $table, $catid, $year, $p){
	$query='SELECT scopeid, scopetable, categoryid, cat.name `name` , sum('.$p['type'].') `co2`, year FROM `gb_scope_entry`, `gb_category` cat where categoryid=cat.id and year='.$year.' and categoryid = '.$catid.' and scopeid = '.$scopeid.' and scopetable = '. $table .' group by scopetable, scopeid, categoryid, year ';
	$co2=sqltoarray($query);
	if ($co2==array()){$co2[0]['co2']=0 ;}
	return $co2[0]['co2'];
	}

function meterpercatperdiv($p, $code){
	$query='
		SELECT 
		 id 
		FROM 
			`gb_category2meter` 
		WHERE division2categoryid in (
			SELECT 
				id 
			FROM 
				gb_division2category 
			WHERE 
				companyid = '.$p['usercompany'].' and 
				divisionid='.$p['division'].' and 
				categorycode = "'.$code.'") and 
		id in (
			SELECT 
				category2meterid 
			FROM 
				gb_scope_entry)
	';
	$temp=sqltoarray($query);
	return $temp;
}

function metername($meter){
	$query='SELECT 
				name 
			from 
				gb_category2meter
			where
				id='.$meter;
	$temp=sqltoarray($query);
	return $temp[0]['name'];
}

function co2percatpermeterperdiv($meter, $year, $p){
	$query='SELECT 
				sum('.$p['type'].') co2
			FROM 
				`gb_scope_entry` 
			WHERE 
				category2meterid = '.$meter.' and 
				year = '.$year ;
	$co2=sqltoarray($query);
	if ($co2==array()){$co2[0]['co2']=0 ;}
	return $co2[0]['co2'];
	}
	
	
/*function catid($name){
	$query="SELECT id FROM `gb_category` where name = '" . $name ."'";
	$cid = sqltoarray($query);
	return $cid[0]['id'];
	}
*/
function scopeid($table, $division){
	$query="select id from gb_scope". $table . " where divisionId = ". $division ;
	$sid = sqltoarray($query);
	if ($sid==array()){$sid[0]['id']=0 ;}
	return $sid[0]['id'];
	}
	
	
function totalco2percat($catid, $year, $table, $p){
	$query="SELECT sum(".$p['type'].") `co2` FROM `gb_scope_entry` where categoryid = ".$catid." and year = ".$year." and scopeid in (select id from gb_scope".$table." where companyid =".$p['usercompany'].")";
	$temp=sqltoarray($query);
	if ($temp==array()){$temp[0]['co2']=0 ;}
	return $temp[0]['co2'];
	}

//Function tor retrieve all categories in a company cat.id, scopeid, scopetable, cat.name `name` 
function catperco($p){
	$query='select distinct cat.id, cat.name  
				from gb_category cat, gb_division2category cat2 
				where cat.code=cat2.categoryCode and 
					cat2.companyId = '.$p['usercompany'].' and 
					cat.id in (select categoryid 
						from gb_scope_entry
						where (scopeid, scopetable) in (
							select id,1 
							from gb_scope1 
							where divisionid in (
								select id 
								from gb_division 
								where companyid='.$p['usercompany'].') 
							union 
							select id,2 
							from gb_scope2 
							where divisionid in (
								select id 
								from gb_division 
								where companyid='.$p['usercompany'].') 
							union 
							select id,3 
							from gb_scope3 
							where divisionid in (
								select id 
								from gb_division 
								where companyid='.$p['usercompany'].') 
							) 
						) and 
						cat2.checked=1 
						order by cat2.scopetable, cat2.value1';
	$temp=sqltoarray($query);
	if ($temp==array()){$temp[0]['id']=0 ; $temp[0]['name']="";}
	return $temp;
	}

function unitname($p,$divisionid,$catid){
	$query='SELECT name FROM `gb_unit` where id = (select unitid from gb_division2category where companyid = '.$p['usercompany'].' and divisionid = ' .$divisionid. ' and categorycode=(select code from gb_category where id= '.$catid.'))';
	$temp=sqltoarray($query);
	if ($temp==array()){$temp[0]['name']=NULL;}
	return $temp[0]['name'];
	}
function volpercatperdiv($divisionid, $catid, $year){
	$query='SELECT sum(volume) `vol` FROM `gb_scope_entry` where year = '. $year .' and categoryid = '.$catid.' and (scopeid, scopetable) in (select id,1 from gb_scope1 where divisionid = '.$divisionid.' union select id,2 from gb_scope2 where divisionid= '.$divisionid.' union select id,3 from gb_scope3 where divisionid= '.$divisionid.')';
	$vol=sqltoarray($query);
	if ($vol==array()){$vol[0]['vol']=0 ;}
	if ($vol[0]['vol']==NULL){$vol[0]['vol']=0 ;}
	return $vol[0]['vol'];
	}
function coef($p,$divisionid,$catid){
	$query='select value from gb_coefficient where id=( SELECT coefficientId FROM `gb_unit` where id = (select unitid from gb_division2category where companyid = '.$p['usercompany'].' and divisionid = ' .$divisionid. ' and categorycode=(select code from gb_category where id= '.$catid.')))';
	$temp=sqltoarray($query);
	if ($temp==array()){$temp[0]['name']=0 ;}
	return $temp[0]['value'];
	}
function co2percatperdiv($divisionid, $catid, $year, $p){
	$query='SELECT sum('.$p['type'].') `vol` FROM `gb_scope_entry` where year = '. $year .' and categoryid = '.$catid.' and (scopeid, scopetable) in (select id,1 from gb_scope1 where divisionid = '.$divisionid.' union select id,2 from gb_scope2 where divisionid= '.$divisionid.' union select id,3 from gb_scope3 where divisionid= '.$divisionid.')';
	$vol=sqltoarray($query);
	if ($vol==array()){$vol[0]['vol']=0 ;}
	if ($vol[0]['vol']==NULL){$vol[0]['vol']=0 ;}
	
	return $vol[0]['vol'];
	}
	
function co2perscperdiv($divisionid, $table, $year, $p){
	$query='SELECT sum('.$p['type'].') `co2` FROM `gb_scope_entry` where year = '. $year .' and (scopeid, scopetable) in (select id,'.$table.' from gb_scope'.$table.' where divisionid = '.$divisionid.')';
	$co2=sqltoarray($query);
	if ($co2==array()){$co2[0]['co2']=0 ;}
	if ($co2[0]['co2']==NULL){$co2[0]['co2']=0 ;}
	
	return $co2[0]['co2'];
	}


?>