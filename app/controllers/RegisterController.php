<?php  

class SignupController extends PageController{ 

	private $firstNameMessage;
	private $lastNameMessage;
	private $emailMessage; 
	private $passwordMessage; 
  
	public function __construct($dbc) { 

		$this->dbc = $dbc; 

		$this->mustBeLoggedOut();

		if ( isset($_POST['new-account']) ) {
			$this->validateRegistrationForm();
		}

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

		echo $plates->render('register', $data);
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

		$filteredEmail = $this->dbc->real_escape_string( lcfirst($_POST['email']) );

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

		if ($_POST['password'] != $_POST['password2']) {
			$this->passwordMessage = 'Passwords do not match';
			$totalErrors++;
		}
		
		if( $totalErrors == 0) { 
		 
			$filteredFirstName = $this->dbc->real_escape_string( ucfirst($_POST['first-name']) ); 
			$filteredLastName = $this->dbc->real_escape_string( ucfirst($_POST['last-name']) );
			
			$hash = password_hash($_POST['password'], PASSWORD_BCRYPT);  

			$sql = "INSERT INTO users (first_name, last_name, email, password)
					VALUES ('$filteredFirstName', '$filteredLastName', '$filteredEmail', '$hash')"; 
			$this->dbc->query($sql);  

			$_SESSION['id'] = $this->dbc->insert_id;
			$_SESSION['first_name'] = $filteredFirstName; 
			$_SESSION['last_name'] = $filteredLastName; 
			$_SESSION['email'] = $filteredEmail;
			$_SESSION['privilege'] = 'user'; 
			$_SESSION['profile_picture'] = 'default.png'; 

			header('Location: index.php?page=account'); 
		}
	}
}