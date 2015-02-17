
<!--START MIDDLE CLASS-->
<div class = "middle">

	<form method = "POST" id = "access-form" class = "clearfix">
		<div class = "half left"><!-- open first row-->	
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
						<div>
							<input type="button" id="clearUser" value="new User">
						</div>
					</td>
				</tr>
				<tr>
					<td><label for = "accessUser">Select User</label></td>
					<td>
						<div class="required">
							<select id = "accessUser" class = "required accessUser" name = "accessUser">
								<option value = "0" selected = "selected" id="0">N/A</option>

							</select>
						</div>
					</td>
				</tr>
			</table>

			<h4 style="float:left">Access Level </h4>

			<table >
				<tr>
					<td><label for = "access-measure">Measure</label></td>
					<td>
						<input type="checkbox" id = "access-measure" name = "measure" value"measureOn" checked></input>
					</td>
				</tr>
				<tr>
					<td><label for = "access-report">Report</label></td>
					<td>
						<input type="checkbox" id = "access-report" value"reportOn" name = "report"></input>
					</td>
				</tr>
				<tr>
					<td><label for = "access-reduce">Reduce</label></td>
					<td>
						<input type="checkbox" id = "access-reduce" value"reduceOn" name = "reduce"></input>
					</td>
				</tr>
				<tr>
					<td><label for = "access-offset">Offset</label></td>
					<td>
						<input type="checkbox" id = "access-offset" value"offsetOn"name = "offset"></input>
					</td>
				</tr>
				<tr>
					<td><label for ="username">Username</label></td>
					<td><input type="text" id="username" name = "username"/></td>
				</tr>
				<tr>
					<td><label for ="password">Password</label></td>
					<td><input type="text" id="password" name = "password"/></td>
				</tr>
			</table>

			<div class = "top-tooltip">
				<p>Provide the URL below to users who have been set up for limited access. it will allow them to log in and use GobiSoft at the selected authorization level. </p>
			</div>			

			<!--END 2nd HALF LEFT CLASS-->	

			<!--START FORM-CONTROLS LEFT CLEARFIX CLASS-->
			
			<div class = "form-controls left clearfix">
				<input type="button" id="delete" value="Delete" >
				<button type = "submit">Save</button>
			</div>
			<!--END FORM-CONTROLS LEFT CLEARFIX CLASS-->	

			<!--START REQUIRED FIELD CLASS-->
			<div class = "requiredfield">
				<p>* Required Field</p>
			</div>
			<!--END REQUIRED FIELD CLASS-->	
		</div>
	</form>

</div>
<!--END MIDDLE CLASS-->	

<script>
//


$(document).ready(function () {

var newUser="false";

	$('#accessUnit').on('change', function(){

		var data = "changeUnit=" + $(this).val();
		var page = "access";
		var action = "pull";

		parseAction(page, action, data)
		.success(function(result){
			var users = result.data.accUsers;
			 pass = result.data.userPassword;
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
			$('#username').val($('#accessUser option:selected').text());
			 var  userIndex=$('#accessUser option:selected').index();
                           
            $('#password').val(pass[userIndex]);                       
		})
		.fail(function(){});
	});

	$('#accessUser').on('change', function(){

		var data = "changeUnit=" +$('#accessUnit').val();
		var page = "access";
		var action = "pull";

		parseAction(page, action, data)
		.success(function(result){
			var users = result.data.accUsers;
			 pass = result.data.userPassword;
			var accUserHTML;

		
			$('#username').val($('#accessUser option:selected').text());
			var  userIndex=$('#accessUser option:selected').index();
			$('#password').val(pass[userIndex]);                         
			});
	});

	$('#access-form').on('submit', function(e){
		e.preventDefault();
		if(newUser=="true")
		{
		var data = $(this).serializeObject(); // Sets data as a key: value object list of all the form elements
		var page = 'access';
		var action = 'add';

		parseAction(page, action, data)
			.success(function(data){console.log(data.actionPerformed + " successfully completed."); newUser = "false";})
			.fail(function(){console.log($(this).attr('id') + " failed to submit to server.");});
		}else
		{
		var data = $(this).serializeObject(); // Sets data as a key: value object list of all the form elements
		var page = 'access';
		var action = 'update';

		parseAction(page, action, data)
			.success(function(data){console.log(data.actionPerformed + " successfully completed.");})
			.fail(function(){console.log($(this).attr('id') + " failed to submit to server.");});
		}
	});
	
	$('#delete').click( function(){
		
		var data = "accessUser="+$('#username').val(); // Sets data as a key: value object list of all the form elements
		var page = 'access';
		var action = 'delete';

		parseAction(page, action, data)
			.success(function(data){console.log(data.actionPerformed + " successfully completed.");$('#username').val(' ');$('#password').val('  ');})
			.fail(function(){console.log($(this).attr('id') + " failed to submit to server.");});
		
		
	});

	$('#clearUser').click( function(){

		newUser="true";
 		$('#username').val(' ');
 		

                           
       $('#password').val('  ');

      
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