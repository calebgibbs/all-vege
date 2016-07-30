<?php 

class SignupController { 

	//properties 
	private $firstNameMessage;
	private $lastNameMessage;
	private $emailMessage; 
	private $passwordMessage; 


	//constructor (help build the page)  
	public function __construct() {

		//if the user had submitted the registration 
		if ( isset($_POST['new-account']) ) {
			$this->validateRegistrationForm();
		}

	}

	//methods (functions) 
	public function registerAccount() {
		//validate users data 

		//cleck databacse to see if email is in use 

		//check strength of users password (if it's less then 8 ch) 

		//register the account OR show error messages 

		//if successful redirect to home page
		
	} 

	public function buildHTML() {  

		$plates = new League\Plates\Engine('app/templates');

		//preperar container for data 
		$data = []; 

		//if there is an email error 
		if($this->firstNameMessage != '') {
			$data['firstNameMessage'] = $this->firstNameMessage;
		} 

		if($this->lastNameMessage != '') {
			$data['lastNameMessage'] = $this->lastNameMessage;
		}

		if($this->emailMessage != '') {
			$data['emailMessage'] = $this->emailMessage;
		} 

		if($this->passwordMessage != '') {
			$data['passwordMessage'] = $this->passwordMessage;
		}

		echo $plates->render('sign-up', $data);
	} 

	private function validateRegistrationForm(){
		
		//make sure first name has been provided 

		//make sure last name has been provided 

		//make sure email has been provides 
		if( $_POST['first-name'] == '' ) {
			$this->firstNameMessage = 'Please enter your first name';	
		} 

		if( $_POST['last-name'] == '' ) {
			$this->lastNameMessage = 'Please enter your last name';	
		}

		if( $_POST['email'] == '' ) {
			$this->emailMessage = 'Invalid E-Mail';	
		} 

		if( strlen($_POST['password']) < 8 ) {
			$this->passwordMessage = 'Password must be longer than 8 characters';	
		}
		//and is valis
	}



}












