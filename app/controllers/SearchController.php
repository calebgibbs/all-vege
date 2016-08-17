<?php 

class SearchController extends PageController { 

	public function __construct($dbc) {

		parent::__construct(); 
		$this->dbc = $dbc; 
		$this->getResults();	
	} 

	public function buildHTML() { 
		echo $this->plates->render('results', $this->data);
	} 

	private function getResults() {
		$search = $_POST['search-bar'];

		if (strlen($search) === 0) {
			$searchTerm = ""; 
		} else {
			$result = $search; 
			$searchTerm = strtolower($search);
		}  

		$this->data['searchTerm'] = $searchTerm; 

		$sql = "SELECT id, title AS score_title, description AS score_description 
				FROM recipes 
				WHERE 
					title LIKE '%$searchTerm%' OR  
					description LIKE '%$searchTerm%'
				ORDER BY score_title ASC";   

		$result = $this->dbc->query($sql);

		if( ! $result || $result->num_rows == 0) {
			$this->data['searchResults'] = "No results";

		}else{
			$this->data['searchResults'] = $result->fetch_all(MYSQLI_ASSOC);
		}
	} 
}