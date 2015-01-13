<div class = "top-tooltip">
	<p>Set up your corporate profile</p>
</div>

<!--START MIDDLE CLASS-->
<div class = "middle">
	<form method = "POST" id = "corporate-form" class = "clearfix">

		<!--START 1st HALF LEFT CLASS-->		
		<div class = "half left">
			<h4 style="float: left">General Information</h4>

			<!--START BS-EXAMPLE-TOOLTIPS CLASS (General Information-->

			<div id = "wrap2" style="float: left">
				<button type="button" id="test" class="general" data-container="#wrap2" data-toggle="popover" data-placement="top">
				<span class="glyphicon glyphicon-question-sign"></span></button>
				<div id="general_wrapper" style="display: none">
			  		<img src="img/logo.gif" style="margin-top: 1.2%; float:right; width: 15%">
							<br>
							<h4>General Information</h4>
							<div style="border-top: solid 8px #5CB357"> </div>
							<p style="color: black">Enter your organization's name, address, and website.</p>
				</div>
			</div>
			
			<!--END BS-EXAMPLE-TOOLTIPS CLASS (General Information)-->


			<table>
				<tr>
					<td><label for ="corp-name">Corporate Name</label></td>
					<td><div class="required"><input type="text" id=" corp-name"></td></div>
				</tr>
				<tr>
					<td><label for = "trade-name">Trade Name</label></td>
					<td><input type = "text" id = "trade-name" class = ""/></td>
				</tr>
				<tr>
					<td><label for = "addr1">Address 1</label></td>
					<td><input type = "text" id = "addr1" class = ""/></td>
				</tr>
				<tr>
					<td><label for = "addr2">Address 2</label></td>
					<td><input type = "text" id = "addr2" class = ""/></td>				
				</tr>
				<tr>
					<td><label for = "city">City</label></td>
					<td><input type = "text" id = "city" class = ""/></td>
				</tr>			
				<tr>
					<td><label for = "corpSelCountry">Country</label></td>
					<td>
						<div class="required">
							<select id = "corpSelCountry" class = "required selCountry">
								<option value = "0" selected = "selected">N/A</option>
								<option value = "1">CANADA</option>
								<option value = "2">USA</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td><label for = "corpSelStateProv">State/Province</label></td>
					<td>
						<div class="required">
							<select id = "corpSelStateProv" class = "required selStateProv">
								<option value = "0" selected = "selected">N/A</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td><label for = "zip-post">Zip/Postal Code</label></td>
					<td><input type = "text" id = "zip-post" class = ""/></td>
				</tr>
				<tr>
					<td><label for = "weburl">Website URL</label></td>
					<td><input type = "text" id = "weburl" class = ""/></td>
				</tr>
			</table>

			<h4 style="float:left">Emission Reduction Target </h4>

			<!--START BS-EXAMPLE-TOOLTIPS CLASS (Emission Reduction Target)-->
			<div id = "wrap2" style="float: left">
				<button type="button" id="test" class="erTarget" data-container="#wrap2" data-toggle="popover" data-placement="top">
				<span class="glyphicon glyphicon-question-sign"></span></button>
				<div id="erTarget_wrapper" style="display: none">
			  		<img src="img/logo.gif" style="margin-top: 1.2%; float:right; width: 27%">
					<br>
					<h4>Emission Reduction Target</h4>
					<div style="border-top: solid 8px #5CB357"> </div>
					<p style="color: black">A reduction target is the amount of emissions your organization commits to reduct. 
						Establishing an emission reduction targets can help your company on its path to low-carbon business. To set your reduction target, you will need to specify:
						&nbsp;<br><br><b>Base Year</b> - the reference year against which performance is measured over time. Select a base year for which reliable data are available. For many, this could be the first year you conduct a GHG inventory.
						&nbsp;<br><br><b>Reduction Target</b> - the reduction goal. expressed as a percentage reduction in emissios below those estimated for the base year. For example, you might choose to reduce emissions by 10% over the base year.
						&nbsp;<br><br><b>Target Year</b> - the year that the reduction target will be achieved. </p>
				</div>
			</div>
			<!--END BS-EXAMPLE-TOOLTIPS CLASS (Emission Reduction Target)-->

			<table>
				<tr>
					<td><label for = "baseYear">Base Year</label></td>
					<td>
						<select id = "baseYear">
							<?php
							for($i = 2000; $i <= 2024; $i++){
								echo '<option value = "'.$i.'">'.$i.'</option>';
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for = "weburl">Reduction Target (%)</label></td>
					<td><input type = "text" id = "weburl" class = ""/></td>
				</tr>
				<tr>
					<td><label for = "targetYear">Target Year</label></td>
					<td>
						<select id = "targetYear">
							<?php
							for($i = 2000; $i <= 2024; $i++){
								echo '<option value = "'.$i.'">'.$i.'</option>';
							}
							?>
						</select>
					</td>
				</tr>
			</table>
		</div>
		<!--END 1st HALF LEFT CLASS-->

		<!--START HALF LEFT CLASS-->
		<div class = "half left">
			<h4 style="float:left">GHG Champion</h4>

			<!--START BS-EXAMPLE-TOOLTIPS CLASS (GHG Champion)-->
			<div id = "wrap2" style="float: left">
				<button type="button" id="test" class="ghgChamp" data-container="#wrap2" data-toggle="popover" data-placement="top">
				<span class="glyphicon glyphicon-question-sign"></span></button>
				<div id="ghgChamp_wrapper" style="display: none">
			  		<img src="img/logo.gif" style="margin-top: 1.2%; float:right; width: 27%">
					<br>
					<h4>GHG Champion</h4>
					<div style="border-top: solid 8px #5CB357"> </div>
					<p>Enter the contact information for the individual who leads your company's GHG reduction commitment.
				</div>
			</div>	
			<!--END BS-EXAMPLE-TOOLTIPS CLASS (GHG Champion)-->

			<table>
				<tr>
					<td><label for = "champname">Name</label></td>
					<td><input type = "text" id = "champname" class = ""/></td>
				</tr>
				<tr>
					<td><label for = "champtitle">Title</label></td>
					<td><input type = "text" id = "champtitle" class = ""/></td>
				</tr>
				<tr>
					<td><label for = "champtelnum">Phone Number</label></td>
					<td><input type = "tel" id = "champtelnum" class = ""/></td>
				</tr>
				<tr>
					<td><label for = "champemail">Email</label></td>
					<td><input type = "email" id = "champemail" class = ""/></td>
				</tr>
			</table>

			<h4 style="float:left">GHG Accountant</h4>

			<!--START BS-EXAMPLE-TOOLTIPS CLASS (GHG Accountant)-->
			<div id = "wrap2" style="float: left">
				<button type="button" id="test" class="ghgAccount" data-container="#wrap2" data-toggle="popover" data-placement="top">
				<span class="glyphicon glyphicon-question-sign"></span></button>
				<div id="ghgAccount_wrapper" style="display: none">
			  		<img src="img/logo.gif" style="margin-top: 1.2%; float:right; width: 27%">
					<br>
					<h4>GHG Accountant</h4>
					<div style="border-top: solid 8px #5CB357"></div>
					<p>Enter the contact information for the individual who manages your GHG accounting activities. This is the person who oversees data entry and sses to it that the emissions 
					data is of highest quality.
				</div>
			</div>	
			<!--END BS-EXAMPLE-TOOLTIPS CLASS (GHG Accountant)-->

			<table>
				<tr>
					<td><label for = "accountname">Name</label></td>
					<td><input type = "text" id = "accountname" class = ""/></td>
				</tr>
				<tr>
					<td><label for = "accounttitle">Title</label></td>
					<td><input type = "text" id = "accounttitle" class = ""/></td>
				</tr>
				<tr>
					<td><label for = "accounttelnum">Phone Number</label></td>
					<td><input type = "tel" id = "accounttelnum" class = ""/></td>
				</tr>
				<tr>
					<td><label for = "accountemail">Email</label></td>
					<td><input type = "email" id = "accountemail" class = ""/></td>
				</tr>
			</table>

			<h4 style="float:left">Reporting Year</h4>

			<!--START BS-EXAMPLE-TOOLTIPS CLASS (Reporting Year)-->

			<div id = "wrap2" style="float: left">
				<button type="button" id="test" class="reportYear" data-container="#wrap2" data-toggle="popover" data-placement="top">
				<span class="glyphicon glyphicon-question-sign"></span></button>
				<div id="reportYear_wrapper" style="display: none">
			  		<img src="img/logo.gif" style="margin-top: 1.2%; float:right; width: 27%">
					<br>
					<h4>Reporting Year</h4>
					<div style="border-top: solid 8px #5CB357"></div>
					<p>Enter the year-end date for the purpose of tracking your corporate greenhouse gases. For example, enter December 31 
					if you wish to track emissions by calendar year. Or, enter your fiscal yearend date if you wish to track emissions by 
					fiscal year.
				</div>
			</div>	
			<!--END BS-EXAMPLE-TOOLTIPS CLASS (Reporting Year)-->

			<table>
				<tr>
					<td><label for = "yearEnd">Year End</label></td>
					<td><input type = "date" id = "yearEnd"/></td>
				</tr>
			</table>
		</div>
		<!--END 2nd HALF LEFT CLASS-->	

		<!--START FORM-CONTROLS LEFT CLEARFIX CLASS-->
		<div class = "form-controls left clearfix">
			<button type = "submit">Save</button>
		</div>
		<!--END FORM-CONTROLS LEFT CLEARFIX CLASS-->	

		<!--START REQUIRED FIELD CLASS-->
		<div class = "requiredfield">
			<p>* Required Field</p>
		</div>
		<!--END REQUIRED FIELD CLASS-->	
	
	</form>
</div>
<!--END MIDDLE CLASS-->	



	<script>
	//
	var options = [
	{},
	{
		"Alberta": "AB",
		"British Columbia": "BC",
		"Manitoba": "MN",
		"New Brunswick": "NB",
		"Newfoundland/Labrador": "NFLL",
		"Northwest Terriroties": "NWT",
		"Nova Scotia": "NS",
		"Nunavut": "NV",
		"Ontario": "ON",
		"Prince Edward Island": "PEI",
		"Quebec": "QB",
		"Saskatchewan": "SK",
		"Yukon": "YK"
	},
	{
		"Alabama": "Alabama",
		"Alaska": "Alaska",
		"Arizona": "Arizona",
		"Arkansas": "Arkansas",
		"California": "California",
		"Colorado": "Colorado",
		"Connecticut": "Connecticut",
		"Delaware": "Delaware",
		"District of Columbia": "District of Columbia",
		"Florida": "Florida",
		"Georgia": "Georgia",
		"Hawaii": "Hawaii",
		"Idaho": "Idaho",
		"Illinois": "Illinois",
		"Indiana": "Indiana",
		"Iowa": "Iowa",
		"Kansas": "Kansas",
		"Kentucky": "Kentucky",
		"Lousiana": "Lousiana",
		"Maine": "Maine",
		"Maryland": "Maryland",
		"Massachusetts": "Massachusetts",
		"Michigan": "Michigan",
		"Minnesota": "Minessota",
		"Mississippi": "Mississippi",
		"Missouri": "Missouri",
		"Montana": "Montana",
		"Nebraska": "Nebraska",
		"Nevada": "Nevada",
		"New Hampshire": "New Hampshire",
		"New Jersey": "New Jersey",
		"New Mexico": "New Mexico",
		"New York": "New York",
		"North Carolina": "North Carolina",
		"North Dakota": "North Dakota",
		"Ohio": "Ohio",
		"Oklahoma": "Oklahoma",
		"Oregon": "Oregon",
		"Pennsylvania": "Pennsylvania",
		"Rhode Island": "Rhode Island",
		"South Carolina": "South Carolina",
		"South Dakota": "South Dakota",
		"Tennessee": "Tennessee",
		"Texas": "Texas",
		"Utah": "Utah",
		"Vermont": "Vermont",
		"Virginia": "Virginia",
		"Washington": "Washington",
		"West Virgina": "West Virginia",
		"Wisconsin": "Wisconsin",
		"Wyoming": "Wyoming"
	}
	];

	$(document).ready(function () {

		$(".selCountry").change(function () {
			var val = $(this).val();
			var newOptions;

			if (val == 0) {
				$('.selStateProv option:gt(0)').remove();
				$('.selGeoLoc option:gt(0)').remove();
			} else {
				newOptions = options[val];
				$('.selStateProv option:gt(0)').remove();
				$('.selGeoLoc option:gt(0)').remove();

				var $el = $(".selStateProv");
				$.each(newOptions, function (key, value) {
					$el.append($("<option></option>")
						.attr("value", value).text(key));
				});

				$el = $(".selGeoLoc");
				$.each(newOptions, function (key, value) {
					$el.append($("<option></option>")
						.attr("value", value).text(key));
				});
			}
			});

			$('.general').popover({ 
	    html : true,
	    placement : 'right',
	    content: function() {
	      return $('#general_wrapper').html();
	    	}
	  	});
	  	$('.erTarget').popover({ 
	    html : true,
	    placement : 'right',
	    content: function() {
	      return $('#erTarget_wrapper').html();
	    	}
	  	});
		$('.ghgChamp').popover({ 
	    html : true,
	    placement : 'right',
	    content: function() {
	      return $('#ghgChamp_wrapper').html();
	    	}
	  	});
		$('.ghgAccount').popover({ 
	    html : true,
	    placement : 'top',
	    content: function() {
	      return $('#ghgAccount_wrapper').html();
	    	}
	  	});

		$('.reportYear').popover({ 
	    html : true,
	    placement : 'top',
	    content: function() {
	      return $('#reportYear_wrapper').html();
	    	}
	  	});
	  	
		$(function(){ $('#test').popover(); });

	
	});

	


		
		/*
				
		$('[data-toggle="popover"]').popover();

		$('body').on('click', function (e) {
		    //only buttons
		    if ($(e.target).data('toggle') !== 'popover'
		        && $(e.target).parents('.popover.in').length === 0) { 
		        $('[data-toggle="popover"]').popover('hide');
		    }
		    //buttons and icons within buttons
		    /*
		    if ($(e.target).data('toggle') !== 'popover'
		        && $(e.target).parents('[data-toggle="popover"]').length === 0
		        && $(e.target).parents('.popover.in').length === 0) { 
		        $('[data-toggle="popover"]').popover('hide');
		    }
		    */
			

	</script>