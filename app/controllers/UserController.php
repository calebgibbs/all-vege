<?php 

class UserController extends PageController {  

	public function __construct($dbc) {

		parent::__construct(); 
		$this->mustBeLoggedIn(); 
		$this->mustBeAdmin();
		$this->dbc = $dbc;	 
	} 

	public function buildHTML() { 
		echo $this->plates->render('users');
	}
	
	
}
