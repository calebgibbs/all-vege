<?php 

class AddRecipeController extends PageController {  

	public function __construct($dbc) {
		parent::__construct(); 
		$this->mustBeLoggedIn(); 
		$this->mustBeModerator();
		$this->dbc = $dbc;	 
		
		if( isset($_POST['add-recipe'])) { 
			$this->processNewRecipe();
		}
	} 

	public function buildHTML() { 
		echo $this->plates->render('addRecipe', $this->data);
	} 

	private function processNewRecipe() { 

		$totalErrors = 0; 
		$title = trim($_POST['title']);
		$desc  = trim($_POST['desc']);  
		$ingredients = trim($_POST['ingredients']); 
		$method = trim($_POST['method']); 
		$category = $_POST['category']; 
		$serves = $_POST['serves'];   

		if(strlen( $title ) == 0 ) { 
			$this->data['titleMessage'] = '<p style="color:red;">Title is required</p>';
			$totalErrors++;  
		} elseif(strlen($title) > 100) { 
			$this->data['titleMessage'] = '<p style="color:red>Title cannot be more than 100 characters</p>';
			$totalErrors++;  
		}  

		if(strlen($desc) == 0) { 
			$this->data['descMessage'] = '<p style="color:red">This must be filled out</p>';  
			$totalErrors++;
		} 

		if(strlen($ingredients) == 0) { 
			$this->data['ingrMessage'] = '<p style="color:red">This must be filled out</p>';
			$totalErrors++;
		} 

		if(strlen($method) == 0) { 
			$this->data['methodMessage'] = '<p style="color:red">This must be filled out</p>';
			$totalErrors++;
		} 

		if(isset($_POST['category']) && $_POST['category'] == '0') { 
			$this->data['categoryMessage'] = '<p style="color:red">Please select a category</p>'; 
			$totalErrors++;
		} 

		if(isset($_POST['serves']) && $_POST['serves'] == '0') { 
			$this->data['serveMessage'] = '<p style="color:red">Please choose a serving option</p>'; 
			$totalErrors++;
		} 

		if($totalErrors == 0) {    
			$title = $this->dbc->real_escape_string($title);
			$desc = $this->dbc->real_escape_string($desc);
			$ingredients = $this->dbc->real_escape_string($ingredients);
			$method = $this->dbc->real_escape_string($method); 
  
			$userID = $_SESSION['id']; 


 
			$sql = "INSERT INTO recipes (title, description, ingredients, method, category, serves, created_by) 
					VALUES ('$title', '$desc', '$ingredients', '$method', '$category', $serves, $userID)";   

			$this->dbc->query($sql); 

			if($this->dbc->affected_rows) { 
				$this->data['postMessage'] = '<p style="color:green"><b>Success! New recipe has been added</b></p>';
			}else { 
				$this->data['postMessage'] = '<p style="color:red"><b>Something went wrong! <br />
				<i>This new recipe could not be processed <br />
				Please contact the website owner to fix this problem</i></b></p>';
			} 
	} 
}   
}
