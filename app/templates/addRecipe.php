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
		
		<form id="recipe-frm" method="post" action="index.php?page=addRecipe"> 

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
						<option value="0">-Please sleect-</option>
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

				if(isset($_POST['serves']) && $_POST['serves'] == '0') { 
			$this->data['serveMessage'] = '<p style="color:red">Please choose a serving option</p>'; 
			$totalErrors++;
		} 

				<select name="serves">
  					<option value="0">-Please sleect-</option>
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
				<label class="label">Image </label>
				<input type="file" name="pic" accept="image/*">
				<?=  isset($serveMessage) ? $imageMessage : '' ?>
			</div> 

			<div>
				<input type="submit" name="add-recipe" value="Add Recipe">
			</div>

		</form>

	</div>

</div>