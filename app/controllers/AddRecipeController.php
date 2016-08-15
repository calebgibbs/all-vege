<?php 

class AddRecipeController extends PageController {  

	public function __construct($dbc) {
		parent::__construct(); 
		$this->mustBeLoggedIn(); 
		$this->mustBeModerator();
		$this->dbc = $dbc;	 
		
		if( isset($_POST['add-recipe'])) { 
			$this->validateNewRecipe();
		}
	} 

	public function buildHTML() { 
		echo $this->plates->render('addRecipe', $this->data);
	} 

	private function validateNewRecipe() { 

		$totalErrors = 0; 
		$title = trim($_POST['title']);
		$desc  = trim($_POST['desc']);  
		$ingredients = trim($_POST['ingredients']); 
		$method = trim($_POST['method']); 
		$tags = isset($_POST['tags']);

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

		if( $tags == '' ) { 
			$this->data['tagsMessage'] = '<p style="color:red">Please select a category</p>'; 
			$totalErrors++;
		} 

		if(isset($_POST['serves']) && $_POST['serves'] == '0') { 
			$this->data['serveMessage'] = '<p style="color:red">Please choose a serving option</p>'; 
			$totalErrors++;
		} 

		if($totalErrors == 0) { 
			$this->processNewRecipe();
		}
	} 

	private function processNewRecipe() { 
		
	} 
	
	
}
