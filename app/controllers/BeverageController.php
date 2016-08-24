<?php 

class BeverageController extends PageController { 
	public function __construct($dbc) {
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->getRecipes();	
	} 

	public function buildHTML() { 
		echo $this->plates->render('beverage', $this->data);
	}  

	private function getRecipes() { 
		$searchTerm = "beverage";
		$this->data['searchTerm'] = $searchTerm; 

		$sql = "SELECT id, title AS score_title, description AS score_description, image, category 
				FROM recipes 
				WHERE 
					category = '$searchTerm'
				ORDER BY score_title ASC";  
		$result = $this->dbc->query($sql); 

		if( ! $result || $result->num_rows == 0) {
			$this->data['searchResults'] = "No results";

		}else{
			$this->data['searchResults'] = $result->fetch_all(MYSQLI_ASSOC);
		}
	}
}