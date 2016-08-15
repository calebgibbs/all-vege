<?php 
	$this -> layout('master',[
		'title'=>'My Recipes', 
		'desc' => 'View all Recipes' 

	]); 
?> 
<?= $this->insert('panelNav') ?>
<h1>My Recipes</h1>