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
 2. <select id="measureScope" class="required scope" name="measureScope">
     <option value="0" selected="selected">N/A</option>
  </select>
</div>	
<img src="img/help.png" style="width:1.3%;float:left;margin-top:0.3%; cursor: pointer;" title = "Select a unit you wish to measure">

<div id="measureSelectYear" style="margin-left:5% ;float:left">
3.<?php
    $html = "<select id='measureYear'>";
    for($i=2000; $i<=2014; $i=$i+1) {
      $html .= "<option value=". $i .">" . $i . "</option>";
    }
    $html .= "<option value=2015 selected='selected'>" . 2015 . "</option>";
    $html .= "</select>"; 
    echo $html;
    ?>
</div>
<img src="img/help.png" style="width:1.3%;float:left;margin-top:0.3%; cursor: pointer;" title = "Select a unit you wish to measure">
</div>
<br>
<div id="measureMt" style="margin-left:18.6%; margin-top: 5px; float:left"> 
  <select id="measureMeter" class="required meter" name="measureMeter">
    <option value="0" selected="selected">N/A</option>
  </select>
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
	   	 <tbody id="tablebody">
	       
	
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

<script>
    $(document).ready(function () 
    {

		$('#measureYear').on('change', function()
		{
			
                        var data ="bUnit="+$('#measureBusUnits').val() + "&scope="+$('#measureScope').val() + "&date="+$('#measureYear').val(); // Sets data as a key: value object list of all the form elements
                        var page = 'measure';
                        var action = 'pull';
                   

                        parseAction(page, action, data)
                        .success(function(result)
                        {
                        	console.log(result);
                            //var unit = result.data.unit;
                            var date = result.data.date;
                            var description = result.data.desciption;
                            var consumption = result.data.consumption;
                            var cost = result.data.cost;
                            var energy = result.data.energy;
                            var emmission = result.data.emmission;
                            var measureHTML;

                            var length = date.length;
                            for(i = 0; i < length; i++)
                            {

                                measureHTML+=  "<tr id='measureRow"+i+"'>"+
                                                   "<td id='measureDate"+i+"'><div contenteditable>"+date[i]+"</div></td>"+
                                                   "<td id='measureDiscrition"+i+"'><div contenteditable>"+description[i]+"</div></td>"+
                                                   "<td id='measureConsumption"+i+"'><div contenteditable>"+consumption[i]+"</div></td>"+
                                                   "<td id='measureCost"+i+"'><div contenteditable>"+cost[i]+"</div></td>"+
                                                   "<td id='measureEnergy"+i+"' style='background:#D3D3D3'><div contenteditable>"+energy[i]+"</div></td>"+
                                                   "<td id='measureEmmission"+i+"' style='background:#D3D3D3'><div contenteditable>"+emmission[i]+"</div></td>"+
                                                   "</tr>";
                                    
                                    
                            }
                            $('#tablebody').empty().html(measureHTML);
        
                        });
		});
	
	});
</script>
