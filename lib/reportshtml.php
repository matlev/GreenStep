<?php
function reportshtml($p){
require_once "functionsreports.php";
require_once "functionsreportshtml.php";
$div=builddiv($p);
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
echo('<title>'.gettradename($p).'</title>');
?>
<link rel="stylesheet" rev="stylesheet" href="../css/reports.css" type="text/css" media="screen" />
<link rel="stylesheet" rev="stylesheet" href="../css/print.css" type="text/css" media="print" />

<script language="javascript">
function printpage()
 {
  window.print();
 }
</script>
</head>
<body>
<div id="wrapper" >
<?php 

echo(title($p,$div));
if ($p['reportyearfrom']>$p['reportyearto']){
	echo('<h1>The value Year from selected is higher than the value year to selected, the information cannot be retirieved.  Please choose valid values and try again</h1>');
	}
elseif ($p['usercompany']!=""){
	if($p['reportbyforecast']=="forecast"){
		if($p['division']=="" ){
			if ($p['scope']==""){
				reportsummarybyyeartarget($p,$div);		
				buttons('report1',$p);
			}
			else{
				reportsummarybyscopetarget($p,$div, $p['scope']);
				buttons('report10',$p);
			}
		}
		else{
			if ($p['scope']==""){
				reportsummarybyyeartargetonediv($p, $div);
				buttons('report11',$p);
			}
			else{
				reportsummarybyyeartargetonedivonesc($p, $div, $p['scope']);
				buttons('report12',$p);
			}
		}
	}
	else{
		if ($p['division']==""){
			if($p['scope']==""){
				if($p['reportdetail']=="BUES"){
					reportdetailsscopesbunit($p,$div);
					buttons('report3',$p);			
					}
				elseif($p['reportdetail']=="ES"){
					reportdetailsscopes($p,$div);
					buttons('report4', $p);
					}
				else{
					reportsummarybyyear($p,$div);		
					buttons('report5',$p);			
					}
				}
			else{
				if($p['reportdetail']=="SUMMARY" || $p['reportdetail']=="ES") {
					reportdetailsonescopes($p,$div,$p['scope']);
					buttons('report6',$p);
					}
				else{
					reportdetailsonescopesbunit($p,$div,$p['scope']);
					buttons('report7',$p);
					}
				}
			}
		else{
			if($p['scope']==""){
				reportdetailsscopesonebunit($p,$div);
				buttons('report8',$p);
				}
			else{
				reportdetailsonescopesonebunit($p,$div,$p['scope']);
		 		buttons('report9', $p);
				}
			}
		}
	}	
?>
</div>
</body>
</html>
<?php
}	
?>