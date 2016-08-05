<?php 

class AllRecipesController extends PageController {  

	public function __construct($dbc) {

		parent::__construct(); 
		$this->mustBeLoggedIn();
		$this->mustBeModerator(); 
		$this->dbc = $dbc;	
	} 

	public function buildHTML() { 
		echo $this->plates->render('allRecipes');
	}
	
	
}
