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
		
		$selected = $_POST['change-class']; 
		$userID = intval(preg_replace('/[^0-9]+/', '', $selected)); 
		$newClass = preg_replace("/[^a-z]+/", "", $selected); 
		
		if ($newClass == 'admin') {
			$sql = "UPDATE users
 					SET privilege = '$newClass'
 					WHERE id = $userID";  
 			$this->dbc->query( $sql ); 
		}elseif($newClass == 'moderator') {  
			$sql = "UPDATE users
 					SET privilege = '$newClass'
 					WHERE id = $userID"; 
 			$this->dbc->query( $sql );
		}elseif($newClass == 'user') {  
			$sql = "UPDATE users
 					SET privilege = '$newClass'
 					WHERE id = $userID"; 
 			$this->dbc->query( $sql );
		} 
	}
}