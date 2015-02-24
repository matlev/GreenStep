<!--START TOP CLASS-->
<div class = "top-tooltip clearfix">
	<div class = "third left" style="width:25%">
		<p>Set up the authorization levels for each business unit</p>
	</div>

	<div style="float:left; width:19.5%; margin-left:20px; padding-top:25px">
		1.&nbsp;&nbsp;&nbsp;<select id = "accessUnit" class = "required accessUnit" name = "accessUnit">
			<option value = "0" selected = "selected">N/A</option>
		</select>
	</div>

	<div style="float:left; width:19.5%; padding-top:25px">
		2.&nbsp;&nbsp;&nbsp;<input type="button" id="clearUser" value="Create a new user class" style="width:180px">
	</div>
	<br>
	<div style="margin-right:40%;float:right; width: 13.8%">
		or&nbsp;&nbsp;&nbsp;<select id = "accessUser" class = "required accessUser" name = "accessUser">
			<option value = "0" selected = "selected" id="0">N/A</option>
		</select>
	</div>
</div>

	<form method = "POST" id = "access-form" class = "clearfix">
		<div><!-- open first row-->	
			
			<h4 style="float:left"><u>Access Level</u></h4>

			<table >
				<tr>
					<td><label for = "access-measure" style="font-weight:normal">Measure</label></td>
					<td>
						<input type="checkbox" id = "access-measure" name = "measure" value"measureOn" checked></input>
					</td>
				</tr>
				<tr>
					<td><label for = "access-report" style="font-weight:normal">Report</label></td>
					<td>
						<input type="checkbox" id = "access-report" value"reportOn" name = "report"></input>
					</td>
				</tr>
				<tr>
					<td><label for = "access-reduce" style="font-weight:normal">Reduce</label></td>
					<td>
						<input type="checkbox" id = "access-reduce" value"reduceOn" name = "reduce"></input>
					</td>
				</tr>
				<tr>
					<td><label for = "access-offset" style="font-weight:normal">Offset</label></td>
					<td>
						<input type="checkbox" id = "access-offset" value"offsetOn"name = "offset"></input>
					</td>
				</tr>
				<tr>
					<td><label for ="username" style="font-weight:normal">Username</label></td>
					<td><input type="text" id="username" name = "username"/></td>
				</tr>
				<tr>
					<td><label for ="password" style="font-weight:normal">Password</label></td>
					<td><input type="text" id="password" name = "password"/></td>
				</tr>
			</table>

			<br>

			<div style="margin-left:15px">
				<text style="font-size:16px">Provide the URL below to users who have been set up for limited access. 
					<br>It will allow them to log in and use GobiSoft at the selected authorization level.
					<br><a href="http://www.ecobase.net/ecobase-user-limited-access-login">http://www.ecobase.net/ecobase-user-limited-access-login</a>
				</text>
			</div>
			<br>		

			<!--END 2nd HALF LEFT CLASS-->	

			<!--START FORM-CONTROLS LEFT CLEARFIX CLASS-->
			
			<div class = "form-controls left clearfix">
				<div style="float:right; margin-right:20%">
					<button type = "submit" class="btn btn-primary" style="width:100px">Save</button>
				</div>
				<div style="float:left; margin-left:57%">
					<button type="delete" id="delete" class="btn btn-primary" style="width:100px">Delete</button>
				</div>
			</div>
			<!--END FORM-CONTROLS LEFT CLEARFIX CLASS-->		
		</div>
	</form>

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
			.success(function(data){console.log(data.actionPerformed + " successfully completed."); newUser = "false";$("#accessUnit").triggerHandler("change");})
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
			.success(function(data){console.log(data.actionPerformed + " successfully completed.");$("#accessUnit").triggerHandler("change");$("#clearUser").triggerHandler("click");})
			.fail(function(){console.log($(this).attr('id') + " failed to submit to server.");});
		
		
	});

	$('#clearUser').click( function(){

		newUser="true";
 		$('#username').val('');
 		

                           
       $('#password').val('');

      
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