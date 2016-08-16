<?php 


class RecipeController extends PageController { 
	
	public function __construct($dbc) { 
		parent::__construct(); 
		
		$this->dbc = $dbc;
		$this->getRecipeData();
	} 

		public function buildHTML() { 
		echo $this->plates->render('recipe', $this->data);
	} 

	private function getRecipeData() { 
		//filter the ID 
		$recipeID = $this->dbc->real_escape_string( $_GET['recipeid'] ); 

		//get infromation about this recipe 
		$sql = "SELECT * 
				FROM recipes 
				WHERE id = '$recipeID'"; 
		
		$result = $this->dbc->query($sql); 
		// make sure it worked 
		if( !$result || $result->num_rows == 0) { 
			header('Location: index.php?page=404');
		}else { 
			//got a reult from the database. 
			$this->data['recipe'] = $result->fetch_assoc();
		}
	}
}