
<!--START MIDDLE CLASS-->
<div class = "middle">
	<form method = "POST" id = "access-form" class = "clearfix">

		<!--START 1st HALF LEFT CLASS-->		
		<div class = "half left">
			<div class = "top-tooltip">
				<p>Set up the authorization levels \n for each business unit</p>
			</div>
						<!--START 1st Line-->
			<table>
					
				<tr>
					<td><label for = "accessUnit">Select Unit</label></td>
					<td>
						<div class="required">
							<select id = "accessUnit" class = "required accessUnit" name = "accessUnit">
								<option value = "0" selected = "selected">N/A</option>
							</select>
						</div>
					</td>
				</tr>
				
				<tr>
					<td><label for = "createUser">Create a User</label></td>
					<td>
						<div class="required">
							<button type="button" class="btn btn-default">Create User</button>
						</div>
					</td>
				</tr>
				<tr>
					<td><label for = "accessUser">Select User</label></td>
					<td>
						<div class="required">
							<select id = "accessUser" class = "required accessUser" name = "accessUser">
								<option value = "0" selected = "selected">N/A</option>
							</select>
						</div>
					</td>
				</tr>
			</table>

			
		<h4 style="float:left">Access Level </h4>
		
			<table >
			
				<tr>
					<td><label for = "measure">Measure</label></td>
					<td>
						<input type="checkbox" id = "measure" name = "measure">	
						</input>
					</td>
				</tr>
				<tr>
					<td><label for = "report">Report</label></td>
					<td>
						<input type="checkbox" id = "report" name = "report">	
						</input>
					</td>
				</tr>
				<tr>
					<td><label for = "reduce">Reduce</label></td>
					<td>
						<input type="checkbox" id = "reduce" name = "reduce">	
						</input>
					</td>
				</tr>
				<tr>
					<td><label for = "reduce">Measure</label></td>
					<td>
						<input type="checkbox" id = "reduce" name = "reduce">	
						</input>
					</td>
				</tr>
				<tr>
					<td><label for ="username">Username</label></td>
					<td><div class="required"><input type="text" id="username" name = "username"/></div></td>
				</tr>
				<tr>
					<td><label for ="password">Password</label></td>
					<td><div class="required"><input type="text" id="password" name = "password"/></div></td>
				</tr>
			</table>

			<div class = "top-tooltip">
				<p>Provide the URL below to users who have been set up for limited access. 
				it will allow them to log in and use GobiSoft at the selected authorization level. </p>
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

$(document).ready(function () {



	$('#access-form').on('submit', function(e){
		e.preventDefault();

		var data = $(this).serializeObject(); // Sets data as a key: value object list of all the form elements
		var page = 'access';
		var action = 'add';

		parseAction(page, action, data)
			.success(function(data){console.log(data.actionPerformed + " successfully completed.");})
			.fail(function(){console.log($(this).attr('id') + " failed to submit to server.");});
	});

	
	$('#accessUnit').on('change', function(){

		var data = "changeUnit=" + $(this).val();
		var page = "access";
		var action = "pull";
		
		parseAction(page, action, data)
			.success(function(result){
				var users = result.data.accUsers;
				
				var accUserHTML;
				var length = users.length;
				
				for(i = 0; i < length; i++){
					if(i == 0){
						accUserHTML += "<option value = " + users[i] + " selected = 'selected'>" + users[i] + "</option>";
					} else {
						accUserHTML += "<option value = " + users[i] + ">" + users[i] + "</option>";
					}
				}
				
				$('#accessUser').empty().html(accUserHTML);
			})
			.fail(function(){});
	});

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