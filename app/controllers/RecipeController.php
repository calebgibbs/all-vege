<?php 


class RecipeController extends PageController { 
	
	public function __construct($dbc) { 
		parent::__construct(); 
		
		$this->dbc = $dbc; 

		if (isset($_GET['delete'])) {
			$this->deleteRecipe();
		}

		if (isset($_POST['new-comment'])) {
			$this->addComment();
		} 

		if (isset($_GET['delete-comment'])) {
			$this->deleteComment();
		}

		$this->getRecipeData(); 
	} 

	public function buildHTML() { 
		echo $this->plates->render('recipe', $this->data);
	} 

	private function getRecipeData() { 
		$recipeID = $this->dbc->real_escape_string( $_GET['recipeid'] ); 
		$sql = "SELECT * 
				FROM recipes 
				WHERE id = '$recipeID'"; 
		
		$result = $this->dbc->query($sql); 
		if( !$result || $result->num_rows == 0) { 
			header('Location: index.php?page=404');
		}else {  
			$this->data['recipe'] = $result->fetch_assoc();
		} 

		$sql = "SELECT comments.id, comment, first_name, last_name, profile_picture, created_by  
				FROM comments 
				JOIN users 
				ON comments.created_by = users.id
				WHERE recipe_id = $recipeID"; 

		$result = $this->dbc->query($sql); 

		$this->data['allComments'] = $result->fetch_all(MYSQLI_ASSOC); 

		
	}  

	private function addComment() {
		$totalErrors = 0; 
		$comment = trim($_POST['new-comment']); 

		if (strlen($comment) == 0) {
			$totalErrors++; 
		}

		if (strlen($comment) > 1000) {
			$totalErrors++; 
			$this->data['commentMessage'] = '<p style="color:red;">This comment is too big, 
			please limit your comment to 1,000 characers</p>';
		} 

		if ($totalErrors == 0) {
			
			$comment = $this->dbc->real_escape_string($comment);  
			$userId = $_SESSION['id'];
			$userImage = $_SESSION['profile_picture'];
			$recipeId = $this->dbc->real_escape_string($_GET['recipeid']);
			
			$sql = "INSERT INTO comments (comment, created_by, recipe_id)
					VALUES ('$comment', $userId, $recipeId)"; 

			$this->dbc->query($sql);  
			header("Location: ". $_SERVER['REQUEST_URI']."#leaveAcomment" ); //temp fix
		}
	}

	private function deleteRecipe() { 
		$this->mustBeModerator(); 
		$admin = $_SESSION['privilege'] == 'admin';  
		$userPrivilege = $_SESSION['privilege'];
		$userID = $_SESSION['id']; 
		$recipeID = $this->dbc->real_escape_string($_GET['recipeid']);  

		$sql = "SELECT image
				FROM recipes
				WHERE id = $recipeID"; 
		if ( $userPrivilege != $admin ) {
			$sql .= " AND created_by = $userID";
		} 

		$result = $this->dbc->query($sql); 

		if( !$result || $result->num_rows == 0 ) {
			return;
		} 

		$result = $result->fetch_assoc();

		$filename = $result['image']; 

		unlink("images/uploads/recipes/original/$filename");
		unlink("images/uploads/recipes/recipe/$filename");
		unlink("images/uploads/recipes/search/$filename");
	
		$sql = "DELETE FROM recipes
				WHERE id = $recipeID"; 

		if(!$admin) {  
			$sql .= " AND created_by = $userID";
		}

		$this->dbc->query($sql);   
		header('Location: index.php?page=myRecipes'); 
	}  

	private function deleteComment() { 
		$commentID = $_GET['delete-comment'];
		$userID = $_SESSION['id'];
		$admin = $_SESSION['privilege'] == 'admin';
		$sql = "DELETE FROM comments 
				WHERE id = $commentID"; 
		if ($_SESSION['privilege'] != 'admin') {
			$sql .= " AND created_by = $userID";
		}

		$this->dbc->query($sql);
		unset($_GET['delete-comment']);


	}
} 































