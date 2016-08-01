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
		
		$firstName = 0; 
		$lastName = 0;

		$sql = "SELECT id, first_name AS score_first_name, last_name AS score_last_name
				FROM users
				WHERE 
					first_name LIKE '%$firstName%' AND 
					last_name LIKE '%$lastName%'";
					 
		$info = $this->dbc->query($sql); 

		if( ! $result || $info->num_rows == 0) {
			$this->data['searchResults'] = "No results";

		}else{
			$this->data['searchResults'] = $result->fetch_all(MYSQLI_ASSOC);
		}

	}
}