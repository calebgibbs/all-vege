<?php 
	$this -> layout('master',[
		'title'=>'My Recipes', 
		'desc' => 'View all Recipes' 

	]); 
?> 
<?= $this->insert('panelNav') ?>
<div id="page-setup">
	
	<h1>My Recipes</h1> 
	
	<?php foreach($allRecipes as $item):  ?> 
		<a href="index.php?page=recipe&recipeid=<?= $item['id'] ?>">
			<div>
				<span><?= $item['title'] ?> <span><?= $item['description'] ?></span></span>
			</div> 
		</a> 
	<?php endforeach ?>

 </div>