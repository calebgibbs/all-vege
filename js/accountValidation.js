var firstNameForm = document.querySelector('#first-name'); 
var lastNameForm = document.querySelector('#last-name');

var namePattern = new RegExp("^[a-zA-Z.'-]{2,50}$");  

var firstNameInput = document.querySelector('#name');

var firstNameMessage = document.querySelector('#first-name-message');

firstNameForm.onsubmit = function(event) { 
	var totalErrors = 0; 

	if( namePattern.test(nameInput.value) ){
		firstNameMessage.innerHTML = "*First Name updated"
	} else { 
		console.log("name is invalid");  
		firstNameMessage.innerHTML = "*Please enter a valid  name"; 
		event.preventDefault();
		totalErrors++;
	} 
};