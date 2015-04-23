
 <p>
        <div id ="calc1" style="margin-left:1%;float:left; width:33.7%">
            <font color="#AFD464" style="margin-right:31px">Calculate the cost of
            <img src="img/help.png" style="width:3.8%"></font>
            1. <select style="margin-left:0.5%" id="offsetorg">
            <option>Select organization level</option>
            </select>
            <img src="img/help.png" style="width:3.8%">
        </div>

        <div id ="calc2" style="margin-left:9.3%;float:left; width: 10%">
           3.  <select id= "getYear" onchange="changeYr();calcEmission();">
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
                <td>Calculated emissions</td>
                <td>Cost to Offset</td>
            </tr>
            <tr>
                <td id="CalcEm2" style="color:#00B8E6" text-align="center">0.00 Tonnes</td> <!-- <b><center>0.0 Tonnes</center></b> -->
                <td id= "CostOff2" style="color:#00B8E6; bold" text-align="center" font-weight: bold;>$ 0.00</td><!--$0-->
        </table>
        </div>
<br>
<br>
        <div id ="calc3" style="margin-left:1%;float:left; width:43%">
        <font color="#AFD464" style="margin-right:15px">purchasing carbon offsets</font>
            2. <select style="margin-left:0.5%" class="dd3" id="offsource" onchange="getScope();calcEmission();">
          <!--   <option value="0">All Sources</option>
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
            <option value="11">Scope 3 - Contractor Commuting</option> -->

            </select>
            <img src="img/help.png" class="image" style="width:3.8%">    
        </div>

        <div id ="calc4" style="float:left; width: 20%">
            4. <select id= "getCost" onchange="changeCost();calcEmission();">
            <option>Select a carbon cost</option>
            4. <?php
            for($i=5; $i<=50; $i=$i+1)
                echo "<option value=". $i .">" . "$" . $i . "</option>";
            ?>
            </select>
            <img src="img/help.png" class="image" style="width:8%">
        </div>

<!-- Testing box 
       <input type = "text" id = "offtest" class = ""/>
-->

</p>
    <hr style="margin-top:3%">
    <p>A carbon offset is an emissions reduction credit you can purchase to compensate for greenhouse gas emissions. One tonne of carbon offset equals one tonne of greenhouse gases reduced from high-quality projects like energy efficiency programs or fuel switching systems. For example, an energy efficiency carbon reduction project can be used to balance your emissions from another source, such as a plane trip. The bottom line is that your organization can buy offsets to counteract greenhouse gases that it cannot avoid emitting.</p>
    <p>Once you've calculated the cost to offset your organization's greennhouse gas emissions, <a href="mailto:info@ecobase.net"> contact us</a> to find out more about purchasing carbon offsets.</p>
    
 <script>
//     //change selected value on dropdown
//     var getYr= null;
//     var getCt= null;
//     var getScope= null;
//     var getNme= null;
// //Get year to match database year
//     function changeYr(){
//             getYr= document.getElementById("getYear").value;
//         document.getElementById("getYear").selectedIndex= getYr;
//         $('#getYear').val(getYr);
//         $('#getYear2').val(getYr);
//         $('#offtest').val(getYr); 
//     }

// //Get cost estimatin from dropdown
//     function changeCost(){
//         getCt= document.getElementById("getCost").value;
//         document.getElementById("getCost").selectedIndex= getCt;
//         $('#getCost').val(getCt);
//         $('#getCost2').val(getCt);
//         $('#offtest').val(getCt); 
//         $('#CalcEm').val(getCt);
//     }

// //Get scope 
//     function calcEmission(){
//         var data ="bUnit="+$('#offsetorg').val() + "&scope="+$('#offsource').val() + "&date="+$('#getYear').val(); // Sets data as a key: value object list of all the form elements
//                         var page = 'measure';
//                         var action = 'pull';

//             parseAction(page, action, data)
//             .success(function(result)
//                 {
//                     console.log(result);
//                     var description = result.data.description;
//                     var consumption = result.data.consumption;
//                     var length = Object.keys(result.data.description).length;
//                     var total= 0;

//                 for (i =0; i < length; i++)
//                 {
//                     //summing emission total
//                     total += parseInt(consumption[i]);
//                 }
                
//                 //pull total emissions
//                 $('#CalcEm').html(total+ " GJ");
//                 //calculate cost
//                getCt= document.getElementById("getCost").value;
//                 var EstCost= total*getCt;
//                 $('#offtest').val(EstCost);
//                 $('#CostOff').html("$ "+EstCost);
//                 })
//              .fail(function(){
//                             console.log("Error handling request 'pull' in tab '" + tabID + "'' called by element " + $(this).attr('id'));
//                         });
//     }

</script>