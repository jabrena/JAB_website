/*
Class: IndexControllerClass
Description: Clase que controla la interaccion de la pagina web: Index.htm
Author: JAB
Info: bren@juanantonio.info
*/

//Clase que controla el fichero Home.htm
function InstallationControllerClass(){
	this.error = false;
};

/*************************
***** FOOTER METHODS *****
*************************/

InstallationControllerClass.prototype.writeFooter = function(){
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

/*********************************
***** CREATE STRUCTURE EVENT *****
*********************************/

InstallationControllerClass.prototype.onSubmitDataStructure = function(){
	return false;
}

InstallationControllerClass.prototype.createDataStructure = function(){

//hide Ajax indicator
var INDICATOR = "INDICATOR";
OBJ = document.getElementById(INDICATOR);
OBJ.style.display = "block";

var url = "r_php/ewccc/installation/createDataStructure.php";
var pars = '';

//Ajax Prototype Framework
var myAjax = new Ajax.Request(url,
{
method: 'post',
parameters: pars,
onComplete: this.showResponseCreateStructure,
onFailure: this.reportError
});

};

InstallationControllerClass.prototype.reportError = function(){
	alert("Sorry, There was a error in the process.");
	
	//hide Ajax indicator
	var INDICATOR = "INDICATOR";
	OBJ = document.getElementById(INDICATOR);
	OBJ.style.display = "none";
};

InstallationControllerClass.prototype.showResponseCreateStructure = function (originalRequest){
	//alert(originalRequest.responseText);

	var data = originalRequest.responseText;	
	var message = readEsmetaXML("esmeta",data);
	//alert(message)
	if(message != -1){
		message = readEsmetaXML("transaction",data);
		if(message != -1){
			//alert(message)
			if(message == 1){
				message = readEsmetaXML("message",data);
				//alert(message);
				if(message != -1){
	//hide Ajax indicator
	var INDICATOR = "INDICATOR";
	OBJ = document.getElementById(INDICATOR);
	OBJ.style.display = "none";
	
	//hide Ajax indicator
	var INDICATOR = "AJAX_MESSAGE";
	OBJ = document.getElementById(INDICATOR);
	OBJ.innerHTML = message;

	var INDICATOR = "GOTO";
	OBJ = document.getElementById(INDICATOR);
	OBJ.style.display = "block";

				}else{
					alert("Impossible to read Esmeta XML Protocol")
				}
			}else{

				alert("Login process failed");
			}
		}else{
			alert("Impossible to read Esmeta XML Protocol")
		}
	}else{
		alert("Impossible to read Esmeta XML Protocol")
	}

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

InstallationControllerClass.prototype.goToLogin = function(){
	document.location.href = "index.php";
};

/*************************
***** EVENTS METHODS *****
*************************/

InstallationControllerClass.prototype.window_onLoad = function(){
	//Empty
};