/*
Class: LeJOSEbook
Description: 
Author: JAB
Info: bren@juanantonio.info
*/

//Clase que controla el fichero Home.htm
function LeJOSEbook(){
	this.error = false;
};

/**************************
***** WEB 2.0 METHODS *****
**************************/

LeJOSEbook.prototype.readEsmetaXML = function(tag,data){
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


LeJOSEbook.prototype.trimString = function(str){
	return str.replace(/^\s+/g, '').replace(/\s+$/g, '');
};

/**
 * DHTML email validation script. Courtesy of SmartWebby.com (http://www.smartwebby.com/dhtml/)
 */
LeJOSEbook.prototype.checkEmail = function(str){
	var at="@"
	var dot="."
	var lat=str.indexOf(at)
	var lstr=str.length
	var ldot=str.indexOf(dot)
	if (str.indexOf(at)==-1){
	   //alert("Invalid E-mail ID")
	   return false
	}

	if (str.indexOf(at)==-1 || str.indexOf(at)==0 || str.indexOf(at)==lstr){
	   //alert("Invalid E-mail ID")
	   return false
	}

	if (str.indexOf(dot)==-1 || str.indexOf(dot)==0 || str.indexOf(dot)==lstr){
		//alert("Invalid E-mail ID")
		return false
	}

	 if (str.indexOf(at,(lat+1))!=-1){
		//alert("Invalid E-mail ID")
		return false
	 }

	 if (str.substring(lat-1,lat)==dot || str.substring(lat+1,lat+2)==dot){
		//alert("Invalid E-mail ID")
		return false
	 }

	 if (str.indexOf(dot,(lat+2))==-1){
		//alert("Invalid E-mail ID")
		return false
	 }
	
	 if (str.indexOf(" ")!=-1){
		//alert("Invalid E-mail ID")
		return false
	 }

	 return true					
}

/******************
***** EVENTS *****
*******************/

LeJOSEbook.prototype.cbNavigation_onChange = function(obj){
	var idContent = obj.value;
	if(idContent == "home"){
		this.showHome();
	}else if(idContent == "contents"){
		this.showTableContents();
	}else if(idContent == "downloads"){
		this.showDownloads();
	}else if(idContent == "collaborations"){
		this.showCollaborations();
	}else if(idContent == "courses"){
		this.showEducationalCourses();
	}else if(idContent == "newsletter"){
		this.showNewsletter();
	}else if(idContent == "contact"){
		this.showContact();
	}else if(idContent == "donation"){
		this.showDonation();
	}
}

LeJOSEbook.prototype.showHome = function(){
	$("#home").show();
	$("#tableContents").hide();
	$("#downloads").hide();
	$("#collaborations").hide();
	$("#courses").hide();
	$("#videos").hide();
	$("#newsletter").hide();
	$("#contact").hide();	
	$("#donation").hide();
}

LeJOSEbook.prototype.showTableContents = function(){
	$("#home").hide();
	$("#tableContents").show();
	$("#downloads").hide();
	$("#collaborations").hide();
	$("#courses").hide();
	$("#videos").hide();
	$("#newsletter").hide();
	$("#contact").hide();	
	$("#donation").hide();
}

LeJOSEbook.prototype.showDownloads = function(){
	$("#home").hide();
	$("#tableContents").hide();
	$("#downloads").show();
	$("#collaborations").hide();
	$("#courses").hide();
	$("#videos").hide();
	$("#newsletter").hide();
	$("#contact").hide();	
	$("#donation").hide();
}

LeJOSEbook.prototype.showCollaborations = function(){
	$("#home").hide();
	$("#tableContents").hide();
	$("#downloads").hide();
	$("#collaborations").show();
	$("#courses").hide();
	$("#videos").hide();
	$("#newsletter").hide();
	$("#contact").hide();	
	$("#donation").hide();
}

LeJOSEbook.prototype.showEducationalCourses = function(){
	$("#home").hide();
	$("#tableContents").hide();
	$("#downloads").hide();
	$("#collaborations").hide();
	$("#courses").show();
	$("#videos").hide();
	$("#newsletter").hide();
	$("#contact").hide();	
	$("#donation").hide();
}

LeJOSEbook.prototype.showVideos = function(){
	$("#home").hide();
	$("#tableContents").hide();
	$("#downloads").hide();
	$("#collaborations").hide();
	$("#courses").hide();
	$("#videos").show();
	$("#newsletter").hide();
	$("#contact").hide();	
	$("#donation").hide();
}

LeJOSEbook.prototype.showNewsletter = function(){
	$("#home").hide();
	$("#tableContents").hide();
	$("#downloads").hide();
	$("#collaborations").hide();
	$("#courses").hide();
	$("#videos").hide();
	$("#newsletter").show();
	$("#contact").hide();	
	$("#donation").hide();
}

LeJOSEbook.prototype.showContact = function(){
	$("#home").hide();
	$("#tableContents").hide();
	$("#downloads").hide();
	$("#collaborations").hide();
	$("#courses").hide();
	$("#videos").hide();
	$("#newsletter").hide();
	$("#contact").show();	
	$("#donation").hide();
}

LeJOSEbook.prototype.showDonation = function(){
	$("#home").hide();
	$("#tableContents").hide();
	$("#downloads").hide();
	$("#collaborations").hide();
	$("#courses").hide();
	$("#videos").hide();
	$("#newsletter").hide();
	$("#contact").hide();	
	$("#donation").show();
}

LeJOSEbook.prototype.frm_onSubmit = function(obj){
	return false;
}

/******************
***** EVENTS *****
*******************/

LeJOSEbook.prototype.getEbook = function(){

	//Obtencion de datos del formulario
	formObj = document.frmDownloads;
	emailObj = formObj.email;
		
	var email = this.trimString(emailObj.value);

	var flag = false;


	if(email != ""){
		flag = true;
	}else{
		alert("Please, type your email");
		emailObj.focus();
	}

	
	if(flag){
		this.AJAX_downloadEbook(email);
	}
}

LeJOSEbook.prototype.getNewsletter = function(){

	//Obtencion de datos del formulario
	formObj = document.frmNewsletter;
	emailObj = formObj.email;
		
	var email = this.trimString(emailObj.value);

	var flag = false;


	if(email != ""){
		flag = true;
	}else{
		alert("Please, type your email");
		emailObj.focus();
	}

	
	if(flag){
		this.AJAX_addUserToNewsletter(email);
	}
}

LeJOSEbook.prototype.contact = function(){

	//Obtencion de datos del formulario
	formObj = document.frmContact;
	fullNameObj = formObj.fullname;
	emailObj = formObj.email;
	commentObj = formObj.comments;	
	
	var fullname = this.trimString(fullNameObj.value);
	var email = this.trimString(emailObj.value);
	var comments = this.trimString(commentObj.value);
	
	var flag = false;


	if(fullname != ""){
		if(email != ""){
			if(comments != ""){
				flag = true;
			}else{
				alert("Please, type your comments");
				commentObj.focus();
			}
		}else{
			alert("Please, type your email");
			emailObj.focus();
		}
	}else{
		alert("Please, type your fullname");
		fullNameObj.focus();
	}

	
	if(flag){
		this.AJAX_contact(fullname,email,comments);
	}
}

LeJOSEbook.prototype.AJAX_downloadEbook = function(email){
	var seed = Math.ceil(1000000000*Math.random());
	var url = "r_php/esmeta/lejosebook/PHP_AddReader.php";
	
	var pars ="";
	pars += 'seed='+ seed;
	pars += '&email=' + email;

	var XMLResults = "";

	$.ajax({
        type: "POST",
        url: "" + url,
		async:false,
        data: "" + pars,
        success: function(data){
			XMLResults = data;
		}
	});
	
	//alert(XMLResults);
	this.processResults(XMLResults);
}

LeJOSEbook.prototype.resetDownloadForm = function(){
	formObj = document.frmContact;
	formObj.reset();
}

LeJOSEbook.prototype.processResults = function(data){
	var message = this.readEsmetaXML("esmeta",data);

	if(message != -1){
		message = this.readEsmetaXML("transaction",data);
		if(message != -1){
			//alert(message)
			if(message == 1){
				message = this.readEsmetaXML("urlRedirect",data);
				//alert(message);
				if(message != -1){
					//alert("Many thanks.");

					document.location.href = message;
				}else{
					alert("Impossible to read Esmeta XML Protocol")
				}
			}else{
				//alert("Fallo en la autenticaci�n");
				alert("Fallo en la autenticacion");
			}
		}else{
			alert("Impossible to read Esmeta XML Protocol")
		}
	}else{
		alert("Impossible to read Esmeta XML Protocol")
	}
}

LeJOSEbook.prototype.AJAX_addUserToNewsletter = function(email){
	var seed = Math.ceil(1000000000*Math.random());
	var url = "r_php/esmeta/lejosebook/PHP_addUserToNewsletter.php";
	
	var pars ="";
	pars += 'seed='+ seed;
	pars += '&email=' + email;

	var XMLResults = "";

	$.ajax({
        type: "POST",
        url: "" + url,
		async:false,
        data: "" + pars,
        success: function(data){
			XMLResults = data;
		}
	});

	//alert(XMLResults);
	this.processResults2(XMLResults);
	//alert("Many thanks.\nYou have added into the Newsletter.");
	//document.location.href = "index.php";
}

LeJOSEbook.prototype.processResults2 = function(data){
	var message = this.readEsmetaXML("esmeta",data);

	if(message != -1){
		message = this.readEsmetaXML("transaction",data);
		if(message != -1){
			//alert(message)
			if(message == 1){
				message = this.readEsmetaXML("urlRedirect",data);
				//alert(message);
				if(message != -1){
					alert("Many thanks.\nYou have added into the Newsletter.");
					//alert("Many thanks.\nYou have registered.\nIn a brief period of time, you will receive \na email with a link to download the ebook");

					document.location.href = message;
				}else{
					alert("Impossible to read Esmeta XML Protocol")
				}
			}else{
				//alert("Fallo en la autenticaci�n");
				alert("Fallo en la autenticacion");
			}
		}else{
			alert("Impossible to read Esmeta XML Protocol")
		}
	}else{
		alert("Impossible to read Esmeta XML Protocol")
	}
}

LeJOSEbook.prototype.AJAX_contact = function(fullname,email,comments){
	var seed = Math.ceil(1000000000*Math.random());
	var url = "r_php/esmeta/lejosebook/PHP_sendEmail.php";
	
	var pars ="";
	pars += 'seed='+ seed;
	pars += '&fullname=' + fullname;
	pars += '&email=' + email;
	pars += '&comments=' + email;
	
	var XMLResults = "";

	$.ajax({
        type: "POST",
        url: "" + url,
		async:false,
        data: "" + pars,
        success: function(data){
			XMLResults = data;
		}
	});
	
	//alert(XMLResults);
	
	this.processResults3(XMLResults);
	
	//alert("Many thanks for your email.\nI will try to reply as soon as possible");
	//document.location.href = "index.php";
}

LeJOSEbook.prototype.processResults3 = function(data){
	var message = this.readEsmetaXML("esmeta",data);

	if(message != -1){
		message = this.readEsmetaXML("transaction",data);
		if(message != -1){
			//alert(message)
			if(message == 1){
				message = this.readEsmetaXML("urlRedirect",data);
				//alert(message);
				if(message != -1){
					alert("Many thanks for your email.\nI will try to reply as soon as possible");
					//alert("Many thanks.\nYou have registered.\nIn a brief period of time, you will receive \na email with a link to download the ebook");

					document.location.href = message;
				}else{
					alert("Impossible to read Esmeta XML Protocol")
				}
			}else{
				//alert("Fallo en la autenticaci�n");
				alert("Fallo en la autenticacion");
			}
		}else{
			alert("Impossible to read Esmeta XML Protocol")
		}
	}else{
		alert("Impossible to read Esmeta XML Protocol")
	}
}
