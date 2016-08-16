<?php 
	$pageTitle = $recipe['title']; 
	$pageDescription = $recipe['description'];
	$this -> layout('master',[
		'title'=>$pageTitle, 
		'desc' => $pageDescription 

	]); 
?>  
<?php if(isset($_SESSION['id'])): ?>
	<?php if($recipe['created_by'] == $_SESSION['id'] || $_SESSION['privilege'] == 'admin'): ?>
	<a href="">Edit</a> <a href="">Delete</a>
	<?php endif; ?>
<?php endif; ?>
<div id="recipe">
	<div>
		<div id="recipe-img"> 
			<img src="http://placehold.it/300x300">
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

</div>
