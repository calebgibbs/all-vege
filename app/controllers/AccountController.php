<?php 

class AccountController extends PageController { 

	public function __construct($dbc) { 
		parent::__construct(); 
		$this->mustBeLoggedIn();
		$this->dbc = $dbc;  

		if(isset($_POST['update-first-name'])){ 
			$this->updateFirstName();
		} 

		if(isset($_POST['update-last-name'])) { 
			$this->updateLastname();
		} 

		if (isset($_POST['update-email'])) {
			$this->updateEmail();
		} 

		if (isset($_POST['update-password'])) {
			$this->updatePassword();
		}

	}  

	public function buildHTML() { 
		echo $this->plates->render('account', $this->data);
	} 

	private function updateFirstName() { 
		$totalErrors = 0;  
		$firstName = trim($_POST['first-name']); 
		$firstName = ucfirst($firstName);  

		if(strlen($firstName) == 0) { 
			$this->data['contactMessage'] = '<p style="color:red;">You must enter a first name</p>';
			$totalErrors++;	
		}

		if( strlen($firstName) > 50 ) {
			$this->data['contactMessage'] = '<p style="color:red;">Your first name is too long. 
			It must be 50 characters or less</p>';
			$totalErrors++; 
		} 

		if ($totalErrors === 0) { 
			
			$firstName = $this->dbc->real_escape_string($firstName); 
 			
 			$userID = $_SESSION['id'];
 
 			$sql = "UPDATE users
 					SET first_name = '$firstName'
 					WHERE id = $userID"; 

 			$this->dbc->query( $sql ); 
 			$_SESSION['first_name'] = $firstName;  
 			$this->data['contactMessage'] = '<p style="color:green;">Your first name has been updated!</p>'; 
 			
		}
	} 

	private function updateLastname() { 
		$totalErrors = 0; 
		$lastName = trim($_POST['last-name']); 
		$lastName = ucfirst($lastName);  

		if(strlen($lastName) == 0) { 
			$this->data['contactMessage'] = '<p style="color:red;">You must enter a last name</p>';
			$totalErrors++;	
		} 

		if( strlen($lastName) > 50 ) {
			$this->data['contactMessage'] = '<p style="color:red;">Your last name is too long. 
			It must be 50 characters or less</p>';
			$totalErrors++; 
		} 

		if ($totalErrors === 0) { 
			
			$lastName = $this->dbc->real_escape_string($lastName); 
 
 			$userID = $_SESSION['id'];
 
 			$sql = "UPDATE users
 					SET last_name = '$lastName'
 					WHERE id = $userID"; 

 			$this->dbc->query( $sql ); 
 			$this->data['contactMessage'] = '<p style="color:green;">Your last name has been updated!</p>';  
 			$_SESSION['last_name'] = $lastName;
 			
		}


	} 

	private function updateEmail() { 
		$totalErrors = 0; 
		$email = trim($_POST['email']);  
		$email = lcfirst($email);

		if (strlen($email) == 0) {
			$this->data['contactMessage'] = '<p style="color:red;">You must enter a new email address</p>';
			$totalErrors++;
		} 

		if( strlen($email) > 255 ) {
			$this->data['contactMessage'] = '<p style="color:red;">Your email address is too long. Please enter a valid email address</p>';
			$totalErrors++; 
		} 

		$filteredEmail = $this->dbc->real_escape_string( $email );

		$sql = "SELECT email
				FROM users
				WHERE email = '$filteredEmail'   ";

		$result = $this->dbc->query($sql);

		if( !$result || $result->num_rows > 0 ) {
			$this->data['contactMessage'] = '<p style="color:red;">This email address is aready in use. Please enter a <i>new</i> email address</p>';
			$totalErrors++; 
		}
		
		if ($totalErrors == 0) { 

			$userID = $_SESSION['id'];  

			$sql = "UPDATE users
 					SET email = '$filteredEmail'
 					WHERE id = '$userID'";   
 			$this->dbc->query( $sql ); 

 			$this->data['contactMessage'] = '<p style="color:green;">Your email address has been updated!</p>';	 
 			$_SESSION['email'] = $email;	
		} 
	} 

	private function updatePassword() { 
		$totalErrors = 0; 
		$currentPassword = $_POST['current-password']; 
		$newPassword = $_POST['new-password']; 
		$newPasswordAgain = $_POST['new-password-again'];  

		$userID = $_SESSION['id']; 

		$getPassword = "SELECT id, password 
				FROM users
				WHERE 
					id = '$userID'"; 

		$result = $this->dbc->query($getPassword);

		if(strlen($newPassword) < 8) { 
			$this->data['contactMessage'] = '<p style="color:red;">Your new password is too short</p>'; 
			$totalErrors++; 
		}  

		if(strlen($currentPassword) == 0 || strlen($newPassword) == 0 || strlen($newPasswordAgain) == 0 ) {
			$this->data['contactMessage'] = '<p style="color:red;"><b>Password not updated.</b> Please fill in the correct information</p>';	
		}

		if($newPassword != $newPasswordAgain) { 
			$this->data['contactMessage'] = '<p style="color:red;">Your new passwords do not match</p>'; 
			$totalErrors++; 
		} 

		if( $result->num_rows == 1 ) {
			$userData = $result->fetch_assoc();  
			$passwordResult = password_verify( $currentPassword, $userData['password'] ); 
			
			if($passwordResult != true) { 
				$this->data['contactMessage'] = '<p style="color:red;">Your current password is incorrect</p>'; 
				$totalErrors++; 
			}
		} 

		if ($totalErrors == 0) {
			$hash = password_hash($newPasswordAgain, PASSWORD_BCRYPT);  

			$sql = "UPDATE users
 					SET password = '$hash'
 					WHERE id = '$userID'";   
 			$this->dbc->query( $sql ); 

 			$this->data['contactMessage'] = '<p style="color:green;">Your password has been updated!</p>';

		}
	}
}






















