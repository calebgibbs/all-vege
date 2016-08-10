 <?php 
	$this -> layout('master',[
		'title'=>'Add Recipe', 
		'desc' => 'Add a Recipe' 

	]); 
?> 
<?= $this->insert('panelNav') ?>
<h1>Add a Recipe</h1> 
	<div>
		<form>
			<div>
				<label>Title: </label>
				<input type="text" name="title">
			</div> 

			<div>
				<label>Description: </label> 
				<input>
			</div> 

			<div>
				<label>Ingredients</label> 
				
			</div>
		</form>
	</div>