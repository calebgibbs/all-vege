<?php 

class LoginController extends PageController { 

	public function __construct($dbc) {

		parent::__construct(); 

		//save the database connection
		$this->dbc = $dbc; 

		//if the log in form has been submitted  
		if( isset($_POST['login']) ) { 
			$this->processLoginForm();
		}
	}

	public function buildHTML() { 
		$plates = new League\Plates\Engine('app/templates');
		echo $plates -> render('login', $this->data);
	} 

	private function processLoginForm() {  

		$totalErrors = 0;
		
		if( strlen($_POST['email']) < 6 ) {
			$this->data['emailMessage'] = 'Invalid email';
			$totalErrors++;
		}

		if( strlen($_POST['password']) < 8 ) {
			$this->data['passwordMessage'] = 'Invalid password';
			$totalErrors++;
		}

		if($totalErrors == 0) { 
			//check db for email 
			//get hashed password too  
			$fileredEmail = $this->dbc->real_escape_string( $_POST['email'] ); 

			//prepear SQL 
			$sql = "SELECT id, password, privilege 
					FROM users
					WHERE email = '$fileredEmail'  "; 

			//run the query 
			$result = $this->dbc->query( $sql ); 

			//is there a resuly? 
			if( $result->num_rows == 1 ) {
				$userData = $result->fetch_assoc();  

				$passwordResult = password_verify( $_POST['password'], $userData['password'] ); 

				//if the result was good  
				if($passwordResult == true) { 
					
					$_SESSION['id'] = $userData['id']; 
					$_SESSION['privilege'] = $userData['privilege'];

					header('Location: index.php');

				} else {
					
					$this->data['loginMessage'] ="email or password is incorrect";

				}


			}else{ 
				//credentials do not match records 
				$this->data['loginMessage'] ="email or password is incorrect";
			}
		}

	}
}