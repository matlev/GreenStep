<!--START TOP CLASS-->
<div class = "top-tooltip clearfix">
	<div class = "third left" style="width:25%">
		<p>Set up the authorization levels for each business unit</p>
	</div>

	<div style="float:left; width:19.5%; margin-left:20px; padding-top:25px">
		1.&nbsp;&nbsp;&nbsp;<select id = "accessUnit" class = "accessUnit" name = "accessUnit" onchange="accessUnitChanged()">
			<option value = "0" selected = "selected">N/A</option>
		</select>
	</div>
<div id="message"></div>
	<div style="float:left; width:19.5%; padding-top:25px">
		2.&nbsp;&nbsp;&nbsp;<input type="button" id="clearUser" value="Create a new user class" style="width:180px">
	</div>
	<br>
	<div style="margin-right:40%;float:right; width: 13.8%">
		or&nbsp;&nbsp;&nbsp;<select id = "accessUser" class = "accessUser" name = "accessUser" onchange="accessUserChanged()">
			<option value = "0" selected = "selected" id="0">N/A</option>
		</select>
	</div>

	<script>
//

			function accessUnitChanged(){
				var data = "changeUnit=" + $('#accessUnit').val();
					var page = "access";
					var action = "pull";


					parseAction(page, action, data)
					.success(function(result){
						var users = result.data.accUsers;
						 pass = result.data.userPassword;
						var employeeId=result.data.employeeId;
						var accUserHTML;
						
						var length = users.length;

						for(i = 0; i < length; i++){
							if(i == 0){
								accUserHTML += "<option value = " + employeeId[i] + " selected = 'selected'>" + users[i] + "</option>";
								
					  	
							} else {
								accUserHTML += "<option value = " + employeeId[i] + ">" + users[i] + "</option>";
								
							}
						}
						$('#accessUser').empty().html(accUserHTML);
						$('#username').val($('#accessUser option:selected').text());
						 var  userIndex=$('#accessUser option:selected').index();
			                                      
			            $('#password').val(pass[userIndex]);                       
					})

			}
			 function accessUserChanged(){

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
						})
				}

</script>

</div>

	<form method = "POST" id = "access-form" class = "clearfix">
		<div><!-- open first row-->	
			
			<h4 style="float:left"><u>Access Level</u></h4>
			<table >
				<tr>
					<td><label for ="username">Username</label></td>
					<td><input type="text" id="username" name = "username"/></td>
				</tr>
				<tr>
					<td><label for ="password">Password</label></td>
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
					<button type="submit" id="accSave" class="btn btn-primary" style="width:100px"> Save </button> 
					<div style="float:right; width:30%">
						<button type="button" id="accDelete" class="btn btn-primary" style="width:100px"> Delete </button> 
					</div>
			</div>
			<!--END FORM-CONTROLS LEFT CLEARFIX CLASS-->		
		</div>


	
	</form>
	<script>
//

	
	var newUser="false";

	

	
	$('#access-form').on('submit', function(e){
		e.preventDefault();
		if(newUser=="true")
		{

		var data = "username="+$('#username').val() + "&password="+$('#password').val() + "&accessUnit="+$('#accessUnit').val();  // Sets data as a key: value object list of all the form elements
		//data.push({"accessUser" : $('#accessUser').val()});
		var page = 'access';
		var action = 'add';

		parseAction(page, action, data)
			.success(function(data){console.log(data.actionPerformed + " successfully completed.\n" + data.debug_message	); newUser = "false";$("#accessUnit").triggerHandler("change");})
			.fail(function(){console.log($(this).attr('id') + " failed to submit to server.");});
		}else
		{
		var data = "username="+$('#username').val() + "&password="+$('#password').val() + "&employeeId="+$('#accessUser').val();  // Sets data as a key: value object list of all the form elements
		var page = 'access';
		var action = 'update';

		parseAction(page, action, data)
			.success(function(data){console.log(data.actionPerformed + " successfully completed.\n" + data.debug_message	);})
			.fail(function(){console.log($(this).attr('id') + " failed to submit to server.");});
		}
	});
	
	$('#accDelete').click( function(){
		
		var data = "employeeId="+$('#accessUser').val() // Sets data as a key: value object list of all the form elements
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

</script>

<!--END MIDDLE CLASS-->	
