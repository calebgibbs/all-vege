<?php 

require 'vendor/autoload.php';  

$plates = new League\Plates\Engine('app/templates'); 

if ( isset($_GET['page']) ) {
	$page = $_GET['page'];
} else { 
	$page = 'home';
} 

switch ($page) {
	case 'home':
		echo $plates -> render('home'); 	
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

