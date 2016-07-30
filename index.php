<?php  

require 'vendor/autoload.php';   
 
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$dbc = new mysqli('localhost', 'root', '',  'all_vege');

switch ($page) {
	case 'home':
		require 'app/controllers/HomeController.php'; 
		$controller = new HomeController($dbc);	
	break; 

	case 'sign-up':
		require 'app/controllers/SignupController.php'; 
		$controller = new SignupController($dbc);  	
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

