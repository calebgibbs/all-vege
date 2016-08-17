<?php 
	$this -> layout('master',[
		'title'=>'All Recipes', 
		'desc' => 'View all Recipes' 

	]); 
?> 
<?= $this->insert('panelNav') ?>
<div id="page-setup">
	
	<h1>All Recipes</h1> 
	<div id="table">
	<div class="recipe-results-title">
		<span id="rec-title"><b>Title</b></span><span id="rec-desc"><b>Description</b></span>
	</div>
	<?php foreach($allRecipes as $item):  ?> 
		<a href="index.php?page=recipe&recipeid=<?= $item['id'] ?>&edit">
			<div class="recipe-results">
				<span id="rec-title"><?= $item['title'] ?> </span><span id="rec-desc"><?= $item['description'] ?></span>
			</div> 
		</a> 
	<?php endforeach ?> 
	</div>

 </div>