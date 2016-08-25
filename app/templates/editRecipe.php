<?php  
	$title = "Edit ". $recipe['title'];
	$this -> layout('master',[
		'title'=> $title, 
		'desc' => 'Edit this recipe' 

	]); 
?> 
<?= $this->insert('panelNav') ?>
<div id="add-rec"> 
	
	<h1>Edit <?= $recipe['title'] ?></h1>  
	<?=  isset($postMessage) ? $postMessage : '' ?>

	<div id="recipe-form"> 
		
		<form id="recipe-frm" method="post" action="index.php?page=editRecipe&recipeid=<?= $recipe['id'] ?>" enctype="multipart/form-data"> 

			<div>
				<label class="label">Title:</label> 
				<input type="text" name="title" id="title-input" placeholder="Title" 
				value="<?php
						if (isset($_POST['title'])) {
							if( $_POST['title'] == $recipe['title']) { 
							echo $recipe['title'];
						}else{ 
							echo $_POST['title'];
						}
						}else{ 
							echo $recipe['title'];
						}
					?>">
				<?=  isset($titleMessage) ? $titleMessage : '' ?>
			</div> 

			<div>
				<label class="label">Description:</label> 
				<textarea rows="4" cols="50" name="desc" placeholder="Describe this recipe..."><?php
						if (isset($_POST['desc'])) {
							if( $_POST['desc'] == $recipe['description']) { 
							echo $recipe['description'];
						}else{ 
							echo $_POST['desc'];
						}
						}else{ 
							echo $recipe['description'];
						}
					?></textarea>
				<?=  isset($descMessage) ? $descMessage : '' ?>
			</div> 

			<div>
				<label class="label">Ingredients:</label> 
				<textarea rows="4" cols="50" name="ingredients" placeholder="Ingredients..."><?php
						if (isset($_POST['ingredients'])) {
							if( $_POST['ingredients'] == $recipe['ingredients']) { 
							echo $recipe['ingredients'];
						}else{ 
							echo $_POST['ingredients'];
						}
						}else{ 
							echo $recipe['ingredients'];
						}
					?></textarea>
				<?=  isset($ingrMessage) ? $ingrMessage : '' ?>
			</div> 

			<div>
				<label class="label">Method:</label> 
				<textarea rows="4" cols="50" name="method" placeholder="Method..."><?php
						if (isset($_POST['method'])) {
							if( $_POST['method'] == $recipe['method']) { 
								echo $recipe['method'];
							}else{ 
								echo $_POST['method'];
							}
						}else{ 
							echo $recipe['method'];
						}
					?></textarea>
				<?=  isset($methodMessage) ? $methodMessage : '' ?>
			</div> 

			<div>
				<div id="tags">
					<label class="label">Category:</label>  
					<select name="category"> 
						<?php 
							if ( $recipe['category'] == 'side') {
								$valueName = "Side dish";
							}elseif ($recipe['category'] == 'breakfast') {
								$valueName = "Breakfast";
							}elseif ($recipe['category'] == 'lunch') {
								$valueName = "Lunch";
							}elseif ($recipe['category'] == 'dinner') {
								$valueName = "Dinner";
							}elseif ($recipe['category'] == 'baked') {
								$valueName = "Baked goods";
							}elseif ($recipe['category'] == 'beverage') {
								$valueName = "Beverage";
							}elseif ($recipe['category'] == 'dessert') {
								$valueName = "Dessert";
							}
						?> 
						<?php if(!isset($_POST['category'])): ?>
						<option value="<?= $recipe['category'] ?>"><?= $valueName ?></option>
						<?php endif; ?>
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
							}elseif ($_POST['category'] == 'dessert') {
								$valueName = "Dessert";
							}
						?> 
						<option value="<?= $_POST['category'] ?>"><?= $valueName ?></option>
						<?php endif; ?>
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
  					<?php if(!isset($_POST['serves'])): ?>
  					<option value="<?= $recipe['serves'] ?>"><?= $recipe['serves'] ?></option>
  					<?php endif; ?>
  					<?php if(isset($_POST['serves'])): ?>
  					<option value="<?= $_POST['serves'] ?>"><?= $_POST['serves'] ?></option>
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
				<input type="submit" name="add-recipe" value="Save">
			</div>

		</form>

	</div>

</div>