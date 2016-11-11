/*
Class: UserAdminControllerClass
Description: Clase que controla la interaccion de la pagina web: Index.htm
Author: JAB
Info: bren@juanantonio.info
*/

//Clase que controla el fichero Home.htm
function ContentAdminControllerClass(){
	this.error = false;
};

/*************************
***** FOOTER METHODS *****
*************************/

ContentAdminControllerClass.prototype.writeFooter = function(){
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

ContentAdminControllerClass.prototype.readEsmetaXML = function(tag,data){
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

ContentAdminControllerClass.prototype.getPageSize = function(){
	
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

ContentAdminControllerClass.prototype.trimString = function(str){
	return str.replace(/^\s+/g, '').replace(/\s+$/g, '');
};

/*********************************
***** EXTRANET LOGIN METHODS *****
*********************************/

ContentAdminControllerClass.prototype.showWebForm = function(){
 		var arrayPageSize = this.getPageSize();
 		
 		var objOverlay = document.getElementById("overlay");
		objOverlay.style.display = "block";
  		var loginContainer = document.getElementById("NEW_DOCUMENT");
		loginContainer.style.display = "block";
		objOverlay.style.height = arrayPageSize[1];

		lcWDimensions = 600;
		lcHDimensions = 100;
		lcx = (arrayPageSize[0]/2)-(lcWDimensions/2);
		loginContainer.style.left = lcx;
		//lcy = (arrayPageSize[1]/2)-(lcHDimensions);
		//loginContainer.style.top = lcy;
}

ContentAdminControllerClass.prototype.createDocument = function(){
		//WEB 2.0 trick; Running in IE6 and FIREFOX 1.5 and 2.0
		//How to use Publics methods into AJAX response methods.
		obj_uacc = new ContentAdminControllerClass();
		//obj_uacc.setDIV_HS("CREATE_ACCOUNT_BUTTON",1);
		
		var HTML_STRING = "";
		HTML_STRING += '		<table cellpadding="0" cellspacing="0" class="CREATE_ACCOUNT" width="300">';
		HTML_STRING += '			<tr>';
		HTML_STRING += '				<td><input type="button" value="Create Document" class="LOGIN_SUBMIT" onclick="WPCObject.onClickCreateDocument()" /></td>';
		HTML_STRING += '				<td><img id="INDICATOR_ADD_USER" src="r_media/images/indicator.gif" style="display: none;"/></td>';
		HTML_STRING += '			</tr>';
		HTML_STRING += '		</table>';
		obj_uacc.setDIV_HTML("CREATE_ACCOUNT_BUTTON",HTML_STRING);
		
		this.showWebForm();
		
		document.forms["DOCUMENT"].reset();
		document.forms["DOCUMENT"].TITLE.focus();
		document.forms["DOCUMENT"].NORDER.value = 1;
}

ContentAdminControllerClass.prototype.closeWebForm = function(){
	var obj = document.getElementById("NEW_DOCUMENT");
	obj.style.display = "none";
	var obj = document.getElementById("overlay");
	obj.style.display = "none";
}

/*********************************
***** EVENT: CREATE DOCUMENT *****
*********************************/

ContentAdminControllerClass.prototype.onSubmitCreateAccount = function(){
	return false;
}

ContentAdminControllerClass.prototype.onClickCreateDocument = function(){
	var TITLE = escape(this.trimString(document.forms["DOCUMENT"].TITLE.value));
	var CONTENT = escape(this.trimString(document.forms["DOCUMENT"].CONTENT.value));
	var IDPARENT = this.trimString(document.forms["DOCUMENT"].IDPARENT.value);
	var DESCRIPTION = escape(this.trimString(document.forms["DOCUMENT"].DESCRIPTION.value));
	var KEYWORDS;// = this.trimString(document.forms["DOCUMENT"].KEYWORDS.value);
	var NORDER = escape(this.trimString(document.forms["DOCUMENT"].NORDER.value));

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
	}else if(NORDER == ''){
		alert("Please, Indicate the order");
		document.forms["DOCUMENT"].NORDER.value = 1;
		document.forms["DOCUMENT"].NORDER.focus();
		return false;
	/*
	}else if(KEYWORDS == ''){
		alert("Please, Write your Last Name");
		document.forms["DOCUMENT"].KEYWORDS.focus();
		return false;
	*/
	}else{
		var OBJ;
		OBJ = document.getElementById("INDICATOR_ADD_USER");
		OBJ.style.display = "block";
	
		this.AJAX_addNewDocument(TITLE,CONTENT,IDPARENT,DESCRIPTION,KEYWORDS,NORDER);
	}
}

ContentAdminControllerClass.prototype.AJAX_addNewDocument = function(TITLE,CONTENT,IDPARENT,DESCRIPTION,KEYWORDS,NORDER){

var url = "r_php/ewccc/documents/addNewDocument.php";
var pars = 'TITLE='+ TITLE + '&CONTENT=' + CONTENT;
pars +='&IDPARENT=' + IDPARENT + '&DESCRIPTION=' + DESCRIPTION; //+ '&KEYWORDS=' + KEYWORDS;
pars +='&NORDER=' + NORDER;

//Ajax Prototype Framework
var myAjax = new Ajax.Request(url,
{
method: 'post',
parameters: pars,
onComplete: this.showResponseAddNewDocument,
onFailure: this.reportError
});

}

ContentAdminControllerClass.prototype.showResponseAddNewDocument = function (originalRequest){
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
			alert('Thanks, New document has been created.');
			
			document.location.href= "EWCCC_documentAdmin.php";
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

ContentAdminControllerClass.prototype.updateDocumentInfo = function(IDDOCUMENT){
	var url = "r_php/ewccc/documents/getDocumentInfo.php";
	var pars = 'IDDOCUMENT='+ IDDOCUMENT;
	
	//Ajax Prototype Framework
	var myAjax = new Ajax.Request(url,
	{
	method: 'post',
	parameters: pars,
	onComplete: this.showResponseGetDocumentInfo,
	onFailure: this.reportError
	});
	
	this.setAJAX_Indicator("INDICATOR_",IDDOCUMENT,1);
}

ContentAdminControllerClass.prototype.setAJAX_Indicator = function (IDPREFIX,ID,onoff){
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

ContentAdminControllerClass.prototype.setDIV_HS = function (IDDIV,onoff){
		OBJ = document.getElementById(IDDIV);
		if(onoff == 1){
			OBJ.style.display = "block";
		}else{
			OBJ.style.display = "none";
		}
}

ContentAdminControllerClass.prototype.setDIV_HTML = function (IDDIV,HTML){
		OBJ = document.getElementById(IDDIV);
		OBJ.innerHTML = HTML;
}


ContentAdminControllerClass.prototype.showResponseGetDocumentInfo = function (originalRequest){

	//alert(originalRequest.responseText);
	
	var data = originalRequest.responseText;	
	var message = readEsmetaXML("esmeta",data);
	//alert(message)
	if(message != -1){
		message = readEsmetaXML("transaction",data);
		if(message != -1){
			var FORM_OBJECT = document.forms["DOCUMENT"];
			FORM_OBJECT.IDDOCUMENT.value = readEsmetaXML("iddocument",data);
			FORM_OBJECT.IDPARENT.value = readEsmetaXML("idparent",data);
			//FORM_OBJECT.IDCREATOR.value = readEsmetaXML("idcreator",data);
			FORM_OBJECT.TITLE.value = readEsmetaXML("title",data);
			FORM_OBJECT.DESCRIPTION.value = readEsmetaXML("metadata_description",data);
			//FORM_OBJECT.KEYWORDS.value = readEsmetaXML("metadata_keywords",data);
			FORM_OBJECT.CONTENT.value = readEsmetaXML("content",data);
			FORM_OBJECT.NORDER.value = readEsmetaXML("norder",data);
				
			//WEB 2.0 trick; Running in IE6 and FIREFOX 1.5 and 2.0
			//How to use Publics methods into AJAX response methods.
			obj_uacc = new ContentAdminControllerClass();
			obj_uacc.setAJAX_Indicator("INDICATOR_",FORM_OBJECT.IDDOCUMENT.value,0);
			
			var HTML_STRING = "";
			HTML_STRING += '		<table cellpadding="0" cellspacing="0" class="CREATE_ACCOUNT" width="300">';
			HTML_STRING += '			<tr>';
			HTML_STRING += '				<td><input type="button" value="Update Document" class="LOGIN_SUBMIT" onclick="WPCObject.onClickUpdateDocument()" /></td>';
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

ContentAdminControllerClass.prototype.onClickUpdateDocument = function(){
	var IDDOCUMENT = this.trimString(document.forms["DOCUMENT"].IDDOCUMENT.value);
	var TITLE = escape(this.trimString(document.forms["DOCUMENT"].TITLE.value));
	var CONTENT = escape(this.trimString(document.forms["DOCUMENT"].CONTENT.value));
	var IDPARENT = this.trimString(document.forms["DOCUMENT"].IDPARENT.value);
	var DESCRIPTION = escape(this.trimString(document.forms["DOCUMENT"].DESCRIPTION.value));
	var KEYWORDS;// = this.trimString(document.forms["DOCUMENT"].KEYWORDS.value);
	var NORDER = escape(this.trimString(document.forms["DOCUMENT"].NORDER.value));

	//2007/10/28
	//CONTENT = this.convertText(CONTENT);

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
	}else if(NORDER == ''){
		alert("Please, indicate the order");
		document.forms["DOCUMENT"].NORDER.value = 1;
		document.forms["DOCUMENT"].NORDER.focus();
		return false;
		/*
	}else if(KEYWORDS == ''){
		alert("Please, Write your Last Name");
		document.forms["DOCUMENT"].KEYWORDS.focus();
		return false;
		*/
	}else{
		var OBJ;
		OBJ = document.getElementById("INDICATOR_ADD_USER");
		OBJ.style.display = "block";
	
		this.AJAX_UpdateDocument(IDDOCUMENT,TITLE,CONTENT,IDPARENT,DESCRIPTION,KEYWORDS, NORDER);
	}
}

ContentAdminControllerClass.prototype.AJAX_UpdateDocument = function(IDDOCUMENT,TITLE,CONTENT,IDPARENT,DESCRIPTION,KEYWORDS, NORDER){
	var url = "r_php/ewccc/documents/updateDocumentInfo.php";
	var pars = 'IDDOCUMENT=' + IDDOCUMENT + '&TITLE='+ TITLE + '&CONTENT=' + CONTENT;
	pars +='&IDPARENT=' + IDPARENT + '&DESCRIPTION=' + DESCRIPTION;// + '&KEYWORDS=' + KEYWORDS;
	pars +='&NORDER=' + NORDER;
	
	//Ajax Prototype Framework
	var myAjax = new Ajax.Request(url,
	{
	method: 'post',
	parameters: pars,
	onComplete: this.showResponseUpdateDocumentInfo,
	onFailure: this.reportError
	});
	
	OBJ = document.getElementById(INDICATOR_ADD_USER);
	OBJ.style.display = "none";

}

ContentAdminControllerClass.prototype.showResponseUpdateDocumentInfo = function (originalRequest){

	//alert(originalRequest.responseText);

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



/********************************
***** DELETE DOCUMENT EVENT *****
********************************/

ContentAdminControllerClass.prototype.deleteDocument = function(IDDOCUMENT){
	var QUESTION = confirm("Are you sure to delete Document " + IDDOCUMENT + " ?");
	//alert(QUESTION);
	if(QUESTION){
		var url = "r_php/ewccc/documents/deleteDocument.php";
		var pars = 'IDDOCUMENT='+IDDOCUMENT;
		
		//Ajax Prototype Framework
		var myAjax = new Ajax.Request(url,
		{
		method: 'post',
		parameters: pars,
		onComplete: this.showResponseDeleteDocument,
		onFailure: this.reportError
		});
		
		OBJ = document.getElementById(INDICATOR_ADD_USER);
		OBJ.style.display = "none";
	}
}

ContentAdminControllerClass.prototype.showResponseDeleteDocument = function (originalRequest){

	//alert(originalRequest.responseText);
	
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

/******************************
***** COPY DOCUMENT EVENT *****
*******************************/

ContentAdminControllerClass.prototype.copyDocument = function(IDDOCUMENT){
	/*
	var url = "r_php/ewccc/documents/copyDocument.php";
	var pars = 'IDDOCUMENT='+IDDOCUMENT;
	
	//Ajax Prototype Framework
	var myAjax = new Ajax.Request(url,
	{
	method: 'post',
	parameters: pars,
	onComplete: this.showResponseCopyDocument,
	onFailure: this.reportError
	});
	
	OBJ = document.getElementById(INDICATOR_ADD_USER);
	OBJ.style.display = "none";
	*/
	alert('Not available this feature');
}

ContentAdminControllerClass.prototype.showResponseCopyDocument = function (originalRequest){

	//alert(originalRequest.responseText);
	document.write(originalRequest.responseText);
	
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

/***************************************
***** SHOW CHILDREN DOCUMENT EVENT *****
****************************************/

ContentAdminControllerClass.prototype.showChildren = function(IDDOCUMENT){
	document.location.href = "EWCCC_documentAdmin.php?IDPARENT=" + IDDOCUMENT;
}

/*********************
***** LOAD EVENT *****
*********************/

ContentAdminControllerClass.prototype.window_onLoad = function(){
	//Empty
};

/***********************************
***** SPECIAL HTML CHARACTERES *****
************************************/

ContentAdminControllerClass.prototype.convertText = function(DATA){
	var DATA_CONVERTED;
	
	//2007-04/13
	//Change special HTML Characters
	// + = &#43;
	DATA_CONVERTED = DATA.replace(/\+/g,"&#43;");
	DATA_CONVERTED = DATA.replace(/\?/g,"&ntilde;");
	//alert(DATA_CONVERTED);
	
	return DATA_CONVERTED;
};