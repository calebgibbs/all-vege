<?php 

class Error404Controller extends PageController { 

	public function __construct() { 
		parent::__construct();
	} 

	public function buildHTML() { 
		echo $this->plates->render('error404');
	}
}