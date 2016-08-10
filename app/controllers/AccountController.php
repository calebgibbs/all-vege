<?php 

class AccountController extends PageController { 

	public function __construct($dbc) { 
		parent::__construct(); 
		$this->mustBeLoggedIn(); 

		// if();

	}  

	public function buildHTML() { 
		echo $this->plates->render('account');
	}


}