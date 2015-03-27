<div id= "line1" style="width:100%; margin-top: 5%">

  <div id="Text" style="float:left; width:20%">
    <font color="green">Enter the Data for the emmission<br></font>
    <font color="green" style="float:left">sources you are tracking</font>
    <img src="img/help.png" style="width:6%; margin-left:0.5%">
  </div>

  <div id="measureBU" style="margin-left:2%;float:left">
 1. <select id="measureBusUnits" class="required busUnits" name="measureBusUnits">
     <option value="0" selected="selected">N/A</option>
  </select>
 </div>
 <img src="img/help.png" style="width:1.3%;float:left;margin-top:0.3%; cursor: pointer;" title = "Select a unit you wish to measure">

 <div id="measureSc" style="margin-left:5% ;float:left">
 2. <select id="measureScope" class="required mScope" name="measureScope">
     <option value="0" selected="selected">N/A</option>
  </select>
</div>
  <img src="img/help.png" style="width:1.3%;float:left;margin-top:0.3%; cursor: pointer;" title = "Select a unit you wish to measure">

<div id="measureYear" style="margin-left:5% ;float:left">
3.<?php
    echo "<select>";
    for($i=2000; $i<=2025; $i=$i+1)
      echo "<option value=". $i .">" . $i . "</option>";
    echo "</select>"; 
    ?>
</div>
<img src="img/help.png" style="width:1.3%;float:left;margin-top:0.3%; cursor: pointer;" title = "Select a unit you wish to measure">
</div>

<HR WIDTH="100%" height="1%">
<br>

  <div id="Line3" style="margin-left:10%; width:80%; margin-top: 5%">
    <font color="green" style="float:left"><b>SCOPE 1 Stationary - Natural Gas</b></font>
    <img src="img/help.png" style="width:1.5%; margin-left:0.5%">
     <font color="green" style="float:right; margin-right:3%"><b>Units: GJs</b></font>
    <br>
   <div class="table table-bordered" style="background:#F2F2F2">
	  <table class="table table-bordered"style="width:96.5%;  margin-top:2%">
	   	<thread>
	   	<tr>
	   	<th style="background:#E6E6E6">Date</th>
	   	<th style="background:#E6E6E6">Description</th>
	   	<th style="background:#E6E6E6">Consumption</th>
	   	<th style="background:#E6E6E6">Cost<br>($)</th>
	   	<th style="background:#E6E6E6">Energy<br>(GJoules)</th>
	   	<th style="background:#E6E6E6">CO2e Emmission<br>(kgs)</th>
	   	</tr>
	   		</thread>
	   	 <tbody>
	        <tr>
	            <td><div contenteditable></div></td>
	            <td><div contenteditable></div></td>
	            <td><div contenteditable></div></td>
	            <td><div contenteditable></div></td>
	           <td style="background:#D3D3D3"><div></div></td>
	            <td style="background:#D3D3D3"><div></div></td>
	        </tr>
	        <tr>
	            <td><div contenteditable></div></td>
	            <td><div contenteditable></div></td>
	            <td><div contenteditable></div></td>
	            <td><div contenteditable></div></td>
	      		 <td style="background:#D3D3D3"><div></div></td>
	            <td style="background:#D3D3D3"><div></div></td>
	        </tr>
	        <tr>
	             <td><div contenteditable></div></td>
	            <td><div contenteditable></div></td>
	            <td><div contenteditable></div></td>
	            <td><div contenteditable></div></td>
	          <td style="background:#D3D3D3"><div></div></td>
	            <td style="background:#D3D3D3"><div></div></td>
	        </tr>
	
	    </tbody>
	   
	  </table>
</div>
  </div>
  <div class = "form-controls left" style="margin-top:20px">
          
            
            
            <button type="button" id="MeasureSave" class="btn btn-primary" style="width:100px; margin-right:2%"> Save </button>
              <button type="button" id="MeasureImport" class="btn btn-primary" style="width:100px; margin-right:0%"> Import </button>
              <button type="button" id="MeasureDelete" class="btn btn-primary" style="width:100px; margin-right:0%"> Delete </button>
              <button type="button" id="MeasureRecalculate" class="btn btn-primary" style="width:100px; margin-right:0%"> Recalculate </button>
      </div>
