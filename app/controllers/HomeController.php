<?php 

class HomeController {  



	//properties 

	//constructor (help build the page) 

	//methods (functions) 
	public function login() {


	} 

	public function buildHTML() {  

		$plates = new League\Plates\Engine('app/templates');
		echo $plates -> render('home');
	}

}