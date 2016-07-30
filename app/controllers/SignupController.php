<?php  

class SignupController { 

	//properties 
	private $firstNameMessage;
	private $lastNameMessage;
	private $emailMessage; 
	private $passwordMessage; 
	private $dbc; 


	//constructor (help build the page)  
	public function __construct($dbc) { 

		//save database connection for later 
		$this->dbc = $dbc;

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
		
		$totalErrors = 0; 

		if( $_POST['first-name'] == '' ) {
			$this->firstNameMessage = 'Please enter your first name'; 
			$totalErrors++;	
		} 

		if( $_POST['last-name'] == '' ) {
			$this->lastNameMessage = 'Please enter your last name';	
			$totalErrors++;
		}

		if( $_POST['email'] == '' ) {
			$this->emailMessage = 'Invalid E-Mail';	
			$totalErrors++;
		} 

		if( strlen($_POST['password']) < 8 ) {
			$this->passwordMessage = 'Password must be longer than 8 characters';
			$totalErrors++;	
		}
		
		if( $totalErrors == 0) { 
			
			//validaion has passed  

			//filter user data before using it in a query 
			$filteredFirstName = $this->dbc->real_escape_string( $_POST['first-name'] ); 
			$filteredLastName = $this->dbc->real_escape_string( $_POST['last-name'] );
			$filteredEmail = $this->dbc->real_escape_string( $_POST['email'] ); 

			//hash the password 
			$hash = password_hash($_POST['password'], PASSWORD_BCRYPT);  

			//prep sql 

			$sql = "INSERT INTO users (first_name, last_name, email, password)
					VALUES ('$filteredFirstName', '$filteredLastName', '$filteredEmail', '$hash')"; 

			
			//run the query 
			$this->dbc->query($sql);


		
		}
	}



}












