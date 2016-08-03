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


		$sql = "SELECT first_name 
					FROM users"; 

		$firstName = $this->dbc->query($sql); 

		
		

		
		
	}
}