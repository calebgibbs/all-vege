<?php 
	$this -> layout('master',[
		'title'=>'Manage users', 
		'desc' => 'Manage site users' 

	]); 
?> 
<?= $this->insert('panelNav') ?>
<div id="page-setup">
	<h1>Users</h1> 
	<h3>Admins</h3>  
	<h3>Moderators</h3> 
	<h3>Users</h3>
</div>