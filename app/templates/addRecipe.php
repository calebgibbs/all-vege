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
				<label class="label tag-lab">Tags: </label> 
				
				<div id="tags">
					<div id="tag-left">
						<input type="checkbox" name="tags" value="sides"> Side dish <br>
						<input type="checkbox" name="tags" value="breakfast"> Breakfast <br> 
						<input type="checkbox" name="tags" value="lunch"> Lunch <br>
						<input type="checkbox" name="tags" value="dinner"> Dinner <br>
					</div> 
					<div id="tag-right">
						<input type="checkbox" name="tags" value="dessert"> Dessert <br>
						<input type="checkbox" name="tags" value="baking"> Baked Goods <br>
						<input type="checkbox" name="tags" value="beverage"> Beverage <br> 
					</div>  
				</div>
				<?=  isset($tagsMessage) ? $tagsMessage : '' ?>
			</div>  

			<div>
				<label class="label">Serves: </label> 
				<select name="serves">
  					<option value="0"></option>
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
			</div> 

			<div>
				<input type="submit" name="add-recipe" value="Add Recipe">
			</div>

		</form>

	</div>

</div>