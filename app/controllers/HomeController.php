<?php 

class HomeController  {  

	public function __construct() {

	

	}

	public function buildHTML() {  

		$plates = new League\Plates\Engine('app/templates');
		echo $plates -> render('home');
	}

}