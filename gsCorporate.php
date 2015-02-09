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
				<button type="button" id="test" class="general" data-container="#wrap2" data-toggle="popover" data-placement="top"><span class="glyphicon glyphicon-question-sign"></span></button>
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
					<td><div class="required"><input type="text" id="corp-name" name = "corpname"/></div></td>
				</tr>
				<tr>
					<td><label for = "trade-name">Trade Name</label></td>
					<td><input type = "text" id = "trade-name" class = "" name = "tradename"/></td>
				</tr>
				<tr>
					<td><label for = "addr1">Address 1</label></td>
					<td><input type = "text" id = "addr1" class = "" name = "addr1"/></td>
				</tr>
				<tr>
					<td><label for = "addr2">Address 2</label></td>
					<td><input type = "text" id = "addr2" class = "" name = "addr2"/></td>				
				</tr>
				<tr>
					<td><label for = "city">City</label></td>
					<td><input type = "text" id = "city" class = "" name = "city"/></td>
				</tr>			
				<tr>
					<td><label for = "corpSelCountry">Country</label></td>
					<td>
						<div class="required">
							<select id = "corpSelCountry" class = "required selCountry" name = "selCountry">
								<option value = "1" selected = "selected">N/A</option>
								<option value = "2">CANADA</option>
								<option value = "3">USA</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td><label for = "corpSelStateProv">State/Province</label></td>
					<td>
						<div class="required">
							<select id = "corpSelStateProv" class = "required selStateProv" name = "selStateProv">
								<option value = "0" selected = "selected">N/A</option>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td><label for = "zip-post">Zip/Postal Code</label></td>
					<td><input type = "text" id = "zip-post" class = "" name = "zippost"/></td>
				</tr>
				<tr>
					<td><label for = "weburl">Website URL</label></td>
					<td><input type = "text" id = "weburl" class = "" name = "weburl"/></td>
				</tr>
			</table>

			<h4 style="float:left">Emission Reduction Target </h4>

			<!--START BS-EXAMPLE-TOOLTIPS CLASS (Emission Reduction Target)-->
			<div id = "wrap2" style="float: left">
				<button type="button" id="test" class="erTarget" data-container="#wrap2" data-toggle="popover" data-placement="top"><span class="glyphicon glyphicon-question-sign"></span></button>
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
						<select id = "baseYear" name = "baseYear">
							<?php
							for($i = 2000; $i <= 2024; $i++){
								echo '<option value = "'.$i.'">'.$i.'</option>';
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><label for = "reducTar">Reduction Target (%)</label></td>
					<td><input type = "text" id = "reducTar" class = "" name = "reducTar"/></td>
				</tr>
				<tr>
					<td><label for = "targetYear">Target Year</label></td>
					<td>
						<select id = "targetYear" name = "targetYear">
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
				<button type="button" id="test" class="ghgChamp" data-container="#wrap2" data-toggle="popover" data-placement="top"><span class="glyphicon glyphicon-question-sign"></span></button>
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
					<td><input type = "text" id = "champname" class = "" name = "champname"/></td>
				</tr>
				<tr>
					<td><label for = "champtitle">Title</label></td>
					<td><input type = "text" id = "champtitle" class = "" name = "champtitle"/></td>
				</tr>
				<tr>
					<td><label for = "champtelnum">Phone Number</label></td>
					<td><input type = "tel" id = "champtelnum" class = "" name = "champtelnum"/></td>
				</tr>
				<tr>
					<td><label for = "champemail">Email</label></td>
					<td><input type = "email" id = "champemail" class = "" name = "champemail"/></td>
				</tr>
			</table>

			<h4 style="float:left">GHG Accountant</h4>

			<!--START BS-EXAMPLE-TOOLTIPS CLASS (GHG Accountant)-->
			<div id = "wrap2" style="float: left">
				<button type="button" id="test" class="ghgAccount" data-container="#wrap2" data-toggle="popover" data-placement="top"><span class="glyphicon glyphicon-question-sign"></span></button>
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
					<td><input type = "text" id = "accountname" class = "" name = "accountname"/></td>
				</tr>
				<tr>
					<td><label for = "accounttitle">Title</label></td>
					<td><input type = "text" id = "accounttitle" class = "" name = "accounttitle"/></td>
				</tr>
				<tr>
					<td><label for = "accounttelnum">Phone Number</label></td>
					<td><input type = "tel" id = "accounttelnum" class = "" name = "accounttelnum"/></td>
				</tr>
				<tr>
					<td><label for = "accountemail">Email</label></td>
					<td><input type = "email" id = "accountemail" class = "" name = "accountemail"/></td>
				</tr>
			</table>

			<h4 style="float:left">Reporting Year</h4>

			<!--START BS-EXAMPLE-TOOLTIPS CLASS (Reporting Year)-->

			<div id = "wrap2" style="float: left">
				<button type="button" id="test" class="reportYear" data-container="#wrap2" data-toggle="popover" data-placement="top"><span class="glyphicon glyphicon-question-sign"></span></button>
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
					<td><!-- Month dropdown -->
						<select name="yearEndMonth" id="yearEnd" onchange="" size="1">
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>

						<!-- Day dropdown -->
						<select name="yearEndDay" id="yearEndDay" onchange="" size="1">
							<option value="1">01</option>
							<option value="2">02</option>
							<option value="3">03</option>
							<option value="4">04</option>
							<option value="5">05</option>
							<option value="6">06</option>
							<option value="7">07</option>
							<option value="8">08</option>
							<option value="9">09</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>
							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
						</select>
					</td>
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
	"Manitoba": "MB",
	"New Brunswick": "NB",
	"Newfoundland/Labrador": "NL",
	"Northwest Terriroties": "NT",
	"Nova Scotia": "NS",
	"Nunavut": "NU",
	"Ontario": "ON",
	"Prince Edward Island": "PE",
	"Quebec": "QC",
	"Saskatchewan": "SK",
	"Yukon": "YT"
},
{
	"Alabama": "AL",
	"Alaska": "AK",
	"Arizona": "AZ",
	"Arkansas": "AR",
	"California": "CA",
	"Colorado": "CO",
	"Connecticut": "CT",
	"Delaware": "DE",
	"District of Columbia": "DC",
	"Florida": "FL",
	"Georgia": "GA",
	"Hawaii": "HI",
	"Idaho": "ID",
	"Illinois": "IL",
	"Indiana": "IN",
	"Iowa": "IA",
	"Kansas": "KS",
	"Kentucky": "KY",
	"Lousiana": "LA",
	"Maine": "ME",
	"Maryland": "MD",
	"Massachusetts": "MA",
	"Michigan": "MI",
	"Minnesota": "MN",
	"Mississippi": "MS",
	"Missouri": "MO",
	"Montana": "MT",
	"Nebraska": "NE",
	"Nevada": "NV",
	"New Hampshire": "NH",
	"New Jersey": "NJ",
	"New Mexico": "NM",
	"New York": "NY",
	"North Carolina": "NC",
	"North Dakota": "ND",
	"Ohio": "OH",
	"Oklahoma": "OK",
	"Oregon": "OR",
	"Pennsylvania": "PA",
	"Rhode Island": "RI",
	"South Carolina": "SC",
	"South Dakota": "SD",
	"Tennessee": "TN",
	"Texas": "TX",
	"Utah": "UT",
	"Vermont": "VT",
	"Virginia": "VA",
	"Washington": "WA",
	"West Virgina": "WV",
	"Wisconsin": "WI",
	"Wyoming": "WY"
}
];

$(document).ready(function () {

	$(".selCountry").change(function () {
		var val = $(this).val() - 1;
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

	$('#corporate-form').on('submit', function(e){
		e.preventDefault();

		var data = $(this).serializeObject(); // Sets data as a key: value object list of all the form elements
		var page = 'corp';
		var action = 'add';

		parseAction(page, action, data)
			.success(function(data){console.log(data.actionPerformed + " successfully completed.");})
			.fail(function(){console.log($(this).attr('id') + " failed to submit to server.");});
	});

	// Tool tip handlers
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