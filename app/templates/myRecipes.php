<?php 
	$this -> layout('master',[
		'title'=>'My Recipes', 
		'desc' => 'View all Recipes' 

	]); 
?> 
<?= $this->insert('panelNav') ?>
<div id="page-setup">	
	<h1>My Recipes</h1> 
	
	<table>
		<tr>
			<th>Title</th> 
			<th>Description</th>
		</tr> 
		<?php foreach($allRecipes as $item):  ?> 		
			<tr class="recipe-data" href="index.php?page=recipe&recipeid=<?= $item['id'] ?>&edit">
				<td><?= $item['title'] ?></td>
				<td><?= $item['description'] ?></td>
			</tr>  		 
		<?php endforeach ?>
	</table>
</div>
