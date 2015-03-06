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
					<td><label for = "access-admin" style="visibility:hidden" >Admin</label></td>
					<td>
						<input type="checkbox" id = "access-admin" name = "access-admin" value="0" style="visibility:hidden" ></input>
					</td>
				</tr>
				<tr>
					<td><label for = "access-measure">Measure</label></td>
					<td>
						<input type="checkbox" id = "access-measure" name = "access-measure" value="0"></input>
					</td>
				</tr>
				<tr>
					<td><label for = "access-report">Report</label></td>
					<td>
						<input type="checkbox" id = "access-report" value="0" name = "access-report"></input>
					</td>
				</tr>
				<tr>
					<td><label for = "access-reduce">Reduce</label></td>
					<td>
						<input type="checkbox" id = "access-reduce" value="0" name = "access-reduce"></input>
					</td>
				</tr>
				<tr>
					<td><label for = "access-offset">Offset</label></td>
					<td>
						<input type="checkbox" id = "access-offset" value="0"name = "access-offset"></input>
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
			 role = result.data.userRole;
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
                           
		
             //admin
             if(role[userIndex].charAt(0)=='1')
           {
            $('#access-admin').prop('checked',true);
            $('#access-admin').val('1');
           }

           else if(role[userIndex].charAt(0)=='0')
           {
            $('#access-admin').prop('checked',false);
            $('#access-admin').val('0');
           }
            //measure
             if(role[userIndex].charAt(1)=='1')
           {
            $('#access-measure').prop('checked',true);
            $('#access-measure').val('1');
           }

           else if(role[userIndex].charAt(1)=='0')
           {
            $('#access-measure').prop('checked',false);
            $('#access-measure').val('0');
           }
            //report
             if(role[userIndex].charAt(2)=='1')
           {
            $('#access-report').prop('checked',true);
            $('#access-report').val('1');
           }

           else if(role[userIndex].charAt(2)=='0')
           {
            $('#access-report').prop('checked',false);
            $('#access-report').val('0');
           }
            //reduce
             if(role[userIndex].charAt(3)=='1')
           {
            $('#access-reduce').prop('checked',true);
            $('#access-reduce').val('1');
           }

           else if(role[userIndex].charAt(3)=='0')
           {
            $('#access-reduce').prop('checked',false);
            $('#access-reduce').val('0');
           }
            //offset
             if(role[userIndex].charAt(4)=='1')
           {
            $('#access-offset').prop('checked',true);
            $('#access-offset').val('1');
           }

           else if(role[userIndex].charAt(4)=='0')
           {
            $('#access-offset').prop('checked',false);
            $('#access-offset').val('0');
           }


           
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


           //admin
             if(role[userIndex].charAt(0)=='1')
           {
            $('#access-admin').prop('checked',true);
            $('#access-admin').val('1');
           }

           else if(role[userIndex].charAt(0)=='0')
           {
            $('#access-admin').prop('checked',false);
            $('#access-admin').val('0');
           }
            //measure
             if(role[userIndex].charAt(1)=='1')
           {
            $('#access-measure').prop('checked',true);
            $('#access-measure').val('1');
           }

           else if(role[userIndex].charAt(1)=='0')
           {
            $('#access-measure').prop('checked',false);
            $('#access-measure').val('0');
           }
            //report
             if(role[userIndex].charAt(2)=='1')
           {
            $('#access-report').prop('checked',true);
            $('#access-report').val('1');
           }

           else if(role[userIndex].charAt(2)=='0')
           {
            $('#access-report').prop('checked',false);
            $('#access-report').val('0');
           }
            //reduce
             if(role[userIndex].charAt(3)=='1')
           {
            $('#access-reduce').prop('checked',true);
            $('#access-reduce').val('1');
           }

           else if(role[userIndex].charAt(3)=='0')
           {
            $('#access-reduce').prop('checked',false);
            $('#access-reduce').val('0');
           }
            //offset
             if(role[userIndex].charAt(4)=='1')
           {
            $('#access-offset').prop('checked',true);
            $('#access-offset').val('1');
           }

           else if(role[userIndex].charAt(4)=='0')
           {
            $('#access-offset').prop('checked',false);
            $('#access-offset').val('0');
           }

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

	$('#access-measure').change(function()
	{
   
   		 $(this).val(this.checked ? 1 : 0);
    	 console.log($(this).val());
	});
	$('#access-report').change(function()
	{
    $(this).val(this.checked ? 1 : 0);
    	 console.log($(this).val());
	});
	$('#access-reduce').change(function()
	{
    $(this).val(this.checked ? 1 : 0);
    	 console.log($(this).val());
	});
	$('#access-offset').change(function()
	{
   $(this).val(this.checked ? 1 : 0);
    	 console.log($(this).val());
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