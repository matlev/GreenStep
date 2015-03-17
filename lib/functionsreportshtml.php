<?php

function reportsummarybyyeartarget($p,$div){
	?>
	<div class="table">
	<?php
	$margin=marginaltarget($p);
	$target=arraytargetcompany($p);
	$found=false;
	$year=$target[0]['baseline'];
	$co2=co2percia($p['usercompany'],$year,$p['type']);	
	while ($found==false && $year<=$target[0]['target']) {
		$co2=co2percia($p['usercompany'],$year,$p['type']);
		if ($co2!=0){
			$found=true;
			$target[0]['baseline']=$year;
		}
		$year++;}
	echo('<h3>Target reduction per year '. number_format($margin * 100 ,2) .' %</h3>');
	?>
	<Table>
			<tr>
				<td class="title"  />
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
				echo('<td class="title" colspan="2" >'. $year .'</td> ');}
				?> 
			</tr>
			<tr>
				<td class="second-title left-title"  ><?php if ($p['reportdetail']=="BU"){echo('Business Unit');} elseif($p['reportdetail']=="ES"){echo('Emission Source');} ?></td>
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					if($p['type']=="co2"){
						echo('<td class="second-title body number"  >'.$p['units'].' CO2e</td> ');
					}
					elseif($p['type']=="energy"){
						echo('<td class="second-title body number"  >'.$p['units'].' </td> ');
					}	
					elseif($p['type']=="cost"){
  						echo('<td class="second-title body number"  > $ </td> ');
					}
  					echo('<td class="second-title body percentage"  >% of total</td> ');
				}
				?> 
			</tr>
			<?php
			if($p['reportdetail']=="BU"){
			for($division=0;$division<=count($div)-1;$division++){ 
			?>
			<tr>
			<?php
			$total=0;
				echo('<td class="left-title"  >' . $div[$division]['name']  .' </td> ');
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					$total=co2perdivpery($div[$division]['id'],$year,$p);
					if ($total==""){$total="0";}
					if ($p['reportunit'] == "GHG Tonnes"){$total=$total/1000;}
					$total=number_format($total,1);
					echo ('<td class="body number" >'.$total.' </td> ');
					if (co2percia($p['usercompany'],$year,$p['type'])==0){$total=0;}
					else{$total=co2perdivpery($div[$division]['id'],$year,$p)*100/co2percia($p,$year);}
					$total=number_format($total,0);
					echo ('<td class="body percentage" >'.$total.'% </td> ');
					} 
			?> 
			</tr> 
			<?php 
			} }
			elseif($p['reportdetail']=='ES'){
					
 	for($table=1;$table<=3;$table++){			
	?>
	<tr>
    <?php
    	echo('<td class="left-title"  >Scope '.$table.'</td> ');
		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
  			echo('<td class="title"  ></td> ');
			echo('<td class="title"  ></td> ');
			}
			echo('<td class="title"  ></td> ')
			?> 
	</tr>
    <?php
  	$cats=catnamepercopertbl($p, $table);
	for($y=0;$y<=count($cats)-1;$y++){
	$pos = strpos($cats[$y]['code'],"Misc");
	if($pos === false) {
		$name = $cats[$y]['name'];
	}
	else {
		$name="Scope $table - ".custcatname($p, $cats[$y]['code']);
		if($name=="") {
			$name = $cats[$y]['name'];
		}	
	}
	$catid= $cats[$y]['id'];
	if ($catid!=201){	
		?>
  		<tr>
   		<?php
		echo('<td class="left-title scope minor-title"  >'.$name.'</td> ');
		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
			if ($catid!=133){
			$total = totalco2percat($catid, $year, $table, $p)/comparativecompany($p,$year);}
			else{
			$total = (totalco2percat($catid, $year, $table, $p) + totalco2percat(201, $year, $table, $p)) / comparativecompany($p,$year);}
			if ($total==""){$total=0;}
			$co2cia=co2percia($p,$year)/comparativecompany($p,$year);
			if ($p['reportunit'] == "GHG Tonnes"){
			$total=$total/1000;
			$co2cia=$co2cia/1000;}
			echo('<td class="body number"   >'.number_format($total,1).'</td> ');
			if ($co2cia==0){
				$total=0;}
			else{$total=($total/$co2cia)*100;}
			$total=number_format($total,0);
			echo('<td class="body percentage"   >'.$total.'%</td> ');
		}
		if ($catid!=133){
		$co21=totalco2percat($catid, $p['reportyearfrom'], $table, $p)/comparativecompany($p,$year);
		$co22=totalco2percat($catid, $p['reportyearto'], $table, $p)/comparativecompany($p,$year);
		}
		else{
		$co21=(totalco2percat($catid, $p['reportyearfrom'], $table, $p)+totalco2percat(201, $p['reportyearfrom'], $table, $p))/comparativecompany($p,$year);
		$co22=(totalco2percat($catid, $p['reportyearto'], $table, $p)+totalco2percat(201, $p['reportyearto'], $table, $p))/comparativecompany($p,$year);
		}
		?> 
    </tr>
    <?php
	}}
    ?>
	<tr>
	<?php
	   	echo('<td class="left-title minor-bottom"  >Total Scope '.$table.'</td> ');
		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
			$total=co2perscpery($p,$table,$year)/(comparativecompany($p,$year));
			if ($total==""){$total=0;}
			$co2cia=co2percia($p,$year)/comparativecompany($p,$year);
			if ($p['reportunit'] == "GHG Tonnes"){
			$total=$total/1000;
			$co2cia=$co2cia/1000;}
			echo('<td class="body minor-bottom number">'.number_format($total,1).'</td> ');
			if ($co2cia==0){
				$total=0;}
			else{$total=($total/$co2cia)*100;}
			$total=number_format($total,0);
			echo('<td class="body minor-bottom percentage">'.$total.'%</td> ');
		}
		$co21=co2perscpery($p,$table,$p['reportyearfrom']);
		$co22=co2perscpery($p,$table,$p['reportyearto']);
		?>
	</tr>    
    <?php
	}
			
			}
			
			?> 
			<tr>
				<td class="bottom-title left-title">Total Company</td>
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					$realco2=co2percia($p,$year);
					if ($realco2==""){$realco2="0";}
					if ($p['reportunit']=="GHG Tonnes"){$realco2=$realco2/1000;}
					$realco2=number_format($realco2,1);
					echo ('<td class="bottom-title body number" >'.$realco2.' </td> ');
					echo ('<td class="bottom-title body percentage" > </td> ');
				} 
				?> 
			</tr>
			<tr>
				<td class=" left-title">Target</td>
				<?php
				for($year=$p['reportyearfrom']; $year<=$p['reportyearto']; $year++){
					$targetco2 = (co2percia($p,$target[0]['baseline'])) * (1-($margin*($year-$target[0]['baseline'])));
					if ($targetco2==""){$targetco2="0";}
					if ($p['reportunit']=="GHG Tonnes"){$targetco2=$targetco2/1000;}
					$targetco2 = number_format($targetco2,1);
					echo ('<td class="body number" >'.$targetco2.' </td> ');
					echo ('<td class="body percentage" > </td> ');
				} 
				?> 
			</tr>
			<tr>
				<td class="bottom-title left-title">Difference</td>
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					$realco2=co2percia($p,$year);
					$targetco2 = co2percia($p, $target[0]['baseline']) * (1- ($margin * ($year - $target[0]['baseline'])));
					$total=$realco2-$targetco2;
					if ($total==""){$total="0";}
					if ($p['reportunit']=="GHG Tonnes"){$total=$total/1000;}
					$total=number_format($total,1);
					echo ('<td class="bottom-title body number" >'.$total.' </td> ');
					echo ('<td class="bottom-title body percentage" > </td> ');
				} 
				?> 
			</tr>
		</Table>
	</div>
	<?php
	
	} 

function reportsummarybyscopetarget($p,$div, $table){
	?>
	<div class="table">
	<?php
	$margin=marginaltarget($p);
	$target=arraytargetcompany($p);
	$found=false;
	$year=$target[0]['baseline'];
	while ($found==false && $year<=$target[0]['target']) {
		$co2=co2perscpery($p,$table,$year);
		if ($co2!=0){
			$found=true;
			$target[0]['baseline']=$year;
		}
		$year++;}
	
	echo('<h3>Target reduction per year '. number_format($margin * 100 ,2) .' %</h3>');
	?>
	<Table>
			<tr>
				<td class="title"  />
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
				echo('<td class="title" colspan="2" >'. $year .'</td> ');}
				?> 
			</tr>
			<tr>
				<td class="second-title left-title"  ><?php if ($p['reportdetail']!="SUMMARY"){echo('Business Unit');} ?></td>
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					if($p['type']=="co2"){
						echo('<td class="second-title body number"  >'.$p['units'].' CO2e</td> ');
					}
					elseif($p['type']=="energy"){
						echo('<td class="second-title body number"  >'.$p['units'].' </td> ');
					}	
					elseif($p['type']=="cost"){
  						echo('<td class="second-title body number"  > $ </td> ');
					}
  					echo('<td class="second-title body percentage"  >% of total</td> ');
				}
				?> 
			</tr>
			<?php
			if($p['reportdetail']!="SUMMARY"){
			for($division=0;$division<=count($div)-1;$division++){ 
			?>
			<tr>
			<?php
			$total=0;
				echo('<td class="left-title"  >' . $div[$division]['name']  .' </td> ');
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					$total= co2perscopeperyear($div[$division]['id'],$year,$table,$p);  
					if ($total==""){$total="0";}
					if ($p['reportunit'] == "GHG Tonnes"){$total=$total/1000;}
					$total=number_format($total,1);
					echo ('<td class="body number" >'.$total.' </td> ');
					if (co2perscpery($p,$table,$year)==0){$total=0;}
					else{$total=co2perscopeperyear($div[$division]['id'],$year,$table,$p)*100/co2perscpery($p,$table,$year);}
					$total=number_format($total,0);
					echo ('<td class="body percentage" >'.$total.'% </td> ');
					} 
			?> 
			</tr> 
			<?php 
			} }
			?> 
			<tr>
				<td class="bottom-title left-title">Total Company</td>
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					$realco2=co2perscpery($p,$table,$year);
					if ($realco2==""){$realco2="0";}
					if ($p['reportunit']=="GHG Tonnes"){$realco2=$realco2/1000;}
					$realco2=number_format($realco2,1);
					echo ('<td class="bottom-title body number" >'.$realco2.' </td> ');
					echo ('<td class="bottom-title body percentage" > </td> ');
				} 
				?> 
			</tr>
			<tr>
				<td class=" left-title">Target</td>
				<?php
				for($year=$p['reportyearfrom']; $year<=$p['reportyearto']; $year++){
					$targetco2 =  (co2perscpery($p,$table,$target[0]['baseline'])) * (1-($margin*($year-$target[0]['baseline'])));
					if ($targetco2==""){$targetco2="0";}
					if ($p['reportunit']=="GHG Tonnes"){$targetco2=$targetco2/1000;}
					$targetco2 = number_format($targetco2,1);
					echo ('<td class="body number" >'.$targetco2.' </td> ');
					echo ('<td class="body percentage" > </td> ');
				} 
				?> 
			</tr>
			<tr>
				<td class="bottom-title left-title">Difference</td>
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					$realco2=co2perscpery($p,$table,$year);
					$targetco2 = co2perscpery($p,$table,$target[0]['baseline']) * (1- ($margin * ($year - $target[0]['baseline'])));
					$total=$realco2-$targetco2;
					if ($total==""){$total="0";}
					if ($p['reportunit']=="GHG Tonnes"){$total=$total/1000;}
					$total=number_format($total,1);
					echo ('<td class="bottom-title body number" >'.$total.' </td> ');
					echo ('<td class="bottom-title body percentage" > </td> ');
				} 
				?> 
			</tr>
		</Table>
	</div>
	<?php
	
	} 
	
	
	
	
	
function reportsummarybyyeartargetonediv($p, $div){
	?>
	<div class="table">
	<?php
	$target=arraytargetcompany($p);
	?>
	<Table>
		<tr>
			<td class="title"  />
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
				echo('<td class="title" colspan="2" >'. $year .'</td> ');}
				?> 
			</tr>
			<tr>
				<td class="second-title left-title"  ><?php if ($p['reportdetail']!='SUMMARY'){echo ('Emission Source');} ?></td>
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					if($p['type']=="co2"){
						echo('<td class="second-title body number"  >'.$p['units'].' CO2e</td> ');}
					elseif($p['type']=="energy"){
						echo('<td class="second-title body number"  >'.$p['units'].' </td> ');}
					elseif($p['type']=="cost"){
  						echo('<td class="second-title body number"  > $ </td> ');
					}
  					echo('<td class="second-title body percentage"  >% of total</td> ');
				}
				?> 
			</tr>
<?php
if ($p['reportdetail']=="ES"){ 



	for ($table=1;$table<=3;$table++){
		$sid = scopeid($table, $div[0]['id']);
		?>
 	<tr>
		<?php
			echo('<td class="left-title scope "  >Scope '.$table.'</td> ');
		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
			echo('<td class="body number" ></td> ');
			echo('<td class="body percentage" ></td> ');
		}
		?> 
        </tr>
		<?php
  		if($p['reportdetail']!="SUMMARY"){
		$cats=catnamepercopertbl($p, $table);
		for($y=0;$y<=count($cats)-1;$y++){
		if ($cats[$y]['id']!=201){
		?>
  		<tr>
   		<?php
		$pos = strpos($cats[$y]['code'],"Misc");
	if($pos === false) {
		$name = $cats[$y]['name'];
	}
	else {
		$name="Scope $table - ".custcatname($p, $cats[$y]['code']);
		if($name=="") {
			$name = $cats[$y]['name'];
		}	
	}
			echo('<td class="left-title minor-title scope"  >'.$name.'</td> ');
			for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
				$comparative=comparativedivision($p, $div[0]['id'] , $year);
				if($comparative==0){$comparative=1;}
 				if( $cats[$y]['id']!=133){
				$co2 = co2percat($sid, $table, $cats[$y]['id'], $year,$p)/$comparative;
 				}
				else{ $co2 = (co2percat($sid, $table, $cats[$y]['id'], $year,$p)+co2percat($sid, $table, 201, $year,$p))/$comparative;}
				if($co2==""){$co2=0;}
				$co2div = co2perdivpery($div[0]['id'],$year,$p)/$comparative;
				if ($p['reportunit'] == "GHG Tonnes"){
					$co2=$co2/1000;
					$co2div=$co2div/1000;}
				echo('<td class="body number">'.number_format($co2,1).'</td> ');
				if ($co2div==0){$total=0;}
				else{$total=$co2/$co2div*100;}
				$total=number_format($total,0);
				echo('<td class="body percentage"   >'.$total.'% </td> ');
			}
		?> 
   		</tr>
		<?php
		}
		//meters
		if ($p['division']<>""){
			$code = $cats[$y]['code'];
			$meters=meterpercatperdiv($p,$code);
			if (count($meters)>0){
				for ($meter=0;$meter<=count($meters)-1;$meter++){		
				?>
					<tr>
					<?php 
					$name=metername($meters[$meter]['id']);
					echo('<td class="left-title minor-title meter"  >'.$name.'</td> ');	
					for($division=0;$division<=count($div)-1;$division++){
							
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					$comparative=comparativedivision($p, $div[$division]['id'] , $year);
					if($comparative==0){$comparative=1;}
					$total = co2percatpermeterperdiv($meters[$meter]['id'], $year, $p)/($comparative);
					if($total==""){$total=0;$total1=0;}
					if ($p['reportunit'] == "GHG Tonnes"){
						$total=$total/1000;
						}
					$total=number_format($total,1);
					echo('<td class="body number meter">'.$total.'</td> ');
					
					echo('<td class="body percentage meter"   > </td> ');
					}
					}
								
					
					?>
					</tr>
					<?php
	 			}
			
			} 
		}
// end of meters
		
		
		
		
		}}
		?>
		<tr>
		<?php
			echo('<td class="left-title minor-bottom">Total Scope '.$table.'</td> ');
			for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
				$comparative=comparativedivision($p, $div[0]['id'] , $year);
				if($comparative==0){$comparative=1;}
				$total=co2perscopeperyear($div[0]['id'],$year,$table,$p)/$comparative;
				$co2div = co2perdivpery($div[0]['id'],$year,$p)/$comparative;
				if ($p['reportunit'] == "GHG Tonnes"){
					$total=$total/1000;
					$co2div =$co2div/1000;}
				echo('<td class="body number minor-bottom"   >'.number_format($total,1).'</td> ');
				if ($co2div ==0){$total=0;} else{$total=$total/$co2div*100;}
				$total=number_format($total,0);
				echo('<td class="body percentage minor-bottom"   >'.$total.'%</td> ');
			}
		?>
   		</tr>
		<?php
		}

}
			$division=0; 
			?>
			<tr>
			<?php
				$total=0;
				echo('<td class="left-title"  >Total emissions  </td> ');
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					$total=co2perdivpery($div[$division]['id'],$year,$p);
					if ($total==""){$total="0";}
					if ($p['reportunit'] == "GHG Tonnes"){$total=$total/1000;}
					$total=number_format($total,1);
					echo ('<td class="body number" >'.$total.' </td> ');
					if (co2percia($p,$year)==0){$total=0;}
					else{$total=co2perdivpery($div[$division]['id'],$year,$p)/co2percia($p,$year)*100;}
					$total=number_format($total,0);
					echo ('<td class="body percentage" >'.$total.'% </td> ');
					} 
			?> 
			</tr>
			
			
			
			 
			<tr>
				<td class=" left-title">Target</td>
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					$margin=marginaltarget($p);
					$targetco2=co2perdivpery($div[$division]['id'],$target[$division]['baseline'],$p) * (1-($margin * ($year - $div[$division]['baseline'])));
					if ($targetco2==""){$targetco2="0";}
					if ($p['reportunit']=="GHG Tonnes"){$targetco2=$targetco2/1000;}
					$targetco2 = number_format($targetco2,1);
					echo ('<td class="body number" >'.$targetco2.' </td> ');
					echo ('<td class="body percentage" > </td> ');
				} 
				?> 
			</tr>
			<tr>
				<td class="bottom-title left-title">Difference</td>
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					$realco2=co2perdivpery($div[$division]['id'],$year,$p);
					$targetco2=co2perdivpery($div[$division]['id'],($div[$division]['baseline']),$p) * (1-($margin*($year-($div[$division]['baseline']))));
					$total=$realco2-$targetco2;
					if ($total==""){$total="0";}
					if ($p['reportunit']=="GHG Tonnes"){$total=$total/1000;}
					$total=number_format($total,1);
					echo ('<td class="bottom-title body number" >'.$total.' </td> ');
					echo ('<td class="bottom-title body percentage" > </td> ');
				} 
				?> 
			</tr>
		</Table>
	</div>
	<?php
	
} 

function reportsummarybyyeartargetonedivonesc($p, $div, $table){
	?>
	<div class="table">
	<?php
	$target=arraytargetcompany($p);
	?>
	<Table>
		<tr>
			<td class="title"  />
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
				echo('<td class="title" colspan="2" >'. $year .'</td> ');}
				?> 
			</tr>
			<tr>
				<td class="second-title left-title"  ><?php if ($p['reportdetail']!='SUMMARY'){echo ('Emission Source');} else{echo('Scope '.$table);} ?></td>
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					if($p['type']=="co2"){
						echo('<td class="second-title body number"  >'.$p['units'].' CO2e</td> ');}
					elseif($p['type']=="energy"){
						echo('<td class="second-title body number"  >'.$p['units'].' </td> ');}
					elseif($p['type']=="cost"){
  						echo('<td class="second-title body number"  > $ </td> ');
					}
  					echo('<td class="second-title body percentage"  >% of total</td> ');
				}
				?> 
			</tr>
		<?php
				if ($p['reportdetail']=="ES"){ 
					$sid = scopeid($table, $div[0]['id']);
		?>
			 	<tr>
		<?php
					echo('<td class="left-title scope "  >Scope '.$table.'</td> ');
					for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
						echo('<td class="body number" ></td> ');
						echo('<td class="body percentage" ></td> ');
					}
					?> 
			        </tr>
					<?php
			  		if($p['reportdetail']!="SUMMARY"){
						$cats=catnamepercopertbl($p, $table);
						for($y=0;$y<=count($cats)-1;$y++){
						if($cats[$y]['id']!=201){
					?>
					  		<tr>
			   		<?php
						$pos = strpos($cats[$y]['code'],"Misc");
	if($pos === false) {
		$name = $cats[$y]['name'];
	}
	else {
		$name="Scope $table - ".custcatname($p, $cats[$y]['code']);
		if($name=="") {
			$name = $cats[$y]['name'];
		}	
	}
						echo('<td class="left-title minor-title scope"  >'.$name.'</td> ');
						for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
							$comparative=comparativedivision($p, $div[0]['id'] , $year);
							if($comparative==0){$comparative=1;}
			 				if ($cats[$y]['id']!=133){
								$co2 = co2percat($sid, $table, $cats[$y]['id'], $year,$p)/$comparative;
							}
							else{
								$co2 = (co2percat($sid, $table, $cats[$y]['id'], $year,$p)+co2percat($sid, $table, 201, $year,$p))/$comparative;
							}
							if($co2==""){$co2=0;}
							$co2div = co2perdivpery($div[0]['id'],$year,$p)/$comparative;
							if ($p['reportunit'] == "GHG Tonnes"){
								$co2=$co2/1000;
								$co2div=$co2div/1000;}
							echo('<td class="body number">'.number_format($co2,1).'</td> ');
							if ($co2div==0){$total=0;}
							else{$total=$co2/$co2div*100;}
							$total=number_format($total,0);
							echo('<td class="body percentage"   >'.$total.'% </td> ');
						}
					?> 
			   		</tr>
					<?php
						}
					//meters
					if ($p['division']<>""){
						$code = $cats[$y]['code'];
						$meters=meterpercatperdiv($p,$code);
						if (count($meters)>0){
							for ($meter=0;$meter<=count($meters)-1;$meter++){		
							?>
								<tr>
								<?php 
								$name=metername($meters[$meter]['id']);
								echo('<td class="left-title minor-title meter"  >'.$name.'</td> ');	
								for($division=0;$division<=count($div)-1;$division++){
										
							for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
								$comparative=comparativedivision($p, $div[$division]['id'] , $year);
								if($comparative==0){$comparative=1;}
								$total = co2percatpermeterperdiv($meters[$meter]['id'], $year, $p)/($comparative);
								if($total==""){$total=0;$total1=0;}
								if ($p['reportunit'] == "GHG Tonnes"){
									$total=$total/1000;
									}
								$total=number_format($total,1);
								echo('<td class="body number meter">'.$total.'</td> ');
								
								echo('<td class="body percentage meter"   > </td> ');
								}
								}
								?>
								</tr>
								<?php
				 			}
						} 
					}
			// end of meters
					}}
					?>
					<tr>
					<?php
						echo('<td class="left-title minor-bottom">Total Scope '.$table.'</td> ');
						for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
							$comparative=comparativedivision($p, $div[0]['id'] , $year);
							if($comparative==0){$comparative=1;}
							$total=co2perscopeperyear($div[0]['id'],$year,$table,$p)/$comparative;
							$co2div = co2perdivpery($div[0]['id'],$year,$p)/$comparative;
							if ($p['reportunit'] == "GHG Tonnes"){
								$total=$total/1000;
								$co2div =$co2div/1000;}
							echo('<td class="body number minor-bottom"   >'.number_format($total,1).'</td> ');
							if ($co2div ==0){$total=0;} else{$total=$total/$co2div*100;}
							$total=number_format($total,0);
							echo('<td class="body percentage minor-bottom"   >'.$total.'%</td> ');
						}
					?>
			   		</tr>
					<?php			
					}
			$division=0; 
			?>
			<tr>
			<?php
			if ($p['reportdetail']=='SUMMARY'){
				$total=0;
				echo('<td class="left-title"  >Total emissions  </td> ');
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					$comparative=comparativedivision($p, $div[0]['id'] , $year);
				if($comparative==0){$comparative=1;}
				$total=co2perscopeperyear($div[0]['id'],$year,$table,$p)/$comparative;
				$co2div = co2perdivpery($div[0]['id'],$year,$p)/$comparative;
				if ($p['reportunit'] == "GHG Tonnes"){
					$total=$total/1000;
					$co2div =$co2div/1000;}
				echo('<td class="body number minor-bottom"   >'.number_format($total,1).'</td> ');
				if ($co2div ==0){$total=0;} else{$total=$total/$co2div*100;}
				$total=number_format($total,0);
				echo('<td class="body percentage minor-bottom"   >'.$total.'%</td> ');
					} }
			?> 
			</tr>
			
			
			
			 
			<tr>
				<td class=" left-title">Target</td>
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					$margin=marginaltarget($p);
					$targetco2=co2perscopeperyear($div[0]['id'],$target[$division]['baseline'],$table,$p) * (1-($margin * ($year - $div[$division]['baseline'])));
					if ($targetco2==""){$targetco2="0";}
					if ($p['reportunit']=="GHG Tonnes"){$targetco2=$targetco2/1000;}
					$targetco2 = number_format($targetco2,1);
					echo ('<td class="body number" >'.$targetco2.' </td> ');
					echo ('<td class="body percentage" > </td> ');
				} 
				?> 
			</tr>
			<tr>
				<td class="bottom-title left-title">Difference</td>
				<?php
				for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					$realco2=co2perscopeperyear($div[0]['id'],$year,$table,$p);
					$targetco2=co2perscopeperyear($div[0]['id'],$target[$division]['baseline'],$table,$p) * (1-($margin * ($year - $div[$division]['baseline'])));
					$total=$realco2-$targetco2;
					if ($total==""){$total="0";}
					if ($p['reportunit']=="GHG Tonnes"){$total=$total/1000;}
					$total=number_format($total,1);
					echo ('<td class="bottom-title body number" >'.$total.' </td> ');
					echo ('<td class="bottom-title body percentage" > </td> ');
				} 
				?> 
			</tr>
		</Table>
	</div>
	<?php
	
} 



function reportsummarybyyear($p,$div){
	
?>

<div class="table">
<Table>
	<tr>
 		<td class="title"  />
 			<?php
 			for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
  			echo('<td class="title" colspan="2" >'. $year .'</td> ');}
			?> 
 		</tr>
 		<tr>
 			<td class="second-title left-title"  ><?php if ($p['reportdetail']!="SUMMARY"){echo('Business Unit');}?></td>
			
 			<?php
 			
 			for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
				if($p['type']=="co2"){
  					echo('<td class="second-title body number"  >'.$p['units'].' CO2e</td> ');}
				elseif($p['type']=="energy"){
  					echo('<td class="second-title body number"  >'.$p['units'].' </td> ');}
  				elseif($p['type']=="cost"){
  					echo('<td class="second-title body number"  > $ </td> ');}
 				echo('<td class="second-title body percentage"  >% of total</td> ');
 			}
			?> 
		</tr>
		<?php
		if($p['reportdetail']!="SUMMARY"){
	 		for($division=0;$division<=count($div)-1;$division++){ 
			?>
			<tr>
			<?php
				$total=0;
	 			echo('<td class="left-title"  >' . $div[$division]['name'] . ' </td> ');
	 			for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
					$comparative=comparativedivision($p, $div[$division]['id'] , $year);
					if($comparative==0){$comparative=1;}
	 				$total=co2perdivpery($div[$division]['id'],$year,$p)/$comparative;
					if ($total==""){$total="0";}
	 				if ($p['reportunit'] == "GHG Tonnes"){$total=$total/1000;}
					$total=number_format($total,1);
					echo ('<td class="body number" >'.$total.' </td> ');
					if (co2percia($p,$year)==0){$total=0;}
					else{ $total = co2perdivpery ($div[$division]['id'],$year,$p)/ co2percia($p,$year)*100;}
					$total=number_format($total,0);
					echo ('<td class="body percentage" >'.$total.'% </td> ');
					} 
			?> 
			</tr> 
			<?php 
			} 
		}
		?> 
		<tr>
 			<td class="bottom-title left-title">Total Company</td>
			<?php
 			for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
 				$total=co2percia($p,$year)/comparativecompany($p,$year);
 				if ($total==""){$total="0";}
				if ($p['reportunit']=="GHG Tonnes"){$total=$total/1000;}
 				$total=number_format($total,1);
				echo ('<td class="bottom-title body number" >'.$total.' </td> ');
				echo ('<td class="bottom-title body percentage" > </td> ');
			} 
			?> 
		</tr>
	</Table>
</div>
<?php
} 


function reportdetailsscopesbunit($p,$div){
$usercompany = $p['usercompany'];
$reportyearfrom = $p['reportyearfrom'];
$reportyearto= $p['reportyearto'];
$reportunit= $p['reportunit'];
?>
<?php 
for($year=$reportyearfrom;$year<=$reportyearto;$year++){
?>
<div class="table">

<Table>
	<tr>
 	<?php
 		echo('<td class="title">Year '. $year .'</td> ');
	?> 
	</tr>
	<tr>
		<td class="title" />
		<?php
 		for($division=0;$division<=count($div)-1;$division++){
 			echo('<td colspan="2" class="title">'. $div[$division]['name'] .'</td> ');}
		?> 
		<td colspan="2" class="title">Total Company</td> 
 	</tr>
 	<tr>
 		<td class="second-title left-title"  >Emissions Source</td>
		<?php
 		for($division=0;$division<=count($div);$division++){
 			if($p['type']=="co2"){
  					echo('<td class="second-title body number"  >'.$p['units'].' CO2e</td> ');}
				elseif($p['type']=="energy"){
  					echo('<td class="second-title body number"  >'.$p['units'].' </td> ');}
 			elseif($p['type']=="cost"){
  					echo('<td class="second-title body number"  > $ </td> ');}
			echo('<td class="title second-title body percentage"  >% of total</td> ');
		}
		?> 
	</tr>
 	<?php 
	for ($table=1;$table<=3;$table++){
		?>
 	<tr>
		<?php
			echo('<td class="left-title"  >Scope '.$table.'</td> ');
			for($division=0;$division<=count($div);$division++){
 			echo('<td class="body" ></td> ');
			echo('<td class="body" ></td> ');
		}
		?> 
        </tr>
		<?php
  		$cats=catnamepercopertbl($p, $table);
		for($y=0;$y<=count($cats)-1;$y++){
		if ($cats[$y]['id']!=201){
		?>
  		<tr>
   		<?php
		$pos = strpos($cats[$y]['code'],"Misc");
	if($pos === false) {
		$name = $cats[$y]['name'];
	}
	else {
		$name="Scope $table - ".custcatname($p, $cats[$y]['code']);
		if($name=="") {
			$name = $cats[$y]['name'];
		}	
	}
			echo('<td class="left-title minor-title scope"  >'.$name.'</td> ');
			for($division=0;$division<=count($div)-1;$division++){
				$sid = scopeid($table, $div[$division]['id']);
				$comparative=comparativedivision($p, $div[$division]['id'] , $year);
				if($comparative==0){$comparative=1;}
				if ($cats[$y]['id']!=133){
				$total = co2percat($sid, $table, $cats[$y]['id'], $year,$p)/($comparative);
				$total1 = co2percat($sid, $table, $cats[$y]['id'], $year, $p);
				}
				else{
				$total = (co2percat($sid, $table, $cats[$y]['id'], $year,$p)+co2percat($sid, $table, 201, $year,$p))/($comparative);
				$total1 = co2percat($sid, $table, $cats[$y]['id'], $year, $p)+co2percat($sid, $table, 201, $year, $p);
				}
				if($total==""){$total=0;$total1=0;}
				$co2div = co2perdivpery($div[$division]['id'],$year,$p);
				if ($reportunit == "GHG Tonnes"){
					$total=$total/1000;
					$total1=$total1/1000;
					$co2div=$co2div/1000;}
				$total=number_format($total,1);
				echo('<td class="body number">'.$total.'</td> ');
				if ($co2div==0){$total1=0;}
				else{$total1=($total1/$co2div)*100;}
				$total1=number_format($total1,0);
				echo('<td class="body percentage"   >'. $total1.'% </td> ');
			}
			if ($cats[$y]['id']!=133){
			$total = totalco2percat($cats[$y]['id'], $year, $table, $p)/comparativecompany($p,$year);
			$total1 = totalco2percat($cats[$y]['id'], $year, $table, $p);
			}
			else{
			$total = (totalco2percat($cats[$y]['id'], $year, $table, $p)+totalco2percat(201, $year, $table, $p))/comparativecompany($p,$year);
			$total1 = totalco2percat($cats[$y]['id'], $year, $table, $p) + totalco2percat(201, $year, $table, $p);
			}
			if($total==""){$total=0;$total1=0;}
			$co2cia=co2percia($p,$year);
			if ($reportunit == "GHG Tonnes"){$total=$total/1000;$total1=$total1/1000;$co2cia=$co2cia/1000;}
			$total = number_format($total,1);
			echo('<td class="body number"   >'. $total .'</td> ');
			if ($co2cia==0){$total1=0;} else{$total1=$total1/$co2cia*100;}
			$total1=number_format($total1,0);
			echo('<td class="body percentage"   >'. $total1.'% </td> ');			
			
			?> 

   		</tr>
		<?php
		}
//meters
		if ($p['division']<>""){
			$code = $cats[$y]['code'];
			$meters=meterpercatperdiv($p,$code);
			if (count($meters)>0){
				for ($meter=0;$meter<=count($meters)-1;$meter++){
					$qty=co2percatpermeterperdiv($meters[$meter]['id'], $year, $p);
					?>
					<tr>
					<?php 
					$name=metername($meters[$meter]['id']);
					echo('<td class="left-title minor-title meter"  >'.$name.'</td> ');	
					for($division=0;$division<=count($div)-1;$division++){
					$comparative=comparativedivision($p, $div[$division]['id'] , $year);
					if($comparative==0){$comparative=1;}
					$total = $qty/($comparative);
					if($total==""){$total=0;$total1=0;}
					if ($reportunit == "GHG Tonnes"){
						$total=$total/1000;
						}
					$total=number_format($total,1);
					echo('<td class="body number meter">'.$total.'</td> ');
					}
					echo('<td class="body percentage meter"   > </td> ');
					
					
								
					
					?>
					</tr>
					<?php
	 			}
			} 
		}
// end of meters
		
		}
		?>
		<tr>
		<?php
			echo('<td class="minor-bottom left-title">Total Scope '.$table.'</td> ');
			for($division=0;$division<=count($div)-1;$division++){
				$comparative=comparativedivision($p, $div[$division]['id'] , $year);
				if($comparative==0){$comparative=1;}
				$total=co2perscopeperyear($div[$division]['id'],$year,$table,$p)/$comparative;
				$total1=co2perscopeperyear($div[$division]['id'],$year,$table,$p);
				$co2div = co2perdivpery($div[$division]['id'],$year,$p);
				if ($reportunit == "GHG Tonnes"){
					$total=$total/1000;
					$total1=$total1/1000;
					$co2div =$co2div/1000;}
					$total=number_format($total,1);
				echo('<td class="body number minor-bottom">'.$total.'</td> ');
				if ($co2div ==0){$total1=0;} else{$total1=($total1/$co2div)*100;}
				$total1=number_format($total1,0);
				echo('<td class="body percentage minor-bottom">'.$total1.'%</td> ');
			}
			$total=co2perscpery($p,$table,$year)/comparativecompany($p,$year);
			$total1=co2perscpery($usercompany,$table,$year,$p);
			if($total==""){$total=0;$total1=0;}; 
			$co2cia=co2percia($usercompany,$year,$p);
			if ($reportunit == "GHG Tonnes"){
					$total=$total/1000;
					$total1=$total1/1000;
					$co2cia=$co2cia/1000;}
					$total=number_format($total,1); 
			echo('<td class="body number minor-bottom">'.$total.'</td> ');
			if ($co2cia==0){
				$total1=0;}
			else{$total1=$total1/$co2cia*100;}
			$total1=number_format($total1,0);
			echo('<td class="body percentage minor-bottom">'.$total1.'%</td> ');
			?>
   		</tr>
		<?php
		}
		?>
  		<tr>
		<?php
		echo('<td class="left-title bottom-title">Total</td> ');
		for($division=0;$division<=count($div)-1;$division++){
			$comparative=comparativedivision($p, $div[$division]['id'] , $year);
			if($comparative==0){$comparative=1;}
			$co2div= co2perdivpery($div[$division]['id'],$year,$p)/$comparative;
			if ($reportunit == "GHG Tonnes"){
					$co2div=$co2div/1000;}
				$total=number_format($co2div,1);
			echo('<td class="bottom-title body number">'. $total .'</td> ');
			echo('<td class="bottom-title body percentage"></td> ');
		}
		$co2cia=co2percia($p,$year)/comparativecompany($p,$year);
		if ($reportunit == "GHG Tonnes"){
					$co2cia=$co2cia/1000;}
			$co2cia=number_format($co2cia,1);
		echo('<td class="bottom-title body number">'.$co2cia.'</td> ');
		echo('<td class="bottom-title body percentage"></td> ');
				?>
 		</tr>
 </Table>
 </div>
 <?php 
}
} 

function reportdetailsscopes($p,$div){
	$usercompany = $p['usercompany'];
	$reportyearfrom = $p['reportyearfrom'];
	$reportyearto= $p['reportyearto'];
	$reportunit= $p['reportunit'];
?>
<div class="table">
<Table>
	<tr>
 		<td class="title"   />
 		<?php
 		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
  		echo('<td class="title" colspan="2" >'. $year .'</td> ');}
		?> 
 	</tr>
    <tr>
 		<td class="left-title second-title scope"  >Emission Sources</td>
		<?php
 		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
  		if($p['type']=="co2"){
  					echo('<td class="second-title body number"  >'.$p['units'].' CO2e</td> ');}
				elseif($p['type']=="energy"){
  					echo('<td class="second-title body number"  >'.$p['units'].' </td> ');}
 		elseif($p['type']=="cost"){
  					echo('<td class="second-title body number"  > $ </td> ');}
			echo('<td class="second-title percentage"  >% of total</td> ');}
		?> 
 		<td class="second-title number"  ><?php echo('%Variance '. $p['reportyearfrom'].'-'.$p['reportyearto']);?></td>
	</tr>
    <?php
 	for($table=1;$table<=3;$table++){			
	?>
	<tr>
    <?php
    	echo('<td class="left-title"  >Scope '.$table.'</td> ');
		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
  			echo('<td class="title"  ></td> ');
			echo('<td class="title"  ></td> ');
			}
			echo('<td class="title"  ></td> ')
			?> 
	</tr>
    <?php
  	$cats=catnamepercopertbl($p, $table);
	for($y=0;$y<=count($cats)-1;$y++){
	$pos = strpos($cats[$y]['code'],"Misc");
	if($pos === false) {
		$name = $cats[$y]['name'];
	}
	else {
		$name="Scope $table - ".custcatname($p, $cats[$y]['code']);
		if($name=="") {
			$name = $cats[$y]['name'];
		}	
	}
		$catid= $cats[$y]['id'];
	if ($catid!=201){
	?>
  	<tr>
   	<?php
		echo('<td class="left-title scope minor-title"  >'.$name.'</td> ');
		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
			if ($catid!=133){
			$total = totalco2percat($catid, $year, $table, $p)/comparativecompany($p,$year);
			}
			else{
			$total = (totalco2percat($catid, $year, $table, $p)+totalco2percat(201, $year, $table, $p))/comparativecompany($p,$year);
			}
			if ($total==""){$total=0;}
			$co2cia=co2percia($p,$year)/comparativecompany($p,$year);
			if ($reportunit == "GHG Tonnes"){
			$total=$total/1000;
			$co2cia=$co2cia/1000;}
			echo('<td class="body number"   >'.number_format($total,1).'</td> ');
			if ($co2cia==0){
				$total=0;}
			else{$total=($total/$co2cia)*100;}
			$total=number_format($total,0);
			echo('<td class="body percentage"   >'.$total.'%</td> ');
		}
		if ($catid!=133){	
		$co21=totalco2percat($catid, $p['reportyearfrom'], $table, $p)/comparativecompany($p,$year);
		$co22=totalco2percat($catid, $p['reportyearto'], $table, $p)/comparativecompany($p,$year);
		}
		else{
		$co21=(totalco2percat($catid, $p['reportyearfrom'], $table, $p)+totalco2percat(201, $p['reportyearfrom'], $table, $p))/comparativecompany($p,$year);
		$co22=(totalco2percat($catid, $p['reportyearto'], $table, $p)+totalco2percat(201, $p['reportyearto'], $table, $p))/comparativecompany($p,$year);
		}
		if( $co21 == "0.0"){
			$variance = "N/A";}
		else{$variance=($co22-$co21)/$co21*100;
			$variance = number_format($variance,0)."%";} 
		echo('<td class="body percentage"  >'.$variance.'</td> ');
		?> 
    </tr>
    <?php
	}}
    ?>
	<tr>
	<?php
	   	echo('<td class="left-title minor-bottom"  >Total Scope '.$table.'</td> ');
		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
			$total=co2perscpery($p,$table,$year)/(comparativecompany($p,$year));
			if ($total==""){$total=0;}
			$co2cia=co2percia($p,$year)/comparativecompany($p,$year);
			if ($reportunit == "GHG Tonnes"){
			$total=$total/1000;
			$co2cia=$co2cia/1000;}
			echo('<td class="body minor-bottom number">'.number_format($total,1).'</td> ');
			if ($co2cia==0){
				$total=0;}
			else{$total=($total/$co2cia)*100;}
			$total=number_format($total,0);
			echo('<td class="body minor-bottom percentage">'.$total.'%</td> ');
		}
		$co21=co2perscpery($p,$table,$p['reportyearfrom']);
		$co22=co2perscpery($p,$table,$p['reportyearto']);
		if( $co21 == 0){$variance = "N/A";}
		else{ $variance=($co22-$co21)/$co21*100;
		$variance = number_format($variance,0)."%";}
		echo('<td class="body minor-bottom percentage"  >'.$variance .'</td> ');
	?>
	</tr>    
    <?php
	}
	?>
    <tr>
    	<td class="left-title bottom-title"  >Total company</td>
    <?php
	for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
		$co2percia=co2percia($p,$year)/comparativecompany($p,$year);
		if ($reportunit == "GHG Tonnes"){
			$co2percia=$co2percia/1000;}
  		echo('<td class=" body number bottom-title"  >'.number_format($co2percia,1).'</td> ');
	 	echo('<td class="body percentage bottom-title"  ></td> ');}
		echo('<td class="body percentage bottom-title"  ></td> ');
	?> 
    </tr>
</table>
</div>
<?php
}

function reportdetailsscopesonebunit($p,$div){

$usercompany = $p['usercompany'];
$reportyearfrom = $p['reportyearfrom'];
$reportyearto= $p['reportyearto'];
$reportunit= $p['reportunit'];
?>
<div class="table">
<Table>
	<tr>
 	<?php
		echo('<td  class="title"> </td> ');
	?> 
	</tr>
	<tr>
		<td class="title" />
		<?php
		for($year=$reportyearfrom;$year<=$reportyearto;$year++){
		echo('<td colspan="2" class="title">'. $year .'</td> ');}
		?> 
 	</tr>
 	<tr>
 		<td class="left-title second-title"  >Emissions Source</td>
		<?php
		for($year=$reportyearfrom;$year<=$reportyearto;$year++){
			if($p['type']=="co2"){
  					echo('<td class="second-title body number"  >'.$p['units'].' CO2e</td> ');}
				elseif($p['type']=="energy"){
  					echo('<td class="second-title body number"  >'.$p['units'].' </td> ');}
		elseif($p['type']=="cost"){
  					echo('<td class="second-title body number"  > $ </td> ');}
			echo('<td class="second-title percentage"  >% of total</td> ');
		}
		?> 
	</tr>
 	<?php 
	for ($table=1;$table<=3;$table++){
		$sid = scopeid($table, $div[0]['id']);
		?>
 	<tr>
		<?php
			echo('<td class="left-title scope "  >Scope '.$table.'</td> ');
		for($year=$reportyearfrom;$year<=$reportyearto;$year++){
			echo('<td class="body number" ></td> ');
			echo('<td class="body percentage" ></td> ');
		}
		?> 
        </tr>
		<?php
  		if($p['reportdetail']!="SUMMARY"){
		$cats=catnamepercopertbl($p, $table);
		for($y=0;$y<=count($cats)-1;$y++){
		if($cats[$y]['id']!=201){
		?>
  		<tr>
   		<?php
		$pos = strpos($cats[$y]['code'],"Misc");
	if($pos === false) {
		$name = $cats[$y]['name'];
	}
	else {
		$name="Scope $table - ".custcatname($p, $cats[$y]['code']);
		if($name=="") {
			$name = $cats[$y]['name'];
		}	
	}
			echo('<td class="left-title minor-title scope"  >'.$name.'</td> ');
			for($year=$reportyearfrom;$year<=$reportyearto;$year++){
				$comparative=comparativedivision($p, $div[0]['id'] , $year);
				if($comparative==0){$comparative=1;}
 				if ($cats[$y]['id']!=133){
				$co2 = co2percat($sid, $table, $cats[$y]['id'], $year,$p)/$comparative;
 				}
				else{
				$co2 = (co2percat($sid, $table, $cats[$y]['id'], $year,$p)+co2percat($sid, $table, 201, $year,$p))/$comparative;
				}
 				if($co2==""){$co2=0;}
				$co2div = co2perdivpery($div[0]['id'],$year,$p)/$comparative;
				if ($reportunit == "GHG Tonnes"){
					$co2=$co2/1000;
					$co2div=$co2div/1000;}
				echo('<td class="body number">'.number_format($co2,1).'</td> ');
				if ($co2div==0){$total=0;}
				else{$total=$co2/$co2div*100;}
				$total=number_format($total,0);
				echo('<td class="body percentage"   >'.$total.'% </td> ');
			}
		?> 
   		</tr>
		<?php
		}
		//meters
		if ($p['division']<>""){
			$code = $cats[$y]['code'];
			$meters=meterpercatperdiv($p,$code);
			if (count($meters)>0){
				for ($meter=0;$meter<=count($meters)-1;$meter++){		
				?>
					<tr>
					<?php 
					$name=metername($meters[$meter]['id']);
					echo('<td class="left-title minor-title meter"  >'.$name.'</td> ');	
					for($division=0;$division<=count($div)-1;$division++){
							
				for($year=$reportyearfrom;$year<=$reportyearto;$year++){
					$comparative=comparativedivision($p, $div[$division]['id'] , $year);
					if($comparative==0){$comparative=1;}
					$total = co2percatpermeterperdiv($meters[$meter]['id'], $year, $p)/($comparative);
					if($total==""){$total=0;$total1=0;}
					if ($reportunit == "GHG Tonnes"){
						$total=$total/1000;
						}
					$total=number_format($total,1);
					echo('<td class="body number meter">'.$total.'</td> ');
					
					echo('<td class="body percentage meter"   > </td> ');
					}
					}
								
					
					?>
					</tr>
					<?php
	 			}
			
			} 
		}
// end of meters
		}}
		?>
		<tr>
		<?php
			echo('<td class="left-title minor-bottom">Total Scope '.$table.'</td> ');
			for($year=$reportyearfrom;$year<=$reportyearto;$year++){
				$comparative=comparativedivision($p, $div[0]['id'] , $year);
				if($comparative==0){$comparative=1;}
				$total=co2perscopeperyear($div[0]['id'],$year,$table,$p)/$comparative;
				$co2div = co2perdivpery($div[0]['id'],$year,$p)/$comparative;
				if ($reportunit == "GHG Tonnes"){
					$total=$total/1000;
					$co2div =$co2div/1000;}
				echo('<td class="body number minor-bottom"   >'.number_format($total,1).'</td> ');
				if ($co2div ==0){$total=0;} else{$total=$total/$co2div*100;}
				$total=number_format($total,0);
				echo('<td class="body percentage minor-bottom"   >'.$total.'%</td> ');
			}
		?>
   		</tr>
		<?php
		}
		?>
  		<tr>
		<?php
		echo('<td class="bottom-title left-title">Total</td> ');
		for($year=$reportyearfrom;$year<=$reportyearto;$year++){
			$comparative=comparativedivision($p, $div[0]['id'] , $year);
			if($comparative==0){$comparative=1;}
			$co2div= co2perdivpery($div[0]['id'],$year,$p)/$comparative;
			if ($reportunit == "GHG Tonnes"){
					$co2div=$co2div/1000;}
			echo('<td class="bottom-title body number">'.number_format($co2div,1).'</td> ');
			echo('<td class="bottom-title body percentage"></td> ');
		}
		?>
 		</tr>
 </Table>
 </div>
 <?php 
} 



function reportdetailsonescopes($p,$div,$table){
	$usercompany = $p['usercompany'];
	$reportyearfrom = $p['reportyearfrom'];
	$reportyearto= $p['reportyearto'];
	$reportunit= $p['reportunit'];
?>
<div class="table">
<?php
?>
<Table>
	<tr>
 		<td class="title"   />
 		<?php
 		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
  		echo('<td class="title" colspan="2" >'. $year .'</td> ');}
		?> 
 	</tr>
    <tr>
 		<td class="left-title second-title"  ><?php if ($p['reportdetail']!="SUMMARY"){echo('Emission Sources');} ?></td>
		<?php
 		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
  		if($p['type']=="co2"){
  					echo('<td class="second-title body number"  >'.$p['units'].' CO2e</td> ');}
				elseif($p['type']=="energy"){
  					echo('<td class="second-title body number"  >'.$p['units'].' </td> ');}
 		elseif($p['type']=="cost"){
  					echo('<td class="second-title body number"  > $ </td> ');}
			echo('<td class="second-title percentage"  >% of total</td> ');}
		?> 
    </tr>
    <tr>
    <?php
    	echo('<td class="left-title scope"  >Scope '.$table.'</td> ');
		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
  			echo('<td class="body number"  ></td> ');
			echo('<td class="body percentage"  ></td> ');
			}
			?> 
	</tr>
    
    <?php
  	$cats=catnamepercopertbl($p, $table);
  	if($p['reportdetail']!="SUMMARY"){
	for($y=0;$y<=count($cats)-1;$y++){
	$pos = strpos($cats[$y]['code'],"Misc");
	if($pos === false) {
		$name = $cats[$y]['name'];
	}
	else {
		$name="Scope $table - ".custcatname($p, $cats[$y]['code']);
		if($name=="") {
			$name = $cats[$y]['name'];
		}	
	}	
	$catid= $cats[$y]['id'];
	if($catid!=201){
	?>
  	<tr>
   	<?php
		echo('<td class="left-title minor-title scope "  >'.$name.'</td> ');
		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
		if ($catid!=133){	
		$total = totalco2percat($catid, $year, $table, $p)/comparativecompany($p,$year);
		}
		else{
		$total = (totalco2percat($catid, $year, $table, $p)+totalco2percat(201, $year, $table, $p))/comparativecompany($p,$year);
		}
		if ($total==""){$total=0;}
			$co2cia=co2perscpery($p,$table,$year)/comparativecompany($p,$year);
			if ($reportunit == "GHG Tonnes"){
			$total=$total/1000;
			$co2cia=$co2cia/1000;}
			echo('<td class="body number"   >'.number_format($total,1).'</td> ');
			if ($co2cia==0){
				$total=0;}
			else{$total=$total/$co2cia*100;}
			echo('<td class="body percentage"   >'.number_format($total,0).'%</td> ');
		}
		?> 
    </tr>
    <?php
	}}}
    ?>
	<tr>
	<?php
	   	echo('<td class="bottom-title left-title"  >Total Scope '.$table.'</td> ');
		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
			$total=co2perscpery($p,$table,$year)/comparativecompany($p,$year);
			if ($total==""){$total=0;}
			if ($reportunit == "GHG Tonnes"){
			$total=$total/1000;}
			echo('<td class="bottom-title number body"   >'.number_format($total,1).'</td> ');
			echo('<td class="bottom-title percentage body"   ></td> ');
		}
	?>
	</tr>
</table>
</div>
<?php
}

function reportdetailsonescopesonebunit($p,$div,$table){
	$usercompany = $p['usercompany'];
	$reportyearfrom = $p['reportyearfrom'];
	$reportyearto= $p['reportyearto'];
	$reportunit= $p['reportunit'];
?>
<div class="table">
<Table>
	<tr>
 		<td class="title"   />
 		<?php
 		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
  		echo('<td class="title" colspan="2" >'. $year .'</td> ');}
		?> 
 	</tr>
    <tr>
 		<td class="left-title second-title"  >Emission Sources</td>
		<?php
 		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
				if($p['type']=="co2"){
  					echo('<td class="second-title body number"  >'.$p['units'].' CO2e</td> ');}
				elseif($p['type']=="energy"){
  					echo('<td class="second-title body number"  >'.$p['units'].' </td> ');}
 		elseif($p['type']=="cost"){
  					echo('<td class="second-title body number"  > $ </td> ');}
				 	echo('<td class="second-title percentage"  >% of total</td> ');}
		?> 
    </tr>
    <tr>
    <?php
    $detail=$p['reportdetail'];
    echo('<td class="left-title scope"  >Scope '.$table.'</td> ');
		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
  			echo('<td class="body number"  ></td> ');
			echo('<td class="body percentage"  ></td> ');
			}
			?> 
	</tr>
    <?php
    if($detail!="SUMMARY"){
    	if($p['division']==""){ 
	  		$cats=catnamepercopertbl($p, $table);
    	}
    	else{
    		$cats=catnameperdivpertbl($p, $table);
   
    	}
	  	for($y=0;$y<=count($cats)-1;$y++){
	  	$pos = strpos($cats[$y]['code'],"Misc");
	if($pos === false) {
		$name = $cats[$y]['name'];
	}
	else {
		$name="Scope $table - ".custcatname($p, $cats[$y]['code']);
		if($name=="") {
			$name = $cats[$y]['name'];
		}	
	}
			$catid= $cats[$y]['id'];
			if($catid!=201){
	  	?>
	  	<tr>
	   	<?php
			echo('<td class="left-title minor-title scope "  >'.$name.'</td> ');
			for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
				for($divisions=0;$divisions<=count($div)-1;$divisions++){
					$comparative=comparativedivision($p, $div[$divisions]['id'] , $year);
					if($comparative==0){$comparative=1;}
					if ($catid!=133){ 
					$total = co2percatperdiv($div[$divisions]['id'], $catid, $year,$p)/$comparative;
					}
					else{
					$total = (co2percatperdiv($div[$divisions]['id'], $catid, $year,$p)+co2percatperdiv($div[$divisions]['id'], 201, $year,$p))/$comparative;
					}
					if ($total==""){$total=0;}
					$co2perscperdiv=co2perscperdiv($div[$divisions]['id'], $table, $year,$p)/$comparative;
					if ($reportunit == "GHG Tonnes"){
					$total=$total/1000;
					$co2perscperdiv=$co2perscperdiv/1000;}
					echo('<td class="body number"   >'.number_format($total,1).'</td> ');
					if ($co2perscperdiv==0){
						$total=0;}
					else{$total=$total/$co2perscperdiv*100;}
					echo('<td class="body percentage"   >'.number_format($total,0).'%</td> ');
				}
			}
			?> 
	    </tr>
	    <?php
	    	}
	    //meters
			if ($p['division']<>""){
				$code = $cats[$y]['code'];
				$meters=meterpercatperdiv($p,$code);
				if (count($meters)>0){
					for ($meter=0;$meter<=count($meters)-1;$meter++){		
					?>
						<tr>
						<?php 
						$name=metername($meters[$meter]['id']);
						echo('<td class="left-title minor-title meter"  >'.$name.'</td> ');	
						for($division=0;$division<=count($div)-1;$division++){		
							for($year=$reportyearfrom;$year<=$reportyearto;$year++){
								$comparative=comparativedivision($p, $div[$division]['id'] , $year);
								if($comparative==0){$comparative=1;}
								$total = co2percatpermeterperdiv($meters[$meter]['id'], $year, $p)/($comparative);
								if($total==""){$total=0;$total1=0;}
								if ($reportunit == "GHG Tonnes"){
									$total=$total/1000;
									}
								$total=number_format($total,1);
								echo('<td class="body number meter">'.$total.'</td> ');
								echo('<td class="body percentage meter"   > </td> ');
								}
							}				
						?>
						</tr>
						<?php
		 			}
				} 
			}
		// end of meters
		}
    }
    ?>
	<tr>
	<?php
	   	echo('<td class="bottom-title left-title"  >Total Scope '.$table.'</td> ');
		for($year=$p['reportyearfrom'];$year<=$p['reportyearto'];$year++){
			$comparative=comparativedivision($p, $div[0]['id'] , $year);
			if($comparative==0){$comparative=1;}
			$total=co2perscperdiv($div[0]['id'], $table, $year,$p)/$comparative;
			if ($total==""){$total=0;}
			if ($reportunit == "GHG Tonnes"){
			$total=$total/1000;}
			echo('<td class="bottom-title number body"   >'.number_format($total,1).'</td> ');
			echo('<td class="bottom-title percentage body"   > </td> ');
		}
	?>
	</tr>
</table>
</div>
<?php
}
function reportdetailsonescopesbunit($p,$div,$table){
$usercompany = $p['usercompany'];
$reportyearfrom = $p['reportyearfrom'];
$reportyearto= $p['reportyearto'];
$reportunit= $p['reportunit'];
?>
<?php 
for($year=$reportyearfrom;$year<=$reportyearto;$year++){
?>
<div class="table">

<Table>
	<tr>
 	<?php
 		echo('<td class="title">Year '. $year .'</td> ');
	?> 
	</tr>
	<tr>
		<td class="title" />
		<?php
 		for($division=0;$division<=count($div)-1;$division++){
 			echo('<td colspan="2" class="title">'. $div[$division]['name'] .'</td> ');}
		?> 
		<td colspan="2" class="title">Total Company</td> 
 	</tr>
 	<tr>
 		<td class="second-title left-title"  ><?php if ($p['reportdetail']!='BU'){echo'Emissions Source';}?></td>
		<?php
 		for($division=0;$division<=count($div);$division++){
 			if($p['type']=="co2"){
  					echo('<td class="second-title body number"  >'.$p['units'].' CO2e</td> ');}
				elseif($p['type']=="energy"){
  					echo('<td class="second-title body number"  >'.$p['units'].' </td> ');}
 			elseif($p['type']=="cost"){
  					echo('<td class="second-title body number"  > $ </td> ');}
			echo('<td class="title second-title body percentage"  >% of total</td> ');
		}
		?> 
	</tr>
 	<?php 
 		?>
 	<tr>
		<?php
			echo('<td class="left-title"  >Scope '.$table.'</td> ');
			for($division=0;$division<=count($div);$division++){
 			echo('<td class="body" ></td> ');
			echo('<td class="body" ></td> ');
		}
		?> 
        </tr>
		<?php
		
		if($p['reportdetail']=="BUES"){
		$cats=catnamepercopertbl($p, $table);
		for($y=0;$y<=count($cats)-1;$y++){
		if ($cats[$y]['id']!=201){
		?>
  		<tr>
   		<?php
		$pos = strpos($cats[$y]['code'],"Misc");
	if($pos === false) {
		$name = $cats[$y]['name'];
	}
	else {
		$name="Scope $table - ".custcatname($p, $cats[$y]['code']);
		if($name=="") {
			$name = $cats[$y]['name'];
		}	
	}
			echo('<td class="left-title minor-title scope"  >'.$name.'</td> ');
			for($division=0;$division<=count($div)-1;$division++){
				$sid = scopeid($table, $div[$division]['id']);
				$comparative=comparativedivision($p, $div[$division]['id'] , $year);
				if($comparative==0){$comparative=1;}
				if($cats[$y]['id']!=133){
				$total = co2percat($sid, $table, $cats[$y]['id'], $year,$p)/($comparative);
				$total1 = co2percat($sid, $table, $cats[$y]['id'], $year, $p);
				}
				else{
				$total = (co2percat($sid, $table, $cats[$y]['id'], $year,$p)+co2percat($sid, $table, 201, $year,$p))/($comparative);
				$total1 = co2percat($sid, $table, $cats[$y]['id'], $year, $p)+co2percat($sid, 201, $year, $p);
				}
				if($total==""){$total=0;$total1=0;}
				$co2div = co2perdivpery($div[$division]['id'],$year,$p);
				if ($reportunit == "GHG Tonnes"){
					$total=$total/1000;
					$total1=$total1/1000;
					$co2div=$co2div/1000;}
				$total=number_format($total,1);
				echo('<td class="body number">'.$total.'</td> ');
				if ($co2div==0){$total1=0;}
				else{$total1=($total1/$co2div)*100;}
				$total1=number_format($total1,0);
				echo('<td class="body percentage"   >'. $total1.'% </td> ');
			}
			if($cats[$y]['id']!=133){
			$total = totalco2percat($cats[$y]['id'], $year, $table, $p)/comparativecompany($p,$year);
			$total1 = totalco2percat($cats[$y]['id'], $year, $table, $p);
			}
			else{
			$total = (totalco2percat($cats[$y]['id'], $year, $table, $p)+totalco2percat(201, $year, $table, $p))/comparativecompany($p,$year);
			$total1 = totalco2percat($cats[$y]['id'], $year, $table, $p)+totalco2percat(201, $year, $table, $p);
			}
			if($total==""){$total=0;$total1=0;}
			$co2cia=co2percia($p,$year);
			if ($reportunit == "GHG Tonnes"){$total=$total/1000;$total1=$total1/1000;$co2cia=$co2cia/1000;}
			$total = number_format($total,1);
			echo('<td class="body number"   >'. $total .'</td> ');
			if ($co2cia==0){$total1=0;} else{$total1=$total1/$co2cia*100;}
			$total1=number_format($total1,0);
			echo('<td class="body percentage"   >'. $total1.'% </td> ');			
			
			?> 

   		</tr>
		<?php
		}
//meters
		if ($p['division']<>""){
			$code = $cats[$y]['code'];
			$meters=meterpercatperdiv($p,$code);
			if (count($meters)>0){
				for ($meter=0;$meter<=count($meters)-1;$meter++){
					$qty=co2percatpermeterperdiv($meters[$meter]['id'], $year, $p);
					?>
					<tr>
					<?php 
					$name=metername($meters[$meter]['id']);
					echo('<td class="left-title minor-title meter"  >'.$name.'</td> ');	
					for($division=0;$division<=count($div)-1;$division++){
					$comparative=comparativedivision($p, $div[$division]['id'] , $year);
					if($comparative==0){$comparative=1;}
					$total = $qty/($comparative);
					if($total==""){$total=0;$total1=0;}
					if ($reportunit == "GHG Tonnes"){
						$total=$total/1000;
						}
					$total=number_format($total,1);
					echo('<td class="body number meter">'.$total.'</td> ');
					}
					echo('<td class="body percentage meter"   > </td> ');
					
					
								
					
					?>
					</tr>
					<?php
	 			}
			} 
		}
// end of meters
		}
		}
		?>
		<tr>
		<?php
			echo('<td class="minor-bottom left-title">Total Scope '.$table.'</td> ');
			for($division=0;$division<=count($div)-1;$division++){
				$comparative=comparativedivision($p, $div[$division]['id'] , $year);
				if($comparative==0){$comparative=1;}
				$total=co2perscopeperyear($div[$division]['id'],$year,$table,$p)/$comparative;
				$total1=co2perscopeperyear($div[$division]['id'],$year,$table,$p);
				$co2div = co2perdivpery($div[$division]['id'],$year,$p);
				if ($reportunit == "GHG Tonnes"){
					$total=$total/1000;
					$total1=$total1/1000;
					$co2div =$co2div/1000;}
					$total=number_format($total,1);
				echo('<td class="body number minor-bottom">'.$total.'</td> ');
				if ($co2div ==0){$total1=0;} else{$total1=($total1/$co2div)*100;}
				$total1=number_format($total1,0);
				echo('<td class="body percentage minor-bottom">'.$total1.'%</td> ');
			}
			$total=co2perscpery($p,$table,$year)/comparativecompany($p,$year);
			$total1=co2perscpery($usercompany,$table,$year,$p);
			if($total==""){$total=0;$total1=0;}; 
			$co2cia=co2percia($usercompany,$year,$p);
			if ($reportunit == "GHG Tonnes"){
					$total=$total/1000;
					$total1=$total1/1000;
					$co2cia=$co2cia/1000;}
					$total=number_format($total,1); 
			echo('<td class="body number minor-bottom">'.$total.'</td> ');
			if ($co2cia==0){
				$total1=0;}
			else{$total1=$total1/$co2cia*100;}
			$total1=number_format($total1,0);
			echo('<td class="body percentage minor-bottom">'.$total1.'%</td> ');
			?>
   		</tr>
		<?php
		
		?>
  		<tr>
		<?php
		echo('<td class="left-title bottom-title">Total All Scopes</td> ');
		for($division=0;$division<=count($div)-1;$division++){
			$comparative=comparativedivision($p, $div[$division]['id'] , $year);
			if($comparative==0){$comparative=1;}
			$co2div= co2perdivpery($div[$division]['id'],$year,$p)/$comparative;
			if ($reportunit == "GHG Tonnes"){
					$co2div=$co2div/1000;}
				$total=number_format($co2div,1);
			echo('<td class="bottom-title body number">'. $total .'</td> ');
			echo('<td class="bottom-title body percentage"></td> ');
		}
		$co2cia=co2percia($p,$year)/comparativecompany($p,$year);
		if ($reportunit == "GHG Tonnes"){
					$co2cia=$co2cia/1000;}
			$co2cia=number_format($co2cia,1);
		echo('<td class="bottom-title body number">'.$co2cia.'</td> ');
		echo('<td class="bottom-title body percentage"></td> ');
				?>
 		</tr>
 </Table>
 </div>
 <?php 
}
} 


?>