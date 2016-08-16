<?php 

class SearchController extends PageController { 

	public function __construct($dbc) {

		parent::__construct(); 
		$this->dbc = $dbc; 

		if ($_POST('search')) {
				die('search');
			}	
	} 

	public function buildHTML() { 
		echo $this->plates->render('results');
	}
}