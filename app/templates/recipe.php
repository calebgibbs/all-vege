<?php 
	$pageTitle = $recipe['title']; 
	$pageDescription = $recipe['description'];
	$this -> layout('master',[
		'title'=>$pageTitle, 
		'desc' => $pageDescription 

	]); 
?>  
<?php if(isset($_SESSION['id'])): ?>
	<?php if (isset($_GET['edit'])): ?>
		<?php if($recipe['created_by'] == $_SESSION['id'] || $_SESSION['privilege'] == 'admin'): ?>
			<ul id="recipe-settings">
				<li>
					<a href="index.php?page=editRecipe&recipeid=<?= $recipe['id'] ?>">Edit</a>
				</li> 
				<li>
					<button id="del-recipe" href="index.php">Delete</button> 
					<div id="del-recipe-option">
						<a href="<?= $_SERVER['REQUEST_URI'] ?>&delete">Yes</a> / <button id="no-button">No</button>
					</div>
				</li>
			</ul>
		<?php endif; ?>
	<?php endif; ?>
<?php endif; ?>
<div id="recipe">
	<div>
		<div id="recipe-img"> 
			<img src="images/uploads/recipes/recipe/<?= $recipe['image'] ?>">
		</div> 

		<div id="recipe-head">
			<article>
				<h1><?= $recipe['title'] ?></h1> 
				<p><?= $recipe['description'] ?></p>
			</article>
		</div> 
	</div> 
	<div>
		<div id="ingredients">
			<article>
				<h3>Ingredients</h3> 
				<p><?= $recipe['ingredients'] ?></p>
			</article>
		</div> 

		<div id="method">
			<article>
				<h3>Method</h3> 
				<p><?= $recipe['method'] ?></p>
			</article>
		</div>
	</div> 
	<div id="comments">
		
		<?php foreach( $allComments as $comment): ?> 
			<div class="comment">
				<div class="comment-content">
					<div class="comment-img"> 
						<?php 
							if($comment['profile_picture'] == ''){
								$comment['profile_picture'] = "default.png";
							}
						 ?>

						<img src="images/uploads/account-profiles/comment/<?= $comment['profile_picture'] ?>">
					</div> 
					<div class="comment-decs">
						<article>
							<h4><?= htmlentities($comment['first_name']) ?>  <?= htmlentities($comment['last_name']) ?></h4> 
							<p><?= htmlentities($comment['comment']) ?></p>
						</article>
					</div>  
				</div>
			</div> 
		<?php endforeach; ?>  
<div id="leaveAcomment">
	<?php if(isset($_SESSION['id'])): ?>
		<form id="leave-comment" method="post" action="index.php?page=recipe&recipeid=<?= $_GET['recipeid'] ?>" >
			<div>
				<label id="commenter-name"><b><?= $_SESSION['first_name'] ?>  <?= $_SESSION['last_name'] ?>:</b></label>
				<textarea name="new-comment" placeholder="Write a comment"></textarea> 
			</div> 
			<?php if( isset($commentMessage) ): ?>
        		<?= $commentMessage ?>
       		<?php endif; ?> 
			<input type="submit" value="Comment">
		</form>  
	<?php endif; ?>
	<?php if(!isset($_SESSION['id'])): ?> 
		<p>You must <a href="index.php?page=login">log in</a> to leave a comment</p>
	<?php endif; ?>
</div>

		

	</div>
</div> 