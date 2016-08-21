<?php 

class LoginController extends PageController {  

	public function __construct($dbc) { 

		parent::__construct(); 

		$this->mustBeLoggedOut();

		$this->dbc = $dbc; 

		if( isset( $_POST['login'] ) ) {
			$this->processLoginForm();
		}
	} 

	public function buildHTML() {

		echo $this->plates->render('login', $this->data);

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
			 
			$sql = "SELECT id, password, privilege, first_name, email, last_name, profile_picture 
					FROM users
					WHERE 
						email = '$fileredEmail'"; 
			 
			$result = $this->dbc->query($sql); 


			 
			if( $result->num_rows == 1 ) {
				$userData = $result->fetch_assoc();  
				$passwordResult = password_verify( $_POST['password'], $userData['password'] ); 
				 
				if($passwordResult == true) { 
					
					$_SESSION['id'] = $userData['id']; 
					$_SESSION['privilege'] = $userData['privilege']; 
					$_SESSION['first_name'] = $userData['first_name'];
					$_SESSION['last_name'] = $userData['last_name']; 
					$_SESSION['email'] = $userData['email'];
					$_SESSION['profile_picture'] = $userData['profile_picture']; 

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