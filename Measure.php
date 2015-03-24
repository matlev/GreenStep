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

 <div id="A2" style="margin-left:5% ;float:left">
 2. <select>
     <option>Scope 1 Stationnary - Natural Gas</option>
      <option>Scope 1 Stationnary - Natural Gas</option>
      <option>Scope 1 Stationnary - Natural Gas</option>
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
    <font color="green" style="float:right; margin-top:4%"><b>Units: GJs</b></font>
    <table class="table table-striped table-bordered table-condensed" style="margin-top: 5%">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Language</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Some</td>
          <td>One</td>
          <td>English</td>
        </tr>
        <tr>
          <td>2</td>
          <td>Joe</td>
          <td>Sixpack</td>
          <td>English</td>
        </tr>
      </tbody>
    </table>
  </div>
