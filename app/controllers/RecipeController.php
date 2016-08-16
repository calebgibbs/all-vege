<?php 


class RecipeController extends PageController { 
	
	public function __construct($dbc) { 
		parent::__construct(); 
		
		$this->dbc = $dbc; 

		if (isset($_GET['delete'])) {
			$this->deleteRecipe();
		}

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

	private function deleteRecipe() { 
		$this->mustBeModerator(); 
		$admin = $_SESSION['privilege'] == 'admin'; 
		$userID = $_SESSION['id']; 
		$recipeID = $this->dbc->real_escape_string($_GET['recipeid']); 
	
		$sql = "DELETE FROM recipes
				WHERE id = $recipeID"; 

		if(!$admin) {  
			$sql .= " AND created_by = $userID";
		}else{
			return;
		}  

		$this->dbc->query($sql);   
		header('Location: index.php?page=home'); 
		die();
	}
} 































