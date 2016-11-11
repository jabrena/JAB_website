/*
Class: UserAdminControllerClass
Description: Clase que controla la interaccion de la pagina web: Index.htm
Author: JAB
Info: bren@juanantonio.info
*/

//Clase que controla el fichero Home.htm
function tinyMCEAdminControllerClass(){
	this.error = false;
};

/*************************
***** FOOTER METHODS *****
*************************/

tinyMCEAdminControllerClass.prototype.writeFooter = function(){
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

tinyMCEAdminControllerClass.prototype.readEsmetaXML = function(tag,data){
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

tinyMCEAdminControllerClass.prototype.trimString = function(str){
	return str.replace(/^\s+/g, '').replace(/\s+$/g, '');
};



/*********************************
***** EVENT: CREATE DOCUMENT *****
*********************************/

tinyMCEAdminControllerClass.prototype.onSubmitUpdateDocument = function(){
	return false;
}



tinyMCEAdminControllerClass.prototype.onClickUpdateDocument = function(){
	var IDDOCUMENT = this.trimString(document.forms["DOCUMENT"].IDDOCUMENT.value);
	var TITLE = escape(this.trimString(document.forms["DOCUMENT"].TITLE.value));
	var CONTENT = escape(this.trimString(document.forms["DOCUMENT"].CONTENT.value));
	var IDPARENT = this.trimString(document.forms["DOCUMENT"].IDPARENT.value);
	var DESCRIPTION = escape(this.trimString(document.forms["DOCUMENT"].DESCRIPTION.value));
	var KEYWORDS;// = this.trimString(document.forms["DOCUMENT"].KEYWORDS.value);

	alert(CONTENT);
			alert(document.forms[0].item.length())
			
			return false;
	//2007-04/13
	//Change special HTML Characters
	// + = &#43;
	//CONTENT = CONTENT.replace("+","&#43;");

	if(TITLE == ''){
		alert("Please, Write the title of the document");
		document.forms["DOCUMENT"].TITLE.focus();
		return false;
	}else if(CONTENT == ''){
		alert("Please, Write the content");
		document.forms["DOCUMENT"].CONTENT.focus();
		return false;
	}else if(IDPARENT == ''){
		alert("Please, Select the parent");
		document.forms["DOCUMENT"].IDPARENT.focus();
		return false;
	}else if(DESCRIPTION == ''){
		alert("Please, Write the description of the document");
		document.forms["DOCUMENT"].DESCRIPTION.focus();
		return false;
		/*
	}else if(KEYWORDS == ''){
		alert("Please, Write your Last Name");
		document.forms["DOCUMENT"].KEYWORDS.focus();
		return false;
		*/
	}else{
		var OBJ;
		OBJ = document.getElementById("INDICATOR");
		OBJ.style.display = "block";
		//for(i=0;i< document.forms[0].items.length;i++){
			//alert(document.forms[0].item[i].value);
		//}
		this.AJAX_UpdateDocument(IDDOCUMENT,TITLE,CONTENT,IDPARENT,DESCRIPTION,KEYWORDS);
	}
}

tinyMCEAdminControllerClass.prototype.AJAX_UpdateDocument = function(IDDOCUMENT,TITLE,CONTENT,IDPARENT,DESCRIPTION,KEYWORDS){
	var url = "r_php/ewccc/documents/updateDocumentInfo.php";
	var pars = 'IDDOCUMENT=' + IDDOCUMENT + '&TITLE='+ TITLE + '&CONTENT=' + CONTENT;
	pars +='&IDPARENT=' + IDPARENT + '&DESCRIPTION=' + DESCRIPTION;// + '&KEYWORDS=' + KEYWORDS;
	
	//Ajax Prototype Framework
	var myAjax = new Ajax.Request(url,
	{
	method: 'post',
	parameters: pars,
	onComplete: this.showResponseUpdateDocumentInfo,
	onFailure: this.reportError
	});
	
	var OBJ;
	OBJ = document.getElementById("INDICATOR");
	OBJ.style.display = "none";

}

tinyMCEAdminControllerClass.prototype.showResponseUpdateDocumentInfo = function (originalRequest){

	alert(originalRequest.responseText);

	var data = originalRequest.responseText;	
	var message = readEsmetaXML("esmeta",data);
	//alert(message)
	if(message != -1){
		message = readEsmetaXML("transaction",data);
		if(message != -1){
			document.location.href="EWCCC_documentAdmin.php"
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

tinyMCEAdminControllerClass.prototype.window_onLoad = function(){
	//Empty
};