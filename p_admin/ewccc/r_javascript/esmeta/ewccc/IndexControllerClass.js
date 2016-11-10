/*
Class: IndexControllerClass
Description: Clase que controla la interaccion de la pagina web: Index.htm
Author: JAB
Info: bren@juanantonio.info
*/

//Clase que controla el fichero Home.htm
function IndexControllerClass(){
	this.error = false;
};

/*************************
***** FOOTER METHODS *****
*************************/

IndexControllerClass.prototype.writeFooter = function(){
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

IndexControllerClass.prototype.getPageSize = function(){
	
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

IndexControllerClass.prototype.login = function(){
 		var arrayPageSize = this.getPageSize();
 		
 		var objOverlay = document.getElementById("overlay");
		objOverlay.style.display = "block";
  		var loginContainer = document.getElementById("LOGIN");
		loginContainer.style.display = "block";
		objOverlay.style.height = arrayPageSize[1];

		lcWDimensions = 300;
		lcHDimensions = 100;
		lcx = (arrayPageSize[0]/2)-(lcWDimensions/2);
		loginContainer.style.left = lcx;
		lcy = (arrayPageSize[1]/2)-(lcHDimensions);
		loginContainer.style.top = lcy;
		document.forms["RBOX_LOGIN"].ERT_USER.focus();
}

IndexControllerClass.prototype.closeExtranetLogin = function(){
	var obj = document.getElementById("LOGIN");
	obj.style.display = "none";
	var obj = document.getElementById("overlay");
	obj.style.display = "none";
}

IndexControllerClass.prototype.onSubmitLogin = function(obj){
	if(!this.error){
		var USER = obj.ERT_USER.value;
		var PASSWORD = obj.ERT_USER_PASSWORD.value;
		
		if(USER == ''){
			this.alert("Please, write your Username.");
			obj.ERT_USER.focus();
		}else if(!isAlphanumeric(USER)){
			this.alert("Please, write a correct Username.");
			obj.ERT_USER.focus();		
		}else if(PASSWORD == ''){
			this.alert("Please, write your Password.");
			obj.ERT_USER_PASSWORD.focus();	
		}else if(!isAlphanumeric(PASSWORD)){
			this.alert("Please, write a correct Password.");
			obj.ERT_USER_PASSWORD.focus();
		}else{

			//Show Ajax indicator
			var INDICATOR = "INDICATOR_LOGIN";
			OBJ = document.getElementById(INDICATOR);
			OBJ.style.display = "block";

			this.loginUserDAta(USER,PASSWORD);
		}
		return false;
	}
};

IndexControllerClass.prototype.loginUserDAta = function(USER,PASSWORD){

var url = "r_php/esmeta/security/login.php";
//alert(url);
var pars = 'IDUSER=' + USER + '&PASSWORD='+ PASSWORD;

//Ajax Prototype Framework
var myAjax = new Ajax.Request(url,
{
method: 'post',
parameters: pars,
onComplete: this.showResponseLogin,
onFailure: this.reportError
});

};

IndexControllerClass.prototype.reportError = function(){
	alert("Sorry, There was a error in the process.");
	
	//Show Ajax indicator
	var INDICATOR = "INDICATOR_LOGIN";
	OBJ = document.getElementById(INDICATOR);
	OBJ.style.display = "none";
};

IndexControllerClass.prototype.showResponseLogin = function (originalRequest){
	//alert(originalRequest.responseText);

	var data = originalRequest.responseText;	
	var message = readEsmetaXML("esmeta",data);
	//alert(message)
	if(message != -1){
		message = readEsmetaXML("transaction",data);
		if(message != -1){
			//alert(message)
			if(message == 1){
				message = readEsmetaXML("url_redirect",data);
				//alert(message);
				if(message != -1){
					//alert(message);
					document.location.href = message;
				}else{
					alert("Impossible to read Esmeta XML Protocol")
				}
			}else{
				/*
				var INDICATOR = "AJAX_FORM_ALERT";
				OBJ = document.getElementById(INDICATOR);
				OBJ.style.display = "block";
				OBJ.innerHTML = "Login process failed.";
				//alert("Login process failed.");
				*/
				alert("Login process failed");
			}
		}else{
			alert("Impossible to read Esmeta XML Protocol")
		}
	}else{
		alert("Impossible to read Esmeta XML Protocol")
	}

	//Hide Ajax indicator
	var INDICATOR = "INDICATOR_LOGIN";
	OBJ = document.getElementById(INDICATOR);
	OBJ.style.display = "none";
};

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
};

/*************************
***** EVENTS METHODS *****
*************************/

IndexControllerClass.prototype.window_onLoad = function(){
	//Empty
};