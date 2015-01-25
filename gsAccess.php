<div id= "line1" style="width:100%; margin-top: 2%">

  <div class="text" id="Text" style="float:left; width:22%">
    <text style="color:green">Set up the authorization </text>
    <text style="color:green">levels for each business unit</text>
    <img src="img/help.png" style="width:6%;float:right; margin-left:0.5%"></img>
</div>

    <div id="A1" style="margin-left:2%;float:left; width:10%">
   1. <select style="width:80%"> 
       <option>City 1</option>
        <option>City 2</option>
    </select>
   </div>
  <img src="img/help.png" style="width:1.3%;float:left;margin-top:0.3%;margin-left:1%; cursor: pointer;" title = "Select a unit you wish to measure"></img>

   <div  id="A2" style="margin-left:5% ;float:left; width:20%">
   2. <button style="width:90%; margin-left 2%">Create a new user class</button>
   or
      <select id="scope" name="scope" style="width:80%">
       <option value="1" selected="selected">User 1</option>
        <option value="2">User 2</option>
        <option value="3">User 3</option>  
    </select>
  
  </div>
  <img src="img/help.png" style="width:1.3%;float:left;margin-top:0.3%; cursor: pointer;" title = "Select a unit you wish to measure">


</div>

<br>

<HR WIDTH="100%" height="1%" > 

<br>



<div id="part2" > 

   <div id=" Access Level" style="float:left; width:50%">
                
        <div id="text1" style="width:40%; float: left">
                <font size="4" color="green" style="float:left"><u><b> Access Level</b></u></font>
          <img src="img/help.png" style="width:7%;float:left;margin-top:2%;margin-left:1%; cursor: pointer;" title = "Select a unit you wish to measure"></img>
                <br>
                <br>
                <font size="3">Measure</font> 
                <br>
                <br>
                <font size="3">Report</font>
                <br>
                <br>
                <font size="3">Reduce</font>
                <br>
                <br>
                <font size="3">Offset</font>
               
                
        </div>
       <div id="box"  style="width:25%; float:left">
       <br>
       <br>
       <input type="checkbox" id="option11" value="option11" style="margin-left:5%">
       <br>
       <br>
       <input type="checkbox" id="option21" value="option21" style="margin-left:5%">
       <br>
       <br>
       <input type="checkbox" id="option31" value="option31" style="margin-left:5%">
       <br>
       <br>
       <input type="checkbox" id="option41" value="option41" style="margin-left:5%">
            
       </div>

 </div>
 <div  style="width:60%; float:left; margin-top:3%">
       <br>
                <br>
         <font size="3">Username</font> <input id="newuser"type="text"></input>
                <br>
                <br>
                <font size="3">Password</font> <input id="passwords"type="text"></input>
                 <br>
                 <br>
                <br>
        <text >Provide the URL below to users who have been set up for limited access. it will allow them to log in and use GobiSoft at the selected authorization level.</text>
         <br>
         <br>
         <br>
        <a href="http://www.ecobase.net/ecobase-premium-user-limited-access-login"><text color="blue"> Click Here</text></a>
       </div>
 </div>
 
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
</script>