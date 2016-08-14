 <?php 
	$this -> layout('master',[
		'title'=>'Add Recipe', 
		'desc' => 'Add a Recipe' 

	]); 
?> 
<?= $this->insert('panelNav') ?>
<div id="add-rec"> 
	
	<h1>Add a New Recipe</h1> 

	<div id="recipe-form"> 
		
		<form id="recipe-frm" method="post" action="#"> 

			<div>
				<label class="label">Title:</label> 
				<input type="text" name="title" id="title-input" placeholder="Title">
			</div> 

			<div>
				<label class="label">Description:</label> 
				<textarea rows="4" cols="50" name="description" placeholder="Describe this recipe..."></textarea>
			</div> 

			<div>
				<label class="label">Ingredients:</label> 
				<textarea rows="4" cols="50" name="description" placeholder="Ingredients..."></textarea>
			</div> 

			<div>
				<label class="label">Method:</label> 
				<textarea rows="4" cols="50" name="description" placeholder="Method..."></textarea>
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
			</div>  

			<div>
				<label class="label">Serves: </label> 
				<select>
  					<option></option>
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
			</div> 

			<div>
				<label class="label">Image </label>
				<input type="file" name="pic" accept="image/*">
			</div> 

			<div>
				<input type="submit" name="submit" value="Add Recipe">
			</div>

		</form>

	</div>

</div>
	