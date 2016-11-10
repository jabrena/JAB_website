/*
Class: UserAdminControllerClass
Description: Clase que controla la interaccion de la pagina web: Index.htm
Author: JAB
Info: bren@juanantonio.info
*/

//Clase que controla el fichero Home.htm
function UserAdminControllerClass(){
	this.error = false;
};

/*************************
***** FOOTER METHODS *****
*************************/

UserAdminControllerClass.prototype.writeFooter = function(){
  	var FECHA = new Date();
  	var ANHO = FECHA.getYear();
  	if(ANHO < 2000) { ANHO = ANHO + 1900; }
 
	//CSS STYLE
	document.write('<style type="text/css">');
	document.write('p.esmeta_footer{font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;	font-size: 10px;}')
	document.write('p.esmeta_footer{margin-left: 20px; text-align: left;}')
	document.write('a.esmeta{text-decoration: none;	color: #000000;	}');
	document.write('a.esmeta:link{text-decoration: none;}');
	document.write('a.esmeta:visited{text-decoration: none;}'); 
	document.write('a.esmeta:hover{text-decoration: underline;}');
	document.write('</style>');

	document.write('<p class="esmeta_footer"><a href="http://www.esmeta.es" class="esmeta" target="_blank">Esmeta</a> &reg; 1997-'+ ANHO + '</p><br />');
	return true;
};

/**************************
***** WEB 2.0 METHODS *****
**************************/

UserAdminControllerClass.prototype.getPageSize = function(){
	
	var xScroll, yScroll;
	
	if (window.innerHeight && window.scrollMaxY) {	
		xScroll = document.body.scrollWidth;
		yScroll = window.innerHeight + window.scrollMaxY;
	} else if (document.body.scrollHeight > document.body.offsetHeight){ // all but Explorer Mac
		xScroll = document.body.scrollWidth;
		yScroll = document.body.scrollHeight;
	} else { // Explorer Mac...would also work in Explorer 6 Strict, Mozilla and Safari
		xScroll = document.body.offsetWidth;
		yScroll = document.body.offsetHeight;
	}
	
	var windowWidth, windowHeight;
	if (self.innerHeight) {	// all except Explorer
		windowWidth = self.innerWidth;
		windowHeight = self.innerHeight;
	} else if (document.documentElement && document.documentElement.clientHeight) { // Explorer 6 Strict Mode
		windowWidth = document.documentElement.clientWidth;
		windowHeight = document.documentElement.clientHeight;
	} else if (document.body) { // other Explorers
		windowWidth = document.body.clientWidth;
		windowHeight = document.body.clientHeight;
	}
	
	// for small pages with total height less then height of the viewport
	if(yScroll < windowHeight){
		pageHeight = windowHeight;
	} else { 
		pageHeight = yScroll;
	}

	// for small pages with total width less then width of the viewport
	if(xScroll < windowWidth){	
		pageWidth = windowWidth;
	} else {
		pageWidth = xScroll;
	}


	arrayPageSize = new Array(pageWidth,pageHeight,windowWidth,windowHeight) 
	return arrayPageSize;
}

/*********************************
***** EXTRANET LOGIN METHODS *****
*********************************/

UserAdminControllerClass.prototype.showWebForm = function(){
 		var arrayPageSize = this.getPageSize();
 		
 		var objOverlay = document.getElementById("overlay");
		objOverlay.style.display = "block";
  		var loginContainer = document.getElementById("NEW_ACCOUNT");
		loginContainer.style.display = "block";
		objOverlay.style.height = arrayPageSize[1];

		lcWDimensions = 300;
		lcHDimensions = 100;
		lcx = (arrayPageSize[0]/2)-(lcWDimensions/2);
		loginContainer.style.left = lcx;
		lcy = (arrayPageSize[1]/2)-(lcHDimensions);
		loginContainer.style.top = lcy;
}

UserAdminControllerClass.prototype.createAccount = function(){
		//WEB 2.0 trick; Running in IE6 and FIREFOX 1.5 and 2.0
		//How to use Publics methods into AJAX response methods.
		obj_uacc = new UserAdminControllerClass();
		obj_uacc.setDIV_HS("CREATE_ACCOUNT_AVAILABLE",1);
		
		var HTML_STRING = "";
		HTML_STRING += '		<table cellpadding="0" cellspacing="0" class="CREATE_ACCOUNT" width="300">';
		HTML_STRING += '			<tr>';
		HTML_STRING += '				<td><input type="button" value="Create Account" class="LOGIN_SUBMIT" onclick="WPCObject.onClickCreateUser()" /></td>';
		HTML_STRING += '				<td><img id="INDICATOR_ADD_USER" src="r_media/images/indicator.gif" style="display: none;"/></td>';
		HTML_STRING += '			</tr>';
		HTML_STRING += '		</table>';
		obj_uacc.setDIV_HTML("CREATE_ACCOUNT_BUTTON",HTML_STRING);

		
		this.showWebForm();
		
		document.forms["CREATE_ACCOUNT"].reset();
		document.forms["CREATE_ACCOUNT"].USER.disabled = false;
		document.forms["CREATE_ACCOUNT"].USER.focus();
}

UserAdminControllerClass.prototype.closeExtranetLogin = function(){
	var obj = document.getElementById("NEW_ACCOUNT");
	obj.style.display = "none";
	var obj = document.getElementById("overlay");
	obj.style.display = "none";
}

/**************************************
***** EVENT: check available name *****
***************************************/

UserAdminControllerClass.prototype.trimString = function(str){
	return str.replace(/^\s+/g, '').replace(/\s+$/g, '');
};

UserAdminControllerClass.prototype.onclickCheckAvailable = function(obj){
	if(!this.error){
		var USER = this.trimString(document.forms["CREATE_ACCOUNT"].USER.value);
		if(USER == ''){
			alert("There is not any USERNAME to check");
			document.forms["CREATE_ACCOUNT"].USER.focus();
		}else{

			var OBJ;
			OBJ = document.getElementById("INDICATOR_AVAILABLE");
			OBJ.style.display = "block";

			this.AJAX_checkUserNameAvailable(USER);
		}
	}
};


UserAdminControllerClass.prototype.AJAX_checkUserNameAvailable = function(USER){

var url = "r_php/ewccc/users/checkAvailable.php";
var pars = 'USER='+ USER;

//Ajax Prototype Framework
var myAjax = new Ajax.Request(url,
{
method: 'post',
parameters: pars,
onComplete: this.showResponseCheckAvailable,
onFailure: this.reportError
});
}

UserAdminControllerClass.prototype.reportError = function(){
	alert("Sorry, There was a error");
}

function readEsmetaXML(tag,data){
	var openTag = "<" + tag + ">";
	var closedTag = "</" + tag + ">";
	var index1 = data.indexOf(openTag);
	if(index1 == -1){
		return index1;
	}
	var index2 = data.indexOf(closedTag);
	if(index2 == -1){
		return index2;
	}
	var from = index1 + openTag.length;
	var until = index2
	var content = data.substring(from,until);
	return content;
}

UserAdminControllerClass.prototype.showResponseCheckAvailable = function (originalRequest){
	//Oculto indicador de AJAX
	var OBJ;
	OBJ = document.getElementById("INDICATOR_AVAILABLE");
	OBJ.style.display = "none";

	//alert(originalRequest.responseText);
	
	var data = originalRequest.responseText;	
	var message = readEsmetaXML("esmeta",data);
	//alert(message)
	if(message != -1){
		message = readEsmetaXML("transaction",data);
		if(message != -1){
			//alert(message)
			if(message == 1){
				document.forms["CREATE_ACCOUNT"].BLUSERNAMECHECKED.value = 1;
				alert('The USER name is avalaible');
				document.forms["CREATE_ACCOUNT"].USER_PASSWORD.focus();
			}else{
				alert("This USER has been create before.");
				document.forms["CREATE_ACCOUNT"].BLUSERNAMECHECKED.value = 0;
				document.forms["CREATE_ACCOUNT"].USER.focus();
			}
		}else{
			alert("Impossible to read Esmeta XML Protocol")
		}
	}else{
		alert("Impossible to read Esmeta XML Protocol")
	}
}

/*****************************
***** EVENT: CREATE USER *****
*****************************/

UserAdminControllerClass.prototype.onSubmitCreateAccount = function(){
	return false;
}

UserAdminControllerClass.prototype.onClickCreateUser = function(){
	var USER = this.trimString(document.forms["CREATE_ACCOUNT"].USER.value);
	var PASSWORD = this.trimString(document.forms["CREATE_ACCOUNT"].USER_PASSWORD.value);
	var PASSWORD2 = this.trimString(document.forms["CREATE_ACCOUNT"].USER_PASSWORD2.value);
	var IDUSER_LEVEL = document.forms["CREATE_ACCOUNT"].IDUSER_LEVEL.value
	var FIRST_NAME = this.trimString(document.forms["CREATE_ACCOUNT"].FIRST_NAME.value);
	var LAST_NAME = this.trimString(document.forms["CREATE_ACCOUNT"].LAST_NAME.value);
	var EMAIL = this.trimString(document.forms["CREATE_ACCOUNT"].EMAIL.value);

	if(USER == ''){
		alert("Please, Write your USER name");
		document.forms["CREATE_ACCOUNT"].USER.focus();
		return false;
	}else if(!isAlphanumeric(USER)){
		alert("Please, write a correct Username");
		document.forms["CREATE_ACCOUNT"].USER.focus();
	}else if(document.forms["CREATE_ACCOUNT"].BLUSERNAMECHECKED.value == 0){
		alert('Please, Check if your USER name is available')
	}else if(PASSWORD == ''){
		alert("Please, Write your PASSWORD");
		document.forms["CREATE_ACCOUNT"].USER_PASSWORD.focus();
		return false;
	}else if(!isAlphanumeric(PASSWORD)){
		alert("Please, write a correct Password");
		document.forms["CREATE_ACCOUNT"].USER_PASSWORD.focus();
	}else if(PASSWORD2 == ''){
		alert("Please, Rewrite your PASSWORD");
		document.forms["CREATE_ACCOUNT"].USER_PASSWORD2.focus();
		return false;
	}else if(PASSWORD != PASSWORD2){
		alert("Please, You don`t write the password twice");
		document.forms["CREATE_ACCOUNT"].USER_PASSWORD2.value = '';
		document.forms["CREATE_ACCOUNT"].USER_PASSWORD2.focus();
		return false;
	}else if(FIRST_NAME == ''){
		alert("Please, Write your First Name");
		document.forms["CREATE_ACCOUNT"].FIRST_NAME.focus();
		return false;
	}else if(LAST_NAME == ''){
		alert("Please, Write your Last Name");
		document.forms["CREATE_ACCOUNT"].LAST_NAME.focus();
		return false;
	}else if(!isEmail(EMAIL)){
		alert("Please, Write a correct email");
		document.forms["CREATE_ACCOUNT"].EMAIL.focus();
		return false;
	}else{
		var OBJ;
		OBJ = document.getElementById("INDICATOR_ADD_USER");
		OBJ.style.display = "block";
	
		this.AJAX_addNewUser(USER,PASSWORD,IDUSER_LEVEL,FIRST_NAME,LAST_NAME,EMAIL);
	}
}

UserAdminControllerClass.prototype.AJAX_addNewUser = function(USER,PASSWORD,IDUSER_LEVEL,FIRST_NAME,LAST_NAME,EMAIL){

var url = "r_php/ewccc/users/addNewUser.php";
var pars = 'USER='+ USER + '&PASSWORD=' + PASSWORD + '&IDUSER_LEVEL=' + IDUSER_LEVEL;
pars +='&FIRST_NAME=' + FIRST_NAME + '&LAST_NAME=' + LAST_NAME + '&EMAIL=' + EMAIL;

//Ajax Prototype Framework
var myAjax = new Ajax.Request(url,
{
method: 'post',
parameters: pars,
onComplete: this.showResponseAddNewUser,
onFailure: this.reportError
});

}

UserAdminControllerClass.prototype.showResponseAddNewUser = function (originalRequest){
	//Oculto indicador de AJAX
	var OBJ;
	OBJ = document.getElementById("INDICATOR_ADD_USER");
	OBJ.style.display = "none";

	//alert(originalRequest.responseText);
	
	var data = originalRequest.responseText;	
	var message = readEsmetaXML("esmeta",data);
	//alert(message)
	if(message != -1){
		message = readEsmetaXML("transaction",data);
		if(message != -1){
			var USER = readEsmetaXML("user",data);
			var PASSWORD = readEsmetaXML("password",data);

			document.forms["CREATE_ACCOUNT"].BLUSERNAMECHECKED.value = 0;
	
			//document.forms["CREATE_ACCOUNT"].reset();
			alert('Thanks, Your Account has been created.');
			
			document.location.href= "EWCCC_userAdmin.php";
			//Hide Web 2.0 Form
			/*
			var OBJ;
			OBJ = document.getElementById("NEW_ACCOUNT");
			OBJ.style.display = "none";

			var OBJ;
			OBJ = document.getElementById("overlay");
			OBJ.style.display = "none";
			*/

		}else{
			alert("Impossible to read Esmeta XML Protocol")
		}
	}else{
		alert("Impossible to read Esmeta XML Protocol")
	}
}

/******************************
***** GET USER INFO EVENT *****
******************************/

UserAdminControllerClass.prototype.updateUserInfo = function(IDUSER){
	var url = "r_php/ewccc/users/getUserInfo.php";
	var pars = 'IDUSER='+ IDUSER;
	
	//Ajax Prototype Framework
	var myAjax = new Ajax.Request(url,
	{
	method: 'post',
	parameters: pars,
	onComplete: this.showResponseGetUserInfo,
	onFailure: this.reportError
	});
	
	this.setAJAX_Indicator("INDICATOR_",IDUSER,1);
}

UserAdminControllerClass.prototype.setAJAX_Indicator = function (IDPREFIX,ID,onoff){
		var IDDIV = ID;
		var IDDIV_PREFIX = IDPREFIX;
		IDDIV_PREFIX += IDDIV.toString();

		//Show Ajax indicator
		var INDICATOR = IDDIV_PREFIX;
		OBJ = document.getElementById(INDICATOR);
		if(onoff == 1){
			OBJ.style.display = "block";
		}else{
			OBJ.style.display = "none";
		}
}

UserAdminControllerClass.prototype.setDIV_HS = function (IDDIV,onoff){
		OBJ = document.getElementById(IDDIV);
		if(onoff == 1){
			OBJ.style.display = "block";
		}else{
			OBJ.style.display = "none";
		}
}

UserAdminControllerClass.prototype.setDIV_HTML = function (IDDIV,HTML){
		OBJ = document.getElementById(IDDIV);
		OBJ.innerHTML = HTML;
}


UserAdminControllerClass.prototype.showResponseGetUserInfo = function (originalRequest){

	//alert(originalRequest.responseText);
	
	var data = originalRequest.responseText;	
	var message = readEsmetaXML("esmeta",data);
	//alert(message)
	if(message != -1){
		message = readEsmetaXML("transaction",data);
		if(message != -1){
			var FORM_OBJECT = document.forms["CREATE_ACCOUNT"];
			FORM_OBJECT.IDUSER.value = readEsmetaXML("iduser",data);
			FORM_OBJECT.USER.disabled = true;
			FORM_OBJECT.USER.value = readEsmetaXML("user",data);
			FORM_OBJECT.IDUSER_LEVEL.value = readEsmetaXML("userlevel",data);
			FORM_OBJECT.USER_PASSWORD.value = readEsmetaXML("password",data);
			FORM_OBJECT.USER_PASSWORD2.value = readEsmetaXML("password",data);
			FORM_OBJECT.FIRST_NAME.value = readEsmetaXML("first_name",data);
			FORM_OBJECT.LAST_NAME.value = readEsmetaXML("last_name",data);
			FORM_OBJECT.EMAIL.value = readEsmetaXML("email",data);
			
			//WEB 2.0 trick; Running in IE6 and FIREFOX 1.5 and 2.0
			//How to use Publics methods into AJAX response methods.
			obj_uacc = new UserAdminControllerClass();
			obj_uacc.setAJAX_Indicator("INDICATOR_",FORM_OBJECT.IDUSER.value,0);
			obj_uacc.setDIV_HS("CREATE_ACCOUNT_AVAILABLE",0);
			
			var HTML_STRING = "";
			HTML_STRING += '		<table cellpadding="0" cellspacing="0" class="CREATE_ACCOUNT" width="300">';
			HTML_STRING += '			<tr>';
			HTML_STRING += '				<td><input type="button" value="Update Account" class="LOGIN_SUBMIT" onclick="WPCObject.onClickUpdateUser()" /></td>';
			HTML_STRING += '				<td><img id="INDICATOR_ADD_USER" src="r_media/images/indicator.gif" style="display: none;"/></td>';
			HTML_STRING += '			</tr>';
			HTML_STRING += '		</table>';
			
			
			obj_uacc.setDIV_HTML("CREATE_ACCOUNT_BUTTON",HTML_STRING);
			obj_uacc.showWebForm();

			
		}else{
			alert("Impossible to read Esmeta XML Protocol")
		}
	}else{
		alert("Impossible to read Esmeta XML Protocol")
	}
}

UserAdminControllerClass.prototype.onClickUpdateUser = function(){
	var IDUSER = this.trimString(document.forms["CREATE_ACCOUNT"].IDUSER.value);
	var USER = this.trimString(document.forms["CREATE_ACCOUNT"].USER.value);
	var PASSWORD = this.trimString(document.forms["CREATE_ACCOUNT"].USER_PASSWORD.value);
	var PASSWORD2 = this.trimString(document.forms["CREATE_ACCOUNT"].USER_PASSWORD2.value);
	var IDUSER_LEVEL = this.trimString(document.forms["CREATE_ACCOUNT"].IDUSER_LEVEL.value);
	var FIRST_NAME = this.trimString(document.forms["CREATE_ACCOUNT"].FIRST_NAME.value);
	var LAST_NAME = this.trimString(document.forms["CREATE_ACCOUNT"].LAST_NAME.value);
	var EMAIL = this.trimString(document.forms["CREATE_ACCOUNT"].EMAIL.value);

/*
	if(USER == ''){
		alert("Please, Write your USER name");
		document.forms["CREATE_ACCOUNT"].USER.focus();
		return false;
	}else if(!isAlphanumeric(USER)){
		alert("Please, write a correct Username");
		document.forms["CREATE_ACCOUNT"].USER.focus();
	}else
*/ 
	if(PASSWORD == ''){
		alert("Please, Write your PASSWORD");
		document.forms["CREATE_ACCOUNT"].USER_PASSWORD.focus();
		return false;
	}else if(!isAlphanumeric(PASSWORD)){
		alert("Please, write a correct Password");
		document.forms["CREATE_ACCOUNT"].USER_PASSWORD.focus();
	}else if(PASSWORD2 == ''){
		alert("Please, Rewrite your PASSWORD");
		document.forms["CREATE_ACCOUNT"].USER_PASSWORD2.focus();
		return false;
	}else if(PASSWORD != PASSWORD2){
		alert("Please, You don`t write the password twice");
		document.forms["CREATE_ACCOUNT"].USER_PASSWORD2.value = '';
		document.forms["CREATE_ACCOUNT"].USER_PASSWORD2.focus();
		return false;
	}else if(FIRST_NAME == ''){
		alert("Please, Write your First Name");
		document.forms["CREATE_ACCOUNT"].FIRST_NAME.focus();
		return false;
	}else if(LAST_NAME == ''){
		alert("Please, Write your Last Name");
		document.forms["CREATE_ACCOUNT"].LAST_NAME.focus();
		return false;
	}else if(!isEmail(EMAIL)){
		alert("Please, Write a correct email");
		document.forms["CREATE_ACCOUNT"].EMAIL.focus();
		return false;
	}else{
		var OBJ;
		OBJ = document.getElementById("INDICATOR_ADD_USER");
		OBJ.style.display = "block";
	
		this.AJAX_updateUserInfo(IDUSER,USER,PASSWORD,IDUSER_LEVEL,FIRST_NAME,LAST_NAME,EMAIL);
	}
}

UserAdminControllerClass.prototype.AJAX_updateUserInfo = function(IDUSER,USER,PASSWORD,IDUSER_LEVEL,FIRST_NAME,LAST_NAME,EMAIL){
	var url = "r_php/ewccc/users/updateUserInfo.php";
	var pars = 'USER='+ USER + '&PASSWORD=' + PASSWORD + '&IDUSER_LEVEL=' + IDUSER_LEVEL + '&IDUSER='+IDUSER;
	pars +='&FIRST_NAME=' + FIRST_NAME + '&LAST_NAME=' + LAST_NAME + '&EMAIL=' + EMAIL;
	
	//Ajax Prototype Framework
	var myAjax = new Ajax.Request(url,
	{
	method: 'post',
	parameters: pars,
	onComplete: this.showResponseUpdateUserInfo,
	onFailure: this.reportError
	});
	
	OBJ = document.getElementById(INDICATOR_ADD_USER);
	OBJ.style.display = "none";

}

UserAdminControllerClass.prototype.showResponseUpdateUserInfo = function (originalRequest){

	//alert(originalRequest.responseText);
	
	var data = originalRequest.responseText;	
	var message = readEsmetaXML("esmeta",data);
	//alert(message)
	if(message != -1){
		message = readEsmetaXML("transaction",data);
		if(message != -1){
			document.location.href="EWCCC_userAdmin.php"
		}else{
			alert("Impossible to read Esmeta XML Protocol")
		}
	}else{
		alert("Impossible to read Esmeta XML Protocol")
	}
}



/****************************
***** DELETE USER EVENT *****
****************************/

UserAdminControllerClass.prototype.deleteUser = function(IDUSER){
	var QUESTION = confirm("Are you sure to delete User " + IDUSER + " ?");
	//alert(QUESTION);
	if(QUESTION){
		var url = "r_php/ewccc/users/deleteUser.php";
		var pars = 'IDUSER='+IDUSER;
		
		//Ajax Prototype Framework
		var myAjax = new Ajax.Request(url,
		{
		method: 'post',
		parameters: pars,
		onComplete: this.showResponseDeleteUser,
		onFailure: this.reportError
		});
		
		OBJ = document.getElementById(INDICATOR_ADD_USER);
		OBJ.style.display = "none";
	}
}

UserAdminControllerClass.prototype.showResponseDeleteUser = function (originalRequest){

	//alert(originalRequest.responseText);
	
	var data = originalRequest.responseText;	
	var message = readEsmetaXML("esmeta",data);
	//alert(message)
	if(message != -1){
		message = readEsmetaXML("transaction",data);
		if(message != -1){
			document.location.href="EWCCC_userAdmin.php"
		}else{
			alert("Impossible to read Esmeta XML Protocol")
		}
	}else{
		alert("Impossible to read Esmeta XML Protocol")
	}
}

/*********************
***** LOAD EVENT *****
*********************/

UserAdminControllerClass.prototype.window_onLoad = function(){
	//Empty
};