var form = document.querySelector('#signin-form'); 
form.onsubmit = function(event) { 
	
	var totalErrors = 0;
	
	var namePattern = new RegExp("^[a-zA-Z.' -]{2,50}$");   
	var emailPattern = new RegExp("^[a-zA-Z0-9._'@]{7,50}$"); 
	var pwdPattern = new RegExp("^[a-zA-Z0-9!@#$%^&*(){}|[]:;<>,.?/]{}$"); 
	
	var fNameInput = document.querySelector('#fname');
	var lNameInput = document.querySelector('#lname');
	var emailInput = document.querySelector('#email');
	var pwdInput = document.querySelector('#pwd'); 
	var cPwdInput = document.querySelector('#cpwd');
	
	var fNameMessage = document.querySelector('#fname-message');
	var lNameMessage = document.querySelector('#lname-message');
	var emailMessage = document.querySelector('#email-message');
	var pwdMessage = document.querySelector('#pwd-message');
	var cPwdMessage = document.querySelector('#cpwd-message'); 
	
	if( namePattern.test(fNameInput.value) ){
		console.log("first name is valid");
	} else { 
		console.log("name is invalid");  
		nameMessage.innerHTML = "*Please enter your first name";  
		totalErrors++;
	} 
	
	if( namePattern.test(lNameInput.value) ){
		console.log("first name is valid");
	} else { 
		console.log("name is invalid");  
		nameMessage.innerHTML = "*Please enter your last name";  
		totalErrors++;
	}
	}
};