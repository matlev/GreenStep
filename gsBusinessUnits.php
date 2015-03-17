<style>
	.cMetricsTable td.editable:hover {
		background: #D8FC98;
	}

	.cMetricsTable td.editable {
		cursor: pointer;
	}
</style>

<div class = "top-tooltip clearfix">    
    <div class = "third left" style="width:25%">
        <p> Set up the business units that will be part of your inventory</p>
    </div>  

    <!--tooltip 1-->
	<div id = "wrap" style="float: left; margin-top:30px">
		<button type="button" id="BU" class="danger" data-container="#wrap" data-toggle="popover" data-placement="top"><span class="glyphicon glyphicon-question-sign"></span></button>
		<div id="popover_content_wrapper" style="display: none">
	  		<img src="img/logo.gif" style="margin-top: 1.2%; float:right; width: 15%">
			<br>
			<h4>Business Units Set Up</h4>
			<div style="border-top: solid 8px #5CB357"> </div>
			<p style="color: black">Decide which of your business units will be part of your organization's greenhouse gas inventory. Business units are 
                all the separate companies, facilities or operations which are owned or controlled by your organization. Collectively, 
                these business units define the &#34;organizational boundary&#34; for your corporate greenhouse gas inventory.
                <br><b>Important: you must create at least one business unit.</b><br>You may wish to simply create a single business unit that 
                defines your entire organizational boundary, or your might want to create multiple business units so you can track and report
                emissions for each one separately.
                <br>
                The number of business units you can create depends on the version of <img src='img/ecobase.png'; style="width: 6%"> you're 
                using: 
                <ul id ="business">
                    <li>Express - 1 business unit only</li>
                    <li>Regular - up to 3 business units</li>
                    <li>Premium - up to 5 business units</li>
                </ul>
                You can upgrade your version anytime.  
		</div>
	</div>
	<!--end of tooltip 1-->

	<div class = "third left" style="float:left; width:20%; padding-left:20px; padding-top:30px">
		<button type="submit" id="createBU" style="width:200px"> Create a new business unit </button> 
	</div>

	<!--tooltip 2-->
	<div id = "wrap3" style="float:left; margin-top:32px">
		<button type="button" id="BU" class="createBU" data-container="#wrap3" data-toggle="popover" data-placement="top"><span class="glyphicon glyphicon-question-sign"></span></button>
		<div id="createBU_wrapper" style="display: none">
	  		<img src="img/logo.gif" style="margin-top: 1.2%; float:right; width: 15%">
			<br>
			<h4>Create a Business Unit</h4>
			<div style="border-top: solid 8px #5CB357"> </div>
			<p style="color: black">Click this button to add a new business unit. Hit Save once you're done. </p>
			<p style="color: black"> Use &quot;Edit an existing business unit&quot; to edit a businesss unit you've already set up.</p>
		</div>
	</div>
	<!--end of tooltip 2-->

	<div class = "third left" style="float:left; width:10%; padding-top:31px; padding-left:20px">
		<select id = "selBU">
			<option value = "0">Edit an existing business unit</option>
		</select>
	</div>

	<!--tooltip 3-->
	<div id = "wrap3" style="float:left; margin-top:32px">
		<button type="button" id="BU" class="editBU" data-container="#wrap3" data-toggle="popover" data-placement="top"><span class="glyphicon glyphicon-question-sign"></span></button>
		<div id="editBU_wrapper" style="display: none">
		  	<img src="img/logo.gif" style="margin-top: 1.2%; float:right; width: 15%">
			<br>
			<h4>Edit an Existing Business Unit</h4>
			<div style="border-top: solid 8px #5CB357"> </div>
			<p style="color: black">Choose the business unit you wish to edit.
			Hit Save to record your changes</p>
			<p style="color: black">Use "Create a New Business Unit" to add a new business unit.</p>
		</div>
	</div>
	<!--end of tooltip 3-->
</div>
<!--end of top class-->

<!--BODY-->
	<div class = "middle" style="float:left">
		<form method = "POST" autocomplete = "off" id = "BU-form" class = "clearfix">
			<div class = "half left">
				<h4 style="float: left"><u>General Information</u></h4>

				<!--tooltip 4-->
				<div id = "wrap3" style="float:left; margin-top:23px">
					<button type="button" id="BU" class="genBU" data-container="#wrap3" data-toggle="popover" data-placement="top"><span class="glyphicon glyphicon-question-sign"></span></button>
					<div id="genBU_wrapper" style="display: none">
					  	<img src="img/logo.gif" style="margin-top: 1.2%; float:right; width: 15%">
						<br>
						<h4>General Information</h4>
						<div style="border-top: solid 8px #5CB357"> </div>
						<p style="color: black">Enter the name and address for each business unit. Note that Geographic Location is 
							the region where the business unit is located, which may or may not be the same as the mailing address. 
							The location of the business unit impacts the missions intensit of electricity because different regions 
							use different energy mixes to generate electricity.
						</p>
					</div>
				</div>
				<!--end of tooltip 4-->

				<table>
					<tr>
						<td><label for = "BU-name" style="font-weight:normal">Business Unit Name</label></td>
						<td><div class="required"><input type = "text" id = "BU-name" class = ""/></div></td>
					</tr>
					<tr>
						<td><label for = "BU-addr1" style="font-weight:normal">Address 1</label></td>
						<td><input type = "text" id = "BU-addr1" class = ""/></td>
					</tr>
					<tr>
						<td><label for = "BU-addr2" style="font-weight:normal">Address 2</label></td>
						<td><input type = "text" id = "BU-addr2" class = ""/></td>
					</tr>
					<tr>
						<td><label for = "BU-city" style="font-weight:normal">City</label></td>
						<td><input type = "text" id = "BU-city" class = ""/></td>
					</tr>
					<tr>
						<td><label for = "buSelCountry" style="font-weight:normal">Country</label></td>
						<td><div class="required">
								<select id = "buSelCountry" class = "required selCountry">
									<option value = "1" selected = "selected">N/A</option>
									<option value = "2">Canada</option>
									<option value = "3">USA</option>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td><label for = "buSelStateProv" style="font-weight:normal">State/Province</label></td>
						<td>
							<div class="required">
								<select id = "buSelStateProv" class = "required selStateProv" name = "selStateProv">
									<option value = "0" selected = "selected">N/A</option>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td><label for = "BU-zip-post" style="font-weight:normal">Zip/Postal Code</label></td>
						<td><input type = "text" id = "BU-zip-post" class = ""/></td>
					</tr>
					<tr>
						<td><label for = "geoLoc" style="font-weight:normal">Geographic Location</label></td>
						<td>
							<div class="required">
								<select id = "geoloc" class = "required selGeoLoc">
									<option value = "0" selected = "selected">N/A</option>
								</select>
							</div>
						</td>
					</tr>
				</table>
			</div>

			<div class = "half left">
				<h4 style="float: left"><u>Industry Group</u></h4>

				<!--tooltip 5-->
				<div id = "wrap3" style="float: left; margin-top:23px">
					<button type="button" id="BU" class="industryGroup" data-container="#wrap3" data-toggle="popover" data-placement="top"><span class="glyphicon glyphicon-question-sign"></span></button>
					<div id="industryGroup_wrapper" style="display: none; max-width: 100%; width:10%">
					  	<img src="img/logo.gif" style="margin-top: 1.2%; float:right; width: 15%">
						<br>
						<h4>Industry Group</h4>
						<div style="border-top: solid 8px #5CB357"> </div>
						<p style="color: black">This information is optional and used to classify each business unit by industry type.
							 By entering this data, you will be able to report your emissions against industry and peer group averages.
							<br><br>
							<b>Industry code</b> - the 6-digit NAICS industry code that correponds to the business unit. If more then describe
							 your main business activity.
					</div>
				</div>
				<!--end of tooltip 5-->

				<table>
					<tr>
						<td><label for = "indCode" style="font-weight:normal">Industry Code</label></td>
						<td>
							<select id = "indCode" class = "required indCode">
								<option value = "0" selected="selected">11 - Agriculture, Forestry, Fishing, and Hunting</option>
								<option value = "1">21 - Mining, Quarrying, and Oil and Gas Extraction</option>
								<option value = "2">22 - Utilities</option>
								<option value = "3">23 - Construction</option>
								<option value = "4">31-33 - Manufacturing</option>
								<option value = "5">41 - Wholesale Trade</option>
								<option value = "6">44-45 - Retail Trade</option>
								<option value = "7">48-49 - Transportation and Warehousing</option>
								<option value = "8">51 - Information and Cultural Industries</option>
								<option value = "9">52 - Finance and Insurance</option>
								<option value = "10">53 - Real Estate and Rental and Leasing</option>
								<option value = "11">54 - Professional, Scientific and Technical Services</option>
								<option value = "12">55 - Management of Companies and Enterprises</option>
								<option value = "13">56 - Administrative and Support, and Waste Management <br> and Remediation Services</option>
								<option value = "14">61 - Educational Services</option>
								<option value = "15">62 - Health Care and Social Assistance</option>
								<option value = "16">71 - Arts, Entertainment and Recreation</option>
								<option value = "17">72 - Accommodation and Food Services</option>
								<option value = "18">81 - Other Services (except Public Administration)</option>
								<option value = "19">91 - Public Administration</option> 
							</select>
						</td>
					</tr>
				</table>

				<h4 style="float: left"><u>Emission Reduction Target</u></h4>

				<!--tooltip 6-->
				<div id = "wrap" style="float: left; margin-top:23px">
					<button type="button" id="BU" class="ert" data-container="#wrap" data-toggle="popover" data-placement="top"><span class="glyphicon glyphicon-question-sign"></span></button>
					<div id="ert_wrapper" style="display: none; max-width: 100%; width:10%">
				  		<img src="img/logo.gif" style="margin-top: 1.2%; float:right; width: 15%">
						<br>
						<h4>Emission Reduction Target</h4>
						<div style="border-top: solid 8px #5CB357"> </div>
						<p style="color:black">This is the amount of emissions the business unit commits to reduce. The business unit's reduction target can be the same as or
							 different than the overall corporate reduction target. To set your reduction target, you will need to specify:
							<br><br>
							<b>Base Year</b> - the reference year against which performance is measured over time. Select a base year for which reliable data 
							are available. For many, this could be the first year you conduct a GHG inventory.
							<br><br>
							<b>Reduction Target</b> - the reduction goal, expressed as a percentage reduction in emissions below those estimated for the base
							 year. For example, you might choose to reduce emissions by 10% over the base year.
							<br><br>
							<b>Target Year</b> - the year that the reduction target will be achieved. 
					</div>
				</div>
				<!--end of tooltip 6-->

				<table>
					<tr>
						<td><label for = "BU-baseYear" style="font-weight:normal">Base Year</label></td>
						<td>
							<select id = "BU-baseYear">
								<?php
								for($i = 2000; $i <= 2024; $i++)
								{
									echo '<option value = "'.$i.'">'.$i.'</option>';
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td><label for = "redTarget" style="font-weight:normal">Reduction Target (%)</label></td>
						<td><input type = "text" id = "redTarget" class = ""/></td>
					</tr>
					<tr>
						<td><label for = "BU-targetYear" style="font-weight:normal">Target Year</label></td>
						<td>
							<select id = "BU-targetYear">
								<?php
								for($i = 2000; $i <= 2024; $i++)
								{
									echo '<option value = "'.$i.'">'.$i.'</option>';
								}
								?>
							</select>
						</td>
					</tr>
				</table>
			</div>

			<div class = "full left" style="float: left">
				<h4 style="float: left"><u>Comparative Metrics</u></h4>

				<!--tooltip 7-->
				<div id = "wrap" style="float: left; margin-top:23px">
					<button type="button" id="BU" class="compMetric" data-container="#wrap" data-toggle="popover" data-placement="top"><span class="glyphicon glyphicon-question-sign"></span></button>
					<div id="compMetric_wrapper" style="display: none; max-width: 100%; width:10%">
						<img src="img/logo.gif" style="margin-top: 1.2%; float:right; width: 15%">
						<br>
						<h4>Comparative Metrics</h4>
						<div style="border-top: solid 8px #5CB357"> </div>
						<p style="color: black">This information is optional and used to standardize emissions by key metrics. By entering these data, you will be able to report your emissions per dollar of revenue, percustomer, per employee and/or per unit of floor area. You can also create your own customized comparative metrics.
							<br><br>
							<b>Revenue or Sales</b> - the total sales or revenue generated by the business unit.
							<br><br>
							<b>Customers or Guests</b> - the number of customers or guests served by the business unit.
							<br><br>
							<b>Employees</b> - the number of full time equivalent employees in the buiness unit. For example, if the business has 10 full time employees and 10 part time employees who work an average of 20 hours per week, then the number of full time equivalent employees would be 15. 
							<br><br>
							<b>Floor Area</b> - the total floor area of all building space operated or owned by the business unit.
					</div>
				</div>
				<!--end of tooltip 7-->

				<table class = "table table-bordered table-striped table-condensed cMetricsTable">
					<thead>
						<tr>
							<th style="font-weight:normal">Year</th>
							<th style="font-weight:normal">Revenue or Sales ($)</th>
							<th style="font-weight:normal">Customers or Guests</th>
							<th style="font-weight:normal">Employees (FTEs)</th>
							<th style="font-weight:normal">Floor Area (Sq Ft)</th>
							<th style="font-weight:normal"><input type = "text" id = "metric1" /></th>
							<th style="font-weight:normal"><input type = "text" id = "metric2" /></th>
							<th style="font-weight:normal"><input type = "text" id = "metric3" /></th>
						</tr>
					</thead>
					<tbody style= "height: 100px; overflow-y: auto">
						<?php
							$html;
							for($i = 2000; $i < 2026; $i++) {
								echo "<tr class = \"$i\"><td>$i</td><td class = \"editable\"></td><td class = \"editable\"></td><td class = \"editable\"></td><td class = \"editable\"></td><td class = \"editable\"></td><td class = \"editable\"></td><td class = \"editable\"></td></tr>";
							}
							//echo $html;
						?>
					</tbody>
				</table>
			</div>

			<!--required fields-->
			<div class = "requiredfield">
				<p>* Required Field</p>
			</div>
			<!--end of req fields-->

			<!--save, delete button-->
			<div class = "form-controls left clearfix">
					<button type="button" id="buSave" class="btn btn-primary" style="width:100px"> Save </button> 
					<div style="float:right; width:30%">
						<button type="button" id="buDelete" class="btn btn-primary" style="width:100px"> Delete </button> 
					</div>
			</div>
			<br>
			<br>
			<br>
		</form>
	</div>

<script>

$(document).ready(function(){

	var newUser="false";

	// Edited fields listeners
	function addEditedFlagTo(el) {
		el.addClass('edited');
	}

	$('#selBU').on('change', function(){

		var data = "changeUnit=" + $(this).val();
		var page = "bu";
		var action = "pull";

		parseAction(page, action, data)
			.success(function(result){
				var users = result.data.name2;
				var name= result.data.name2;
				city= result.data.city2;
				addr= result.data.address3;
				addr2= result.data.address4;
				zip= result.data.zip2;
				baseYear= result.data.baseYear;
				targetYear= result.data.targetYear;
				redTarget= result.data.redTarget;
				prov= result.data.province2;
				cid2= result.data.cid2;

				var accUserHTML;

				var length = users.length;

				for(i = 0; i < length; i++){
					if(i == 0){
						accUserHTML += "<option value = " + i + " selected = 'selected'>" + users[i] + "</option>";

					} else {
						accUserHTML += "<option value = " + i + ">" + users[i] + "</option>";

					}
				}

				var e= document.getElementById("selBU");
				var index= e.options[e.selectedIndex].index;

				$('#BU-name').val(name[index]);
				$('#BU-city').val(city[index]);
				$('#BU-addr1').val(addr[index]);
				$('#BU-addr2').val(addr2[index]);
				$('#buSelStateProv').val(prov[index]);
				$('#buSelCountry').val(cid2[index]).trigger('change');
				$('#BU-zip-post').val(zip[index]);
				$('#BU-baseYear').val(baseYear[index]);
				$('#BU-targetYear').val(targetYear[index]);
				$('#redTarget').val(redTarget[index]);
				$('#metric2').val(index);
				$('#metric3').val(index);

			})
			.fail(function(){});
	});

	var oldVal;
	$('select').on('change', function() {
		if($(this).attr('id') != "selBU") {
			addEditedFlagTo($(this));
		}
	});
	$('input[type = "text"]')
	.on('focus', function() {
		oldVal = $(this).val();
	})
	.on('blur', function() {
		if($(this).val() != oldVal) {
			addEditedFlagTo($(this));
		}
	});

	// Table cell click handlers to edit the table contents
	$('td.editable')
		.on('blur', 'input', function() {
			var cellData = $(this).val();
			addEditedFlagTo($(this).parent().parent()); // input -> td -> tr
			$(this).parent().empty().html(cellData);
		})
		.on('click', function() {
			// Do the default action if an input already exists in the cell
			if($(this).children('input').length) {
				return;
			}

			var cellData = $(this).html();
			var textInput = "<input type = \"text\" class = \"comparitiveCellEditor\" value = \"" + cellData + "\" style = \"width: 100%;\"/>";
			$(this).empty().html(textInput);
			$(this).children().focus();
		})
		.on('keydown', 'input', function(e) {
			if(e.keyCode == 13) {
				$(this).trigger('blur');
			}

			if(e.keyCode == 9) {
				e.preventDefault();
				var next = $(this).parent().next();

				// If we're not at the last cell in a row, focus it.  Otherwise, go to the next row - if there is one - and focus the first cell of that row
				if(next.length) {
					next.trigger('click');
				} else {
					var nextRow = $(this).parent().parent().next();

					if(nextRow.length) {
						nextRow.children().first().next().trigger('click');
					}
				}
			}
		});

	$('.danger').popover({ 
		html : true,
		placement : 'right',
		content: function() {
			return $('#popover_content_wrapper').html();
		}
	});
	$('.createBU').popover({ 
		html : true,
		placement : 'right',
		content: function() {
			return $('#createBU_wrapper').html();
		}
	});
	$('.editBU').popover({ 
		html : true,
		placement : 'right',
		content: function() {
			return $('#editBU_wrapper').html();
		}
	});
	$('.industryGroup').popover({ 
		html : true,
		placement : 'top',
		content: function() {
			return $('#industryGroup_wrapper').html();
		}
	});

	$('.genBU').popover({ 
		html : true,
		placement : 'right',
		content: function() {
			return $('#genBU_wrapper').html();
		}
	});

	$('.ert').popover({ 
		html : true,
		placement : 'top',
		content: function() {
			return $('#ert_wrapper').html();
		}
	});
	$('.compMetric').popover({ 
		html : true,
		placement : 'top',
		content: function() {
			return $('#compMetric_wrapper').html();
		}
	});

	$('#createBU').click(function() {
		//Adding new user
		newUser="true";

		$('#BU-name').val('');
		$('#BU-addr1').val('');
		$('#BU-city').val('');
		$('#BU-zip-post').val('');
		$('#BU-addr2').val('');
		$('#BU-baseYear').val('');
		$('#BU-targetYear').val('');
		$('#redTarget').val('');
		$('#buSelCountry').val('1');
		$('buSelStateProv').val('1');
	});

	$(function(){ $('#BU').popover(); });

});
</script>