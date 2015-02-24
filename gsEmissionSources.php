<div class = "top-tooltip" style="margin-top:20px; padding-bottom:16px">    
      	<div id="esBu" style="margin-left:1%;float:left; width: 45.5%">
      		<font color="#AFD464">Set up the emision sources you wish to</font>
      		<img src="img/help.png" style="width:2.8%">
      		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      		1.<select id="esBusUnits" class="required busUnits" name="esBusUnits">
            	<option value="0" selected="selected">N/A</option>
            </select>
            <img src="img/help.png" style="width:2.7%">
      	</div>

      	<div id ="esScope" style="float:left; width: 25%">
      		2.<select id ="scope" name="scope" style="margin-left:0.5%">
      		<option value="1">Scope 1 Stationary - Direct Emission</option>
      		<option value="2">Scope 2 Mobile - Indirect Emission</option>
      		<option value="3">Scope 3 Mobile - Indirect Emission</option>
      		</select>
      		<img src="img/help.png" style="width:5.3%">
      	</div><br>
            <font color="#AFD464" style="margin-left:11px"> track for each business unit</font>
</div>

<form method="POST" id="es-form1" class="clearfix">
      <!--~~~~~~~~~~~~~~~~~~SCOPE 1~~~~~~~~~~~~~~~~~~-->
      <div id="Scope1" style="width:100%">
            <div style="width:50%; float:left">
                  <h4><u>Scope 1 - Stationary</u>
                  <img src="img/help.png" style="width:3%"></h4>
                  <table style="width:95%; float:left">
                        <tr class="spaceUnder">
                              <td></td>
                              <td>&nbsp;&nbsp;Single &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Multiple</td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Natural Gas</td>
                              <td>
                                    <input class="radioBtn" type="radio" data-target-id="single" name="option1" data-target-value="multy1" style="margin-left:10%">
                                    <input class="radioBtn" type="radio" data-target-id="multy" name="option1" data-target-value="multy1" style="margin-left:30%">
                                    <text id = "addedit1" class="my-div me_1" data-target="multy1"style="color:blue;display:none;">add/edit</text>
                              </td>
                              <td>
                                    <select id="Unit1" name="Unit1">
                                          <option value="1" selected="selected">GJs</option>
                                          <option value="2">Cubic Meters</option>
                                          <option value="3">Cubic Feet</option>
                                          <option value="4">MMBTUs</option>
                                          <option value="5">Litres</option>
                                          <option value="6">Gallons</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Propane</td>
                              <td>
                                    <input class="radioBtn" type="radio" data-target-id="single" name="option2" data-target-value="multy2" style="margin-left:10%">
                                    <input class="radioBtn" type="radio" data-target-id="multy" name="option2" data-target-value="multy2" style="margin-left:30%">
                                    <text id = "addedit2" class="my-div me_2" data-target="multy2"style="color:blue;display:none;">add/edit</text> 
                              </td>
                              <td>
                                    <select id="Unit1" name="Unit1">
                                          <option value="1" selected="selected">GJs</option>
                                          <option value="2">Cubic Meters</option>
                                          <option value="3">Cubic Feet</option>
                                          <option value="4">MMBTUs</option>
                                          <option value="5">Litres</option>
                                          <option value="6">Gallons</option>
                                    </select>
                              </td>  
                        </tr>
                        <tr class="spaceUnder">
                              <td>Light Fuel Oil</td>
                              <td>
                                     <input class="radioBtn" type="radio" data-target-id="single" name="option3" data-target-value="multy3" style="margin-left:10%">
                                     <input class="radioBtn" type="radio" data-target-id="multy" name="option3" data-target-value="multy3" style="margin-left:30%">
                                     <text id = "addedit3" class="my-div me_3" data-target="multy3"style="color:blue;display:none;">add/edit</text>       
                              </td>
                              <td>
                                    <select id="Unit3" name="Unit3">
                                          <option value="1" selected="selected">Litres</option>
                                          <option value="2">Gallons</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Diesel</td>
                              <td>
                                    <input class="radioBtn" type="radio" data-target-id="single" name="option4" data-target-value="multy4" style="margin-left:10%">
                                    <input class="radioBtn" type="radio" data-target-id="multy" name="option4" data-target-value="multy4" style="margin-left:30%">
                                    <text id = "addedit4" class="my-div me_4" data-target="multy4"style="color:blue;display:none;">add/edit</text>       
                              </td>
                              <td>
                                    <select id="Unit3" name="Unit3">
                                          <option value="1" selected="selected">Litres</option>
                                          <option value="2">Gallons</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Kerosene</td>
                              <td>
                                    <input class="radioBtn" type="radio" data-target-id="single" name="option5" data-target-value="multy5" style="margin-left:10%">
                                    <input class="radioBtn" type="radio" data-target-id="multy" name="option5" data-target-value="multy5" style="margin-left:30%">
                                    <text id = "addedit5" class="my-div me_5" data-target="multy5"style="color:blue;display:none;">add/edit</text>
                              </td>
                              <td>
                                    <select id="Unit3" name="Unit3">
                                          <option value="1" selected="selected">Litres</option>
                                          <option value="2">Gallons</option>
                                    </select>
                              </td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr class="spaceUnder">
                              <td>User defined 1</td>
                              <td><input type="checkbox" id="option61" value="option61" style="margin-left:10%" name="userchecked"></td>
                        </tr>
                  </table>
                  <div name="showthis" style="min-width:600px; padding-left:15px;">
                        <div style="clear:both; width:100%">
                              <br>
                              <label style="float:left; margin-right:15px; font-weight:normal">Name</label>
                              <input id="userdefined" type="text" name="name" style="float:left"/>
                              <label style="float:left; margin-right:52px; margin-left:16px; font-weight:normal">CO2 Coefficient</label>
                              <input id="userdefined" type="text" name="units" style="float:left"/>
                        </div>
                        <div style="clear:both; width:100%">
                              <label style="float:left; margin-right:20px; font-weight:normal">Units</label>
                              <input id="userdefined" type="text" name="coef" style="float:left"/>
                              <label style="float:left; margin-right:15px; margin-left:15px; font-weight:normal">GJ Conversion Factor</label>
                              <input id="userdefined" type="text" name="conv" style="float:left"/>
                        </div>
                  </div>
                  <br>
                  <div id="scope1MultiAddEditTable"></div>
            </div>

            <div style="width:50%; float:left">
                  <h4 style="float:left"><u>Scope 1 - Mobile</u>
                  <img src="img/help.png" style="width:3%"></h4>
                  <table style="width:95%; float:left">
                        <tr class="spaceUnder">
                              <td></td>
                              <td>&nbsp;&nbsp;Single &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Multiple</td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Gasoline</td>
                              <td>
                                    <input class="radioBtn" type="radio" data-target-id="single" name="option6" data-target-value="multy6" style="margin-left:10%">
                                    <input class="radioBtn" type="radio" data-target-id="multy" name="option6" data-target-value="multy6" style="margin-left:30%">
                                    <text id = "addedit6" class="my-div me_6" data-target="multy6"style="color:blue;display:none;">add/edit</text>
                              </td>
                              <td>
                                    <select id="Volume1" name="Volume1">
                                          <option value="1" selected="selected">Litres</option>
                                          <option value="2">Gallons</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Diesel</td>
                              <td>
                                    <input class="radioBtn" type="radio" data-target-id="single" name="option7" data-target-value="multy7" style="margin-left:10%">
                                    <input class="radioBtn" type="radio" data-target-id="multy" name="option7" data-target-value="multy7" style="margin-left:30%">
                                    <text id = "addedit7" class="my-div me_7" data-target="multy7"style="color:blue;display:none;">add/edit</text>       
                              </td>
                              <td>
                                    <select id="Volume1" name="Volume1">
                                          <option value="1" selected="selected">Litres</option>
                                          <option value="2">Gallons</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Propane</td>
                              <td>
                                    <input class="radioBtn" type="radio" data-target-id="single" name="option8" data-target-value="multy8" style="margin-left:10%">
                                    <input class="radioBtn" type="radio" data-target-id="multy" name="option8" data-target-value="multy8" style="margin-left:30%">
                                    <text id = "addedit8" class="my-div me_8" data-target="multy8"style="color:blue;display:none;">add/edit</text>
                              </td>
                              <td>
                                    <select id="Volume1" name="Volume1">
                                          <option value="1" selected="selected">Litres</option>
                                          <option value="2">Gallons</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Ethanol</td>
                              <td>
                                    <input class="radioBtn" type="radio" data-target-id="single" name="option9" data-target-value="multy9" style="margin-left:10%">
                                    <input class="radioBtn" type="radio" data-target-id="multy" name="option9" data-target-value="multy9" style="margin-left:30%">
                                    <text id = "addedit9" class="my-div me_9" data-target="multy5"style="color:blue;display:none;">add/edit</text>
                              </td>
                              <td>
                                    <select id="Volume1" name="Volume1">
                                          <option value="1" selected="selected">Litres</option>
                                          <option value="2">Gallons</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Jet Fuel</td>
                              <td>
                                    <input class="radioBtn" type="radio" data-target-id="single" name="option10" data-target-value="multy10" style="margin-left:10%">
                                    <input class="radioBtn" type="radio" data-target-id="multy" name="option10" data-target-value="multy10" style="margin-left:30%">
                                    <text id = "addedit10" class="my-div me_10" data-target="multy10"style="color:blue;display:none;">add/edit</text>
                              </td>
                              <td>
                                    <select id="Volume1" name="Volume1">
                                          <option value="1" selected="selected">Litres</option>
                                          <option value="2">Gallons</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Aviation Gasoline</td>
                              <td>
                                    <input class="radioBtn" type="radio" data-target-id="single" name="option11" data-target-value="multy11" style="margin-left:10%">
                                    <input class="radioBtn" type="radio" data-target-id="multy" name="option11" data-target-value="multy11" style="margin-left:30%">
                                    <text id = "addedit11" class="my-div me_11" data-target="multy10"style="color:blue;display:none;">add/edit</text>
                              </td>
                              <td>
                                    <select id="Volume1" name="Volume1">
                                          <option value="1" selected="selected">Litres</option>
                                          <option value="2">Gallons</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>User Defined 2</td>
                              <td><input type="checkbox" id="option63" value="option61" style="margin-left:10%" name="userchecked2"></td>
                        </tr>
                  </table>
                  <div name="showthis2" style="min-width:600px; padding-left:15px">
                        <div style="clear:both; width:100%">
                              <br>
                              <label style="float:left; margin-right:15px; font-weight:normal">Name</label>
                              <input id="userdefined" type="text" name="name" style="float:left"/>
                              <label style="float:left; margin-right:52px; margin-left:16px; font-weight:normal">CO2 Coefficient</label>
                              <input id="userdefined" type="text" name="units" style="float:left"/>
                        </div>
                        <div style="clear:both; width:100%">
                              <label style="float:left; margin-right:20px; font-weight:normal">Units</label>
                              <input id="userdefined" type="text" name="coef" style="float:left"/>
                              <label style="float:left; margin-right:15px; margin-left:15px; font-weight:normal">GJ Conversion Factor</label>
                              <input id="userdefined" type="text" name="conv" style="float:left"/>
                        </div>
                  </div>
                  <br>
                  <div id="scope1MultiAddEditTable"></div>
            </div>
      </div>
</form>

      <!--~~~~~~~~~~~~~~~~~~SCOPE 2~~~~~~~~~~~~~~~~~~-->
<form method="POST" id="es-form2" class="clearfix">
      <div id="Scope2" style="width:100%">
            <div style="float:left">
                  <h4><u>Scope 2</u>
                  <img src="img/help.png" style="width:2.3%"></h4>
                  <table style="width:120%; float:left">
                        <tr class="spaceUnder">
                              <td></td>
                              <td>Single Meter&nbsp;&nbsp;Multiple Meters</td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Purchased Electricity from Utility</td>
                              <td>
                                    <input class="radioBtn" type="radio" data-target-id="single" name="option12" data-target-value="multy12" style="margin-left:10%">
                                    <input class="radioBtn" type="radio" data-target-id="multy" name="option12" data-target-value="multy12" style="margin-left:30%">
                                    <text id = "addedit12" class="my-div me_12" data-target="multy12"style="color:blue;display:none;">add/edit</text>
                              </td>
                              <td>
                                    <select id="scope2_unit1" name="Unit1">
                                          <option value="1" selected="selected">kWhs</option>
                                          <option value="2">GJs</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Purchased Green Electricity from Utility</td>
                              <td>
                                    <input class="radioBtn" type="radio" data-target-id="single" name="option13" data-target-value="multy13" style="margin-left:10%">
                                    <input class="radioBtn" type="radio" data-target-id="multy" name="option13" data-target-value="multy13" style="margin-left:30%">
                                    <text id = "addedit13" class="my-div me_13" data-target="multy13"style="color:blue;display:none;">add/edit</text> 
                              </td>
                              <td>
                                    <select id="scope2_unit2" name="Unit1">
                                          <option value="1" selected="selected">kWhs</option>
                                          <option value="2">GJs</option>
                                    </select>
                              </td>  
                        </tr>
                        <tr class="spaceUnder">
                              <td>Purchased Steam from Conventional Boiler Plant</td>
                              <td>
                                     <input class="radioBtn" type="radio" data-target-id="single" name="option14" data-target-value="multy14" style="margin-left:10%">
                                     <input class="radioBtn" type="radio" data-target-id="multy" name="option14" data-target-value="multy14" style="margin-left:30%">
                                     <text id = "addedit14" class="my-div me_14" data-target="multy14"style="color:blue;display:none;">add/edit</text>       
                              </td>
                              <td>
                                    <select id="scope2_unit3" name="Unit1">
                                          <option value="1" selected="selected">kWhs</option>
                                          <option value="2">GJs</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Purchased Heat from Conventional Boiler Plant</td>
                              <td>
                                    <input class="radioBtn" type="radio" data-target-id="single" name="option15" data-target-value="multy15" style="margin-left:10%">
                                    <input class="radioBtn" type="radio" data-target-id="multy" name="option15" data-target-value="multy15" style="margin-left:30%">
                                    <text id = "addedit15" class="my-div me_15" data-target="multy15"style="color:blue;display:none;">add/edit</text>       
                              </td>
                              <td>
                                    <select id="scope2_unit4" name="Unit1">
                                          <option value="1" selected="selected">kWhs</option>
                                          <option value="2">GJs</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Purchased Cooling from Conventional Boiler Plant</td>
                              <td>
                                    <input class="radioBtn" type="radio" data-target-id="single" name="option16" data-target-value="multy16" style="margin-left:10%">
                                    <input class="radioBtn" type="radio" data-target-id="multy" name="option16" data-target-value="multy16" style="margin-left:30%">
                                    <text id = "addedit16" class="my-div me_16" data-target="multy16"style="color:blue;display:none;">add/edit</text>
                              </td>
                              <td>
                                    <select id="scope2_unit5" name="Unit1">
                                          <option value="1" selected="selected">kWhs</option>
                                          <option value="2">GJs</option>
                                    </select>
                              </td>
                        </tr>
                        <tr><td>&nbsp;</td></tr>
                        <tr class="spaceUnder">
                              <td>User Defined
                              <input type="checkbox" id="option61" value="option61" style="margin-left:10%" name="userchecked"></td>
                        </tr>
                  </table>
                  <div name="showthis" style="min-width:600px; padding-left:15px;">
                        <div style="clear:both; width:100%">
                              <br>
                              <label style="float:left; margin-right:15px; font-weight:normal">Name</label>
                              <input id="userdefined" type="text" name="name" style="float:left"/>
                              <label style="float:left; margin-right:52px; margin-left:16px; font-weight:normal">CO2 Coefficient</label>
                              <input id="userdefined" type="text" name="units" style="float:left"/>
                        </div>
                        <div style="clear:both; width:100%">
                              <label style="float:left; margin-right:20px; font-weight:normal">Units</label>
                              <input id="userdefined" type="text" name="coef" style="float:left"/>
                              <label style="float:left; margin-right:15px; margin-left:15px; font-weight:normal">GJ Conversion Factor</label>
                              <input id="userdefined" type="text" name="conv" style="float:left"/>
                        </div>
                  </div>
                  <br>
                  <div id="scope2MultiAddEditTable"></div>
            </div>
      </div>
</form>
      <!--~~~~~~~~~~~~~~~~~~SCOPE 3~~~~~~~~~~~~~~~~~~-->
<form method="POST" id="es-form2" class="clearfix">
      <div id="Scope3" style="width:100%">
            <div style="width:50%; float:left">
                  <h4><u>Scope 3</u>
                  <img src="img/help.png" style="width:3%"></h4>
                  <table style="width:100%; float:left">
                        <tr class="spaceUnder">
                              <td>Paper</td>
                              <td><input type="checkbox" name="option17" value="option17"></td>
                              <td>
                                    <select id ="scope3_unit1" name="measure1">
                                          <option value="1" selected="selected">KWhs</option>
                                          <option value="2">GJs</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Garbage</td>
                              <td><input type="checkbox" name="option18" value="option18"></td>
                              <td>
                                    <select id="scope3_unit2" name="measure2">
                                          <option value="1" selected="selected">KWhs</option>
                                          <option value="2">GJs</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Recycling</td>
                              <td><input type="checkbox" name="option19" value="option19"></td>
                              <td>
                                    <select id="scope3_unit3" name="measure3">
                                          <option value="1" selected="selected">KWhs</option>
                                          <option value="2">GJs</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Business Travel</td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;Air</td>
                              <td><input type="checkbox" name="option20" value="option20"></td>
                              <td>
                                    <select id="scope3_unit4" name="measure4">
                                          <option value="1" selected="selected">KWhs</option>
                                          <option value="2">GJs</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;Ground</td>
                              <td><input type="checkbox" name="option21" value="option21"></td>
                              <td>
                                    <select id="scope3_unit5" name="measure5">
                                          <option value="1" selected="selected">KWhs</option>
                                          <option value="2">GJs</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Commuting</td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;Employees</td>
                              <td><input type="checkbox" name="option22" value="option22"></td>
                              <td>
                                    <select id="scope3_unit6" name="measure6">
                                          <option value="1" selected="selected">KWhs</option>
                                          <option value="2">GJs</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>&nbsp;&nbsp;&nbsp;&nbsp;Contractor</td>
                              <td><input type="checkbox" name="option23" value="option23"></td>
                              <td>
                                    <select id="scope3_unit7" name="measure7">
                                          <option value="1" selected="selected">KWhs</option>
                                          <option value="2">GJs</option>
                                    </select>
                              </td>
                        </tr>
                        <tr class="spaceUnder">
                              <td>Water</td>
                              <td><input type="checkbox" name="option24" value="option24"></td>
                              <td>
                                    <select  id="scope2_unit8" name="measure8">
                                          <option value="1" selected="selected">KWhs</option>
                                          <option value="2">GJs</option>
                                    </select>
                              </td>
                        </tr>
                  </table>
            </div>
            <div style="width:50%; float:left; margin-top:55px">
                  <font size="3">User Defined #1</font>
                        <input type="checkbox" value="option25"style="margin-left:5%" name="userchecked4">
                        <br>
                        <div name="showthis4" style="min-width:500px; float:left;">
                              <div style="clear:both; width:100%">
                                    <label style="float:left; margin-right:30px; font-weight:normal; font-size:16">Name</label>
                                    <input id="userdefined" type="text" name="name" style="float:left"/>
                                    <label style="float:left; margin-right:30px; margin-left:16px; font-weight:normal; font-size:16">CO2 Coefficient</label>
                                    <input id="userdefined" type="text" name="units" style="float:left"/>
                              </div>
                              <div style="clear:both; width:100%">
                                    <label style="float:left; margin-right:42px; font-weight:normal; font-size:16">Unit</label>
                                    <input id="userdefined" type="text" name="coef" style="float:left"/>
                              </div>
                        </div>
                        <br><br><br><br>
                        <font size="3">User Defined #2</font>
                        <input type="checkbox" value="option26"style="margin-left:5%" name="userchecked5">
                        <br>
                        <div name="showthis5" style="min-width:500px; float:left;">
                              <div style="clear:both; width:100%">
                                    <label style="float:left; margin-right:30px; font-weight:normal; font-size:16">Name</label>
                                    <input id="userdefined" type="text" name="name" style="float:left"/>
                                    <label style="float:left; margin-right:30px; margin-left:16px; font-weight:normal; font-size:16">CO2 Coefficient</label>
                                    <input id="userdefined" type="text" name="units" style="float:left"/>
                              </div>
                              <div style="clear:both; width:100%">
                                    <label style="float:left; margin-right:42px; font-weight:normal; font-size:16">Unit</label>
                                    <input id="userdefined" type="text" name="coef" style="float:left"/>
                              </div>
                        </div>
                        <br><br><br>
                        <font size="3">User Defined #3</font>
                        <input type="checkbox" value="option27"style="margin-left:5%" name="userchecked6">
                        <br>
                        <div name="showthis6" style="min-width:500px; float:left;">
                              <div style="clear:both; width:100%">
                                    <label style="float:left; margin-right:30px; font-weight:normal; font-size:16">Name</label>
                                    <input id="userdefined" type="text" name="name" style="float:left"/>
                                    <label style="float:left; margin-right:30px; margin-left:16px; font-weight:normal; font-size:16">CO2 Coefficient</label>
                                    <input id="userdefined" type="text" name="units" style="float:left"/>
                              </div>
                              <div style="clear:both; width:100%">
                                    <label style="float:left; margin-right:42px; font-weight:normal; font-size:16">Unit</label>
                                    <input id="userdefined" type="text" name="coef" style="float:left"/>
                              </div>
                        </div>

            </div>
      </div>
      <div class = "form-controls left" style="margin-top:20px">
            <button type="button" id="myButton" class="btn btn-primary" style="width:100px"> Save </button>
      </div>
</form>

<script>
$(document).ready( function() {
      $('#scope').bind('change', function (e) { 
            if($('#scope').val()=='1') {
                  $('#Scope2').hide();
                  $('#Scope3').hide();
                  $('#Scope1').show();
            } else if($('#scope').val()=='2') {
                  $('#Scope1').hide();
                  $('#Scope3').hide();
                  $('#Scope2').show();
            } else  if($('#scope').val()=='3') {
                  $('#Scope2').hide();
                  $('#Scope1').hide();
                  $('#Scope3').show();
            }
      }).trigger('change');
});

//~~~~~~~~~~~appearing add/edit text
$(document).ready(function(){
      $(".radioBtn:checked").data("chk",true);
      $('.radioBtn').click(function(){
            var target = $(this).data('target-value');
            if($(this).data('target-id')=='multy'){
                  $('.my-div[data-target="'+target+'"]').show();
            } else {
                  $('.my-div[data-target="'+target+'"]').hide();
            }

            //~~~~~~~~~~unselect radio button
            $("input[name='"+$(this).attr("name")+"']:radio").not(this).removeData("chk");
            $(this).data("chk",!$(this).data("chk"));
            $(this).prop("checked",$(this).data("chk"));
      }); 
});

//~~~~~~~~~~~~editable table
$(document).ready(function(){
      $("text[id^='addedit']").click(function(){
            var title = $(this).parent().prev().html();
            var html = "<br><div><label style='color:#AFD464; font-size:16; font-weight:normal; margin-left:15px'>" + title + " Meters </label></div>" +
            "<table id='scrolltable' class='editabletable'>" +
            "<thead>" +
            "<tr>" +
            "<th><div style='width:50px; font-weight:normal'>Meter</div></th>" +
            "<th><div style='width:300px; font-weight:normal'>&nbsp;&nbsp;&nbsp;Name or Description</div></th>" +
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
            $('#scope2MultiAddEditTable').empty().append(html);
      });
});

//~~~~~~~~~~user defined checkbox
$(function () {
      $('div[name="showthis"]').hide();
      $('div[name="showthis2"]').hide();
      $('div[name="showthis3"]').hide();
      $('div[name="showthis4"]').hide();
      $('div[name="showthis5"]').hide();
      $('div[name="showthis6"]').hide();

      //show fields when the user defined is clicked
      $('input[name="userchecked"]').on('click', function () {
            if ($(this).prop('checked')) {
                  $('div[name="showthis"]').fadeIn();
            } else {
                  $('div[name="showthis"]').hide();
            }
      });
      //show fields when the user defined 2 is clicked
      $('input[name="userchecked2"]').on('click', function () {
            if ($(this).prop('checked')) {
                  $('div[name="showthis2"]').fadeIn();
            } else {
                  $('div[name="showthis2"]').hide();
            }
      });
      //show fields when user defined scope 2 is clicked
      $('input[name="userchecked3"]').on('click', function () {
            if ($(this).prop('checked')) {
                  $('div[name="showthis3"]').fadeIn();
            } else {
                  $('div[name="showthis3"]').hide();
            }
      });
      //show fields when user defined #1 scope 3 is clicked
      $('input[name="userchecked4"]').on('click', function () {
            if ($(this).prop('checked')) {
                  $('div[name="showthis4"]').fadeIn();
            } else {
                  $('div[name="showthis4"]').hide();
            }
      });
      //show fields when user defined #2 scope 3 is clicked
      $('input[name="userchecked5"]').on('click', function () {
            if ($(this).prop('checked')) {
                  $('div[name="showthis5"]').fadeIn();
            } else {
                  $('div[name="showthis5"]').hide();
            }
      });
      //show fields when user defined #3 scope 3 is clicked
      $('input[name="userchecked6"]').on('click', function () {
            if ($(this).prop('checked')) {
                  $('div[name="showthis6"]').fadeIn();
            } else {
                  $('div[name="showthis6"]').hide();
            }
      });
});

</script>