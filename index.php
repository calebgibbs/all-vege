<?php  

session_start();

require 'vendor/autoload.php';
require 'app/controllers/PageController.php';  
 
 
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$dbc = new mysqli('localhost', 'root', '',  'all_vege');

switch ($page) {
	case 'home':
		require 'app/controllers/HomeController.php'; 
		$controller = new HomeController($dbc);	 
	break; 

	case 'register':
		require 'app/controllers/RegisterController.php'; 
		$controller = new SignupController($dbc);  	
	break; 

	case 'login': 
		require 'app/controllers/LoginController.php';
		$controller = new LoginController($dbc);  	
	break; 

	case 'logout':
		unset($_SESSION['id']);
		unset($_SESSION['first_name']);
		unset($_SESSION['last_name']);
		unset($_SESSION['email']);
		unset($_SESSION['profile_picture']);
		unset($_SESSION['password']);
		unset($_SESSION['privilege']);
		header('Location: index.php');
	break;  

	case 'search':
		echo $plates -> render('search'); 	
	break; 

	case 'recipe':
		echo $plates -> render('recipe'); 	
	break; 

	case 'account':
		require 'app/controllers/AccountController.php'; 
		$controller = new AccountController($dbc); 	
	break; 

	case 'settings':
	case 'add-recipe':
		require 'app/controllers/AddRecipeController.php'; 
		$controller = new AddRecipeController($dbc); 	
	break;  

	case 'all-recipes': 
		require 'app/controllers/AllRecipesController.php'; 
		$controller = new AllRecipesController($dbc);
	break;  

	case 'users': 
		require 'app/controllers/UserController.php'; 
		$controller = new UserController($dbc);
	break;

	case 'help': 
		require 'app/controllers/HelpController.php'; 
		$controller = new HelpController($dbc);
	break;

	default:
		require 'app/controllers/Error404Controller.php';
		$controller = new Error404Controller();
	break;
} 



$controller -> buildHTML(); 


