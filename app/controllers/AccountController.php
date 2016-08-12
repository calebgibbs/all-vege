<?php 

class AccountController extends PageController { 

	public function __construct($dbc) { 
		parent::__construct(); 
		$this->mustBeLoggedIn(); 

		if(isset($_POST['update-first-name'])){ 
			$this->updateFirstName();
		}

	}  

	public function buildHTML() { 
		echo $this->plates->render('account');
	} 

	private function updateFirstName() { 
		$totalErrors = 0; 

		if( strlen($_POST['first-name']) > 5 ) {
		
			$this->data['contactMessage'] = "Must be at most 50 characters";
			$totalErrors++; 

		}
	}


}