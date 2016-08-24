<?php 
	$this -> layout('master',[
		'title'=>'Newest Recipes', 
		'desc' => 'view your search results' 
	]); 
?>  
<body id="search-bg">  
	<div id="search-results">

		<h1>Newest Recipes</h1>

		<?php foreach ($recipes as $result): ?> 
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
</div>