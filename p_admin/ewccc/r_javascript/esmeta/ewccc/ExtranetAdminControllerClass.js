/*
Class: UserAdminControllerClass
Description: Clase que controla la interaccion de la pagina web: Index.htm
Author: JAB
Info: bren@juanantonio.info
*/

//Clase que controla el fichero Home.htm
function ExtranetAdminControllerClass(){
	this.error = false;
};

/*************************
***** FOOTER METHODS *****
*************************/

ExtranetAdminControllerClass.prototype.writeFooter = function(){
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

ExtranetAdminControllerClass.prototype.getPageSize = function(){
	
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

/******************************
***** EXTRANET SHOW FORMS *****
******************************/

ExtranetAdminControllerClass.prototype.showWebForm = function(){
 		var arrayPageSize = this.getPageSize();
 		
 		var objOverlay = document.getElementById("overlay");
		objOverlay.style.display = "block";
  		var loginContainer = document.getElementById("EXTRANET");
		loginContainer.style.display = "block";
		objOverlay.style.height = arrayPageSize[1];

		lcWDimensions = 400;
		lcHDimensions = 100;
		lcx = (arrayPageSize[0]/2)-(lcWDimensions/2);
		loginContainer.style.left = lcx;
		lcy = (arrayPageSize[1]/2)-(lcHDimensions);
		loginContainer.style.top = lcy;
}

ExtranetAdminControllerClass.prototype.getExtranetInfo = function(IDUSER){
		this.showWebForm();
		
		document.forms["EXTRANET"].reset();
		document.forms["EXTRANET"].IDUSER.value = IDUSER;
		document.forms["EXTRANET"].IDDOCUMENT.focus();
}

ExtranetAdminControllerClass.prototype.closeExtranetLogin = function(){
	var obj = document.getElementById("EXTRANET");
	obj.style.display = "none";
	var obj = document.getElementById("overlay");
	obj.style.display = "none";
}

/************************************
***** EVENT: associate Document *****
************************************/

ExtranetAdminControllerClass.prototype.onSubmitAssociateDocument = function(){
	return false;
}

ExtranetAdminControllerClass.prototype.onClickAssociateDocument = function(obj){
	if(!this.error){
		var IDDOCUMENT = document.forms["EXTRANET"].IDDOCUMENT.value;
		var IDUSER = document.forms["EXTRANET"].IDUSER.value;
		if(IDDOCUMENT == '*'){
			alert("Choose a option");
			document.forms["EXTRANET"].IDDOCUMENT.focus();
		}else{
			var OBJ;
			OBJ = document.getElementById("INDICATOR");
			OBJ.style.display = "block";

			//alert(IDDOCUMENT+IDUSER);
			this.AJAX_associateDocument(IDDOCUMENT,IDUSER);
		}
	}
};


ExtranetAdminControllerClass.prototype.AJAX_associateDocument = function(IDDOCUMENT,IDUSER){

var url = "r_php/ewccc/extranet/associateDocument.php";
var pars = 'IDDOCUMENT='+ IDDOCUMENT + '&IDUSER='+ IDUSER;

//Ajax Prototype Framework
var myAjax = new Ajax.Request(url,
{
method: 'post',
parameters: pars,
onComplete: this.showResponseAssociateDocument,
onFailure: this.reportError
});
}

ExtranetAdminControllerClass.prototype.reportError = function(){
	alert("Sorry, There was a error");
}

ExtranetAdminControllerClass.prototype.showResponseAssociateDocument = function (originalRequest){
	//Oculto indicador de AJAX
	var OBJ;
	OBJ = document.getElementById("INDICATOR");
	OBJ.style.display = "none";

	//alert(originalRequest.responseText);
	
	var data = originalRequest.responseText;	
	var message = readEsmetaXML("esmeta",data);
	//alert(message)
	if(message != -1){
		message = readEsmetaXML("transaction",data);
		if(message != -1){
			document.location.href="EWCCC_extranet.php";
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

ExtranetAdminControllerClass.prototype.window_onLoad = function(){
	//Empty
};