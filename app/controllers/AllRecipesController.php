<?php 

class AllRecipesController extends PageController {  

	public function __construct($dbc) {

		parent::__construct(); 
		$this->mustBeLoggedIn();
		$this->mustBeAdmin(); 
		$this->dbc = $dbc;	
	} 

	public function buildHTML() { 
		 
		$allData = $this->allRecipes(); 

		$data = []; 

		$data['allRecipes'] = $allData;

		echo $this->plates->render('allRecipes', $data );
	} 

	private function allRecipes() { 
		$sql = "SELECT id, title, description 
				FROM recipes";

		$result = $this->dbc->query($sql);

		$allData = $result->fetch_all(MYSQLI_ASSOC); 
	 
		return $allData;
	}
	
	
}
