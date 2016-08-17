<?php 

class UserController extends PageController {  

	public function __construct($dbc) {

		parent::__construct(); 
		$this->mustBeLoggedIn(); 
		$this->mustBeAdmin();
		$this->dbc = $dbc; 

		if(isset($_POST['change-class'])){ 
			$this->changeUserPrivilege();
		} 

				
	} 

	public function buildHTML() {  
		$allData = $this->getAllUsers(); 
		$data = []; 
		$data['allUsers'] = $allData;
		echo $this->plates->render('users', $data);
	} 

	private function getAllUsers() { 
		$sql = "SELECT id, first_name, last_name, email, privilege 
				FROM users"; 

		$result = $this->dbc->query($sql);  
		$allData = $result->fetch_all(MYSQLI_ASSOC);  

		return $allData;
	} 

	private function changeUserPrivilege() {
		$updatePrivilege = $_POST['change-class']; 

		if ($updatePrivilege == 'admin') {
			die('Changing user to an admin');
		}elseif($updatePrivilege == 'moderator') { 
			die('making user a moderator');
		}elseif($updatePrivilege == 'user') { 
			die('making user account');
		} 


	}
	
	
}
