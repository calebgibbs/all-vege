var form = document.querySelector('#login-form'); 
form.onsubmit = function(event) { 
	
	var totalErrors = 0;
	
	var namePattern = new RegExp("^[a-zA-Z.' -]{2,50}$");   
	var emailPattern = new RegExp("^[a-zA-Z0-9._'@]{7,50}$");  
	// var pwdPattern = new RegExp(");
	
	
	if( namePattern.test(nameInput.value) ){
		console.log("name is valid");
	} else { 
		console.log("name is invalid");  
		nameMessage.innerHTML = "*Please enter a valid  name"; 
		totalErrors++;
	} 
	if(phonePattern.test(phoneInput.value)){
		console.log("Phone number is valid");
	}else{ 
		console.log("Phone number is invalid"); 
		phoneMessage.innerHTML = "*Please enter a valid phone number"; 
		totalErrors++;
	} 
	if(emailPattern.test(emailInput.value)){
		console.log("Eamil is valid");
	}else{
		emailMessage.innerHTML = "*Please enter a valid email address"; 
		console.log("email is not valid");
		totalErrors++;
	} 
	if(totalErrors>0) {	
		event.preventDefault();  
	}
};