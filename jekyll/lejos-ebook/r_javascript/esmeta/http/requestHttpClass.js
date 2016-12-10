/*
Clase JS, que controla todas las operaciones con el protocolo Http

+ Get
+ Cookies
+ Redireccion (NEW)

*/

// Basado en el las ideas de Scott Andrew

function httpRequestClass(){
	this.getArray = null;
};

/*
GET METHODS
*/

httpRequestClass.prototype.getDataFromGetProtocol = function(global){
	var args = {};
	var loc = window.location.href;
	var q = loc.indexOf("?");
	if (q==-1) return false;
	loc = loc.substring(q+1);
	var pairs = loc.split("&");
	for (var i=0; i<pairs.length;i++){
		if (global) eval(pairs[i]);
		var keyval = pairs[i].split("=");
		args[keyval[0]] = unescape(keyval[1]);
	}
	return args;
};
httpRequestClass.prototype.getParameter = function(stringKey){
	this.getArray = this.getDataFromGetProtocol();

	return this.getArray[stringKey];
};

/*
COOKIE METHODS
*/

// Cookie Functions -- "Night of the Living Cookie" Version (25-Jul-96)
//
//******************************************************************
//
// "Internal" function to return the decoded value of a cookie
//

httpRequestClass.prototype.getCookieVal = function(offset){
	var endstr = document.cookie.indexOf (";", offset);
	if (endstr == -1){
		endstr = document.cookie.length;
	}
	return unescape(document.cookie.substring(offset, endstr));
};
//
//  Function to correct for 2.x Mac date bug.  Call this function to
//  fix a date object prior to passing it to SetCookie.
//  IMPORTANT:  This function should only be called *once* for
//  any given date object!  See example at the end of this document.
//
httpRequestClass.prototype.FixCookieDate = function (date) {
	var base = new Date(0);
	var skew = base.getTime(); // dawn of (Unix) time - should be 0
	if (skew > 0){// Except on the Mac - ahead of its time
		date.setTime (date.getTime() - skew);
	}
};
//
//  Function to return the value of the cookie specified by "name".
//    name - String object containing the cookie name.
//    returns - String object containing the cookie value, or null if
//      the cookie does not exist.
//
httpRequestClass.prototype.getCookie = function(name){
	var arg = name + "=";
	var alen = arg.length;
	var clen = document.cookie.length;
	var i = 0;
	while (i < clen){
		var j = i + alen;
		if (document.cookie.substring(i, j) == arg){
			return this.getCookieVal (j);
		}
		i = document.cookie.indexOf(" ", i) + 1;
		if (i == 0) break; 
	}
	return null;
};

//
//  Function to create or update a cookie.
//    name - String object containing the cookie name.
//    value - String object containing the cookie value.  May contain
//      any valid string characters.
//    [expires] - Date object containing the expiration data of the cookie.  If
//      omitted or null, expires the cookie at the end of the current session.
//    [path] - String object indicating the path for which the cookie is valid.
//      If omitted or null, uses the path of the calling document.
//    [domain] - String object indicating the domain for which the cookie is
//      valid.  If omitted or null, uses the domain of the calling document.
//    [secure] - Boolean (true/false) value indicating whether cookie transmission
//      requires a secure channel (HTTPS).  
//
//  The first two parameters are required.  The others, if supplied, must
//  be passed in the order listed above.  To omit an unused optional field,
//  use null as a place holder.  For example, to call SetCookie using name,
//  value and path, you would code:
//
//      SetCookie ("myCookieName", "myCookieValue", null, "/");
//
//  Note that trailing omitted parameters do not require a placeholder.
//
//  To set a secure cookie for path "/myPath", that expires after the
//  current session, you might code:
//
//      SetCookie (myCookieVar, cookieValueVar, null, "/myPath", null, true);
//
httpRequestClass.prototype.setCookie = function(name,value,expires,path,domain,secure){
	document.cookie = name + "=" + escape (value) +
	((expires) ? "; expires=" + expires.toGMTString() : "") +
	((path) ? "; path=" + path : "") +
	((domain) ? "; domain=" + domain : "") +
	((secure) ? "; secure" : "");
};

//  Function to delete a cookie. (Sets expiration date to start of epoch)
//    name -   String object containing the cookie name
//    path -   String object containing the path of the cookie to delete.  This MUST
//             be the same as the path used to create the cookie, or null/omitted if
//             no path was specified when creating the cookie.
//    domain - String object containing the domain of the cookie to delete.  This MUST
//             be the same as the domain used to create the cookie, or null/omitted if
//             no domain was specified when creating the cookie.
//
httpRequestClass.prototype.deleteCookie = function(name,path,domain) {
	if (GetCookie(name)){
		document.cookie = name + "=" +
		((path) ? "; path=" + path : "") +
		((domain) ? "; domain=" + domain : "") +
		"; expires=Thu, 01-Jan-70 00:00:01 GMT";
	}
};

// Funciones nuevas de cookies.
httpRequestClass.prototype.getCookieExpires = function(days){
	// Variando expdate variamos el tiempo de persistencia.
	var expdate = new Date ();
	expdate.setTime(expdate.getTime() + (days * 24 * 60 * 60 * 1000));
	return expdate
};

//Nuevo metodo.
httpRequestClass.prototype.redirect = function(URL){
	document.location.href = URL;
};