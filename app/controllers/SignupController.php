<?php  

class SignupController { 

	private $firstNameMessage;
	private $lastNameMessage;
	private $emailMessage; 
	private $passwordMessage; 
	private $dbc; 
  
	public function __construct($dbc) { 

		$this->dbc = $dbc;

		if ( isset($_POST['new-account']) ) {
			$this->validateRegistrationForm();
		}

	}

	public function registerAccount() {
		
	} 

	public function buildHTML() {  

		$plates = new League\Plates\Engine('app/templates');

		$data = []; 

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
			$this->emailMessage = 'Invalid email address';	
			$totalErrors++;
		} 

		$filteredEmail = $this->dbc->real_escape_string( $_POST['email'] );

		$sql = "SELECT email
				FROM users
				WHERE email = '$filteredEmail'  ";

		$result = $this->dbc->query($sql);

		if( !$result || $result->num_rows > 0 ) {
			$this->emailMessage = 'E-Mail in use';
			$totalErrors++;
		}

		if( strlen($_POST['password']) < 8 ) {
			$this->passwordMessage = 'Password must be longer than 8 characters';
			$totalErrors++;	
		}
		
		if( $totalErrors == 0) { 
		 
			$filteredFirstName = $this->dbc->real_escape_string( $_POST['first-name'] ); 
			$filteredLastName = $this->dbc->real_escape_string( $_POST['last-name'] );
			
 
			$hash = password_hash($_POST['password'], PASSWORD_BCRYPT);  

			$sql = "INSERT INTO users (first_name, last_name, email, password)
					VALUES ('$filteredFirstName', '$filteredLastName', '$filteredEmail', '$hash')"; 
			$this->dbc->query($sql);  

			$_SESSION['id'] = $this->dbc->insert_id;

			header('Location: index.php?page=home');
		}
	}



}












