<?php 

class MYRecipesController extends PageController {  

	public function __construct($dbc) {

		parent::__construct(); 
		$this->mustBeLoggedIn();
		$this->mustBeModerator(); 
		$this->dbc = $dbc;	
	} 

	public function buildHTML() { 
		$allData = $this->myRecipes(); 

		$data = []; 

		$data['allRecipes'] = $allData;

		echo $this->plates->render('myRecipes', $data );
	}
	
	private function myRecipes() { 
		$userID = $_SESSION['id'];
		$sql = "SELECT id, title, description, created_by 
				FROM recipes 
				WHERE created_by = $userID";

		$result = $this->dbc->query($sql);

		$allData = $result->fetch_all(MYSQLI_ASSOC); 
	 
		return $allData;
	}	
}