<?php 

class NewController extends PageController { 
	public function __construct($dbc) {
		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->getRecipes();	
	} 

	public function buildHTML() { 
		echo $this->plates->render('new', $this->data);
	}  

	private function getRecipes() {
		$sql = "SELECT id, title AS score_title, description AS score_description, image, created_at
				FROM recipes 
				ORDER BY created_at DESC 
				LIMIT 10"; 
		$result = $this->dbc->query($sql);
		$this->data['recipes'] = $result->fetch_all(MYSQLI_ASSOC); 
	}
}