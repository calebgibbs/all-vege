<?php 
	$this -> layout('master',[
		'title'=>'Breakfast', 
		'desc' => 'view your search results' 
	]); 
?>  
<body id="search-bg">  
	<div id="search-results">

		<h1>Breakfast Recipes</h1>

		<?php if(strlen($searchTerm) > 0): ?> 

	<?php if($searchResults > 0): ?> 

		<?php foreach ($searchResults as $result): ?> 
			<a href="index.php?page=recipe&recipeid=<?= $result['id'] ?>">
				<div class="result">
					<div class="result-content">
						<div class="result-img"> 
							<img src="images/uploads/recipes/search/<?= $result['image'] ?>">
						</div> 
						<div class="result-decs">
							<article>
								<h3><?= $result['score_title'] ?></h3> 
								<p><?= $result['score_description'] ?> </p>
							</article>
			 			</div>  
					</div>
				</div>
			</a> 
		<?php endforeach; ?>

	<?php else: ?> 
		<h1><i>There are currently no recipes for this category</i></h1>
	<?php endif; ?> 

<?php else: ?>
	<p>Please enter a search term</p>
<?php endif; ?>
</div>