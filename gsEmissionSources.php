<?php
include_once('lib/DBCON.php');
connect();

?>
<div id= "line1" style="width:100%; margin-top: 2%">

  <div class="text" id="Text" style="float:left; width:22%">
    <text style="color:green">Set up the emission sources you wish to </text>
    <text style="color:green">track for each business unit</text>
    <img src="img/help.png" style="width:6%;float:right; margin-left:0.5%">
</div>

    <div id="A1" style="margin-left:2%;float:left">
   1. <select>
       <option>Project 1</option>
        <option>Project 2</option>
    </select>
   </div>
 <img src="img/help.png" style="width:1.3%;float:left;margin-top:0.3%;margin-left:1%; cursor: pointer;" title = "Select a unit you wish to measure">

   <div id="A2" style="margin-left:5% ;float:left">
   2. <select id="scope" name="scope">
       <option value="1" selected="selected">Scope 1-Direct Emission</option>
        <option value="2">Scope 2-Inderect Emission</option>
        <option value="3">Scope 3-Inderect Emission</option>
    </select>
  </div>
  <img src="img/help.png" style="width:1.3%;float:left;margin-top:0.3%;margin-left:1%; cursor: pointer;" title = "Select a unit you wish to measure">


</div>

<br>

<HR WIDTH="100%" height="1%" > 

<br>


<!--~~~~~~~~~~~~~~~~~~~SCOPE 1~~~~~~~~~~~~~~~~~~~-->

<div id="Scope1" style="display:none;">&nbsp; 

   <div id=" Stationary" style="float:left; width:50%">
                
        <div id="text1" style="width:40%; float: left">
                <font size="4" color="green" style="float:left"><u><b> Scope 1 - Stationary</b></u></font>
                <img src="img/help.png" style="width:7%;float:left;margin-top:2%;margin-left:1%; cursor: pointer;" title = "Select a unit you wish to measure">
                <br>
                <br>
                <font size="3">Natural Gas</font> 
                <br>
                <br>
                <font size="3">Propane</font>
                <br>
                <br>
                <font size="3">Light Fuel Oil</font>
                <br>
                <br>
                <font size="3">Diesel</font>
                <br>
                <br>
                <font size="3">Kerosene</font>
                <br>
                <br>
                <br>
                <br size="3">User Defined</font>
        </div>
       <div id="box"  style="width:25%; float:left">
       <br>
       
       <text>Single</text><text style="margin-left:7%">Multiple</text>
       <br>
       <input class="radioBtn" type="radio" data-target-id="single" name="option1" data-target-value="multy1" style="margin-left:10%">
       <input class="radioBtn" type="radio" data-target-id="multy" name="option1" data-target-value="multy1" style="margin-left:30%">
       <text id = "addedit" class="my-div me_1" data-target="multy1"style="color:blue;display:none;">add/edit</text>
       <br>
       <br>
      <input class="radioBtn" type="radio" data-target-id="single" name="option2" data-target-value="multy2" style="margin-left:10%">
      <input class="radioBtn" type="radio" data-target-id="multy" name="option2" data-target-value="multy2" style="margin-left:30%">
      <text id = "addedit" class="my-div me_2" data-target="multy2"style="color:blue;display:none;">add/edit</text>       
      <br>
       <br>
      <input class="radioBtn" type="radio" data-target-id="single" name="option3" data-target-value="multy3" style="margin-left:10%">
      <input class="radioBtn" type="radio" data-target-id="multy" name="option3" data-target-value="multy3" style="margin-left:30%">
      <text id = "addedit" class="my-div me_3" data-target="multy3"style="color:blue;display:none;">add/edit</text>       
      <br>
       <br>
      <input class="radioBtn" type="radio" data-target-id="single" name="option4" data-target-value="multy4" style="margin-left:10%">
      <input class="radioBtn" type="radio" data-target-id="multy" name="option4" data-target-value="multy4" style="margin-left:30%">
      <text id = "addedit" class="my-div me_4" data-target="multy4"style="color:blue;display:none;">add/edit</text>       
      <br>
       <br>
      <input class="radioBtn" type="radio" data-target-id="single" name="option5" data-target-value="multy5" style="margin-left:10%">
      <input class="radioBtn" type="radio" data-target-id="multy" name="option5" data-target-value="multy5" style="margin-left:30%">
      <text id = "addedit" class="my-div me_5" data-target="multy5"style="color:blue;display:none;">add/edit</text>
       <br>
       <br>
       <br>
       <br>
       <input type="checkbox" id="option61" value="option61" style="margin-left:10%">
       <br>
       <br>         
       </div>

       <div id="select"  style="width:29%; float:left">
       <br>
       <br>
       <select id="Unit1" name="Unit1">
               <option value="1" selected="selected">GJs</option>
                <option value="2">Cubic Meters</option>
                <option value="3">Cubic Feet</option>
                <option value="4">MMBTUs</option>
                <option value="5">Litres</option>
                <option value="6">Gallons</option>
       </select>   
       <br>
       <br>
       <select id="Unit2" name="Unit2">
               <option value="1" selected="selected">GJs</option>
                <option value="2">Cubic Meters</option>
                <option value="3">Cubic Feet</option>
                <option value="4">MMBTUs</option>
                <option value="5">Litres</option>
                <option value="6">Gallons</option>
       </select>   
       <br>
       <br>
       <select id="Unit3" name="Unit3">
               <option value="1" selected="selected">Litres</option>
                <option value="2">Gallons</option>
       </select>   
       <br>
       <br>
        <select id="Unit4" name="Unit4">
               <option value="1" selected="selected">Litres</option>
                <option value="2">Gallons</option>
       </select> 
       <br>
       <br>
        <select id="Unit5" name="Unit5">
               <option value="1" selected="selected">Litres</option>
                <option value="2">Gallons</option>
       </select> 
          
       </div>


  </div>

  <div id=" Mobile" style="float:left; width:50%">
                
        <div id="text1" style="width:40%; float: left">
                <font size="4" color="green" style="float:left"><u><b> Scope 1 - Mobile</b></u></font>
                <img src="img/help.png" style="width:7%;float:left;margin-top:2%;margin-left:1%; cursor: pointer;" title = "Select a unit you wish to measure">
                <br>
                <br>
                <font size="3">Gasoline</font> 
                <br>
                <br>
                <font size="3">Diesel</font>
                <br>
                <br>
                <font size="3">Propane</font>
                <br>
                <br>
                <font size="3">Ethanol</font>
                <br>
                <br>
                <font size="3">Jet Fuel</font>
                <br>
                <br>
                <br size="3">User Defined 2</font>
        </div>
       <div id="box"  style="width:25%; float:left">
       <br>
       
       <text>Single</text><text style="margin-left:7%">Multiple</text>
       <br>
       <input class="radioBtn" type="radio" data-target-id="single" name="option6" data-target-value="multy6" style="margin-left:10%">
      <input class="radioBtn" type="radio" data-target-id="multy" name="option6" data-target-value="multy6" style="margin-left:30%">
      <text id = "addedit" class="my-div me_6" data-target="multy6"style="color:blue;display:none;">add/edit</text>
       <br>
       <br>
      <input class="radioBtn" type="radio" data-target-id="single" name="option7" data-target-value="multy7" style="margin-left:10%">
      <input class="radioBtn" type="radio" data-target-id="multy" name="option7" data-target-value="multy7" style="margin-left:30%">
      <text id = "addedit" class="my-div me_7" data-target="multy7"style="color:blue;display:none;">add/edit</text>       
      <br>
       <br>
       <input class="radioBtn" type="radio" data-target-id="single" name="option8" data-target-value="multy8" style="margin-left:10%">
      <input class="radioBtn" type="radio" data-target-id="multy" name="option8" data-target-value="multy8" style="margin-left:30%">
      <text id = "addedit" class="my-div me_8" data-target="multy8"style="color:blue;display:none;">add/edit</text>
       <br>
       <br>
       <input class="radioBtn" type="radio" data-target-id="single" name="option9" data-target-value="multy9" style="margin-left:10%">
      <input class="radioBtn" type="radio" data-target-id="multy" name="option9" data-target-value="multy9" style="margin-left:30%">
      <text id = "addedit" class="my-div me_9" data-target="multy5"style="color:blue;display:none;">add/edit</text>
       <br>
       <br>
       <input class="radioBtn" type="radio" data-target-id="single" name="option5" data-target-value="multy10" style="margin-left:10%">
      <input class="radioBtn" type="radio" data-target-id="multy" name="option5" data-target-value="multy10" style="margin-left:30%">
      <text id = "addedit" class="my-div me_10" data-target="multy10"style="color:blue;display:none;">add/edit</text>
       <br>
       <br>
       <br>
       <input type="checkbox" id="option63" value="option61" style="margin-left:10%">
       <br>
       <br>        
       </div>

       <div id="select"  style="width:29%; float:left">
       <br>
       <br>
      <select id="Volume1" name="Volume1">
               <option value="1" selected="selected">Litres</option>
                <option value="2">Gallons</option>
       </select>   
       <br>
       <br>
       <select id="Volume2" name="Volume2">
               <option value="1" selected="selected">Litres</option>
                <option value="2">Gallons</option>
       </select>   
       <br>
       <br>
       <select id="Volume3" name="Volume3">
               <option value="1" selected="selected">Litres</option>
                <option value="2">Gallons</option>
       </select>   
       <br>
       <br>
        <select id="Volume4" name="Volume4">
               <option value="1" selected="selected">Litres</option>
                <option value="2">Gallons</option>
       </select> 
       <br>
       <br>
        <select id="Volume5" name="Volume5">
               <option value="1" selected="selected">Litres</option>
                <option value="2">Gallons</option>
       </select> 
          
       </div>

  </div>

  <div id = "scope1MultiAddEditTable"></div>

</div>
<script>
$(function () {
  $('#addedit').on('click', function () {

    /* Make an AJAX call to the server to grab the proper data and populate the add/edit table
      data[0] = "thename";

      var response = parseAction("gsEmissionSources", "pull", data, $(this).id);
      //reponse should be an object list

    */

    var html = "<table id='scrolltable' class='editabletable'>" +
    "<thead>" +
      "<tr>" +
        "<th><div style='width:50px'>Meter</div></th>" +
          "<th><div style='width:300px'>Name or Description</div></th>" +
      "</tr>" +
    "</thead>" +
    "<tbody>" +
        "<tr>" +
          "<td><div style='width:50px'>1</div></td>" +
          "<td><div contenteditable style='width:300px'></div></td>" +
        "</tr>" +
        "<tr>" +
          "<td>2</td>" +
          "<td><div contenteditable></div></td>" +
        "</tr>" +
        "<tr>" +
          "<td>3</td>" +
          "<td><div contenteditable></div></td>" +
        "</tr>" +
        "<tr>" +
          "<td>4</td>" +
          "<td><div contenteditable></div></td>" +
        "</tr>" +
        "<tr>" +
          "<td>5</td>" +
          "<td><div contenteditable></div></td>" +
        "</tr>" +
        "<tr>" +
          "<td>6</td>" +
          "<td><div contenteditable></div></td>" +
        "</tr>" +
        "<tr>" +
          "<td>7</td>" +
          "<td><div contenteditable></div></td>" +
        "</tr>" +
        "<tr>" +
          "<td>8</td>" +
          "<td><div contenteditable></div></td>" +
        "</tr>" +
        "<tr>" +
          "<td>9</td>" +
          "<td><div contenteditable></div></td>" +
        "</tr>" +
        "<tr>" +
          "<td>10</td>" +
          "<td><div contenteditable></div></td>" +
        "</tr>" +
      "</tbody>" +
  "</table>";

    $('#scope1MultiAddEditTable').empty().append(html);
  });
}); 
</script>

<!--~~~~~~~~~~~~~~~~~~~SCOPE 2~~~~~~~~~~~~~~~~~~~-->

<div id="Scope2" style="display:none;">&nbsp; 
 <div id=" Stationary" style="float:left; width:100%">
                
        <div id="text1" style="width:40%; float: left">
                <font size="4" color="green" style="float:left"><u><b> Scope 2</b></u></font>
                <img src="img/help.png" style="width:3%;float:left;margin-top:1%;margin-left:1%; cursor: pointer;" title = "Select a unit you wish to measure">
                <br>
                <br>
                <font size="3">Purchased Electricity from Utility</font> 
                <br>
                <br>
                <font size="3">Purchased Green Electricity form Utility</font>
                <br>
                <br>
                <font size="3">Purchased Steam from Conventional Boiler Plant</font>
                <br>
                <br>
                <font size="3">Purchased Heat from Conventional Boiler Plant</font>
                <br>
                <br>
                <font size="3">Purchased Cooling from Conventional Boiler PLant</font>
                <br>
                <br>
                <br>
                <font size="3">User Defined</font><input type="checkbox" id="Defined" value="Defined" style="margin-left:10%">

                
        </div>
       <div id="box"  style="width:25%; float:left">
      <font size="3" style="margin-left:5%">Single Meter</font><font size="3" style="margin-left:10%">Mutiple Meters</font>

       <br>
       <br>
       <input class="radioBtn" type="radio" data-target-id="single" name="option11" data-target-value="multy11" style="margin-left:20%">
      <input class="radioBtn" type="radio" data-target-id="multy" name="option11" data-target-value="multy11" style="margin-left:37%">
      <text class="my-div me_11" data-target="multy11"style="color:blue;display:none;">add/edit</text>
       <br>
       <br>
       <input class="radioBtn" type="radio" data-target-id="single" name="option12" data-target-value="multy12" style="margin-left:20%">
      <input class="radioBtn" type="radio" data-target-id="multy" name="option12" data-target-value="multy12" style="margin-left:37%">
      <text class="my-div me_12" data-target="multy12"style="color:blue;display:none;">add/edit</text>
       <br>
       <br>
       <input class="radioBtn" type="radio" data-target-id="single" name="option13" data-target-value="multy13" style="margin-left:20%">
      <input class="radioBtn" type="radio" data-target-id="multy" name="option13" data-target-value="multy13" style="margin-left:37%">
      <text class="my-div me_13" data-target="multy13"style="color:blue;display:none;">add/edit</text>
       <br>
       <br>
       <input class="radioBtn" type="radio" data-target-id="single" name="option14" data-target-value="multy14" style="margin-left:20%">
      <input class="radioBtn" type="radio" data-target-id="multy" name="option14" data-target-value="multy14" style="margin-left:37%">
      <text class="my-div me_14" data-target="multy14"style="color:blue;display:none;">add/edit</text>
       <br>
       <br>
       <input class="radioBtn" type="radio" data-target-id="single" name="option15" data-target-value="multy15" style="margin-left:20%">
      <input class="radioBtn" type="radio" data-target-id="multy" name="option15" data-target-value="multy15" style="margin-left:37%">
      <text class="my-div me_15" data-target="multy15"style="color:blue;display:none;">add/edit</text>
       <br>
       <br>
       <br>
       <br>

       </div>

       <div id="select"  style="width:29%; float:left">
       <br>
       <br>
       <select id="Unit1" name="Unit1">
               <option value="1" selected="selected">KWhs</option>
                <option value="2">GJs</option>
       </select>   
       <br>
       <br>
       <select id="Unit2" name="Unit2">
              <option value="1" selected="selected">KWhs</option>
                <option value="2">GJs</option>
       </select>   
       <br>
       <br>
       <select id="Unit3" name="Unit3">
               <option value="1" selected="selected">MMBTUs</option>
                <option value="2">GJs</option>
       </select>   
       <br>
       <br>
        <select id="Unit4" name="Unit4">
               <option value="1" selected="selected">MMBTUs</option>
                <option value="2">GJs</option>
       </select>   
       <br>
       <br>
        <select id="Unit5" name="Unit5">
              <option value="1" selected="selected">MMBTUs</option>
                <option value="2">GJs</option>
       </select>   
          
       </div>

  </div>

</div>

<!--~~~~~~~~~~~~~~~~~~~SCOPE 3~~~~~~~~~~~~~~~~~~~-->

<div id="Scope3" style="display:none;">&nbsp;  <div id=" Stationary" style="float:left; width:100%">
                <font size="4" color="green" style="float:left"><u><b> Scope 3</b></u>
                 </font>
                 <img src="img/help.png" style="width:1.2%;margin-top:0.5%;margin-left:1%; cursor: pointer;" title = "Select a unit you wish to measure">
               
    
                <br>
        <div id="text1" style="width:70%; float: left">
                
                <br>
                <br>

             
                <font size="3">Paper</font> 
                <input type="checkbox" name="option16" value="option11" style="margin-left:10%">
                <select name="measure1" style="margin-left:5%">
               <option value="1" selected="selected">KWhs</option>
                <option value="2">GJs</option>
                 </select>
                 <font size="3"style="margin-left:5%">User Defined #1</font>
                 <input type="checkbox" name="option24" value="option11"style="margin-left:5%">
                <br>
           

                <font size="3">Garbage</font>
                <input type="checkbox" name="option16" value="option11" style="margin-left:7.7%">
                <select name="measure2" style="margin-left:5%">
               <option value="1" selected="selected">KWhs</option>
                <option value="2">GJs</option>
                 </select>
                <br>
               

                
                <font size="3">Recycling</font>
                <input type="checkbox" name="option16" value="option11" style="margin-left:6.8%">
                <select name="measure3" style="margin-left:5%">
               <option value="1" selected="selected">KWhs</option>
                <option value="2">GJs</option>
                 </select>
              
                <br>
                <br>
                <font size="3">Business</font>
                <br>
                <font size="3" style="margin-left:1%">Air</font>
                <input type="checkbox" name="option16" value="option11" style="margin-left:11.8%">
                <select name="measure4" style="margin-left:5%">
               <option value="1" selected="selected">KWhs</option>
                <option value="2">GJs</option>
                 </select>
                 <font size="3"style="margin-left:5%">User Defined #1</font>
                 <input type="checkbox" name="option24" value="option11"style="margin-left:5%">


                <br>
                <font size="3" style="margin-left:1%">Ground</font>
                <input type="checkbox" name="option16" value="option11" style="margin-left:7.6%">
                <select name="measure5" style="margin-left:5%">
               <option value="1" selected="selected">KWhs</option>
                <option value="2">GJs</option>
                 </select>


                <br>
                <br>
                <font size="3">Communiting</font>
                <br>
                <font size="3" style="margin-left:1%">Employees</font>
                <input type="checkbox" name="option16" value="option11" style="margin-left:4.4%">
                <select name="measure6" style="margin-left:5%">
               <option value="1" selected="selected">KWhs</option>
                <option value="2">GJs</option>
                 </select>
                 <font size="3"style="margin-left:5%">User Defined #1</font>
                 <input type="checkbox" name="option24" value="option11"style="margin-left:5%">


                <br>
                <font size="3" style="margin-left:1%">Contractor</font>
                <input type="checkbox" name="option16" value="option11" style="margin-left:4.8%">
                <select name="measure7" style="margin-left:5%">
               <option value="1" selected="selected">KWhs</option>
                <option value="2">GJs</option>
                 </select>
                <br>
                <br>
                <br>
                <br>
                <font size="3">Water</font> <input type="checkbox" name="option24" value="option11"style="margin-left:9.5%">
                <select  name="measure8" style="margin-left:5%">
               <option value="1" selected="selected">KWhs</option>
                <option value="2">GJs</option>
                 </select>


      
  </div>
  

  </div>

</div>

<button style=" margin-top: 10%;float:right;" type="button" id="myButton" class="btn btn-primary"> Save </button> 

<script>
  $(document).ready( function() {
  $('#scope').bind('change', function (e) { 
         if($('#scope').val()=='1') {
              $('#Scope2').hide();
               $('#Scope3').hide();
              $('#Scope1').show();
          } 

   else if($('#scope').val()=='2') {
        $('#Scope1').hide();
         $('#Scope3').hide();
        $('#Scope2').show();
    }

    else  if($('#scope').val()=='3') {
        $('#Scope2').hide();
         $('#Scope1').hide();
        $('#Scope3').show();
    }
}).trigger('change');

});

$(document).ready(function(){
     $('.radioBtn').click(function(){
         
         var target = $(this).data('target-value');
        if($(this).data('target-id')=='multy')
          $('.my-div[data-target="'+target+'"]').show();
        else  $('.my-div[data-target="'+target+'"]').hide();
          
     }); 

}); 

//~~~~~~~~~~jquery for clicking add/edit


//~~~~~~~~~~table when add/edit is clicked
//-----for editable rows
function init()
{
  var tables = document.getElementsByClassName("editabletable");
  var i;
  for (i = 0; i < tables.length; i++)
  {
    makeTableEditable(tables[i]);
  }
}

function makeTableEditable(table)
{
  var rows = table.rows;
  var r;
  for (r = 0; r < rows.length; r++)
  {
    var cols = rows[r].cells;
    var c;
    for (c = 0; c < cols.length; c++)
    {
      var cell = cols[c];
      var listener = makeEditListener(table, r, c);
      cell.addEventListener("input", listener, false);
    }
  }
}

function makeEditListener(table, row, col)
{
  return function(event)
  {
    var cell = getCellElement(table, row, col);
    var text = cell.innerHTML.replace(/<br>$/, '');
    var items = split(text);

    if (items.length === 1)
    {
      // Text is a single element, so do nothing.
      // Without this each keypress resets the focus.
      return;
    }

    var i;
    var r = row;
    var c = col;
    for (i = 0; i < items.length && r < table.rows.length; i++)
    {
      cell = getCellElement(table, r, c);
      cell.innerHTML = items[i]; // doesn't escape HTML

      c++;
      if (c === table.rows[r].cells.length)
      {
        r++;
        c = 0;
      }
    }
    cell.focus();
  };
}

function getCellElement(table, row, col)
{
  // assume each cell contains a div with the text
  return table.rows[row].cells[col].firstChild;
}

function split(str)
{
  // use comma and whitespace as delimiters
  return str.split(/,|\s|<br>/);
}

init();

//-----for scrollable table
//change the selector if needed
var $table = $('table'),
  $bodyCells = $table.find('tbody tr:first').children(),
  colWidth;
//get the tbody columns width array
colWidth = $bodyCells.map(function(){
  return $(this).width();
}).get();
//set the width of thread columns
$table.find('thread tr').children().each(function(i,v){
  $(v).width(colWidth[i]);
});

</script>

