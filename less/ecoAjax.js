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
	@data Default null, an action may or may not have data to send to the controller to be parsed.  Data can either be an array, a key => value object list or a single item

	@return The success message and any data returned from the server
*/
function parseAction(page, action, data) {
	var server = 'lib/ecoAjaxListener.php';
	var info = "page=" + page + "&action=" + action;
	
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
				if(data.hasOwnProperty(key)){
					info += "&" + key + "=" + data[key];
				}
			}
		} else if(typeof data === "string"){
			// A string, assumed to only be one value
			info += "&" + data;
		}
	}
	
	return $.ajax({
		url: server,
		type: 'POST',
		dataType: 'JSON',
		data: info
	});
}

Object.size = function(obj) {
	var size = 0, key;
	for (key in obj) {
		if (obj.hasOwnProperty(key)) size++;
	}
	return size;
};