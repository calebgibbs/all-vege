<?php 

class AccountController extends PageController {  

	public function __construct($dbc) {

		parent::__construct(); 

		$this->mustBeLoggedIn();

		$this->dbc = $dbc;	



		if(isset($_POST['update-first-name'])) {
			$this->updateFirstname();
		} 

		if(isset($_POST['update-last-name'])) { 
			$this->updateLastName();
		}	
	}

	public function buildHTML() { 
		echo $this->plates->render('account');
	}  

	private function updateFirstname() { 
		$totalErrors = 0; 

		if( strlen($_POST['first-name']) > 50 || strlen($_POST['first-name']) == 0  ) {
			$totalErrors++;
		} 

		if( $totalErrors == 0 ) {
			
			$firstName = $this->dbc->real_escape_string($_POST['first-name']);

			$userID = $_SESSION['id'];

			$sql = "UPDATE users
					SET first_name = '$firstName'
					WHERE id = $userID  ";

			$this->dbc->query( $sql );
		}  
	}

	private function updateLastname() { 
		$totalErrors = 0; 

		if( strlen($_POST['last-name']) > 50 || strlen($_POST['last-name']) == 0  ) {
			$totalErrors++;
		} 

		if( $totalErrors == 0 ) {
			
			$lastName = $this->dbc->real_escape_string($_POST['last-name']);

			$userID = $_SESSION['id'];

			$sql = "UPDATE users
					SET last_name = '$lastName'
					WHERE id = $userID  ";

			$this->dbc->query( $sql );
		} 

	}
	
}
