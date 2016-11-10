function FormControllerClass(){
	this.error = false;

};
FormControllerClass.prototype.redirect = function(url){
	document.location.href = url;
}
