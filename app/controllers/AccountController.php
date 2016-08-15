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
 			$this->data['contactMessage'] = '<p style="color:green;">Your first name has been updated please <a href="index.php?page=logout">log out</a> and back in for these changes to take effect</p>'; 
 			
		}
	} 

	private function updateLastname() { 
		$totalErrors = 0; 
		$lastName = trim($_POST['last-name']);  

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
 			$this->data['contactMessage'] = '<p style="color:green;">Your last name has been updated please <a href="index.php?page=logout">log out</a> and back in for these changes to take effect</p>'; 
 			
		}


	} 

	private function updateEmail() { 
		$totalErrors = 0; 
		$email = trim($_POST['email']); 

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

 			$this->data['contactMessage'] = '<p style="color:green;">Your email address has been updated. Please <a href="index.php?page=logout">log out</a> and back in with 
 			your new email address for these changes to take effect</p>';		
		} 
	} 

	private function updatePassword() { 
		die('passed to password function');
	}


}






















