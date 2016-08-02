<?php 

class LoginController   {  

	public function __construct($dbc) {

		$this->dbc = $dbc;  
 
		if( isset($_POST['login']) ) { 
			$this->processLoginForm();
		}
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
			 
			$fileredEmail = $this->dbc->real_escape_string( $_POST['email'] ); 
			 
			$sql = "SELECT id, password, privilege, first_name 
					FROM users
					WHERE email = '$fileredEmail'  AND first_name = '$firstName'"; 
			 
			$result = $this->dbc->query( $sql ); 

			 
			if( $result->num_rows == 1 ) {
				$userData = $result->fetch_assoc();  
				$passwordResult = password_verify( $_POST['password'], $userData['password'] ); 
				 
				if($passwordResult == true) { 
					
					$_SESSION['id'] = $userData['id']; 
					$_SESSION['privilege'] = $userData['privilege']; 
					$_SESSION['first_name'] = $userData['first_name'];

					header('Location: index.php');

				} else {
					
					$this->data['loginMessage'] = "email or password is incorrect";

				}


			}else{ 
				
				$this->data['loginMessage'] = "email or password is incorrect";
			}
		}

	}
}