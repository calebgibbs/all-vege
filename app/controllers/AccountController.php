<?php 

class AccountController extends PageController {  

	public function __construct($dbc) {

		parent::__construct(); 

		$this->dbc = $dbc;

		$this->mustBeLoggedIn(); 

		$this->getAccountinfo();
	}

	public function buildHTML() { 
		echo $this->plates->render('account');
	} 

	private function getAccountinfo() { 


		// //getting account information 
		// $sql = "SELECT first_name, last_name, email, password 
		// 		FROM users";  

		// // $sqlPrint = mysqli_fetch_assoc($sql); 



		// if(!$dbc) { 
		// 	die('conection failed');
		// }
	}
}