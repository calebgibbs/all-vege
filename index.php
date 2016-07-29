<?php 

require 'vendor/autoload.php';   

if ( isset($_GET['page']) ) {
	$page = $_GET['page'];
} else { 
	$page = 'home';
} 

switch ($page) {
	case 'home':
		require 'app/controllers/HomeController.php'; 
		$controller = new HomeController();	
	break; 

	case 'sign-up':
		echo $plates -> render('sign-up'); 	
	break; 

	case 'account':
		echo $plates -> render('account'); 	
	break; 

	default:
		require 'app/controllers/Error404Controller.php';
		$controller = new Error404Controller();
	break;
} 

$controller -> buildHTML();

