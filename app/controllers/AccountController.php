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
			It must be under 50 characters</p>';
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
		die('Passed to last name function');
	}


}