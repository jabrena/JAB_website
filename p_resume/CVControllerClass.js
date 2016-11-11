/*
Class: CVControllerClass
Description: Clase que controla la interaccion de la pagina web: default.htm
Author: JAB
Info: bren@juanantonio.info
*/
function CVControllerClass(){
	this.error = false;
}

/*******************
***** HERENCIA *****
********************/

// Heredamos de FormControllerClass;
CVControllerClass.prototype = new WebPageControllerClass();

/***********************************
***** PROGRAMACION DE LOGO JAB *****
************************************/

CVControllerClass.prototype.logo_onClick = function(){
	if(!this.error){
		URL ="../p_home/home.htm";
		this.redirect(URL);
	}
}

/*********************************************
***** PROGRAMACION DE EVENTOS DE VENTANA *****
*********************************************/

CVControllerClass.prototype.window_onLoad = function(){
	var helperObject = new HelperClass();
	helperObject.setTitle();

	var cbmObject = new ComboManagerClass("frmNavigation","cbNavigation");
	cbmObject.sort();
	cbmObject.selectByName('Resume');
}

/****************************************************************
***** PROGRAMACION DE EVENTOS FORMULARIO A ACCESO A AREA CV *****
*****************************************************************/

//Metodo que bloquea el evento SUBMIT del web form
CVControllerClass.prototype.frmCVAccess_onSubmit = function(){
	return false;
};

//Metodo que gestiona la descarga del CV
CVControllerClass.prototype.CVLogin = function(){
	var CODIGO = document.forms["frmCVAccess"].loginCode.value;
	if(CODIGO.length == 0){
		alert("You must enter the CODE");
		document.forms["frmCVAccess"].loginCode.focus();
	}else{
		//28/08/2005
		//Autenticacion poco robusta.
		if(CODIGO == "123456789"){
			URL = "resume.pdf";
			window.open(URL)
		}else{
			alert("Wrong CODE");
			document.forms["frmCVAccess"].loginCode.value  = "";
			document.forms["frmCVAccess"].loginCode.focus();
		}
	}
};

//Metodo que bloquea el evento SUBMIT del web form
CVControllerClass.prototype.frmCVrequestCVInformation_onSubmit = function(){
	return false;
};

//Funcion que valida el formulario de contacto
CVControllerClass.prototype.requestCVCODE = function(){
	var RF = document.forms["frmRequestCV"]; //Request Form
	if (RF.txtFullName.value == ''){
		alert("Please, write your Contact Name");
		RF.txtFullName.focus();
		return false;
	}else if (RF.txtCompany.value == ''){
		alert("Please, write the company where you work"); 
		RF.txtCompany.focus();
		return false;
	}else if (RF.cbCountry.options[RF.cbCountry.selectedIndex].value == '*'){
		alert("Please, write select the country"); 
		RF.cbCountry.focus();
		return false;
	}else if (RF.cbSector.options[RF.cbSector.selectedIndex].value == '*'){
		alert("Please, write select the sector"); 
		RF.cbSector.focus();
		return false;
	}else if (RF.txtEmail.value == ''){
		alert("Please, write your email"); 
		RF.txtEmail.focus();
		return false;
	}
	
	var arrParameter = Array();
	arrParameter[arrParameter.length] = "CONTACTNAME=" + RF.txtFullName.value
	arrParameter[arrParameter.length] = "COMPANY=" + RF.txtCompany.value
	arrParameter[arrParameter.length] = "COUNTRY=" + RF.cbCountry.value
	arrParameter[arrParameter.length] = "SECTOR=" + RF.cbSector.value
	arrParameter[arrParameter.length] = "EMAIL=" + RF.txtEmail.value
	
	//alert(arrParameter.toString());
	
	//Pasa por POST
	jsrsPOST = 1;
	// pass multiple parms as array
	jsrsExecute("http://www.response-o-matic.com/cgi-bin/rom.pl", null, "ESMETA", arrParameter,1);
	
	
};
