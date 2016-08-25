<?php 
	$this -> layout('master',[
		'title'=>'Add Recipe', 
		'desc' => 'Add a Recipe' 

	]); 
?> 
<?= $this->insert('panelNav') ?>
<div id="add-rec"> 
	
	<h1>Add a New Recipe</h1>  
	<?=  isset($postMessage) ? $postMessage : '' ?>

	<div id="recipe-form"> 
		
		<form id="recipe-frm" method="post" action="index.php?page=addRecipe" enctype="multipart/form-data"> 

			<div>
				<label class="label">Title:</label> 
				<input type="text" name="title" id="title-input" placeholder="Title" value="<?= isset($_POST['title']) ? $_POST['title'] : '' ?>">
				<?=  isset($titleMessage) ? $titleMessage : '' ?>
			</div> 

			<div>
				<label class="label">Description:</label> 
				<textarea rows="4" cols="50" name="desc" placeholder="Describe this recipe..."><?= isset($_POST['desc']) ? $_POST['desc'] : '' ?></textarea>
				<?=  isset($descMessage) ? $descMessage : '' ?>
			</div> 

			<div>
				<label class="label">Ingredients:</label> 
				<textarea rows="4" cols="50" name="ingredients" placeholder="Ingredients..."><?= isset($_POST['ingredients']) ? $_POST['ingredients'] : '' ?></textarea>
				<?=  isset($ingrMessage) ? $ingrMessage : '' ?>
			</div> 

			<div>
				<label class="label">Method:</label> 
				<textarea rows="4" cols="50" name="method" placeholder="Method..."><?= isset($_POST['method']) ? $_POST['method'] : '' ?></textarea>
				<?=  isset($methodMessage) ? $methodMessage : '' ?>
			</div> 

			<div>
				<div id="tags">
					<label class="label">Category:</label>  
					<select name="category"> 
					<?php if(isset($_POST['category'])): ?>  
						<?php 
							if ( $_POST['category'] == 'side') {
								$valueName = "Side dish";
							}elseif ($_POST['category'] == 'breakfast') {
								$valueName = "Breakfast";
							}elseif ($_POST['category'] == 'lunch') {
								$valueName = "Lunch";
							}elseif ($_POST['category'] == 'dinner') {
								$valueName = "Dinner";
							}elseif ($_POST['category'] == 'baked') {
								$valueName = "Baked goods";
							}elseif ($_POST['category'] == 'beverage') {
								$valueName = "Beverage";
							}else{ 
								$valueName = "-Please select-";	
							}
						?>
						<option value="<?= $_POST['category'] ?>"><?= $valueName ?></option> 
					<?php endif ?>
					<?php if(!isset($_POST['category'])): ?>
						<option value="0">-Please select-</option> 
					<?php endif ?>
						<option value="side">Side dish</option>
						<option value="breakfast">Breakfast</option> 
						<option value="lunch">Lunch</option>
						<option value="dinner">Dinner</option>
						<option value="dessert">Dessert</option>
						<option value="baked">Baked goods</option>
						<option value="beverage">Beverage</option>
					</select> 
				</div>
				<?=  isset($categoryMessage) ? $categoryMessage : '' ?>
			</div>  

			<div>
				<label class="label">Serves: </label> 

				

				<select name="serves"> 
					
  					
  					
  					<?php if(isset($_POST['serves'])): ?>
  					<option value="<?= $_POST['serves'] ?>"><?php 
  						if ($_POST['serves'] == 0) {
  							echo "-Please select-";
  						}else{ 
  							echo $_POST['serves'];
  						}

  					?></option>
  					<?php endif; ?> 
  					<?php if(!isset($_POST['serves'])): ?>
  					<option value="0">-Please select-</option> 
  				<?php endif; ?>
  					<option value="1">1</option>
  					<option value="2">2</option>
  					<option value="3">3</option>
  					<option value="4">4</option>
  					<option value="5">5</option>
  					<option value="6">6</option>
  					<option value="7">7</option>
  					<option value="8">8</option>
  					<option value="9">9</option>
  					<option value="10">10</option>
				</select>   
				<?=  isset($serveMessage) ? $serveMessage : '' ?>
			</div> 

			<div>
				<label class="label">Image: </label>
				<input type="file" name="image" accept="image/*">
				<?=  isset($imageMessage) ? $imageMessage : '' ?>
			</div> 

			<div>
				<input type="submit" name="add-recipe" value="Add Recipe">
			</div>

		</form>

	</div>

</div>