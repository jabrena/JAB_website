//HZ3rOFhlX5K-4mgsfLfNQc7l1qWMjKLXP5EiUBPDk8g8EvqygeRx39ZfiyC

//Funcion que envia informacion del carrito de la compra a PAY PAL
function paypalControllerClass(){
  	var a = arguments;

	this.paypalURL = a[0] || null;
 	this.cmd = a[1] || null;
 	this.business = a[2] || null;
	this.currency_code = a[3] || null;
	this.item_name = a[4] || null;
 	this.item_number = a[5] || null;

	this.buttonUrl = a[6] || null;
	this.buttonAlt = a[7] || null;

 	this.amount = a[8] || 0;

	this.paypalReturn = a[9] || null;
	this.cancel_return = a[10] || null;

	/*
 	this.no_shipping = '';
 	this.tax = '';
 	this.amount = '';
 	this.cn = '';
 	this.lc = '';

 	this.lc = '';
 	*/
 	
 	this.error = false;
 
}

/*************************
***** PUBLIC METHODS *****
*************************/

//Method to send Information to PAYPAL to make a donation
paypalControllerClass.prototype.writeDonationForm = function(){
	if(!this.error){
	  	var strForm = ''
	  	strForm +='<form action="' + this.paypalURL + '" method="post">';
		strForm +='<input type="hidden" name="cmd" value="' + this.cmd +'">';
		strForm +='<input type="hidden" name="business" value="' + this.business +'">';
		strForm +='<input type="hidden" name="item_name" value="' + this.item_name + '">';
		strForm +='<input type="hidden" name="currency_code" value="' + this.currency_code + '">';
		
		if(this.amount != 0){
			strForm +='<input type="hidden" name="amount" value="' + this.amount+ '">';
		}
		
		//
		strForm +='<input type="image" src="' + this.buttonUrl + '" name="submit" alt="'+ this.buttonAlt + '">';
		
		//Extra hidden inputs
		strForm +='<input type="hidden" name="return" value="' + this.paypalReturn + '">';
		strForm +='<input type="hidden" name="cancel_return" value="' + this.cancel_return + '">';
		
		strForm +='</form>';
		document.write(strForm)
	}
}

/****************************
***** GET / SET METHODS *****
****************************/

// GET/SET Methods to paypalURL propertie
paypalControllerClass.prototype.setPaypalURL = function(txtURL){
	this.paypalURL  = txtURL;
}

paypalControllerClass.prototype.getPaypalURL = function(){
	return this.paypalURL;
}

// GET/SET Methods to cmd propertie

/*
Paypal supports the following types of CMD:
+ _xclick
+ _cart
*/
paypalControllerClass.prototype.setCmd = function(txtCMD){
	if((txtCMD == '_xclick') || (txtCMD == '_cart')){
		this.cmd  = txtCMD;
	}else{
		alert('Sorry, Paypal only supports _xclick or _cart methods')
		this.error = true;
	}
}

paypalControllerClass.prototype.getCmd = function(){
	return this.cmd;
}

// GET/SET Methods to business propertie
paypalControllerClass.prototype.setBusiness = function(txtBusiness){
	this.business  = txtBusiness;
}

paypalControllerClass.prototype.getBusiness = function(){
	return this.business;
}

// GET/SET Methods to user propertie

/*
Paypal supports the following types of currency_code

+ EUR
+ GBP
+ JPY
+ USD
*/
paypalControllerClass.prototype.setCurrenyCode = function(txtCurrencyCode){
	if((txtCurrencyCode == 'EUR') || (txtCurrencyCode == 'GBP') || (txtCurrencyCode == 'JPY') || (txtCurrencyCode == 'USD')){
		this.currency_code  = txtCurrencyCode;
	}else{
		alert('Sorry, Paypal only supports EUR, GBP, JPY & USD Currency codes')
		this.error = true;
	}
}

paypalControllerClass.prototype.getCurrenyCode = function(){
	return this.currency_code;
}

// GET/SET Methods to item_name propertie
paypalControllerClass.prototype.setItemName = function(txtItemName){
	this.item_name  = txtItemName;
}

paypalControllerClass.prototype.getItemName = function(){
	return this.item_name;
}

// GET/SET Methods to user propertie
paypalControllerClass.prototype.setItemNumber = function(txtItemNumber){
	this.item_number  = txtItemNumber;
}

paypalControllerClass.prototype.getItemNumber = function(){
	return this.item_number;
}

// GET/SET Methods to buttonUrl propertie
paypalControllerClass.prototype.setButtonUrl = function(txtURL){
	this.buttonUrl  = txtURL;
}

paypalControllerClass.prototype.getButtonUrl = function(){
	return this.buttonUrl;
}

// GET/SET Methods to buttonAlt propertie
paypalControllerClass.prototype.setButtonAlt = function(txtImageAlt){
	this.buttonAlt  = txtImageAlt;
}

paypalControllerClass.prototype.getButtonAlt = function(){
	return this.buttonAlt;
}

// GET/SET Methods to amount propertie
paypalControllerClass.prototype.setAmount = function(txtAmount){
	this.amount  = txtAmount;
}

paypalControllerClass.prototype.getAmount = function(){
	return this.amount;
}

// GET/SET Methods to amount propertie
paypalControllerClass.prototype.setReturn = function(txtURL){
	this.paypalReturn  = txtURL;
}

paypalControllerClass.prototype.getReturn = function(){
	return this.paypalReturn;
}

// GET/SET Methods to amount propertie
paypalControllerClass.prototype.setCancelReturn = function(txtURL){
	this.cancel_return  = txtURL;
}

paypalControllerClass.prototype.getCancelReturn = function(){
	return this.cancel_return;
}