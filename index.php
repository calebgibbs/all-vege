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
		require 'app/controllers/SignupController.php'; 
		$controller = new SignupController();  	
	break; 

	case 'search':
		echo $plates -> render('search'); 	
	break; 

	case 'recipe':
		echo $plates -> render('recipe'); 	
	break; 

	case 'account':
		echo $plates -> render('account'); 	
	break; 

	case 'settings':
		echo $plates -> render('settings'); 	
	break; 

	default:
		require 'app/controllers/Error404Controller.php';
		$controller = new Error404Controller();
	break;
} 

$controller -> buildHTML();

