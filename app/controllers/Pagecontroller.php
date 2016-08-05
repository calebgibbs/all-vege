<?php

abstract class PageController {

	protected $title;
	protected $metaDesc;
	protected $dbc;
	protected $plates;
	protected $data = [];

	public function __construct() {
		$this->plates = new League\Plates\Engine('app/templates');
	}

	
	abstract public function buildHTML();

	public function mustBeLoggedIn() {

		if( !isset($_SESSION['id']) ) {
			header('Location: index.php?page=login');
		}

	}

	public function mustBeLoggedOut() {
		
		if( isset($_SESSION['id']) ) {
			header('Location: index.php?page=logout');
			die();
		}

	} 

	public function mustBeAdmin() { 

		if($_SESSION['privilege'] != 'admin') { 
			echo "You cannot access this page";
			header('Location: index.php?page=error404');
		}
	} 

	public function mustBeModerator() { 

		if($_SESSION['privilege'] != 'moderator' && $_SESSION['privilege'] != 'admin') { 
			echo "You cannot access this page";
			header('Location: index.php?page=error404');
		}
	} 


}