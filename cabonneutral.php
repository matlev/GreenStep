
    <p>
        <div id ="calc5" style="margin-left:1%;float:left; width:40%">
            <font color="#AFD464" style="margin-right:31px">Calculate the cost of
            <img src="img/help.png" style="width:3.8%"></font>
            1. <select style="margin-left:0.5%" id="offsetorg2">
            <option>Select organization level</option>
           <!--  <option>All</option>
            <option>Seattle</option>
            <option>Vancouver</option> -->
            </select>
            <img src="img/help.png" style="width:3.8%">
        </div>

        <div id ="calc6" style="margin-left:9.3%;float:left; width: 10%">
           3. <select id= "getYear2" onchange="changeYr();calcEmission()">
                <option>Year</option>
            <?php
            for($i=2000; $i<=2015; $i=$i+1)
                echo "<option value=". $i .">" . $i . "</option>"; 
            ?>
            </select>
            <img src="img/help.png" class="image" style="width:13%">
        </div>

        <div id="calctable" style="width:90%">
        <table style="width:30%; float:right">
            <tr>
                <td><center>Calculated emissions</center></td>
                <td><center>Cost to Offset</center></td>
            </tr>
            <tr>
                <td id="CalcEm" style="color:#00B8E6"><center>0.0 Tonnes</center></td>
                <td id= "CostOff" style="color:#00B8E6"><center>$0</center></td>
        </table>
        </div>
<br>
<br>
        <div id ="calc7" style="margin-left:1%;float:left; width:43%">
        <font color="#AFD464" style="margin-right:15px">purchasing carbon offsets</font>
            2. <select style="margin-left:0.5%" class="dd3" id="offsource2" onchange="getScope();calcEmission()">
            <!-- <option value="0">All Sources</option>
            <option value="1">Scope 1 Mobile - Gasoline</option>
            <option value="2">Scope 1 Mobile - Propane</option>
            <option value="3">Scope 1 Mobile - Ethanol</option>
            <option value="4">Scope 1 Mobile - Jet Fuel</option>
            <option value="5">Scope 2 - Purchased Electricity</option>
            <option value="6">Scope 3 - Paper</option>
            <option value="7">Scope 3 - Garbage</option>
            <option value="8">Scope 3 - Air Business Trips</option>
            <option value="9">Scope 3 - Ground Business Trips</option>
            <option value="10">Scope 3 - Employee commuting</option>
            <option value="11">Scope 3 - Contractor Commuting</option>
 -->
            </select>
            <img src="img/help.png" class="image" style="width:3.8%">    
        </div>

        <div id ="calc8" style="float:left; width: 20%">
            4. <select id= "getCost2" onchange="changeCost();calcEmission()">
            <option>Select a carbon cost</option>
            4. <?php
            for($i=5; $i<=50; $i=$i+1)
                echo "<option value=". $i .">" . "$" . $i . "</option>";
            ?>
            </select>
            <img src="img/help.png" class="image" style="width:8%">
        </div>
       <!-- testbox
              <input type = "text" id = "offtest2" class = ""/>
        -->
</p>
    <hr style="margin-top:3%">
    <p>Your organization may wish to become fully carbon neutral by purchasing offsets to counteract all your emissions. The commitement to become carbon neutral can pay off. Carbon neutral companies often are able to increase market share and revenue by attracting environmentally conscious consumers and leveraging government customer segments. Additional benefits can include enhanced customer loyality, staff recruitment and retention, brand value and leadership.</p>
    <p><a href="mailto:info@ecobase.net">Contact us</a> to find out more about how your business can achieve carbon neutrality.</p>

<script>
//     //change selected value on dropdown
//     var getYr;
//     var getCt;
//     var getSp;
// //Get year to match database year
//     function changeYr2(){
//             getYr= document.getElementById("getYear2").value;
//         document.getElementById("getYear2").selectedIndex= getYr;
//         $('#getYear').val(getYr);
//         $('#getYear2').val(getYr);
//         $('#offtest').val(getYr); 
//     }

// //Get cost estimatin from dropdown
//     function changeCost2(){
//         getCt= document.getElementById("getCost2").value;
//         document.getElementById("getCost2").selectedIndex= getCt;
//         $('#getCost').val(getCt);
//         $('#getCost2').val(getCt);
//         $('#offtest').val(getCt); 
//     }

// //Get scope 
//     function getScope(){

//     }
</script>