/***********************************************************************/
/* Author: Mathew Levasseur                                            */
/* CopyRight: Greenstep Solutions Inc.                                 */
/* Date: January 9, 2015                                               */
/*                                                                     */
/* A Javascript API that connects the ecobase web app to the server.   */
/* The function requires the tab calling the function, the action to   */
/* to take and any data that needs to be parsed with the request.  The */
/* function returns any data from the server that needs to be updated  */
/* on the webpage (typically an update request).                       */
/***********************************************************************/


/**
	Parses the action taken on the ecobase application and returns the result

	@page The active tab calling the action
	@action The action to take on the database (add, delete, update, pull)
	@caller The HTML element responsible for calling the function; used for debugging purposes only.  Can be null, but it's suggested to always include $(this) when using this function
	@data Default null, an action may or may not have data to send to the controller to be parsed.  Data can either be an array, a key => value object list or a single item

	@return The success message and any data returned from the server
*/
function parseAction(page, action, data, caller) {
	var server = 'ecoAjaxListener.php';
	var info = "page=" + page + "&action=" + action;
	var result;
	
	if(data != null){
		if(Array.isArray(data)) {
			// An array of values
			var size = data.length;
			
			for(i = 0; i < size; i++) {
				info += "&" + i + "=" + data[i];
			}
		} else if(data instanceof Object) {
			// An object list of key => value pairs
			for(var key in data) {
				info += "&" + key + "=" data[key];
			}
		} else if(typeof data === "string"){
			// A string, assumed to only be one value
			info += "&0=" + data;
		}
	}
	
	$.ajax({
		url: server,
		type: 'POST',
		dataType: 'JSON',
		data: info,
		asynchronous: false,
		success: function(data) {
			console.log(data); // DEBUG, remove this later
			result = data;
		},
		error: function() {
			result = "Error handling request " + action + " in tab " + page + " called by element " + caller;
		}
	});
	
	return result;
}

Object.size = function(obj) {
	var size = 0, key;
	for (key in obj) {
		if (obj.hasOwnProperty(key)) size++;
	}
	return size;
};