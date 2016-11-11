/*
Class: UserAdminControllerClass
Description: Clase que controla la interaccion de la pagina web: Index.htm
Author: JAB
Info: bren@juanantonio.info
*/

//Clase que controla el fichero Home.htm
function FileManagerControllerClass(){
	this.error = false;
};

/*************************
***** FOOTER METHODS *****
*************************/

FileManagerControllerClass.prototype.writeFooter = function(){
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

FileManagerControllerClass.prototype.getPageSize = function(){
	
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

FileManagerControllerClass.prototype.trimString = function(str){
	return str.replace(/^\s+/g, '').replace(/\s+$/g, '');
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
}

/******************************
***** Upload File Methods *****
******************************/

FileManagerControllerClass.prototype.showWebForm = function(){
 		var arrayPageSize = this.getPageSize();
 		
 		var objOverlay = document.getElementById("overlay");
		objOverlay.style.display = "block";
  		var loginContainer = document.getElementById("FORM_UPLOADER");
		loginContainer.style.display = "block";
		objOverlay.style.height = arrayPageSize[1];

		lcWDimensions = 400;
		lcHDimensions = 100;
		lcx = (arrayPageSize[0]/2)-(lcWDimensions/2);
		loginContainer.style.left = lcx;
		lcy = (arrayPageSize[1]/2)-(lcHDimensions);
		loginContainer.style.top = lcy;
}

FileManagerControllerClass.prototype.uploadFile = function(){
		this.showWebForm();
		
		document.forms["UPLOAD_FILE"].reset();
		document.forms["UPLOAD_FILE"].userfile.focus();
}

FileManagerControllerClass.prototype.showWebForm2 = function(){
 		var arrayPageSize = this.getPageSize();
 		
 		var objOverlay = document.getElementById("overlay");
		objOverlay.style.display = "block";
  		var loginContainer = document.getElementById("CREATE_FOLDER");
		loginContainer.style.display = "block";
		objOverlay.style.height = arrayPageSize[1];

		lcWDimensions = 400;
		lcHDimensions = 100;
		lcx = (arrayPageSize[0]/2)-(lcWDimensions/2);
		loginContainer.style.left = lcx;
		lcy = (arrayPageSize[1]/2)-(lcHDimensions);
		loginContainer.style.top = lcy;
}

FileManagerControllerClass.prototype.createFolder = function(){
		this.showWebForm2();
		
		document.forms["CREATE_FOLDER"].reset();
		document.forms["CREATE_FOLDER"].foldername.focus();
}

FileManagerControllerClass.prototype.closeExtranetLogin = function(){
	var obj = document.getElementById("FORM_UPLOADER");
	obj.style.display = "none";
	var obj = document.getElementById("overlay");
	obj.style.display = "none";
}

FileManagerControllerClass.prototype.closeExtranetLogin2 = function(){
	var obj = document.getElementById("CREATE_FOLDER");
	obj.style.display = "none";
	var obj = document.getElementById("overlay");
	obj.style.display = "none";
}

/*****************************
***** EVENT: upload File *****
*****************************/

FileManagerControllerClass.prototype.onSubmitUploadFile = function(){
	return false;
}

FileManagerControllerClass.prototype.onClickUploadFile = function(){
	if(!this.error){
		var FILE = this.trimString(document.forms["UPLOAD_FILE"].userfile.value);

		var OBJ;
		OBJ = document.getElementById("PATH");
		var PATH = OBJ.innerHTML;
		document.forms["UPLOAD_FILE"].PATH.value = PATH;
		
		//alert(document.forms["UPLOAD_FILE"].PATH.value)
		
		if(FILE == ''){
			alert("Sorry, You have not choosen any file to upload");
			document.forms["UPLOAD_FILE"].userfile.focus();
		}else{

			var OBJ;
			OBJ = document.getElementById("INDICATOR");
			OBJ.style.display = "block";

			//this.AJAX_uploadFile(FILE);
			document.forms["UPLOAD_FILE"].submit();
		}
	}
};


FileManagerControllerClass.prototype.AJAX_uploadFile = function(FILE){

var url = "r_php/ewccc/files/uploader.php";
var pars = 'userfile='+ FILE;

//Ajax Prototype Framework
var myAjax = new Ajax.Request(url,
{
method: 'post',
parameters: pars,
onComplete: this.showResponseFileUpload,
onFailure: this.reportError
});
}

FileManagerControllerClass.prototype.reportError = function(){
	alert("Sorry, There was a error");
}



FileManagerControllerClass.prototype.showResponseFileUpload = function (originalRequest){
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
			alert(message)
		}else{
			alert("Impossible to read Esmeta XML Protocol")
		}
	}else{
		alert("Impossible to read Esmeta XML Protocol")
	}
}

/*********************
***** SHOW PATH *****
*********************/

FileManagerControllerClass.prototype.showPath = function (path){
	var OBJ;
	OBJ = document.getElementById("PATH");
	OBJ.innerHTML = path;
	
	//document.forms["CREATE_FOLDER"].PATH.value = path;
}

/************************
***** CREATE FOLDER *****
************************/

FileManagerControllerClass.prototype.onSubmitCreateFolder = function(){
	return false;
}

FileManagerControllerClass.prototype.onClickCreateFolder = function(){
	if(!this.error){
		var FOLDER = this.trimString(document.forms["CREATE_FOLDER"].foldername.value);
		
		var OBJ;
		OBJ = document.getElementById("PATH");
		var PATH = OBJ.innerHTML;

		if(FOLDER == ''){
			alert("Sorry, You have not written any folder name");
			document.forms["CREATE_FOLDER"].foldername.focus();
		}else{

			var OBJ;
			OBJ = document.getElementById("INDICATOR");
			OBJ.style.display = "block";

			this.AJAX_createFolder(FOLDER,PATH);
		}
	}
};


FileManagerControllerClass.prototype.AJAX_createFolder = function(FOLDER,PATH){

var url = "r_php/ewccc/files/createFolder.php";
var pars = 'FOLDER='+ FOLDER + '&PATH='+ PATH;

//Ajax Prototype Framework
var myAjax = new Ajax.Request(url,
{
method: 'post',
parameters: pars,
onComplete: this.showResponseFileUpload,
onFailure: this.reportError
});
}

FileManagerControllerClass.prototype.showResponseFileUpload = function (originalRequest){
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
			message = readEsmetaXML("path",data);
			URL = "EWCCC_fileManager.php";
			GET_URL = "?nuevo_dir=" + message;
			URL +=GET_URL;
			//alert(URL)
			document.location.href=URL;
		}else{
			alert("Impossible to read Esmeta XML Protocol")
		}
	}else{
		alert("Impossible to read Esmeta XML Protocol")
	}

}

/****************************
***** DELETE FILE EVENT *****
*****************************/

FileManagerControllerClass.prototype.deleteFile = function(PATH,FILE){
	var QUESTION = confirm("Are you sure to delete this file: " + FILE + "?");
	//alert(QUESTION);
	if(QUESTION){
		var url = "r_php/ewccc/files/deleteFile.php";
		var pars = 'FILE='+FILE+'&PATH='+PATH;
		
		//Ajax Prototype Framework
		var myAjax = new Ajax.Request(url,
		{
		method: 'post',
		parameters: pars,
		onComplete: this.showResponseDeleteFile,
		onFailure: this.reportError
		});
		
		OBJ = document.getElementById(INDICATOR_ADD_USER);
		OBJ.style.display = "none";
	}
}

FileManagerControllerClass.prototype.showResponseDeleteFile = function (originalRequest){

	//alert(originalRequest.responseText);
	
	var data = originalRequest.responseText;	
	var message = readEsmetaXML("esmeta",data);
	//alert(message)
	if(message != -1){
		message = readEsmetaXML("transaction",data);
		if(message != -1){
			document.location.href="EWCCC_fileManager.php"
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

FileManagerControllerClass.prototype.window_onLoad = function(){
	//Empty
};