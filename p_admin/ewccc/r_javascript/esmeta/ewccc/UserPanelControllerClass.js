/*
Class: LoginControllerClass
Description: Clase que controla la interaccion de la pagina web: Index.htm
Author: JAB
Info: bren@juanantonio.info
*/

//Clase que controla el fichero Home.htm
function UserPanelControllerClass(){
	this.error = false;
};


/*************************
***** EVENTS METHODS *****
*************************/

UserPanelControllerClass.prototype.window_onLoad = function(){
 //Edit
};

/*************************
***** FOOTER METHODS *****
*************************/

UserPanelControllerClass.prototype.writeFooter = function(){
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

	document.write('<p class="esmeta_footer"><a href="http://www.esmeta.es" class="esmeta" target="_blank">Esmeta</a> &reg; 1997-'+ ANHO + '</p>');
	return true;
};

/*******************************
***** EVENT: Delete Report *****
*******************************/

UserPanelControllerClass.prototype.deleteReport = function(IDREPORT){
	var request = confirm("Do you want to delete report #" + IDREPORT);
	if(request == true){
		var IDREPORT = IDREPORT;
		var IDREPORT_PREFIX = 'INDICATOR_';
		IDREPORT_PREFIX += IDREPORT.toString();

		//Show Ajax indicator
		var INDICATOR = IDREPORT_PREFIX;
		OBJ = document.getElementById(INDICATOR);
		OBJ.style.display = "block";

		this.AJAX_deleteReport(IDREPORT);
	}
};

UserPanelControllerClass.prototype.AJAX_deleteReport = function(IDREPORT){

var url = "r_php/ert/deleteReport.php";
var pars = 'IDREPORT=' + IDREPORT;

//Ajax Prototype Framework
var myAjax = new Ajax.Request(url,
{
method: 'post',
parameters: pars,
onComplete: this.showResponseDeleteReport,
onFailure: this.reportError
});
}

UserPanelControllerClass.prototype.reportError = function(){
	alert("Sorry, There was a error in the process.");
	
	//Show Ajax indicator
	var INDICATOR = "INDICATOR_LOGIN";
	OBJ = document.getElementById(INDICATOR);
	OBJ.style.display = "block";
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

UserPanelControllerClass.prototype.showResponseDeleteReport = function (originalRequest){
	var data = originalRequest.responseText;
	var message = readEsmetaXML("esmeta",data);
	//alert(message)

	if(message != -1){
		message = readEsmetaXML("transaction",data);
		if(message != -1){
			//alert(message)
			if(message == 1){
				message = readEsmetaXML("reportdeleted",data);
				//alert(message);
				if(message != -1){

					//Hide INDICATOR				
					var IDREPORT = message;
					var IDREPORT_PREFIX = 'INDICATOR_';
					IDREPORT_PREFIX += IDREPORT.toString();
					
					//Show Ajax indicator
					var INDICATOR = IDREPORT_PREFIX;
					OBJ = document.getElementById(INDICATOR);
					OBJ.style.display = "none";
				
					//Cambiar por un AJAX updater
					document.location.href = "reportPanel.php";
				}else{
					alert("Impossible to read Esmeta XML Protocol")
				}
			}else{
				alert("Login process failed.");
			}
		}else{
			alert("Impossible to read Esmeta XML Protocol")
		}
	}else{
		alert("Impossible to read Esmeta XML Protocol")
	}
}

/****************************
***** EVENT: Add Report *****
*****************************/

UserPanelControllerClass.prototype.Random = function(N) {
    return Math.floor(N * (Math.random() % 1));
}

UserPanelControllerClass.prototype.popup = function(URL, width, height){
	var seed = this.Random(1000000000000);

	OpenedWin = window.open(URL, seed, "width="+width+",height="+height+",status=no,menubar=no,location=no,toolbar=no,directories=no,scrollbars=yes");
	//if (! is_aol){
		var NewX = (screen.availWidth/2)-(width/2);
		var NewY = (screen.availHeight/2)-(height/2);
		OpenedWin.moveTo(NewX, NewY);
		NewX = null;
		NewY = null;
	//}
	OpenedWin.focus();
}

UserPanelControllerClass.prototype.addReport = function(){
	this.popup('p_windows/wAddReport.php',300,250);
}

/*******************************
***** EVENT: Update Report *****
*******************************/

UserPanelControllerClass.prototype.updateInfoReport = function(IDREPORT){
	var URL = 'p_windows/wUpdateReport.php';
	GET_PARAMETER = '?IDREPORT=' + IDREPORT;
	URL += GET_PARAMETER;

	this.popup(URL,300,250);
}