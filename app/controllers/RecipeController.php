<?php 


class RecipeController extends PageController { 
	
	public function __construct($dbc) { 
		parent::__construct();
	} 

		public function buildHTML() { 
		echo $this->plates->render('recipe');
	}
}