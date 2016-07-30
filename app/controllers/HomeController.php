<?php 

class HomeController {  



	//properties 

	//constructor (help build the page) 
	public function __construct() {

		die('landing controller has been made');

	}

	//methods (functions) 
	public function login() {


	} 

	public function buildHTML() {  

		$plates = new League\Plates\Engine('app/templates');
		echo $plates -> render('home');
	}

}